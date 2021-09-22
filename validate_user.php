<?php
require_once "connect.php";

$email = $_POST['email_user'];
$pass = $_POST['pass_user'];
$login = $_POST['login_user'];

$sql = ("SELECT * FROM `users` WHERE `email_user` = '$email' AND `pass_user` = '$pass'");
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();
if ($_SESSION['login_user'] != "ok") {
	header('Location: ./login_user.php');
} else if ((count($user) == 0) && ($_SESSION['user'] != "on")) {
		$_SESSION['user'] = "off";
		$_SESSION['login_user_error'] = "<script> alert('Такого пользователя не существует!');
			login.style.background = 'rgb(243, 5, 5, 0.500)';
			email.style.background = 'rgb(243, 5, 5, 0.500)';
		</script>";
		header('Location: ./login_user.php');
	} else {
		$_SESSION['user'] = "on";
	}
