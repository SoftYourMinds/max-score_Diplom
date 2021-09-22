<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style\login_admin.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet">


	<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet"> -->


</head>

<body>
	<div class="login-box">
	

		<span class="sign-form"> АВТОРИЗАЦИЯ 
		
			<a href="index.php">
				<div class="logo">

					<span class="l-s1">MAX</span>
					<span class="l-s2">SCORE</span>

				</div>
			</a>
		</span>

		<form action="personal_area.php" method="post">
			<div id="point">
				<span class="email-sign">Электронный адрес:</span> 
				<input class="email" type="email" name="email_user"> <i class ="fa fa-envelope"></i> 
			</div>
			<div id="point">
				<span class="password-sign">Пароль:</span>
				<input class="password" type="password" name="pass_user" id="pass"> </span> 
				<i onclick ="a()" style="display: block" id="a" class ="fa fa-eye-slash"></i> <i onclick = "b()" id="b" style="display: none" class ="fa fa-eye"></i>
			</div>
			<div id="submit-cont">
				<a href="index.php" class="back">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
					</svg>
					MaxScore
				</a>
				<input type="submit" name="login_user" value="Вперёд" class="sub">
			</div>


			<span class="ifis">Ещё нет акаунта? <a href='signup_user.php'>Зарегистрируйтесь!</a></span> 
		</form>
	</div>
	<?php
	$_SESSION['login_user'] = "ok";
	if($_SESSION['query_ok']){
		echo $_SESSION['query_ok'];
		unset($_SESSION['query_ok']);
	}
	if ($_SESSION['login_user_error']) {
		echo $_SESSION['login_user_error'];
		unset($_SESSION['login_user_error']);
	}
	// unset($_SESSION['sign_error']);

	// if($_SESSION['exit']){
	// 	$_SESSION['admin']="off";
	// }
	// unset($_SESSION['exit']);
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
	var show = document.querySelector('form');
	show.addEventListener("click", function(){
		// show.style.borderRight = "5px rgb(243, 5, 5, 1) solid";
		// show.style.borderLeft = "5px rgb(5, 243, 76, 1) solid";
		// show.style.transition = "0.5s";
		email.style.background = "none";
		login.style.background = "none";
	});

</script>
</body>

</html>