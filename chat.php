<?php
$timme = 60 * 60 * 24 * 365;
session_set_cookie_params($timme);
session_start();
error_reporting(0);
include 'ban.txt';
if (is_null($_SESSION['usernamme'])) {
  echo '<meta http-equiv="refresh" content="0 url=index">';
}
error_reporting(0);
if (is_null($_SESSION['surat'])) {
  unset($_SESSION['usernamme']);
  unset($_SESSION['passwordd']);
  header("Location: index");
}
if ($_POST["passwd"] == "chatbayramoff123") {
  $_SESSION['admin'] = "chatbayramoff123";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="utf-8">
  <title>Chat</title>
  <script src="jquery.1.12.4.min.js"></script>
</head>
<body>
  <style type="text/css">
    html {
      text-align: center;
      font-family: arial;
      color: white;
      background: black;
    }
    .admin {
      width: 50px;
      height: 20px;
      background-color: blue;
      color: white;
      font-family: arial;
      text-align: center;
      border-radius: 5px;
      border: 40px;
    }
    a {
      color: white;
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
    .image {
      width: 25px;
       height: 25px; 
       position: absolute; 
       margin-top: -2px;
       border-radius: 50px;
    }
    .white {
      position: fixed;
      width: 100%;
      height: 100%;
      background: white;
      z-index: 100;
    }
    form {
      margin-top: 5px;
    }
  </style>
  <div class="menu"><h1 class="center">Chat Bayramoff</h1></div>
  <br><br><br><form id="message-form" action="send_message" method="post">
  <input type="text" name="message" placeholder="Habary yazyn..." autofocus><br>
  <button type="submit">Ugratmak</button>
</form>
<?php
if ($_SESSION['admin'] == "chatbayramoff123") {
    echo '<form method="post"><input type="text" name="pozmak" placeholder="Pozmaly habary girizin..."><br><input type="submit" value="Pozmak"></form><form method="post"><input type="text" name="ban" placeholder="Ulanyjyn adyny girizin..." required><br><input type="submit" value="Banlamak"></form><form method="post"><input type="text" name="unban" placeholder="Ulanyjyn adyny girizin..." required><br><input type="submit" value="Bandan açmak"></form>Statusynyz: Admin &nbsp&nbsp<a href="delete">Hasaby pozmak</a>';
} else {
  echo 'Statusynyz: Ulanyjy<br><a href="admin">Admin bolmak</a>';
}
?>
<br><a href="users">Ulanyjylar listi</a>
&nbsp;&nbsp;<a href="profile">Profile</a>
<h3><div id="chat">
  <?php include 'messages.php'; ?>
</div></h3>
<script>
$(document).ready(function(){
  function updateChat() {
    $('#chat').load('messages');
  }
  setInterval(updateChat, 2000);
});
</script>
</body>
</html>
<?php

if ($_POST['pozmak']) {
  if ($_SESSION['admin']) {
  $filename = 'chat.txt';
    $search_text = $_POST['pozmak'] . "\n";

    $file_content = file_get_contents($filename);

    $new_content = str_replace($search_text, "", $file_content);
    file_put_contents($filename, $new_content);
    echo '<meta http-equiv="refresh" content="0.5 url=">';
} 
}
$h = date('H')+2;
  $i = date('i') . "\n";
  $y = date('d.m.Y');
if ($_POST['ban']) {
  if ($_SESSION['admin']) {
  $ban = '<?php
  if ($_SESSION["admin"]) {
  } 
  elseif ($_SESSION["usernamme"] == "'. $_POST['ban'] .'") {
    header("Location: banneduser");
  }
  ?>';
  file_put_contents("ban.txt", $ban, FILE_APPEND);
  file_put_contents('chat.txt', '&nbsp;&nbsp;&nbsp;&nbsp;GroupHelp <span class="admin"><b>Admin</b></span>: Ulanyjy '.$_POST['ban'].' banlandy! - '.$y.' '.$h.':'.$i, FILE_APPEND);
  echo '<meta http-equiv="refresh" content="0.5 url=">';
}
}
$namefil = "ban.txt";
$con = file_get_contents($namefil);
if ($_POST['unban']) {
  if ($_SESSION['admin']) {
  $ch = '<?php
  if ($_SESSION["admin"]) {
  } 
  elseif ($_SESSION["usernamme"] == "'. $_POST['unban'] .'") {
    header("Location: banneduser");
  }
  ?>';
  if (strpos($con, $ch) !== false) {
    $new = str_replace($ch, "", $con);
    file_put_contents($namefil, $new);
    file_put_contents('chat.txt', '&nbsp;&nbsp;&nbsp;&nbsp;GroupHelp <span class="admin"><b>Admin</b></span>: Ulanyjy '.$_POST['unban'].' bandan açyldy! - '.$y.' '.$h.':'.$i, FILE_APPEND);
    echo '<meta http-equiv="refresh" content="0.5 url=">';
  } else {
    echo '<script>alert("Ulanyjy tapylmady!");</script>';
  }
 }
}

?>