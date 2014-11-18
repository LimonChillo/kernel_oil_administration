<?php
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
    echo "<option value='".$strain->ID."'> ".$strain->name."</option>";
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

function printMessage()
{
  if(isset($_GET['msg']))
  {
    if($_GET['msg'] == 1)
      echo "<div class='alert alert-success' role='alert'>Eintrag war erfolgreich !</div>";
    if($_GET['msg'] == 0)
      echo "<div class='alert alert-danger' role='alert'>Eintrag war nicht erfolgreich !</div>";
  }
}

function printDatarows($table)
{

  $datarows = getAnyTable($table);
  $columns = getColumnNames($table);

  echo '<table class="table table-hover">
          <tr>';
            //echo get_object_vars($columns[0]);
            foreach ($columns as $headline) {
              echo "<th>$headline->Field</th>";
            }
            echo "</tr>";
            foreach ($datarows as $datarow) {
              echo "<tr>";
              foreach ($datarow as $data){
                echo "<td>$data</td>";
              }
              echo "</tr>";
            }


            echo "</table>";
}
?>
