<?php
$level = 2;
include "head.php";
?>
<div class="container">
  <h1>Benutzer*innen</h1>
  <?php printMessage(); ?>
  <a href="addUser.php" class="btn btn-default">Benutzer*in hinzufügen</a>
  </p>
  <?php printDatarows("user", false, "username", array(), 0,  true); ?>

  </div>
</div>
<script>(function() { translate() })() </script>

<?php include "footer.php";?>