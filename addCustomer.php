<?php
$level = 2;
include "head.php";
if (isset($_GET['id']))
{
  $action = "updateCustomer";
  $title = "bearbeiten";
  $customer = getCustomerByID($_GET['id']);
}
else
{
  $action = "insertCustomer";
  $title = "hinzufügen";
}

?>
<div class="container">
  <h1>Kund*innen <?php echo $title; ?></h1>
  <?php printMessage(); ?>

  <form class="form-horizontal" role="form" method="POST" action="result.php">

    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="firstname" placeholder="Vorname"
        <?php if(isset($customer)) echo 'value="'.$customer->firstname.'"'; ?>required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="lastname" placeholder="Nachname"
        <?php if(isset($customer)) echo 'value="'.$customer->lastname.'"'; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="company" placeholder="Firma"
        <?php if(isset($customer)) echo 'value="'.$customer->company.'"'; ?> >
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="road" placeholder="Straße"
        <?php if(isset($customer)) echo 'value="'.$customer->road.'"'; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="zip" placeholder="PLZ"
        <?php if(isset($customer)) echo 'value="'.$customer->zip.'"'; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="city" placeholder="Ort"
        <?php if(isset($customer)) echo 'value="'.$customer->city.'"'; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="country" placeholder="Staat"
        <?php if(isset($customer)) echo 'value="'.$customer->country.'"'; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="<?php echo $action; ?>" value="<?php if(isset($customer))echo $customer->ID; ?>" class="btn btn-default"> <?php echo ucfirst($title); ?> </button>
        <?php if(isset($customer)) : ?>
          <button type="submit" name="deleteCustomer" value="<?php echo $customer->ID; ?>" class="btn btn-default"> Löschen </button>
        <?php endif; ?>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>