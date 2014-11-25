<?php
$level = 2;
include "head.php";
?>
<script src="js/addDeliveryForm.js"></script>
<div class="container">
	<h1>Lieferung eintragen</h1>

	<?php printMessage(); ?>

	<form class="form-horizontal" id="deliveryForm" role="form" method="post" action="result.php">

		<div class="form-group">
			<div class="col-sm-4">
				<select class="form-control" name="customer">
					<?php printAllCustomerOptions();?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-4">
				<input type="date" class="form-control" name="date" placeholder="Datum" required>
			</div>
		</div>

		<div id="deliveryItems">
		</div>

		<div class="form-group">
			<div class="col-sm-4">
				<button  name="add" id="addItemButton" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Eintrag hinzufügen!</button>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-4">
				<button type="submit" name="insertDelivery" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Bestellung eintragen!</button>
			</div>
		</div>
	</form>
</div>
<?php include "footer.php";?>