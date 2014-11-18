<?php include "head.php";?>
<div class="container">
	<h1>Fässer hinzufügen</h1>

	<?php printMessage(); ?>

	<form class="form-horizontal" role="form" method="post" action="result.php">
		<div class="form-group">
			<div class="col-sm-4">
				<select class="form-control" name="strain">
					<?php printAllStrainOptions();?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" class="form-control" name="literPerBarrel" placeholder="Füllstand" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
				<input type="date" class="form-control" name="date" placeholder="Datum" required>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-4">
				<button type="submit" name="insertBarrel" class="btn btn-default">Hinzufügen</button>
			</div>
		</div>
	</form>
</div>
</div>
<?php include "footer.php";?>