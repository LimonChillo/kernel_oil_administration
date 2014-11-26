<?php
$level = 1;
include "head.php";
?>
<div class="container">
	<h1>Fässer</h1>
  <?php printMessage(); ?>
  
  <form name="addBarrelsToPressing" method="POST" action="addPressing.php">
  <?php if (isAdmin($_SESSION['user'])) : ?>
  <a href="addBarrel.php" class="btn btn-default">Fässer hinzufügen</a>
  <?php if (isset($_GET['get'])) : ?>
  <button type="submit" name="submit" class="btn btn-default" disabled>gewählte Fässer pressen</button>
  <?php endif;
        endif; ?>

  </p>
	<table class="table table-hover">
  		<?php 
        if (isset($_GET['get'])) 
        {
          echo "<tr><th>Zur Pressung</th>";
          echo "<th>Fassnummer</th>";
          echo "<th>Sorte</th>";
          echo "<th>Füllstand</th>";
          echo "<th>Datum</th></tr>";
          printBarrelsAsTableByStrain($_GET['get']);
        }

        else 
        {
          echo "<tr><th>Sorte</th>";
          echo "<th>Anzahl ungepresster Fässer</th>";
          echo "<th>Zu den Fässern</th></tr>"; 
          printAllStrainsAsTable();
        } 
      ?>
	</table>
  </form>
	</div>
</div>
<?php include "footer.php";?>