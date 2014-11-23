<?php
$level = 1;
include "head.php";
?>
<div class="container">
	<h1>noch nicht abgefüllte Pressungen</h1>
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