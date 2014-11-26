<?php
$level = 2;
include "head.php";
?>
<div class="container">
	<h1>Pressung hinzufügen</h1>
	<?php printMessage(); ?>
	<?php
		$barrels = $_POST['barrel']
	?>
	<form class="form-horizontal" role="form" name="insertPressing" method="POST" action="result.php">
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" class="form-control" name="amount" placeholder="Menge (l)" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
				<input type="date" class="form-control" name="date" id="date" placeholder="Datum" required>
			</div>
		</div>
		<?php
			$barrels = $_POST['barrel'];
			foreach ($barrels as $b)
			{
				echo "<input type='hidden' name='barrel[]' value='$b'>";
			}

		?>
		<div class="form-group">
			<div class="col-sm-4">
				<button type="submit" name="insertPressing" class="btn btn-default">Hinzufügen</button>
			</div>
		</div>
	</form>
</div>
</div>
<?php include "footer.php";?>