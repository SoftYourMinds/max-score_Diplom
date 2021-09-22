<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign-up</title>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style\login_admin.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet">


	<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet"> -->


</head>

<body>
	<!-- <img class ="slide1" src="images\offer-img.png"> -->
	<div class="login-box">
		

		<span class="sign-form"> РЕГИСТРАЦИЯ <a href="index.php">
			<div class="logo">

				<span class="l-s1">MAX</span>
				<span class="l-s2">SCORE</span>

			</div>
		</a>
		</span>

		<form action="obrobka.php" id="form_id" method="post" onsubmit="javascript:return validate('form_id','email');">
			
			<div	id="point">
				<span class="login-sign">Имя:</span> 
				<input  id="login" class="login" type="text" name="login_user" required> <i class ="fa fa-futbol-o"></i> 
			</div>
			<div id="point">
				<span class="email-sign">Электронный адрес:</span> 
				<input  id="email" class="email" type="email" name="email_user" required> <i class ="fa fa-envelope"></i> 
			</div>
			<div id="point">
				<span class="password-sign">Пароль:
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
				<input type="submit" name="signup" value="Вперёд" class="sub">
			</div>



			<span class="ifis">Уже зарегистрировались? <a href='login_user.php'>Войдите в аккаунт!</a></span> 
		</form>

	
	</div>

	<?php
	
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

// 	var email = document.getElementById('email');
// 	function validate(em,email) {
//    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
// 	var reg_log = /a{8}/;

//    var address = document.getElementById('email').value;
// 	var login = document.getElementById('login').value;
//    if(reg.test(address) == false) {
//       alert('Введите корректный e-mail');
// 		email.style.background = "rgb(243, 5, 5, 0.500)";
		
//       return false;
//    }else if(reg_log.test(login)){
// 		alert('Имя должно быть не больше 8 символов');
// 		login.style.background = "rgb(243, 5, 5, 0.500)";
//       return false;
		
// 	}	
// 	email.style.background = "rgb(5, 243, 76, 0.500)";
// 	login.style.background = "rgb(5, 243, 76, 0.500)";
// }

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