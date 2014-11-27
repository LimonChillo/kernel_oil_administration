<?php
$level = 1;
include "head.php";
?>
<div class="container">
  <h1>Kund*innen</h1>
  <?php printMessage(); ?>
  <?php if (isAdmin($_SESSION['user'])) : ?>
    <a href="addCustomer.php" class="btn btn-default">Kund*in hinzufügen</a>
  <?php endif; ?>
  </p>
  <?php printDatarows("customer", false, "ID", array()); ?>

  </div>
</div>

<script>(function() { translate() })() </script>

<?php include "footer.php";?>