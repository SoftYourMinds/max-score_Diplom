<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adminka/Max-score</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style\login_admin.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet">


	<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet"> -->

	<style>
		
	</style>
</head>

<body>
	<div class="login-box">
		<a href="index.php">
			<div class="logo">

				<span class="l-s1">MAX</span>
				<span class="l-s2">SCORE</span>

			</div>
		</a>

		<span class="sign-form"> АДМИН ПАНЕЛЬ </span>

		<form action="adminka.php" method="post">
			<div id="point">
				<span class="email-sign">Электронный адрес:</span> 
				<input class="email" type="email" name="email"> <i class ="fa fa-envelope"></i> 
			</div>
			<div id="point">
				<span class="password-sign">Пароль:
				<input class="password" type="password" name="pass" id="pass"> </span> 
				<i onclick ="a()" style="display: block" id="a" class ="fa fa-eye-slash"></i> <i onclick = "b()" id="b" style="display: none" class ="fa fa-eye"></i>
			</div>
			<div id="submit-cont">
				<a href="index.php" class="back">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
					</svg>
					MaxScore
				</a>
				<input type="submit" name="login_admin" value="Вперёд" class="sub">
			</div>




		</form>
	</div>
	<?php
	$_SESSION['login_admin'] = "ok";
	if ($_SESSION['login_error']) {
		echo $_SESSION['login_error'];
		unset($_SESSION['sign_error']);
	}
	unset($_SESSION['sign_error']);

	if($_SESSION['exit']){
		$_SESSION['admin']="off";
	}
	unset($_SESSION['exit']);
	?>

<script>
	var eyeoff = document.getElementById('a');
	var eyeon = document.getElementById('b');
	var inputpass = document.getElementById('pass');

 	function a(){
		eyeoff.style.display  = "none";
		eyeon.style.display = "block";
		inputpass.type = "text";
	}

	function b() {
		eyeon.style.display = "none";
		eyeoff.style.display  = "block";
		inputpass.type = "password";
	}

</script>
</body>

</html>