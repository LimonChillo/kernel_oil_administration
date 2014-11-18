<?php include "head.php";?>
<div class="container">
  <h1>Sorte hinzufügen</h1>
  <form class="form-horizontal" method="POST" role="form" action="result.php">

    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="name" placeholder="Sortenname" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="insertStrain" class="btn btn-default">Hinzufügen</button>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>