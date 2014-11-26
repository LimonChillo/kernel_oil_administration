<?php
$level = 1;
include "head.php";
?>
<div class="container">
  <h1>Abfüllungen</h1>
  <?php printMessage(); ?>
  <a href='getPressings.php' class='btn btn-default'>Abfüllung hinzufügen</a>
  <br><br>

  
 
	<table class="table table-hover">
  		<tr>
  			<th>ID</th>
  			<th>Pressung</th>
  			<th>Datum</th>
  			<th>Sorte</th>
        <th>Flasche</th>
        <th>Menge</th>
  		</tr>
  		<?php

        printAllBottlingsTable();
        
      ?>
	</table>
  </form>
	</div>
</div>
<?php include "footer.php";?>