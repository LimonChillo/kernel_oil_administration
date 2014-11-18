<?php include "head.php";?>
<div class="container">
  <h1>User hinzufügen</h1>
  <form class="form-horizontal" role="form" method="POST" action="result.php">

    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="password" class="form-control" name="password" id="password1" placeholder="Passwort" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="password" class="form-control" name="password2" id="password2" placeholder="Passwort wiederholen" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="email" class="form-control" name="email" placeholder="email" required>
      </div>
    </div>
    <div class="checkbox">
      <div class="col-sm-4">
        <label>
        <input type="checkbox" class="form-control" value="1" name="is_admin">
        Administrator?</label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="insertUser" class="btn btn-default">Hinzufügen</button>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>