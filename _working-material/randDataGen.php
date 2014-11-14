<?php

function dataGenerator()
{
  deleteAllData();
  $dbh = connectToDB();
  $date = date("Y.m.d");

  insertBottle("100ml");
  insertBottle("250ml");
  $sth = $dbh->prepare("SELECT * FROM strain");
  $sth->execute();

  $strains = $sth->fetchAll();

  foreach ($strains as $strain) {
    $amountBarrels = 15;
    for ($counter = 0; $counter < $amountBarrels; $counter++) {
      $literPerBarrel = rand(20,100);
      $literPerBarrel = ($literPerBarrel > 50) ? $literPerBarrel = 50 : $literPerBarrel ;
      insertBarrel($strain, $literPerBarrel, $date);
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



    foreach ($strains as $strain) {
      $barrels = getBarrelsByStrain($strain->ID);
      $amount = getAmountCornByStrain($strain);
      //In reality amount of Oil wouldn't equal
      //amount of Corn! For test purpose only
      insertPressing($date, $amount, $barrels);
    }
}


?>