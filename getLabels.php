<?php include "head.php";?>
<div class="container">
  <h1>Etiketten</h1>
  <?php printMessage(); ?>
  <a href="addLabel.php" class="btn btn-default">Etikette hinzufügen</a>
  </p>
  <?php printDatarows("labels", true, "sorte"); ?>


  </div>
</div>
<script>(function() { translate() })() </script>

<?php include "footer.php";?>