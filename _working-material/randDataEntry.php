<?php

  include "../head.php";
  $amountNewLabels = 20;

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ( isset($_POST['firstname']) && $_POST['firstname'] != null)
    {
      $subject = $_POST['firstname'];
      $sth = $dbh->prepare("SELECT * FROM gen_firstnames f WHERE f.firstname = ?");
      $sth->execute( array( $subject ));
      $resultGiven = $sth->fetchAll();

      $sth = $dbh->prepare("INSERT INTO gen_firstnames (firstname) VALUES (?)");
    }

    else if ( isset($_POST['lastname']) && $_POST['lastname'] != null)
    {
        $subject = $_POST['lastname'];

        $sth = $dbh->prepare("SELECT * FROM gen_lastnames l WHERE l.lastname = ?");
        $sth->execute( array( $subject ));
        $resultGiven = $sth->fetchAll();

      $sth = $dbh->prepare("INSERT INTO gen_lastnames (lastname) VALUES (?)");
    }
    else if ( isset($_POST['strain']) && $_POST['strain'] != null)
    {
        $subject = $_POST['strain'];
        try
        {
          $strain = insertStrain($subject);

          if($strain != null)
          {
            $resultGiven = 2;
            foreach (getBottles() as $bottle) {
              addLabels($amountNewLabels, $strain, $bottle->ID);
            }
          }
          else
            $resultGiven = 1;

        } catch (Exception $e) {
          $resultGiven = 1;
          echo $e;
        }

    }
    else
      $resultGiven = 1;


    if ($resultGiven == null)
      {
        echo "Success";

        $sth->execute( array( $subject ));
      }
    else if ($resultGiven == 2)
    {
      echo "Success";
    }
    else
      {
        echo "taken";
        if (isset($sth))
          $sth->closeCursor();
      }
  }
?>


<div class="container">

  <h1>Datensatzgenerator</h1>
  <h2>Dateneingabe</h2>

  <p>Entweder oder....</p>

  <div>
    <form action="randDataEntry.php" method="POST">
      <label for="firstname">Vorname: </label>
      <input type="text" name="firstname" autofocus>

      <label for="lastname">Nachname: </label>
      <input type="text" name="lastname">

      <label for="strain">Sorte: </label>
      <input type="text" name="strain">

      <input type="submit" value= " Abschicken">
    </form>
  </div>

</div>


<?php
    include "../footer.php";
?>