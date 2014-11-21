<?php include "head.php";?>
<div class="container">
  <h1>Sorten</h1>
  <a href="addStrain.php" class="btn btn-default">Sorte hinzufügen</a>
  </p>
  <?php printDatarows("strain", false, "name"); ?>

  </div>
</div>
<script>(function() { translate() })() </script>

<?php include "footer.php";?>