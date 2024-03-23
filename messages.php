<?php

$messages = file('chat.txt');
$rev = array_reverse($messages);

foreach ($rev as $line) {
	echo $line . "<br>";
}

?>