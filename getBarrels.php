<?php include "head.php";?>
<div class="container">
	<h1>Fässer</h1>
	<a href="addBarrels.php" class="btn btn-default">Fässer hinzufügen</a>
	</p>
  <form name="addBarrelsToPressing" method="POST" action="addPressing.php">
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
  <button type="submit" name="submit" class="btn btn-default">gewählte Fässer pressen</button>
  </form>
	</div>
</div>
<?php include "footer.php";?>