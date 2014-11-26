<?php
$level = 1;
include "head.php";
?>
<div class="container">
  <?php if(!isset($_GET['show']))
        {
          echo "<h1>Nicht abgefüllte Pressungen</h1>";
          printMessage();
          echo  "<a href='getBarrels.php' class='btn btn-default'>Pressung hinzufügen</a>";
          echo  "<a style='margin-left: 10px;' href='getPressings.php?show=all' class='btn btn-default'>Alle Pressungen</a>";
        }
        else
        {
          echo "<h1>Alle Pressungen</h1>";
          printMessage();
          echo  "<a href='getBarrels.php' class='btn btn-default'>Pressung hinzufügen</a>";
          echo  "<a style='margin-left: 10px;'href='getPressings.php' class='btn btn-default'>Nicht abgefüllte Pressungen</a>";
        }
  ?>
  <br><br>
	<table class="table table-hover">
  		<tr>
  			<th>ID</th>
  			<th>Sorte</th>
  			<th>Datum</th>
        <th>Menge</th>
  			<th>Optionen</th>
  		</tr>
  		<?php

        if(isset($_GET['show']))
        {
          printUnpressedPressingsAsTable();
        }
        else
        {
          printAllPressingsAsTable();
        }
      ?>
	</table>
  </form>
	</div>
</div>
<?php include "footer.php";?>