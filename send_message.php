<?php
session_start();
if (is_null($_SESSION['usernamme'])) {
  echo '<meta http-equiv="refresh" content="0 url=index">';
}
if(isset($_POST['message'])){
	$h = date('H')+2;
	$i = date('i') . "\n";
  $y = date('d.m.Y');
	$usernamme = $_SESSION['usernamme'];
  $message = htmlspecialchars($_POST['message']);
  if ($_SESSION['admin'] == "chatbayramoff123") {
  	file_put_contents('chat.txt', '<img src="'. $_SESSION['surat'] .'" class="image">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $usernamme .' <span class="admin"><b>Admin</b></span>: '.$message." - ".$y." ".$h.":".$i, FILE_APPEND);
  } else {
  	file_put_contents('chat.txt', '<img src="'. $_SESSION['surat'] .'" class="image">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $usernamme .": ".$message." - ".$y." ".$h.":".$i, FILE_APPEND);
  }
} header("Location: chat");
?>