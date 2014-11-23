<?php
$level = 2;
include "head.php";
?>

<?php
$customers = getAllCustomers();

$bottles = getAllBottles();
//$strains = getAllStrains();

if(isset($_GET['get']))
{
	$customer_id = strip_tags($_GET['get']);
	$deliveryDays = getDatesWhenCustomerGotDeliveries($customer_id); 
	//getDeliveredProductsByCustomerByStrainByBottleByDate($customer_id, $strain_id, $bottle_id, $date);
	//getDeliveredStrainsByCustomerByDate($customer_id, $date)
}

?>	

<div class="container">
  <h1>Lieferungen</h1>
  	<form method='get' id="customerForm" action='getDelieveries.php'>
  		<select name='get' id='customerFormSelect'>
  			<?php 

  				foreach ($customers as $c)
  				{
  					echo "<option value='" . $c->ID . "'>" . $c->company . " - "  . $c->lastname . "</option>";
  				}
  			 ?>
  		</select>
  	</form>

  	<?php foreach ($deliveryDays as $day) :?>
		<div class="row">
			<div class="col-md-12"><h3>DAY</h3></div>
		</div>
		<?php 
			$rowCount = sizeOf(getDeliveredStrainsByCustomerByDate($customer_id, $day));
			$strains = getDeliveredStrainsByCustomerByDate($customer_id, $day));
			$currentStrain = 0;
			// 3 Spaltige Anzeige für Sorten
			while ($rowCount % 3 != 0)
			{
				$rowCount++;
			}
			$rowCount /= 3;

			while ($rowCount > 0)
		?>		
				<div class="row">
					<?php  for(int i = 0; i < 3; i++): ?>

						<div class="col-md-4">
							<?php echo $strains[$currentStrain] -> name ?>
							<div class="row">
								<?php 
									$bottleCount = sizeOf($bottles); 
									$currentBottle = 0;

									while ($currentBottle < $bottleCount):
								?>
									<div class="col-md-4">
										<?php  
											echo $bottles[$currentBottle] -> id . " - ";
											echo getDeliveredProductsByCustomerByStrainByBottleByDate($customer_id, $strains[$currentStrain], $bottles[$currentBottle], $day); 
										?>
									</div>
									<?php  
										$currentBottle ++;
										end;
									?>
							</div>
						</div>
		<?php  		$currentStrain++;
					end;
				$rowCount--;
			end;

		 ?>
		
	<?php end; ?>
  </div>
</div>


<script>(function() { translate() })() </script>

<?php include "footer.php";?>