<?php include "head.php";?>
<div class="container">
	<h1>Pressung abfüllen</h1>
	<?php printMessage(); ?>

	<?php $pressing = getPressingById($_GET['id']); ?> 

	<form class="form-horizontal" role="form" method="post" action="result.php">
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" class="form-control" value='<?php echo $pressing->ID; ?>' name="id" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" class="form-control" value='<?php echo $pressing->amount; ?>' name="amount" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
				<button type="submit" name="insertBarrel" class="btn btn-default">Abfüllen</button>
			</div>
		</div>
	</form>
</div>
</div>
<?php include "footer.php";?>