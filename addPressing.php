<?php
$level = 2;
include "head.php";
?>
<div class="container">
	<h1>Pressung hinzufügen</h1>
	<?php printMessage(); ?>
	<?php
	if(isset($_POST["choosenBarrels"]))
	{
		$_SESSION['choosenBarrels'] = $_POST["choosenBarrels"];
		echo "Params!";
	}
	?>
	<form class="form-horizontal" role="form">
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" class="form-control" name="amount" placeholder="Menge (l)" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
				<input type="date" class="form-control" id="date" placeholder="Datum" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
				<button type="submit" class="btn btn-default">Hinzufügen</button>
			</div>
		</div>
	</form>
</div>
</div>
<?php include "footer.php";?>