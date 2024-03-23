<?php
$tim = 60 * 60 * 24 * 365;
session_set_cookie_params($tim);
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="utf-8">
  <title>Login</title>
</head>
<body>
  <style type="text/css">
    html {
      text-align: center;
      font-family: arial;
      color: white;
      background: black;
    }
    input, button {
      width: 200px;
      height: 20px;
      background: black;
      color: white;
      border: 0.1px solid white;
      border-radius: 5px;
      margin-top: 5px;
    }
    .menu {
      position: fixed;
        z-index: 2;
        width: 100%;
        height: 60px;
        background-color: white;
        color: black;
        margin-top: -10px;
        margin-left: -8px;
    }
    .opa {
      width: 30px;
      height: 30px;
      margin-left: -170px;
      opacity: 0;
    }
    .center {
      margin-top: 15px;
    }
  </style>
  <div class="menu"><h1 class="center">Chat Bayramoff</h1></div>
  <br><br><br>
  <h1>Registrasiya</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="text" name="usernamme" placeholder="Adynyz..." maxlength="20" required><br>
      <input type="password" name="passwordd" placeholder="Parolynyz..." minlength="6" maxlength="12" required><br>
      <input class="opa" accept="image/*,.jpg" type="file" name="ebala" required><br>
      <input type="submit" value="Registrasiya">
    </form>
    <img src="adddi.png" style="width: 30px; height: 30px; position: absolute; margin-top: -50px; margin-left: -100px; z-index: -1;">
    <?php
session_start();
$ad = "registered_users.txt";
$getname = file_get_contents($ad);
$ceheck = htmlspecialchars($_POST['usernamme']);
if (strpos($getname, $ceheck) !== false) {
  echo "<br><b>Bu atly ulanyjy eyyam bar!</b>";
}
elseif ($_POST['usernamme'] && $_POST['passwordd'] && $_FILES['ebala']) {
  $tmp = $_FILES['ebala']['tmp_name'];
  $des = "";
  if (move_uploaded_file($tmp, $des.$_FILES['ebala']['name'])) {
  }
  $_SESSION['surat'] = $_FILES['ebala']['name'];
  $_SESSION['usernamme'] = htmlspecialchars($_POST['usernamme']);
  $_SESSION['passwordd'] = $_POST['passwordd'];
  $logged = '    ' . htmlspecialchars($_POST['usernamme'])."\n";
  file_put_contents("registered_users.txt", $logged . "
    ", FILE_APPEND);
  file_put_contents('userlist.txt', '<img src="'. $_FILES['ebala']['name'] .'" class="image"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . htmlspecialchars($_POST['usernamme']) . '</b><br><br>', FILE_APPEND);
}
if ($_SESSION['usernamme']) {
  echo '<meta http-equiv="refresh" content="0 url=chat">';
}
?>
</body>
</html>