<?php
$level = 2;
include "head.php";
?>

<script type="text/javascript">
function changeAmount()
{
	var res = event.target.name.split("_");
	var inputName = 'count_'+res[1]+'_amount';
	var input = $("input[name="+inputName+"]");

	var ml = $("input[name='ml']").first().text();
	alert(ml);
	ml = parseInt(ml);

	var value = event.target.value;


	value = parseInt(value);


	alert(ml + " " + value );

	input.val(value * ml);


}

</script>



<div class="container">
	<h1>Pressung abfüllen</h1>
	<?php printMessage(); ?>

	<?php $pressing = getPressingById($_GET['id']); ?>
	<?php $allBottels = getAllBottles(); ?>


	<form class="form-horizontal" role="form" method="post" action="result.php">
		<div class="form-group">
			<label  class="col-sm-2 control-label">Pressnummer</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" value='<?php echo $pressing->ID; ?>' name="id" readonly>
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-2 control-label">Menge(l)</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" value='<?php echo $pressing->amount; ?>' name="amount" readonly>
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-4 control-label">Abfüllung in die einzelnen Flaschen</label>
		</div>
		<?php $amountPerBottleType =  $pressing->amount*1000 / getAmountOfBottleTypes()?>
		<?php foreach ($allBottels as $bottle):?>
		<div class="form-group">
			<div class="col-sm-offset-0 col-sm-2">
				<input type="text" class="form-control" value='<?php echo $bottle->ml; ?>' name="ml" readonly>
			</div>
			<div class=" col-sm-1">
				<input type="text" onKeyDown="changeAmount()" class="form-control" value='<?php echo $amountPerBottleType/$bottle->ml; ?>' name="count_<?php echo $bottle->ml; ?>">
			</div>
			<div class=" col-sm-1">
				<input type="text" class="form-control" name="count_<?php echo $bottle->ml; ?>_amount">
			</div>
		</div>
		<?php endforeach;?>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-1">
				<button type="submit" name="insertBotteling" class="btn btn-default">Abfüllen</button>
			</div>
		</div>
	</form>
</div>
</div>
<?php include "footer.php";?>