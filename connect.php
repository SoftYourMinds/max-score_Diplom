<?php
$mysqli = new mysqli("localhost", "root", "", "maxscore");
// Проверяем, удалось ли соединение
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
$mysqli->set_charset('utf8');
