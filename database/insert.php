<?php

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
?>