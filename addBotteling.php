<?php
$level = 2;
include "head.php";
?>

<script type="text/javascript">
function changeAmount()
{
	var res = event.target.name.split("_");
	var inputName = res[0]+'_display';
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

	var totalAmount = $("input[name='total_amount']").val();

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
				<input type="text" class="form-control" value='<?php echo $pressing->ID; ?>' name="pressing" readonly>
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-2 control-label">Datum</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" value='<?php echo $pressing->date; ?>' name="date" readonly>
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-2 control-label">Menge(l)</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" value='<?php echo $pressing->amount; ?>' name="total_amount" readonly>
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-2 control-label">Sorte</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" value='<?php echo getStrainNameByID(getStrainIdByPressingId($pressing->ID)); ?>' readonly>
				<input type="hidden"  name="strainFK" value="<?php echo getStrainIdByPressingId($pressing->ID); ?>">
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-4 control-label">Abfüllung in die einzelnen Flaschen</label>
		</div>

		<input type="hidden"  name="count" value="<?php echo getAmountOfBottleTypes(); ?>">
		<div class="form-group">
			<div class="col-sm-1 short">
				<label  class="col-sm-2 control-label">Flaschentyp</label><br>
			</div>
			<div class=" col-sm-1">
				<label  class="col-sm-2 control-label">Anzahl</label><br>
			</div>
			<div class=" col-sm-1">
				<label  class="col-sm-2 control-label">Menge</label><br>
			</div>

		</div>
		<?php $amountPerBottleType =  $pressing->amount*1000 / getAmountOfBottleTypes()?>
		<?php $form_id = 0; foreach ($allBottels as $bottle): ?>
		<div class="form-group">
			<div class="col-sm-1 short">
				<input type="text" class="form-control" value='<?php echo $bottle->ml . " ml"; ?>' name="ml" readonly>
			</div>
			<div class=" col-sm-1">
				<input type="text" onKeyUp="changeAmount()" id="<?php echo $form_id; ?>" name="<?php echo $form_id; ?>_amount" class="form-control count long" value='<?php echo $amountPerBottleType/$bottle->ml; ?>' >
			</div>
			<div class=" col-sm-1">
				<input type="text" class="form-control long" name="<?php echo $form_id; ?>_display"  value="<?php echo ($amountPerBottleType / 1000 ).' l'; ?>" readonly>
			</div>
				<input type="hidden"  name="<?php echo $form_id ?>_bottleId" value="<?php echo  $bottle->ID; ?>">
		</div>
		<?php $form_id ++; endforeach;?>
		<div class="form-group">
			<div class="col-sm-offset-1 col-sm-3">
				<div id="output">noch Abzufüllende Menge: 0</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-1">
				<button type="submit" name="insertBottling" class="btn btn-default" disable="true">Abfüllen</button>
			</div>
		</div>
	</form>
</div>
</div>
<?php include "footer.php";?>