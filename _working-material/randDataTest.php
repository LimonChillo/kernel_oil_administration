<?php

  include "../head.php";
  include_once "randDataGen.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') :
      if (isset($_POST['action']) && $_POST['action'] == 'generate')
      {
        // include "randDataGen.php";
        $dbh = connectToDB();
        dataGenerator();

        $errorCodes = array();

        //bottles
        $sth = $dbh->prepare("Select * FROM bottle");
        $sth->execute();
        $bottles = $sth->fetchAll();

        //strains
        $sth = $dbh->prepare("Select * FROM strain");
        $sth->execute();
        $strains = $sth->fetchAll();

        //labels
        $sth = $dbh->prepare("Select * FROM label");
        $sth->execute();
        $labels = $sth->fetchAll();

        $barrels = getAllBarrels();
        $pressings = getAllPressings();


        if (sizeOf($bottles) != 2)
          $errorCodes[0] = "Error: Amount of bottle types";

        foreach ($bottles as $bottle) {
          if ($bottle->amount != 200)
            array_push($errorCodes, "Error: Amount of stored bottles");
        }



        if ($labels =! (sizeOf(getAllBottles())+sizeOf($strains)*sizeOf(getAllBottles())))
          array_push($errorCodes, "Error: Amount of different labels");

        if(sizeOf($barrels)/sizeOf($strains) != 15)
          array_push($errorCodes, "Error: Amount of stored barrels");



        if (sizeOf($pressings) != sizeOf($strains))
          array_push($errorCodes, "Error: Amount of pressings");

        $amountCorn = 0;
        $amountPressings = 0;

        foreach ($strains as $strain){
          $amountCorn += getAmountCornByStrain($strain);
        }
        foreach ($pressings as $pressing) {
          $amountPressings += $pressing->amount;
        }

        if ($amountCorn != $amountPressings)
          array_push($errorCodes, "Error: Amount of Oil after pressings");
        //echo "amountCorn: ".$amountCorn;
        //echo "amountOil: ".$amountPressings;

#############
//Customers
        if (sizeOf(getAllCustomers()) != 10)
          array_push($errorCodes, "Error: Amount of customers");
      }
#############
// Delete all data
      else if(isset($_POST['action']) && $_POST['action'] == 'delete')
      {
        $deleteCode = array();
        try{
          deleteAllData();
        }catch (Exception $e) {
          array_push($deleteCode, "Error, deleting data failed");
        }
      }
#############
// Test functions
      else if(isset($_POST['action']) && $_POST['action'] == 'functions')
      {
        $deleteCode = array();
        try{
          deleteAllData();
        }catch (Exception $e) {
          array_push($deleteCode, "Error, deleting data failed");
        }
      }
  endif;
?>

<div class="container">

  <h1>Datensatzgenerator</h1>
  <h2>Tests</h2>



  <div>
    <form action="randDataTest.php" method="POST">
      <input type="hidden" name="action" value="generate">
      <input type="submit" value= " Daten generieren ">
    </form>
  </div>
<?php
    if(isset($errorCodes)) :
      if (sizeOf($errorCodes) == 0)
          echo "no errors";
      else
      foreach ($errorCodes as $error) {
        if ($error) :
            echo "<p>".$error."</p>";
          endif;
        }

    endif;
?>
  <div>
      <form action="randDataTest.php" method="POST">
          <input type="hidden" name="action" value="delete">
          <input type="submit" value= " Alles Löschen ">
      </form>
    </div>

  </div>
<?php
  if(isset($deleteCode)) :
      if (sizeOf($deleteCode) == 0)
          echo "All data deleted - no errors";
      else
      foreach ($deleteCode as $error) {
        if ($error) :
            echo "<p>".$error."</p>";
          endif;
        }

    endif;
?>
  <div>
      <form action="randDataTest.php" method="POST">
          <input type="hidden" name="action" value="functions">
          <input type="submit" value= " Funktionen testen " disabled>
      </form>
    </div>

  </div>



<?php

    include "../footer.php";
?>