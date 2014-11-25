<?php
include "get.php";
include "insert.php";
include "update.php";
include "delete.php";
$dbh = connectToDB();


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
    echo "<td>".getStrainNameById($barrel->strainFK)->name."</td>";
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

function printDatarows($tab, $stockable, $orderBy)
{
  if($tab == "labels")
  {
    $datarows = getJoinedLabels($orderBy);
    $columns = array((object) array('Field'=>'ID'),
                      (object) array('Field'=> 'Sorte'),
                        (object) array('Field'=> 'Flasche'),
                          (object) array('Field'=> 'Menge'));
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
  foreach ($columns as $headline) {
    if($headline->Field == "admin")
      $adminColumn = $counter;
    echo "<th> ".ucfirst($headline->Field)."</th>";
    $counter++;
  }
  if (isAdmin($_SESSION['user']))
    echo "<th>Optionen</th>";

  foreach ($datarows as $datarow) {
    echo "</tr>";
    echo "<tr>";
    $counter = 0;
    foreach ($datarow as $data){
      if($counter == $adminColumn)
      {

        if($data == "1")
          $data = "Ja";
        else if($data == "0")
          $data = "Nein";
      }
      echo "<td> ".$data."</td>";
      $counter++;
    }

    $options ="";

    if($tab != "labels" && isAdmin($_SESSION['user']))
    {
      $options = "<a href='add$tab.php?id=$datarow->ID'>bearbeiten </a>";
    }
    if($stockable == true && isAdmin($_SESSION['user']))
    {
      $options .= "   <a href='stock$tab.php?id=$datarow->ID'> einlagern</a>";
    }
    echo "<td> ".ucfirst($options)."</td>";
    echo "</tr>";

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
?>
