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
  <button type="submit" name="submit" class="btn btn-default">gewählte Fässer pressen</button>
  <?php endif; ?>
	
  </p>
	<table class="table table-hover">
  		<tr>
  			<th>#</th>
  			<th>Fassnummer</th>
  			<th>Sorte</th>
  			<th>Füllstand</th>
  			<th>Datum</th>
  		</tr>
  		<?php printAllBarrelsAsTable(); ?>
	</table>
  </form>
	</div>
</div>
<?php include "footer.php";?>