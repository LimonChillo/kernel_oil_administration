<?php

function insertStrain($name)
{
  $dbh = connectToDB();

  $strainExists = getStrainByName($name);

  if ($strainExists == null)
  {
    $sth = $dbh->prepare("INSERT INTO strain (name) VALUES (?)");
    $sth->execute(array($name));

    $strain = $dbh->lastInsertId();

    foreach (getAllBottles() as $bottle)
    {
    insertLabel($bottle->name." ".$name, $bottle->ID, $strain);
    }

    return $strain;
  }
  return null;
}

function insertBottle($ml)
{
  $name = $ml.'ml';
  $dbh = connectToDB();
  $sth = $dbh->prepare("INSERT INTO bottle (ID, name, ml, amount) VALUES (NULL, ?, ?, ?)");
  $sth->execute(array($name, $ml, "0"));

  $bottle = $dbh->lastInsertId();

  foreach (getReallyAllStrains() as $strain)
  {
    $labelname = $name." ".$strain->name;
    insertLabel($labelname, $bottle, $strain->ID);
  }
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
        $sth->execute(array($strain, $literPerBarrel, $date));
}

function insertBottling($pressing, $bottle, $amount, $date, $strainFK) {
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "INSERT INTO bottling
        (pressingFK, bottleFK, amount, date, strainFK)
          VALUES
        (?, ?, ?, ?, ?)");
        $sth->execute(array($pressing, $bottle, $amount, $date, $strainFK));
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

function insertUser($username, $password, $email, $admin) {
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "INSERT INTO user
        (username, password, email, admin)
          VALUES
        (?, ?, ?, ?)");
        $sth->execute(array($username, $password, $email, $admin));
}

function insertProduct($strainID, $bottleID, $amount)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "INSERT INTO product
        (strainFK, bottleFK, amount)
          VALUES
        (?, ?, ?)");
        $sth->execute(array($strainID, $bottleID, $amount));
}

function insertShipment($customerFK, $date)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "INSERT INTO shipment
        (customerFK, date)
          VALUES
        (?, ?)");
        $sth->execute(array($customerFK, $date));
}

function insertShipmentItem($productFK, $shipmentFK, $amount)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "INSERT INTO shipmentitem
        (productFK, shipmentFK, amount)
          VALUES
        (?, ?, ?)");
        $sth->execute(array($productFK, $shipmentFK, $amount));
}


?>