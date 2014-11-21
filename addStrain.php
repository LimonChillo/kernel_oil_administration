<?php
include_once "database/functions.php";
if (isset($_GET['id']))
{
  $action = "updateStrain";
  $title = "bearbeiten";
  $strain = getStrainByID($_GET['id']);
  if(sizeOf(getStrainByID($_GET['id'])) == null)
    header("Location:getStrains.php?msg=Sorte nicht gefunden");
}
else
{
  $action = "insertStrain";
  $title = "hinzufügen";
}

include "head.php";
?>
<div class="container">
  <h1>Sorte <?php echo $title; ?></h1>
  <?php printMessage(); ?>
  <form class="form-horizontal" method="POST" role="form" action="result.php">

    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="name" placeholder="Sortenname"
          <?php if(isset($strain)) echo 'value="'.$strain->name.'"'; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="<?php echo $action; ?>" value="<?php if(isset($strain))echo $strain->ID; ?>" class="btn btn-default"> <?php echo ucfirst($title); ?> </button>
        <?php if(isset($strain)) : ?>
          <button type="submit" name="deleteStrain" value="<?php echo $strain->ID; ?>" class="btn btn-default"> Löschen </button>
          <?php endif; ?>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>