<?php

  include "../head.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') :

      dataGenerator();

      $errorCodes = array();

      $sth = $dbh->prepare("Select * FROM bottle");
      $sth->execute();
      $bottles = $sth->fetchAll();


      if (sizeOf($bottles) != 2)
        $errorCodes[0] = "Amount of bottle types is faultiy";

      foreach ($bottles as $bottle) {
        if ($bottle->amount != 200)
          $errorCodes[1] = "Amount of stored bottles is faultiy";
      }

      $sth = $dbh->prepare("Select * FROM barrel");
      $sth->execute();
      $barrels = $sth->fetchAll();

      $sth = $dbh->prepare("Select * FROM strain");
      $sth->execute();
      $amountStrains = $sth->fetchAll();

      if(sizeOf($barrels)/sizeOf($amountStrains) != 15)
        $errorCodes[1] = "Amount of stored barrels is faultiy";

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
      for ($i=0; $i < sizeOf($errorCodes); $i++) {
        # code...
      }
      foreach ($errorCodes as $error) {
        if ($error) :
            echo "<p>".$error."</p>";
          endif;
        }
    endif;
?>


</div>


<?php
    endif;
    include "../footer.php";
?>