<?php
include_once "database/functions.php";
if (isset($_GET['id']))
{
  $action = "updateUser";
  $title = "bearbeiten";
  $user = getUserByID($_GET['id']);
  if(sizeOf(getUserByID($_GET['id'])) == null)
    header("Location:getUsers.php?msg=Benutzer existiert nicht");
}
else
{
  $action = "insertUser";
  $title = "hinzufügen";
}

include "head.php";
?>
<div class="container">
  <h1>User <?php echo $title; ?></h1>
    <?php printMessage(); ?>
  <form class="form-horizontal" role="form" method="POST" action="result.php">

    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="username" placeholder="Username"
        <?php if(isset($user)) echo 'value="'.$user->username.'"'; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="password" id="password1" placeholder="Passwort"
        <?php
              if(isset($user))
                echo 'value="'.$user->password.'"';
              else
                echo 'required';
        ?> >

      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="email" class="form-control" name="email" placeholder="email"
        <?php if(isset($user)) echo 'value="'.$user->email.'"'; ?> required>
      </div>
    </div>
    <div class="checkbox">
      <div class="col-sm-4">
        <label>
        <input type="checkbox" class="form-control" value="1" name="admin"
        <?php if(isset($user) && $user->admin == true) echo 'checked'; ?> >
        Administrator?</label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="<?php echo $action; ?>" value="<?php if(isset($user))echo $user->ID; ?>"
          class="btn btn-default"> <?php echo ucfirst($title); ?> </button>
        <?php if(isset($user)) : ?>
          <button type="submit" name="deleteUser" value="<?php echo $user->ID; ?>" class="btn btn-default"> Löschen </button>
        <?php endif; ?>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>