<?php
include "get.php";
include "insert.php";
include "update.php";
include "delete.php";
$dbh = connectToDB();

if (!ini_get('display_errors')) {
    ini_set('display_errors', '0');
    ini_set('display_warnings', '0');
}

function connectToDB()
{
  include "configs.php";

  if( ! $DB_NAME ) die('please create config.php, define $DB_NAME, $DB_USER, $DB_PASS there');
  try {
      $dbh = new PDO($DSN, $DB_USER, $DB_PASS);
      $dbh->setAttribute(PDO::ATTR_ERRMODE,            PDO::ERRMODE_EXCEPTION);
      $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      $dbh->exec('SET CHARACTER SET utf8') ;
  } catch (Exception $e) {
      die("Problem connecting to database $DB_NAME as $DB_USER: " . $e->getMessage() );
  }
  return $dbh;
}

function printAllStrainOptions() {
  $allStrains = getAllStrains();
  foreach ($allStrains as $strain)
  {
    echo "<option value='".$strain->ID."'> ".$strain->name."</option>";
  }
}

function printAllCustomerOptions() {
  $allCustomers = getAllCustomers();
  foreach ($allCustomers as $customer)
  {
    echo "<option value='".$customer->ID."'> ".$customer->lastname."</option>";
  }
}

function printAllBottleOptions() {
  $allBottles = getAllBottles();
  foreach ($allBottles as $bottles)
  {
    echo "<option value='".$bottles->ID."'> ".$bottles->name."</option>";
  }
}

function printAllStrainsAsTable(){
  $allStrains = getAllStrains();
  foreach ($allStrains as $strain)
  {
    echo "<tr>";
    echo "<td>". $strain -> name ."</td>";
    echo "<td>" . sizeOf(getBarrelsByStrain($strain -> ID)) . "</td>";
    echo "<td><a href='getBarrels.php?get=$strain->ID'><img class='small' src='images/forward.png' alt='bearbeiten'></a></td>";
    echo "</tr>";
  }
}

function printBarrelsAsTableByStrain($strain){
  $allBarrels = getBarrelsByStrain($strain);
  foreach ($allBarrels as $barrel)
  {
    echo "<tr class='barrelList' id='$barrel->ID'>";
    echo "<td><input type='checkbox' class='$barrel->ID' name='barrel[]' value='$barrel->ID' ></td>";
    echo "<td>".$barrel->ID."</td>";
    echo "<td>".getStrainNameById($barrel->strainFK)."</td>";
    echo "<td>".$barrel->fillLevel."%</td>";
    echo "<td>".$barrel->date."</td>";
    echo "</tr>";
  }
}

function printAllBarrelsAsTable(){
  $allBarrels = getAllBarrels();
  foreach ($allBarrels as $barrel)
  {
    echo "<tr>";
    echo "<td><input type='checkbox'></td>";
    echo "<td>".$barrel->ID."</td>";
    echo "<td>".getStrainNameById($barrel->strainFK)."</td>";
    echo "<td>".$barrel->fillLevel."</td>";
    echo "<td>".$barrel->date."</td>";
    echo "</tr>";
  }
}

function printUnpressedPressingsAsTable($show = "all"){
  $allPressings = getJoinedPressings(false);
  echo '<table class="table table-hover">
        <tr>
          <th>ID</th>
          <th>Sorte</th>
          <th>Datum</th>
          ';
           if($show == "all")
            echo "<th>Menge</th>
                  <th>Optionen</th>
        </tr>";
  foreach ($allPressings as $pressing)
  {
    echo "<tr>";
    echo "<td>".$pressing[0]."</td>";
    echo "<td>".$pressing[1]."</td>";
    echo "<td>".$pressing[2]."</td>";
    if($show == "all")
    {
      echo "<td>".$pressing[3]."</td>";
      echo "<td><a href='addBotteling.php?id=".$pressing[0]."'>abfüllen</a></td>";
    }
    echo "</tr>";
  }

  echo "</table>";
}

function printAllPressingsAsTable(){
  $allPressings = getJoinedPressings(true);
  foreach ($allPressings as $pressing)
  {
    echo "<tr>";
    echo "<td>".$pressing[0]."</td>";
    echo "<td>".$pressing[1]."</td>";
    echo "<td>".$pressing[2]."</td>";
    echo "<td>".$pressing[3]."</td>";

    if($pressing[4] != 1)
      echo "<td><a href='addBotteling.php?id=".$pressing[0]."'>abfüllen</a></td>";
    else
      echo "<td>Abgefüllt!</td>";

    echo "</tr>";
  }

}

function printAllBottlingsTable()
{
  $allBottlings = getAllBottlings();
  foreach ($allBottlings as $bottling)
  {
    echo "<tr>";
    echo "<td>".$bottling->ID."</td>";
    echo "<td>".getPressingById($bottling->pressingFK)->ID."</td>";
    echo "<td>".$bottling->date."</td>";
    echo "<td>".getStrainById($bottling->strainFK)->name."</td>";
    echo "<td>".getBottleById($bottling->bottleFK)->name."</td>";
    echo "<td>".$bottling->amount."</td>";
    echo "</tr>";
  }
}

function printMessage()
{
  if(isset($_GET['msg']))
  {
    $link = '';
    if($_GET['err'] == 2)
      $link = '<a href="javascript:history.go(-2)">GO BACK</a>';
    $msg = $_GET['msg'];
    if(isset($_GET['err']) && $_GET['err'] == 1 || $_GET['err'] == 2)
      $signal = "alert-danger";
    else
      $signal = "alert-success";
      echo "<div class='alert $signal' role='alert'>$msg ".$link."</div>";
  }
  else
  {
    session_start();
    if($_SESSION['username'] == 'demo')
    {
      $msg = 'In this demo all actions are disabled.';
      $signal = "alert-info";
      echo "<div class='alert $signal' role='alert'>$msg</div>";
    }
  }
}

function printDatarows($tab, $stockable, $orderBy, $showCol = array(), $rows=0, $editable=false)
{

  $showData = array();
  $rowcount = 0;
  if($rows == 0)
    $rowcount = -99999;
  if($tab == "labels")
  {
    $datarows = getJoinedLabels($orderBy, true);
    $columns = array();
    foreach ($showCol as $col) {
      array_push($columns, (object) array('Field'=>$col));
    }
  }
  else if($tab == "allLabels")
  {
    $datarows = getJoinedLabels($orderBy);
    $columns = array();
    foreach ($showCol as $col) {
      array_push($columns, (object) array('Field'=>$col));
    }
  }
  else if($tab == "pressings")
  {
    $datarows = getJoinedPressings($orderBy, false);
    $columns = array();
    foreach ($showCol as $col) {
      array_push($columns, (object) array('Field'=>$col));
    }
  }
  else if($tab == "lastBarrels")
  {
    $datarows = getJoinedBarrels($orderBy);
    $columns = array();
    foreach ($showCol as $col) {
      array_push($columns, (object) array('Field'=>$col));
    }
  }
  else if($tab == "products" || $tab == "product")
  {
    $datarows = getJoinedProducts($orderBy);
    $columns = array();
    foreach ($showCol as $col) {
      array_push($columns, (object) array('Field'=>$col));
    }
  }
  else if($tab == "lastDeliveries")
  {
    $datarows = getLastDeliveries();
    $columns = array();
    foreach ($showCol as $col) {
      array_push($columns, (object) array('Field'=>$col));
    }
  }
  else
  {
    $datarows = getAnyTable($tab, $orderBy);
    $columns = getColumnNames($tab);
  }


  echo '<table class="table table-hover '.$tab.'List">
          <tr>';

  $adminColumn = 999;
  $counter = 0;
  if($tab == "labels")
  {
    $counter = 1;
    $tab = "label";
  }
  if($tab == "lastBarrels")
  {
    $counter = 1;
    $tab = "barrel";
  }
  if($tab == "allLabels")
  {
    $tab = "label";
  }
  if($tab == "product")
  {
    $counter = 1;
  }
  if($tab == "products")
  {
    $tab = "product";
  }

  foreach ($columns as $headline) {
    if($headline->Field == "admin")
      $adminColumn = $counter;
    if(in_array($headline->Field, $showCol) || ($showCol == null && $tab != "labels" && $headline -> Field != "password"))
    {
      if($headline->Field != "strain")
        echo "<th> ".ucfirst($headline->Field)."</th>";
      else
        echo "<th>Sorte</th>";
      array_push($showData, $counter);
    }
    $counter++;
  }
  if (isAdmin($_SESSION['user']))
    echo "<th></th>";

  foreach ($datarows as $datarow) {
    echo "</tr>";
    echo "<tr>";
    $counter = 0;
    if($rowcount >= $rows)
        break;
    foreach ($datarow as $data){

      if(in_array($counter, $showData))
      {
        if($counter == $adminColumn)
        {
          if($data == "1")
            $data = "Ja";
          else if($data == "0")
            $data = "Nein";
        }
        echo "<td> ".$data."</td>";
      }
      $counter++;
    }
    $options ="";

    if($editable == true && isAdmin($_SESSION['user']))
    {
      $options = "<a href='add$tab.php?id=$datarow->ID'><img class='small' src='images/edit.png' alt='bearbeiten'  data-toggle='tooltip' data-placement='top' title='Bearbeiten'> </a>";
    }

    if($tab == "customer" && isAdmin($_SESSION['user']))
    {
      $options .= "<a href='getDeliveries.php?get=$datarow->ID'><img class='small' src='images/delivery.png' alt='liefern'  data-toggle='tooltip' data-placement='top' title='Alle Lieferungen anzeigen'> </a>";
    }

    if($tab == "barrel" && isAdmin($_SESSION['user']))
    {
      $options .= "<a href='getBarrels.php?get=$datarow->strainID'><img class='small' src='images/press.png' alt='liefern'  data-toggle='tooltip' data-placement='top' title='Fässer dieser Sorte pressen'> </a>";
    }

    if($stockable == true && isAdmin($_SESSION['user']))
    {
      $options .= "<a href='stock$tab.php?id=$datarow->ID'><img class='small' src='images/stock.png' alt='einlagern'  data-toggle='tooltip' data-placement='top' title='Einlagern'></a>";
    }
    echo "<td> ".ucfirst($options)."</td>";
    echo "</tr>";

    $rowcount++;
  }
  echo "</table>";
}

function restrict ($level) {
  session_start();
  if ($level > 0)
  {
    if (! isset($_SESSION['user']) )
    {
      header("Location: login.php?msg=Sie sind leider nicht eingeloggt&err=1");
    }
    if ($level == 2 && ! isAdmin($_SESSION['user']))
    {
      header("Location: index.php?msg=Die angeforderte Seite ist Administratoren vorbehalten&err=1");
    }
  }
}

function mystrtolower ($string){
  $bad = array("Ä", "Ö", "Ü");
  $good = array("_a", "_o", "_u");
  $letters = mb_strtolower(str_replace($bad, $good, $string));

  $bad = array("_a", "_o", "_u");
  $good = array("ä", "ö", "ü");

  return str_replace($bad, $good, $letters);
}

function checkBottleAmmount($bottleID,$amount)
{
  $stockAmount = getBottleByID($bottleID)->amount;
  if($stockAmount >= $amount)
    return true;
  else
    return false;
}

function checkLabelAmmount($bottleID,$amount,$strainFk)
{
  $stockAmount = getLabelByBottleIdAndStrainId($bottleID,$strainFk)->amount;
  if($stockAmount >= $amount)
    return true;
  else
    return false;
}

function unstockLabels ($bottleID,$strainFk,$amount)
{
    $stockAmountFront = getLabelByBottleIdAndStrainId($bottleID,$strainFk)->amount;
    $stockAmountBack = getLabelByBottleIdAndStrainId($bottleID,0)->amount;

    stockLabel($stockAmountFront - $amount, $strainFk, $bottleID);
    stockLabel($stockAmountBack - $amount, 0, $bottleID);
}

function unstockBottles ($bottleID,$amount)
{
    $stockAmount = getBottleByID($bottleID)->amount;
    stockBottle($bottleID, $stockAmount - $amount);
}
function insertOrUpdateProduct($strainFk,$bottleID,$amount)
{
    $actAmount = getProductByBottleIdAndStrainId($bottleID,$strainFk)->amount;
    if($actAmount == null)
    {
      insertProduct($strainFk,$bottleID,$amount);
    }
    else
    {
      updateProductPositiv($strainFk,$bottleID,$amount);
    }

}

function hashPasswordSecure($pw)
{
  $cost = 10;
  $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
  $salt = sprintf("$2a$%02d$", $cost) . $salt;
  return crypt($pw, $salt);
}

function verifyPw($pw,$pwFromDB)
{
  if(crypt($pw, $pwFromDB) === $pwFromDB)
  {
    return true;
  }
  return false;
}
function demoRedirect($user)
{
  if(getUserByID($user) -> username == 'demo')
  {
    header('Location: ' . $_SERVER['HTTP_REFERER'].'?&msg=Restricted! We are sorry, but in this demo all actions are disabled.&err=2');
    exit;
  }
}
?>
