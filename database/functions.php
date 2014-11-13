<?php

$dbh = connectToDB();




function connectToDB()
{

  include "database/config.php";
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


function getStrainByName($name)
{
  $dbh = connectToDB();

  $sth = $dbh->prepare("SELECT * FROM strain WHERE strain.name = ?");
  $sth->execute(array($name));
  $result = $sth->fetchObject();

  return $result;
}

function insertStrain($strain)
{
  $dbh = connectToDB();

  $strainExists = getStrainByName($strain);

  if ($strainExists == null)
  {
    $sth = $dbh->prepare("INSERT INTO strain (name) VALUES (?)");
    $sth->execute(array($strain));

    $lastInsertedStrain = getStrainByName($strain)->ID;

    foreach (getBottles() as $bottle) {
      $sth = $dbh->prepare("INSERT INTO label (bottleFK, strainFK) VALUES (?,  ?)");
      $sth->execute(array($bottle->ID, $lastInsertedStrain));
    }

    return $lastInsertedStrain;
  }
  return null;
}

function addLabels($amount, $strain, $bottle)
{

  $dbh = connectToDB();
  $sth = $dbh->prepare("UPDATE label SET amount = ? WHERE strainFK = ? AND bottleFK = ?");
  $sth->execute(array($amount, $strain, $bottle));

}


function getBottles()
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle");
  $sth->execute();

  return $sth->fetchAll();
}
?>
