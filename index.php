<?php
$level = 1;
include "head.php";
?>
<div class="container">
	<h1>Traubenkernölverwaltung</h1>
	<?php printMessage(); ?>
	<div class="row">
		<div class="col-md-4 dash">
			<h3>Fässer</h3>
			<a href="addBarrel.php"><strong class="float">
				<img class='small' src='images/add.png' alt='hinzufügen'  data-toggle="tooltip" data-placement="top" title="Fässer hinzufügen" > </strong></a>
			<p>noch nicht gepresst</p>
			<div class="dashboard">
			<?php printDatarows("lastBarrels", false, "date", array("ID", "strain", "date")) ?>
			</div>
			</div>
		<div class="col-md-4 dash">
			<h3>Pressungen</h3>
			<a href="getBarrels.php"><strong class="float">
				 		<img class='small' data-toggle="tooltip" data-placement="top" title="Pressung hinzufügen" src='images/add.png' alt='hinzufügen'> </strong></a>
			<a href="getPressings.php?show=all"><strong class="float">
						<img class='small' src='images/show.png' alt='anzeigen'  data-toggle="tooltip" data-placement="top" title="Alle Pressungen ansehen" > </strong></a>
			<a href="getPressings.php"><strong class="float">
						<img class='small' src='images/bottle.png' alt='abfüllen'  data-toggle="tooltip" data-placement="top" title="Pressung abfüllen" > </strong></a>
			<p>noch nicht abgefüllt</a>
			<div class="dashboard">
				<?php printUnpressedPressingsAsTable("small"); ?>
			</div>
		</div>
		<div class="col-md-4 dash">
			<h3>Produkte</h3>
			<a href="getProducts.php"><strong class="float">
					<img class='small' src='images/show.png' alt='anzeigen'  data-toggle="tooltip" data-placement="top" title="Alle Produkte ansehen" > </strong></a>
			<p><br /></p>
			<div class="dashboard">
			<?php printDatarows("product", false, "amount", array("strain", "bottle", "amount")); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 dash">
			<h3>Lieferungen</h3>
			<a href="addDelivery.php"><strong class="float">
				<img class='small' src='images/add.png' alt='hinzufügen' data-toggle="tooltip" data-placement="top" title="Lieferungen hinzufügen" > </strong></a>
			<a href="getDeliveries.php"><strong class="float">
				<img class='small' src='images/show.png' alt='anzeigen' data-toggle="tooltip" data-placement="top" title="Alle Lieferungen anzeigen" > </strong></a>
			<p>die letzte 10</p>
			<div class="dashboard">
			<?php printDatarows("lastDeliveries", false, "date", array("ID", "customer", "date")) ?>
			</div>
		</div>
		<div class="col-md-4 dash">
			<h3>Flaschen</h3>
			<a href="addBottle.php"><strong class="float">
				<img class='small' src='images/add.png' alt='hinzufügen' data-toggle="tooltip" data-placement="top" title="Flaschen hinzufügen" > </strong></a>
				<a href="getBottles.php"><strong class="float">
				<img class='small' src='images/show.png' alt='hinzufügen' data-toggle="tooltip" data-placement="top" title="Alle Flaschen anzeigen" > </strong></a>
			<p><br /></p>
			<div class="dashboard">
			<?php printDatarows("bottle", true, "ml", array("name", "amount"), 0, true) ?>
			</div>
		</div>
		<div class="col-md-4 dash">
			<h3>Etiketten</h3>
			<a href="getLabels.php"><strong class="float">
				<img class='small' src='images/show.png' alt='anzeigen' data-toggle="tooltip" data-placement="top" title="Alle Etiketten anzeigen" > </strong></a>
			<p>Weniger als 100 Stück lagernd</p>
			<div class="dashboard">
			<?php printDatarows("labels", true, "amount ASC", array("name", "bottle", "amount")) ?>
			</div>
		</div>
	</div>
	</div>
</div>
<script>(function() { translate() })()
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<?php include "footer.php";?>