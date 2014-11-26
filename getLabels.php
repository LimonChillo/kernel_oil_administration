<?php
$level = 1;
include "head.php";
?>
<div class="container">
  <h1>Etiketten</h1>
  <?php printMessage(); ?>
  </p>
  <?php printDatarows("allLabels", true, "ID", array("ID", "strain", "bottle", "amount")); ?>


  </div>
</div>
<script>(function() { translate() })() </script>

<?php include "footer.php";?>