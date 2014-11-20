<?php
function getAnyTable($table, $orderBy)
{
  if($orderBy != null)
    $query = "SELECT * FROM $table ORDER BY $orderBy";
  else
    $query = "SELECT * FROM $table";
  $dbh = connectToDB();
  $sth = $dbh->prepare($query);
  $sth->execute();

  return $sth->fetchAll();
}

function getColumnNames($table)
{
  $dbh = connectToDB();
    $sth = $dbh->prepare("SHOW columns FROM $table");
  $sth->execute();

  return $sth->fetchAll();
}

function getAllStrains () {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM strain");
  $sth->execute();

  return $sth->fetchAll();
}

function getStrainByName($name)
{
  $dbh = connectToDB();

  $sth = $dbh->prepare("SELECT * FROM strain WHERE strain.name = ?");
  $sth->execute(array($name));
  $result = $sth->fetchAll();

  return $result;
}

function getStrainNameByID($id)
{
  $dbh = connectToDB();

  $sth = $dbh->prepare("SELECT strain.name FROM strain WHERE strain.ID = ?");
  $sth->execute(array($id));
  $result = $sth->fetch();

  return $result;
}

function getAllBottles()
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle");
  $sth->execute();

  return $sth->fetchAll();
}

function getBottleByMl($ml)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle WHERE ml = ?");
  $sth->execute(array($ml));

  return $sth->fetchAll();
}

function getBottleByID($id)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle WHERE ID = ?");
  $sth->execute(array($id));
  $bottle = $sth->fetchObject();
  if($bottle == null)
    return null;
  return $bottle;
}

function getBottlesOrderedByMlDESC()
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle ORDER BY ml DESC");
  $sth->execute();

  return $sth->fetchAll();
}

function getAllBarrels(){

  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM barrel");
  $sth->execute();

  return $sth->fetchAll();
}

function getBarrelsByStrain($strain){

  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM barrel WHERE strainFK = ?");
  $sth->execute(array($strain));

  return $sth->fetchAll();
}

function getAllPressings() {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM pressing");
  $sth->execute();

  return $sth->fetchAll();
}

function getPressingsByStrain($strain){

  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM pressing WHERE strainFK = ?");
  $sth->execute(array($strain));

  return $sth->fetchAll();
}

function getAmountCornByStrain($strain){

        $barrels = getBarrelsByStrain($strain->ID);
        $amount = 0;
        foreach ($barrels as $barrel) {
          $amount += $barrel->fillLevel;
        }
  return $amount;
}

function getAllCustomers () {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM customer");
  $sth->execute();

  return $sth->fetchAll();
}

function getCustomerByID ($id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM customer WHERE ID = ?");
  $sth->execute(array( $id ));

  return $sth->fetchObject();
}

function getAllUsers () {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM user");
  $sth->execute();

  return $sth->fetchAll();
}

function getAllBottlings () {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottling");
  $sth->execute();

  return $sth->fetchAll();
}

// ----------- Gets für die überprüfung


function getUserByName ($username) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM user WHERE username = ?");
  $sth->execute($username);
  return $sth->fetchAll();
}
?>