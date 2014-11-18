<?php include "head.php";?>
<div class="container">
  <h1>Flaschentyp hinzufügen</h1>
  <form class="form-horizontal" role="form" method="POST" action="result.php">
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="ml" placeholder="Flaschengröße (ml)" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="insertBottle" class="btn btn-default">Hinzufügen</button>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>