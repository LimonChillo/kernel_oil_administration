<?php
$level = 2;
include "head.php";
?>
<div class="container">
  <h1>Kunden*innen</h1>
  <?php printMessage(); ?>
  <a href="addCustomer.php" class="btn btn-default">Kunden*innen hinzufügen</a>
  </p>
  <?php printDatarows("customer", false, "ID"); ?>

  </div>
</div>
<script>(function() { translate() })() </script>

<?php include "footer.php";?>