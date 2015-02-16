<?php
if (isset($_GET['logout'])) :
  // Löschen aller Session-Variablen.
  $_SESSION = array();
    // Löscht das Session-Cookie.
    if (isset($_COOKIE[session_name()])) {
      setcookie(
        session_name(),  // Cookie-Name war gleich Name der Session
        '',             // Cookie-Daten. Achtung! Leerer String hier hilft nicht!
        time()-42000,  // Ablaufdatum in der Vergangenheit. Erst das löscht!
        '/'           // Wirkungsbereich des Cookies: der ganze Server
       );
    }
    if(isset($_SESSION['user']))
      session_destroy();
    header("Location: login.php");
endif;
$page = 'login';
$level = 0;
include "head.php";

?>

<div class="container">
  <h1>Login</h1>
  <?php printMessage(); ?>
  </p>
  <form class="form-horizontal login" role="form" method="POST" action="result.php">

    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control" name="username" placeholder="Username" autofocus required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <input type="password" class="form-control" name="password" id="password" placeholder="Passwort" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" name="login" class="btn btn-default"> Login </button>
      </div>
    </div>
    <div class='alert alert-info col-sm-4' role='alert'><strong>Demo Login</strong> <br><p> user: demo - pw: demo</p></div>
  </form>

  </div>
</div>

<?php include "footer.php";?>