<?php
session_start();

include "get.php";
include "insert.php";
include "update.php";


$dbh = connectToDB();


function connectToDB()
{
include "configs.php";
  //$root = realpath($_SERVER["DOCUMENT_ROOT"]);
  // include "$root/kernoil/database/config.php";
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
    echo "<option value='".$cat->id."'> ".$strain->name."</option>";
  }
}

function printAllBarrelsAsTable(){
  $allBarrels = getAllBarrels();
  foreach ($allBarrels as $barrel)
  {
    echo "<tr>";
    echo "<td><input type='checkbox' name='choosenBarrels[]' value='".$barrel->ID."'></td>";
    echo "<td>".$barrel->ID."</td>";
    echo "<td>".getStrainNameById($barrel->strainFK)->name."</td>";
    echo "<td>".$barrel->fillLevel."</td>";
    echo "<td>".$barrel->date."</td>";
    echo "</tr>";
  }

}


?>
