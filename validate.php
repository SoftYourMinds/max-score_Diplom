<?php
require_once "connect.php";

$login_admin = $_POST['login_admin'];
$login_user = $_POST['login_user'];


	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$sql = ("SELECT * FROM `users` WHERE `email_user` = '$email' AND `pass_user` = '$pass'");
	$result = $mysqli->query($sql);
	$user = $result->fetch_assoc();
	if ($_SESSION['login_admin'] != "ok") {
		header('Location: ./login_admin.php');
	} else {
		if ((count($user) == 0) && ($_SESSION['admin'] != "on")) {
			$_SESSION['admin'] = "off";
			$_SESSION['login_error'] = "<script> alert('Не удалось ввойти!')</script>";
			header('Location: ./login_admin.php');
		} else {
			$_SESSION['admin'] = "on";
		}
	}


