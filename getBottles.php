<?php include "head.php";?>
<div class="container">
  <h1>Flaschen</h1>
  <a href="addBottle.php" class="btn btn-default">Flasche hinzufügen</a>
  </p>
  <?php printDatarows("bottle", true, "ml"); ?>

  </div>
</div>
<script>(function() { translate() })() </script>

<?php include "footer.php";?>