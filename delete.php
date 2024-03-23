<?php
session_start();
if (is_null($_SESSION['usernamme'])) {
  header("Location: index");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="utf-8">
	<title>Hasaby pozmak</title>
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
    .center {
      margin-top: 15px;
    }
	</style>
	<div class="menu"><h1 class="center">Chat Bayramoff</h1></div>
  <br><br><br>
	<h1>Hasaby pozmak</h1>
	<form action="" method="post">
		<input type="password" name="passwordd" placeholder="Hasabynyzyn parolyny girizin..."><br>
		<input type="submit" value="Pozmak">
	</form>
</body>
</html>
<?php
error_reporting(0);
if ($_POST['passwordd'] == $_SESSION['passwordd']) {
  $con = file_get_contents("userlist.txt");
  $ch = '<img src="'. $_SESSION['surat'] .'" class="image"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $_SESSION['usernamme'] .'</b><br><br>';
  $new = str_replace($ch, "", $con);
    file_put_contents("userlist.txt", $new);
    $get = file_get_contents("registered_users.txt");
    $logged = '    ' . $_SESSION['usernamme']."\n";
    $new2 = str_replace($logged, "", $get);
  file_put_contents("registered_users.txt", $logged . "
    ");
	unset($_SESSION['usernamme']);
  unset($_SESSION['passwordd']);
  unset($_SESSION['admin']);
  unlink($_SESSION['surat']);
    
	echo 'Sizin hasabynyz pozuldy!<meta http-equiv="refresh" content="2 url="index">';
} elseif ($_POST['passwordd']) {
	echo 'Sizin hasabynyz pozulmady! Parolynyzy tazeden yazyn!';
}

?>