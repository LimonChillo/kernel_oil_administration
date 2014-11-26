<?php
$level = 1;
include "head.php";
?>
<div class="container">
  <?php if($_GET['show'] != 'all'): ?>
  	<h1>noch nicht abgefüllte Pressungen</h1>
  <?php else : ?>
    <h1>Alle Pressungen</h1>
  <?php endif; ?>
  <?php printMessage(); ?>
  <p><a href="getBarrels.php" class="btn btn-default">Pressung hinzufügen</a></p>
	<table class="table table-hover">
  		<tr>
  			<th>#</th>
  			<th>Datum</th>
  			<th>Menge</th>
  			<th>Optionen</th>
  		</tr>
  		<?php printAllPressingsAsTable(); ?>
	</table>
  </form>
	</div>
</div>
<?php include "footer.php";?>