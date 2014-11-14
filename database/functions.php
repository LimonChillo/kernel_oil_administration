<?php
include "get.php";
include "insert.php";
include "update.php";
$dbh = connectToDB();

function connectToDB()
{

  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  include "$root/kernoil/database/config.php";
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

function deleteAllData()
{
  //exept Strains
  $dbh = connectToDB();
  $dbh->exec("DELETE FROM barrel");
  $dbh->exec("DELETE FROM bottle");
  $dbh->exec("DELETE FROM label");
  $dbh->exec("DELETE FROM pressing");
}

?>
