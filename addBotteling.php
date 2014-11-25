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

	var ml = $("input[name='ml']").eq(event.target.id).val();

	ml = parseInt(ml);

	var value = event.target.value;
	value = parseInt(value);
	input.val(parseFloat(value * ml/1000) + " l");

	updateDisplay();
}


function updateDisplay()
{
	var values = $(".count");
	var ml = $("input[name='ml']");

	var sum = 0;

	for(var i = 0; i < values.length; i++)
	{	
		sum += parseInt(values.eq(i).val()) * parseInt(ml.eq(i).val())
	}

	var totalAmount = $("input[name='amount']").val();

	var diff = totalAmount - (sum/1000);
	/*
	if(!isNaN(diff))
		$("#output").text("noch abzufüllende Menge: " + (totalAmount - (sum/1000)).toFixed(2) + " l");
	else
		$("#output").text("noch abzufüllende Menge: ---");
	*/

	$("#output").text("noch abzufüllende Menge: " + (totalAmount - (sum/1000)).toFixed(2) + " l");


	if(diff != 0)
		$('button').prop( "disabled", true );
	else
		$('button').prop( "disabled", false );

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
		<?php $form_id = 0; foreach ($allBottels as $bottle): ?>
		<div class="form-group">
			<div class="col-sm-offset-0 col-sm-2">
				<input type="text" class="form-control" value='<?php echo $bottle->ml . " ml"; ?>' name="ml" readonly>
			</div>
			<div class=" col-sm-1">
				<input type="text" onKeyUp="changeAmount()" id="<?php echo $form_id; ?>" class="form-control count" value='<?php echo $amountPerBottleType/$bottle->ml; ?>' name="count_<?php echo $bottle->ml; ?>">
			</div>
			<div class=" col-sm-1">
				<input type="text" class="form-control" name="count_<?php echo $bottle->ml;?>_amount"  value="<?php echo ($amountPerBottleType / 1000 ).' l'; ?>" readonly>
			</div>
				<input type="hidden"  name="bottle_id" value="<?php echo  $form_id; ?>">
		</div>
		<?php $form_id ++; endforeach;?>
		<div class="form-group">
			<div class="col-sm-offset-1 col-sm-3">
				<div id="output">noch Abzufüllende Menge: 0</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-1">
				<button type="submit" name="insertBotteling" class="btn btn-default" disable="true">Abfüllen</button>
			</div>
		</div>
	</form>
</div>
</div>
<?php include "footer.php";?>