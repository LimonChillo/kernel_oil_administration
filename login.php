<?php
include "head.php";
?>
<div class="container">
  <h1>Login</h1>
  <?php printMessage(); ?>
  </p>
  <form class="form-horizontal" role="form" method="POST" action="result.php">

    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="username" placeholder="Username"
        <?php if(isset($_GET['user'])) echo "value='".$_GET['user']."'"; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="password" class="form-control" name="password" id="password" placeholder="Passwort"
        <?php if(isset($_GET['user'])) echo "autofocus"; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="login" class="btn btn-default"> Login </button>
      </div>
    </div>
  </form>

  </div>
</div>

<?php include "footer.php";?>