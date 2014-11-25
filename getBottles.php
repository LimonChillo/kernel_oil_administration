<?php
$level = 1;
include "head.php";
?>
<div class="container">
  <h1>Flaschen</h1>
  <?php printMessage(); ?>
  <?php if (isAdmin($_SESSION['user'])) : ?>
  <a href="addBottle.php" class="btn btn-default">Flasche hinzufügen</a>
  <?php endif; ?>
  </p>
  <?php printDatarows("bottle", true, "ml"); ?>

  </div>
</div>
<script>(function() { translate() })() </script>

<?php include "footer.php";?>