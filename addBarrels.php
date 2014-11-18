<?php include "head.php";?>
<div class="container">
	<h1>Fässer hinzufügen</h1>
	<form class="form-horizontal" role="form">
		<div class="form-group">
			<div class="col-sm-4">
				<select class="form-control" id="inputStrain">
					<?php printAllStrainOptions();?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" class="form-control" id="inputFilllevel" placeholder="Füllstand">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" class="form-control" id="inputDate" placeholder="Datum">
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