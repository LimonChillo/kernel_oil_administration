<?php
$level = 1;
include "head.php";
?>
<div class="container">
  <h1>Sorten</h1>
  <?php printMessage(); ?>
  <?php if (isAdmin($_SESSION['user'])) : ?>
  <a href="addStrain.php" class="btn btn-default">Sorte hinzufügen</a>
  <?php endif; ?>
  </p>
  <?php printDatarows("strain", false, "name", array(), 0, true); ?>


  </div>
</div>
<script>(function() { translate() })() </script>

<?php include "footer.php";?>