<?php
$level = 2;
include "head.php";

  $label = getLabelByID($_GET['id']);
?>
<div class="container">
  <h1>Etiketten einlagern</h1>
  <?php printMessage(); ?>

  <form class="form-horizontal" role="form" method="POST" action="result.php">
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="amount" placeholder="Anzahl" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="stockLabel" value="<?php echo $label->ID; ?>" class="btn btn-default"> Einlagern </button>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>