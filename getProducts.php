<?php
$level = 2;
include "head.php";
?>
<div class="container">
  <h1>Produkte</h1>
  <?php printMessage(); ?>
  </p>
  <?php printDatarows("products", false, "ID", array("ID", "strain", "bottle", "amount")); ?>

  </div>
</div>
<script>(function() { translate() })() </script>

<?php include "footer.php";?>