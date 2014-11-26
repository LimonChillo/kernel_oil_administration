<?php
include "get.php";
include "insert.php";
include "update.php";
include "delete.php";
$dbh = connectToDB();

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
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

function printAllPressingsAsTable(){
  $allPressings = getAllPressings();
  foreach ($allPressings as $pressing)
  {
    echo "<tr>";
    echo "<td>".$pressing->ID."</td>";
    echo "<td>".$pressing->date."</td>";
    echo "<td>".$pressing->amount."</td>";
    echo "<td><a href='addBotteling.php?id=".$pressing->ID."'>abfüllen</a></td>";
    echo "</tr>";
  }
}

function printMessage()
{
  if(isset($_GET['msg']))
  {
    $msg = $_GET['msg'];
    if(isset($_GET['err']) && $_GET['err'] == 1)
      $signal = "alert-danger";
    else
      $signal = "alert-success";
      echo "<div class='alert $signal' role='alert'>$msg!</div>";
  }
}

function printDatarows($tab, $stockable, $orderBy, $showCol = array(), $rows=0, $editable=false)
{

  $showData = array();
  $rowcount = 0;
  if($rows == 0)
    $rowcount = -99999;
  if($tab == "labels" || $tab == "allLabels")
  {
    $datarows = getJoinedLabels($orderBy);
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
  else if($tab == "products")
  {
    $datarows = getJoinedProducts($orderBy);
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
    // $counter = 1;
    $tab = "barrel";
  }
  if($tab == "allLabels")
  {
    // $counter = 1;
    $tab = "label";
  }
  if($tab == "products")
  {
    $tab = "product";
  }
  foreach ($columns as $headline) {
    if($headline->Field == "admin")
      $adminColumn = $counter;
    if(in_array($headline->Field, $showCol) || ($showCol == null && $tab != "labels"))
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
      $options = "<a href='add$tab.php?id=$datarow->ID'><img class='small' src='images/edit.png' alt='bearbeiten'> </a>";
    }

    if($tab == "customer" && isAdmin($_SESSION['user']))
    {
      $options .= "<a href='getDeliveries.php?get=$datarow->ID'><img class='small' src='images/delivery.png' alt='liefern'> </a>";
    }

    if($stockable == true && isAdmin($_SESSION['user']))
    {
      $options .= "<a href='stock$tab.php?id=$datarow->ID'><img class='small' src='images/stock.png' alt='einlagern'></a>";
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
  $letters = str_replace($bad, $good, $string);

  $letters = mb_strtolower($letters);
  $bad = array("_a", "_o", "_u");
  $good = array("ä", "ö", "ü");

  return str_replace($bad, $good,$letters);
}
?>
