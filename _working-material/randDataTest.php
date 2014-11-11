<?php

  include "../head.php";
    //if ($_SERVER['REQUEST_METHOD'] == 'POST') :

      dataGenerator();

      $errorCodes = array();

      $sth = $dbh->prepare("Select * FROM bottle");
      $sth->execute();
      $bottles = $sth->fetchAll();


      if (sizeOf($bottles) != 3) :
        $errorCodes[0] = "Amount of bottle types is faultiy";
      endif;

      foreach ($bottles as $bottle) {
        if ($bottle->amount == 0)
          $errorCodes[1] = "Amount of stored bottles is faultiy";
      }

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

    include "../footer.php";
?>