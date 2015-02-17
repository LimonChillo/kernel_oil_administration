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
$level = 2;
include "head.php";
?>
<div class="container">
  <h1>Benutzer*in <?php echo $title; ?></h1>
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
        <input type="password" class="form-control" name="password" placeholder="Passwort"
        <?php
              if(!isset($user))
                echo ' required';
        ?> >

      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="password" class="form-control" name="passwordVer" placeholder="Passwort wiederholen"
        <?php
              if(!isset($user))
                echo ' required';
        ?> >

      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="email" class="form-control" name="email" placeholder="email"
        <?php if(isset($user)) echo 'value="'.$user->email.'"'; ?> required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4 float">
        <label class="float">
          <p class="float">Administrator?</p>
        <input type="checkbox" class="form-control float" name="isAdmin"
        <?php if(isset($user) && $user->admin == true): echo 'checked';
              if (isset($user) && $user->ID == $_SESSION['user']) echo ' disabled'; endif; ?> >
        </label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="<?php echo $action; ?>" value="<?php if(isset($user))echo $user->ID; ?>"
          class="btn btn-default"> <?php echo ucfirst($title); ?> </button>
        <?php if(isset($user) && $user->ID != $_SESSION['user']) : ?>
          <button type="submit" name="deleteUser" value="<?php echo $user->ID; ?>" class="btn btn-default"> Löschen </button>
        <?php else : echo '<input type="hidden" name="admin" value="1">'; endif; ?>
      </div>
    </div>
  </form>

</div>
</div>
<?php include "footer.php";?>