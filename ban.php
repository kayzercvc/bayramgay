<?php
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
	<title>Banned</title>
	<meta charset="utf-8">
</head>
<body>
	<script type="text/javascript">
		alert("Siz wagtlayynca banda!");
	</script>
	<h1>Ulanyjy adynyz: <?php session_start(); echo $_SESSION['usernamme']; ?></h1><br>
	<a href="chat">Chat</a>
</body>
</html>