<?php
$level = 1;
include "head.php";
?>
<div class="container">
	<h1>Traubenkernölverwaltung</h1>
	<?php printMessage(); ?>
	<p class="lead">
	<a href="addBarrel.php" class="btn btn-default">Fass hinzufügen</a>
	<a href="getBarrels.php" class="btn btn-default">neue Pressung</a>
	<a href="getPressings.php" class="btn btn-default">Pressung abfüllen</a>
	<a href="addDelivery.php" class="btn btn-default">Bestellung hinzufügen</a>
	<a href="addCustomer.php" class="btn btn-default">Kund*in hinzufügen</a>
	<a href="getBottles.php"  class="btn btn-default">Leerflaschen</a>
	<a href="getLabels.php"  class="btn btn-default">Etiketten</a>
	</p>
	<h1>Dashboard</h1>
	<h3>Letzte Ereignisse</h3>
	<div class="row">
		<div class="col-md-4">
			<h3>Fässer</h3>
			<?php printDatarows("barrel", false, "date", array("strainFK", "filllevel", "pressingFK", "date"), 5) ?>
		</div>
		<div class="col-md-4">
			<h3>Pressungen</h3>
		</div>
		<div class="col-md-4">
			<h3>Produkte</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h3>Bestellungen</h3>
			<?php printDatarows("shipment", false, "date", array()) ?>
		</div>
		<div class="col-md-4">
			<h3>Flaschen</h3>
			<?php printDatarows("bottle", true, "ml", array("name", "amount")) ?>
		</div>
		<div class="col-md-4">
			<h3>Etiketten</h3>
			<?php printDatarows("labels", true, "amount", array("name", "bottle", "amount")) ?>
		</div>
	</div>
	</div>
</div>
<script>(function() { translate() })() </script>
<?php include "footer.php";?>