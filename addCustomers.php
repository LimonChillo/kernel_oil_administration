<?php include "head.php";?>
<div class="container">
  <h1>Kunden*innen hinzufügen</h1>
  <form class="form-horizontal" role="form" method="POST" action="result.php">

    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="firstname" placeholder="Vorname" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="lastname" placeholder="Nachname" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="company" placeholder="Firma">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="road" placeholder="Straße" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="ZIP" placeholder="PLZ" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="city" placeholder="Ort" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="country" placeholder="Staat" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="addCustomer" class="btn btn-default">Hinzufügen</button>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>