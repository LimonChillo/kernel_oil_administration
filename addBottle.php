<?php
include_once "database/functions.php";
if (isset($_GET['id']))
{
  $action = "updateBottle";
  $title = "bearbeiten";
  $bottle = getBottleByID($_GET['id']);
  if(sizeOf(getBottleByID($_GET['id'])) == null)
    header("Location:getBottles.php?msg=0");
}
else
{
  $action = "insertBottle";
  $title = "hinzufügen";
}

include "head.php";
?>
<div class="container">
  <h1>Flaschentyp <?php echo $title; ?></h1>
  <?php printMessage(); ?>

  <form class="form-horizontal" role="form" method="POST" action="result.php">
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="ml" placeholder="Flaschengröße (ml)"
        <?php if(isset($bottle)) echo 'value="'.$bottle->ml.'"'; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="<?php echo $action; ?>" value="<?php if(isset($bottle))echo $bottle->ID; ?>" class="btn btn-default"> <?php echo ucfirst($title); ?> </button>
        <?php if(isset($bottle)) : ?>
          <button type="submit" name="deleteBottle" value="<?php echo $bottle->ID; ?>" class="btn btn-default"> Löschen </button>
        <?php endif; ?>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>