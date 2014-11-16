<?php

function dataGenerator()
{
  deleteAllData();
  $dbh = connectToDB();
  $date = date("Y.m.d");

  insertBottle("100ml");
  insertBottle("250ml");
  $strains = getStrains();

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


    // $pressings = getAllPressings();
    // foreach ($pressings as $pressing) {
    //   $amountPressing = $pressing->amount;
    //   foreach (getBottlesOrderedByMlDESC() as $bottle) {
    //     $amountBottles = $amountPressing/$bottle->ml;
    //     insertBottling($pressing, $bottle, $strain, $amount, $date)
    //   }
    // }


####################
//generate customers
    $sth = $dbh->prepare("SELECT * FROM gen_firstnames");
    $sth->execute();
    $firstnames = $sth->fetchAll();

    $sth = $dbh->prepare("SELECT * FROM gen_lastnames");
    $sth->execute();
    $lastnames = $sth->fetchAll();

    for ($i=0; $i < 10; $i++) {
      //firstname
      $rand = rand(0, sizeOf($firstnames)-1);
      $firstname = $firstnames[$rand]->firstname;
      // lastname
      $rand = rand(0, sizeOf($lastnames)-1);
      $lastname = $lastnames[$rand]->lastname;
      // road
      $roadVar = ["Gasse", "Straße", "Platz", "Weg", "Allee"];
      $road = $firstnames[rand(0, sizeOf($firstnames)-1)]->firstname."-".
              $lastnames[rand(0, sizeOf($lastnames)-1)]->lastname."-".
              $roadVar[rand(0, sizeOf($roadVar)-1)]." ".
              rand(1, 200);

      $zipVar = ["1010", "3100", "4010", "5020", "6020", "6900", "7000", "8011", "9020"];
      $cityVar = ["Wien", "St.Pölten", "Linz", "Salzburg", "Innsbruck", "Bregenz", "Eisenstadt", "Graz", "Klagenfurt"];

      $cityID = rand(0, sizeOf($cityVar)-1);

      $zip = $zipVar[$cityID];
      $city = $cityVar[$cityID];
      $country = "Österreich";

      insertCustomer($firstname, $lastname, NULL, $road, $zip, $city, $country);
      // echo $firstname." ".$lastname."<br \>".$road."<br \>".$zip." ".$city."<br \>".$country."<br \><br \>";
    }


}

function deleteAllData()
{
  //exept Strains
  $dbh = connectToDB();
  $dbh->exec("DELETE FROM barrel");
  $dbh->exec("DELETE FROM bottle");
  $dbh->exec("DELETE FROM label");
  $dbh->exec("DELETE FROM pressing");
  $dbh->exec("DELETE FROM customer");
  $dbh->exec("DELETE FROM bottling");
  $dbh->exec("DELETE FROM product");
  $dbh->exec("DELETE FROM user WHERE is_admin = false");
  $dbh->exec("DELETE FROM shipment");
  $dbh->exec("DELETE FROM shipmentitem");
}
?>