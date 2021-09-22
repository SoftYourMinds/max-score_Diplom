<?php
session_start();
	unset($_SESSION['user']);
	unset($_SESSION['id_user']);
	header('Location: ./index.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wait...</title>
</head>
<body>
	Wait for it...


</body>

</html>