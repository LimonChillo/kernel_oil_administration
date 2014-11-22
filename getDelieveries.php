<?php
$level = 2;
include "head.php";
?>

<?php
$customers = getAllCustomers();
?>

<div class="container">
  <h1>Lieferungen</h1>
  	<form method='get' action='getDelieveries.php'>
  		<select name='get' id='getCustomerDeliveries' width="200">
  			<?php
  				foreach ($customers as $c)
  				{
  					echo "<option value='" . $c->ID . "'>" . $c->company . " - "  . $c->lastname . "</option>";
  				}
  			 ?>
  		</select>
  	</form>

	<div class="row">
		<div class="col-md-4"><h3></h3></div>
		<div class="col-md-4"><h3>24</h3></div>
		<div class="col-md-4"><h3></h3></div>
	</div>
	<div class="row">
		<div class="col-md-4"><h3>Leerflaschen</h3></div>
		<div class="col-md-4"><h3>Pressung</h3></div>
		<div class="col-md-4"><h3>Produkte</h3></div>
	</div>
  </div>
</div>


<script>(function() { translate() })() </script>

<?php include "footer.php";?>