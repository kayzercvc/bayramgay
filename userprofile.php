<?php
$tim = 60 * 60 * 24 * 365;
session_set_cookie_params($tim);
error_reporting(0);
session_start();

if (is_null($_SESSION['usernamme'])) {
  echo '<meta http-equiv="refresh" content="0 url=index">';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
	<title>Profile</title>
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
  <h1>Profil</h1>
  <img style="width: 120px; height: 120px;" src="<?php echo $_SESSION['surat']; ?>"><br>
  <h2>Ulanyjy ady: <b><?php echo $_SESSION['usernamme']; ?></b></h2>
</body>
</html>