<?php

  include "../head.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') :

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
        $errorCodes[0] = "Amount of bottle types is faulty";

      foreach ($bottles as $bottle) {
        if ($bottle->amount != 200)
          array_push($errorCodes, "Amount of stored bottles is faulty");
      }



      if ($labels =! (sizeOf(getBottles())+sizeOf($strains)*sizeOf(getBottles())))
        array_push($errorCodes, "Amount of different labels is faulty");

      if(sizeOf($barrels)/sizeOf($strains) != 15)
        array_push($errorCodes, "Amount of stored barrels is faulty");



      if (sizeOf($pressings) != sizeOf($strains))
        array_push($errorCodes, "Amount of pressings is faulty");

      $amountCorn = 0;
      $amountPressings = 0;

      foreach ($strains as $strain){
        $amountCorn += getAmountCornByStrain($strain);
      }
      foreach ($pressings as $pressing) {
        $amountPressings += $pressing->amount;
      }

      if ($amountCorn != $amountPressings)
        array_push($errorCodes, "Amount of Oil after pressings is faulty");
      echo "amountCorn: ".$amountCorn;
      echo "amountOil: ".$amountPressings;




  endif;
?>

<div class="container">

  <h1>Datensatzgenerator</h1>
  <h2>Tests</h2>



  <div>
    <form action="randDataTest.php" method="POST">
       <input type="submit" value= " Abschicken">
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


</div>


<?php

    include "../footer.php";
?>