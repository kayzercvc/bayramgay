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
	<title>Admin bolmak</title>
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
  <h1>Admin Bolmak</h1>
	<form action="chat" method="post">
		<input type="password" name="passwd" placeholder="Paroly giriz..."><br>
		<input type="submit" value="Admin bolmak">
	</form>
</body>
</html>