<?php

function insertStrain($name)
{
  $dbh = connectToDB();

  $strainExists = getStrainByName($name);

  if ($strainExists == null)
  {
    $sth = $dbh->prepare("INSERT INTO strain (name) VALUES (?)");
    $sth->execute(array($name));

    $lastInsertedStrain = getStrainByName($name)->ID;

    return $lastInsertedStrain;
  }
  return null;
}

function insertBottle($ml)
{
  $name = $ml.'ml';
  $dbh = connectToDB();
  $sth = $dbh->prepare("INSERT INTO bottle (ID, name, ml) VALUES (NULL, ?, ?)");
  $sth->execute(array($name, $ml));

  $bottle = $dbh->lastInsertId();
  $labelname = 'Rückettikett '.$name;
  $sth = $dbh->prepare("INSERT INTO label (ID, name, bottleFK, strainFK) VALUES (NULL, ?, ?, NULL)");
  $sth->execute(array($labelname, $bottle));
}

function insertPressing($date, $amount, $barrels){
  $dbh = connectToDB();
  $sth = $dbh->prepare("INSERT INTO pressing (ID, date, amount) VALUES (NULL, ?, ?)");
  $sth->execute(array($date, $amount));

  $pressing = $dbh->lastInsertId();
  updatePressingOfBarrel($barrels, $pressing);
}

function insertLabel($labelname, $bottleID, $strainID)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("INSERT INTO label (ID, name, bottleFK, strainFK) VALUES (NULL, ?, ?, ?)");
  $sth->execute(array($labelname, $bottleID, $strainID));
}

function insertBarrel($strain, $literPerBarrel, $date) {
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "INSERT INTO barrel
        (strainFK, fillLevel, date)
          VALUES
        (?, ?, ?)");
        $sth->execute(array($strain->ID, $literPerBarrel, $date));
}

function insertBottling($pressing, $bottle, $amount, $date) {
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "INSERT INTO bottling
        (pressingFK, bottleFK, amount, date)
          VALUES
        (?, ?, ?, ?)");
        $sth->execute(array($pressing->ID, $bottle->ID, $amount, $date));
}

function insertCustomer($firstname, $lastname, $company, $road, $zip, $city, $country) {
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "INSERT INTO customer
        (firstname, lastname, company, road, zip, city, country)
          VALUES
        (?, ?, ?, ?, ?, ?, ?)");
        $sth->execute(array($firstname, $lastname, $company, $road, $zip, $city, $country));
}

function insertUser($username, $password, $email, $is_admin) {
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "INSERT INTO user
        (username, password, email, is_admin)
          VALUES
        (?, ?, ?, ?)");
        $sth->execute(array($username, $password, $email, $is_admin));
}



?>