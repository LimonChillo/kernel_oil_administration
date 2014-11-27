<?php
$level = 1;
include "head.php";
?>

<?php
$customers = getAllCustomers();

$bottles = getAllBottles();

?>

<div class="container">
  <h1>Lieferungen</h1>
  <?php printMessage(); ?>
  	<form method='get' id="customerForm" action='getDeliveries.php'>
  		<select name='get' id='customerFormSelect'>
  			<option disabled selected>Bitte einen Kunden wählen!</option>
  			<?php

  				foreach ($customers as $c)
  				{
  					echo "<option value='" . $c->ID . "'>" . $c->company . " - "  . $c->lastname . "</option>";
  				}
  			 ?>
  		</select>
  	</form>

  	<?php

if(isset($_GET['get'])):

	$customerID = strip_tags($_GET['get']);
	$deliveryDays = getDatesWhenCustomerGotDeliveries($customerID);
	?>

	<h3><?php  echo getCustomerByID($customerID) -> firstname . " " . getCustomerByID($customerID) -> lastname . " (" . getCustomerByID($customerID) -> company  . ")"; ?></h3>

	<?php

	if ($deliveryDays[0] == 0)
	{
		echo "<p> Es sind noch keine Lieferungen erfolgt</p>";
	}

  	foreach ($deliveryDays as $day) :?>
		<div class="row">
			<div class="col-md-12"><h3><?php  echo $day -> date; ?></h3></div>
		</div>
		<?php
			$rowCount = sizeOf(getDeliveredStrainsByCustomerByDate($customerID, $day -> date));
			$strains = getDeliveredStrainsByCustomerByDate($customerID, $day -> date);
			$currentStrain = 0;

			while ($currentStrain < sizeOf($strains)):
		?>
						<div class="col-md-4">
							<?php echo $strains[$currentStrain] -> name; ?>
							<div class="row">
								<?php
									$bottleCount = sizeOf($bottles);
									$currentBottle = 0;

									while ($currentBottle < $bottleCount):

									if (getDeliveredProductsByCustomerByStrainByBottleByDate($customerID, $strains[$currentStrain] -> ID, $bottles[$currentBottle] -> ID, $day -> date) -> amount > 0):
									?>
										<div class="col-md-4">
											<?php
												echo $bottles[$currentBottle] -> name . " - ";
												echo getDeliveredProductsByCustomerByStrainByBottleByDate($customerID, $strains[$currentStrain] -> ID, $bottles[$currentBottle] -> ID, $day -> date) -> amount;
											?>
										</div>
									<?php
										endif;
										$currentBottle ++;
									endwhile;
									?>
							</div>
						</div>
		<?php  		$currentStrain++;

			endwhile;
	endforeach;
endif;

?>
</div>


<script>(function() { translate() })() </script>

<?php include "footer.php";?>