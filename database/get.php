<?php

function getStrainByName($name)
{
  $dbh = connectToDB();

  $sth = $dbh->prepare("SELECT * FROM strain WHERE strain.name = ?");
  $sth->execute(array($name));
  $result = $sth->fetchObject();

  return $result;
}

function getBottles()
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle");
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
?>