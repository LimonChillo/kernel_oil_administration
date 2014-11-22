<?php include "head.php";?>
<div class="container">
	<h1>Kernölverwaltung</h1>
	<p class="lead"><br>Hier sollten alle relevaten Informationen zu den aktuellen Lagerstände und Produktionsmengen stehen</p>
	<p class="lead">
	<a href="addBarrel.php" class="btn btn-default">Fass hinzufügen</a>
	<a href="getBarrels.php" class="btn btn-default">neue Pressung</a>
	<a href="getPressings.php" class="btn btn-default">Pressung abfüllen</a>
	<a href="#" class="btn btn-default">neue Bestellung hinzufügen</a>
	<a href="addCustomer.php" class="btn btn-default">neuen Kunden hinzufügen</a>
	</p>
	<div class="row">
		<div class="col-md-4"><h3>Fässer</h3></div>
		<div class="col-md-4"><h3>Pressung</h3></div>
		<div class="col-md-4"><h3>Produkte</h3></div>
	</div>
	<div class="row">
		<div class="col-md-4"><a href="getBottles.php"><h3>Leerflaschen</h3></a></div>
		<div class="col-md-4"><a href="getStrains.php"><h3>Sorten</h3></a></div>
		<div class="col-md-4"><a href="getLabels.php"><h3>Etiketten</h3></a></div>
	</div>
	</div>
</div>
<?php include "footer.php";?>