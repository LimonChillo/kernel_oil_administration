<?php

function dataGenerator()
{
  deleteAllData();
  $dbh = connectToDB();
  $date = date("Y.m.d");

  insertBottle("100ml");
  insertBottle("250ml");
  $bottles = getBottles();
  $strains = getStrains();

  foreach ($strains as $strain) {
    $amountBarrels = 15;
    for ($counter = 0; $counter < $amountBarrels; $counter++) {
      $mlPerBarrel = rand(20000,100000);
      $mlPerBarrel = ($mlPerBarrel > 50000) ? $mlPerBarrel = 50000 : $mlPerBarrel ;
      insertBarrel($strain, $mlPerBarrel, $date);
    }

    $amount = 200;

    //stock labels
    foreach ($bottles as $bottle) {
      $name = $bottle->name." ".$strain->name;
      insertLabel($name, $bottle->ID, $strain->ID);
      stockLabels("200", $strain->ID, $bottle->ID);
    }
  }
    foreach ($bottles as $bottle) {
      stockBottles($amount, $bottle->name);
    }



    foreach ($strains as $strain) {
      $barrels = getBarrelsByStrain($strain->ID);
      $amount = getAmountCornByStrain($strain);
      //In reality amount of Oil wouldn't equal
      //amount of Corn! For test purpose only
      insertPressing($date, $amount, $barrels);
    }
    $pressings = getAllPressings();

####################
//generate bottling

    foreach ($pressings as $pressing) {
      $amountPressing = $pressing->amount; //how much oil at beginning
      $amountPressingPerBottle = $amountPressing/sizeOf($bottles); //every bottle gets equal amount
      foreach (getBottlesOrderedByMlDESC() as $bottle) {
        $amountGiven = $amountPressingPerBottle; //temp variable
        $amountPerBottle = floor($amountGiven/$bottle->ml)*$bottle->ml; //how much does fit into given bottles?
        $amountPressing -= $amountPerBottle;//substract filled amount from amount of starting point
        $amountPressingPerBottle += $amountGiven - $amountPerBottle;//add remaining oil to amount for next bottle
        insertBottling($pressing, $bottle, $amountPerBottle, $date);//insert
      }
      // echo $amountPressing." "; //how much oil is remaining (must but less than fits into smallest stocked bottle)
      bottlePressing($pressing->ID, true);
    }
//toDo enough bottles? unstock bottles, unstock labels,test if remaining oil is more than 100ml

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
      $firstname = $firstnames[rand(0, sizeOf($firstnames)-1)]->firstname;
      // lastname
      $lastname = $lastnames[rand(0, sizeOf($lastnames)-1)]->lastname;
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
####################
//generate users
    for ($i=0; $i < 2; $i++) {
      $firstname = $firstnames[rand(0, sizeOf($firstnames)-1)]->firstname;
      $lastname = $lastnames[rand(0, sizeOf($lastnames)-1)]->lastname;
      $username = strtolower($firstname[0]).ucfirst($lastname);
      $password = "abc";
      $email = $firstname."@".$lastname.".at";
      $is_admin = 0;
      insertUser($username, $password, $email, $is_admin);
    }


}

function deleteAllData()
{
  //exept Strains
  $dbh = connectToDB();

  $dbh->exec("DELETE FROM bottling");
  $dbh->exec("DELETE FROM product");
  $dbh->exec("DELETE FROM user WHERE is_admin = false");
  $dbh->exec("DELETE FROM shipmentitem");
  $dbh->exec("DELETE FROM shipment");
  $dbh->exec("DELETE FROM customer");

  $dbh->exec("DELETE FROM barrel");
  $dbh->exec("DELETE FROM pressing");
  $dbh->exec("DELETE FROM label");
  $dbh->exec("DELETE FROM bottle");
}
?>