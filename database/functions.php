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


    return $lastInsertedStrain;
  }
  return null;
}
/*
function insertLabelToStrain($strain){

  foreach (getBottles() as $bottle) {
    $sth = $dbh->prepare("INSERT INTO label (bottleFK, strainFK) VALUES (?,  ?)");
    $sth->execute(array($bottle->ID));
  }
}*/
function stockLabels($amount, $strain, $bottle)
{

  $dbh = connectToDB();
  $sth = $dbh->prepare("UPDATE label SET amount = ? WHERE strainFK = ? AND bottleFK = ?");
  $sth->execute(array($amount, $strain, $bottle));
  //echo "strain: ".$strain." bottle: ".$bottle;
  //echo gettype($strain);
}

function stockBottles($amount, $name)
{

  $dbh = connectToDB();
  //$bottle = getBottleByName($name);
  $sth = $dbh->prepare("UPDATE bottle SET amount = ? WHERE name = ?");
  $sth->execute(array($amount, $name));
}

function getBottles()
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle");
  $sth->execute();

  return $sth->fetchAll();
}

function deleteAllData()
{
  //exept Strains
  $dbh = connectToDB();
  $dbh->exec("DELETE FROM barrel");
  $dbh->exec("DELETE FROM bottle");
  $dbh->exec("DELETE FROM label");
  //$dbh->exec("DELETE FROM pressing");

}

function insertBottle($name)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("INSERT INTO bottle (ID, name) VALUES (NULL, ?)");
  $sth->execute(array($name));

  $bottle = $dbh->lastInsertId();
  $labelname = 'Rückettikett '.$name;
  $sth = $dbh->prepare("INSERT INTO label (ID, name, bottleFK, strainFK) VALUES (NULL, ?, ?, NULL)");
  $sth->execute(array($labelname, $bottle));


}

function insertLabel($labelname, $bottleID, $strainID)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("INSERT INTO label (ID, name, bottleFK, strainFK) VALUES (NULL, ?, ?, ?)");
  $sth->execute(array($labelname, $bottleID, $strainID));
}

function dataGenerator()
{
  deleteAllData();
  $dbh = connectToDB();


  insertBottle("100ml");
  insertBottle("250ml");
  $sth = $dbh->prepare("SELECT * FROM strain");
  $sth->execute();

  $strains = $sth->fetchAll();

  foreach ($strains as $strain) {
    $amountBarrels = 15;
    for ($counter = 0; $counter < $amountBarrels; $counter++) {
      $literPerBarrel = rand(10,100);
      $literPerBarrel = ($literPerBarrel > 50) ? $literPerBarrel = 50 : $literPerBarrel ;
      $sth = $dbh->prepare(
      "INSERT INTO barrel
      (strainFK, fillLevel)
        VALUES
      (?, ?)");

      $sth->execute(array($strain->ID, $literPerBarrel));
    }

    $amount = 200;

    //stock labels
    foreach (getBottles() as $bottle) {
      $name = $bottle->name." ".$strain->name;
      insertLabel($name, $bottle->ID, $strain->ID);
      stockLabels("200", $strain->ID, $bottle->ID);
    }
  }
    foreach (getBottles() as $bottle) {
      stockBottles($amount, $bottle->name);
    }
}
?>
