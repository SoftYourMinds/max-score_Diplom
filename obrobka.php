<?php

session_start();
require_once "connect.php";
require_once "validate.php";


$up = $_SESSION['update_id'];
// ОБРАБОТКА ДОБАВЛЕНИЯ КОМАНДЫ
$done_team = $_POST['done_team'];
$name_team = $_POST['name_team'];

$img_team = time() . $_FILES["filename"]["name"];

$wins = $_POST['w'];
$draws = $_POST['d'];
$loses = $_POST['l'];

$wins_first_time = $_POST['w1'];
$draws_first_time = $_POST['d1'];
$loses_first_time = $_POST['w1'];

$wins_sec_time = $_POST['w2'];
$draws_sec_time = $_POST['d2'];
$loses_sec_time = $_POST['l2'];

$goals = $_POST['goals'];
$loses_goals = $_POST['loses_goals'];

if (isset($done_team)) {

	if (move_uploaded_file($_FILES['filename']['tmp_name'], 'images/teams_logo/' . $img_team)) {

		$directoty = 'images/teams_logo/' . $img_team;
		$_SESSION['yes_file'] = "yes";

		$sql = "INSERT INTO `statistics`(`teams_name`, `teams_logo`, `wins`, `draws`, `loses`, `wins_first_time`, `draws_first_time`, `loses_first_time`, `wins_sec_time`, `draws_sec_time`, `loses_sec_time`, `goals`, `loses_goals`) VALUES ('$name_team', '$directoty', '$wins', '$draws', '$loses', '$wins_first_time', '$draws_first_time', '$loses_first_time', '$wins_sec_time', '$draws_sec_time', '$loses_sec_time', '$goals', '$loses_goals')";
		$result = $mysqli->query($sql);
	}

	if (($result === True) && ($_SESSION['yes_file']) == "yes") {
		$_SESSION['query_ok'] = "<div class='alert_true'>Ваш запрос успешно обработан!</div>";
		// <i class='fa fa-times-circle' onclick ='closeQuery()'></i>
		header('Location: ./adminka.php');
	} else {
		$_SESSION['query_off'] = "<div  class='alert-false'>Ошибка, не удалось отпраивть данные</div>";
		header('Location: ./adminka.php');
	}
}

// ОБРАБОТКА ДОБВАЛЕНИЯ АДМИНИСТРАТОРА

$done_admin = $_POST['done_add_admin'];
$email_user = $_POST['name_email'];
$pass_user = $_POST['pass_admin'];

if (isset($done_admin)) {

	$sql = "INSERT INTO `users` (`email_user`, `pass_user`, `cat_user`) VALUES ('$email_user', '$pass_user', '2')";
	$result = $mysqli->query($sql);

	if ($result === True) {
		$_SESSION['query_ok'] = "<div class='alert_true'>Ваш запрос успешно обработан!</div>";
		// <i class='fa fa-times-circle' onclick ='closeQuery()'></i>
		header('Location: ./adminka.php');
	} else {
		$_SESSION['query_off'] = "<div  class='alert-false'>Ошибка, не удалось отпраивть данные</div>";
		header('Location: ./adminka.php');
	}
}

// ОБРОБКА ИЗМЕНЕНИЕ АДМИНА
$done_admin_new = $_POST['done_edit_admin'];
$email_user_new = $_POST['name_email_new'];
$pass_user_new = $_POST['pass_admin_new'];


if (isset($done_admin_new)) {
	$sql = "UPDATE `users` SET `email_user`='$email_user_new',`pass_user`='$pass_user_new ' WHERE `id_user` = '$up'";
	$result = $mysqli->query($sql);

	if ($result === True) {
		$_SESSION['query_ok'] = "<div class='alert_true'>Ваш запрос успешно обработан!</div>";
		// <i class='fa fa-times-circle' onclick ='closeQuery()'></i>
		header('Location: ./adminka.php');
	} else {
		$_SESSION['query_off'] = "<div  class='alert-false'>Ошибка, не удалось отпраивть данные</div>";
		header('Location: ./adminka.php');
	}
}

//ОБРАБОТКА ИЗМЕНЕНИЯ КОМАНДЫ 

$done_team = $_POST['done_update_team'];
$name_team = $_POST['name_team'];

$img_team = time() . $_FILES["filename"]["name"];
$img_stay = $_SESSION['teams_logo'];

$wins = $_POST['w'];
$draws = $_POST['d'];
$loses = $_POST['l'];

$wins_first_time = $_POST['w1'];
$draws_first_time = $_POST['d1'];
$loses_first_time = $_POST['w1'];

$wins_sec_time = $_POST['w2'];
$draws_sec_time = $_POST['d2'];
$loses_sec_time = $_POST['l2'];

$goals = $_POST['goals'];
$loses_goals = $_POST['loses_goals'];

if (isset($done_team)) {
	if (!file_exists($_FILES["filename"]["name"])) {
		$sql = "UPDATE `statistics` SET `teams_name`='$name_team',`teams_logo`='$img_stay',  `wins`='$wins', `draws`='$draws', `loses`='$loses', `wins_first_time`='$wins_first_time', `draws_first_time`='$draws_first_time', `loses_first_time`='$loses_first_time', `wins_sec_time`='$wins_sec_time', `draws_sec_time`='$draws_sec_time', `loses_sec_time`='$loses_sec_time', `goals`=$goals, `loses_goals`='$loses_goals' WHERE `id_statistics` = '$up'";
		$result = $mysqli->query($sql);
	} else {
		if (move_uploaded_file($_FILES['filename']['tmp_name'], 'images/teams_logo/' . $img_team)) {

			$directoty = 'images/teams_logo/' . $img_team;
			$_SESSION['yes_file'] = "yes";


			$sql = "UPDATE `statistics` SET `teams_name`='$name_team', `teams_logo`='$directoty', `wins`='$wins', `draws`='$draws', `loses`='$loses', `wins_first_time`='$wins_first_time', `draws_first_time`='$draws_first_time', `loses_first_time`='$loses_first_time', `wins_sec_time`='$wins_sec_time', `draws_sec_time`='$draws_sec_time', `loses_sec_time`='$loses_sec_time', `goals`=$goals, `loses_goals`='$loses_goals' WHERE `id_statistics` = '$up'";
			$result = $mysqli->query($sql);
		}
	}

	if ($result === True) {
		$_SESSION['query_ok'] = "<div class='alert_true'>Ваш запрос успешно обработан!</div>";
		// <i class='fa fa-times-circle' onclick ='closeQuery()'></i>
		header('Location: ./adminka.php');
	} else {
		$_SESSION['query_off'] = "<div  class='alert-false'>Ошибка, не удалось отпраивть данные</div>";
		header('Location: ./adminka.php');
	}
}


//REGISTRATION USER
$signup = $_POST['signup'];
$email_user = $_POST['email_user'];
$lodin_user = $_POST['login_user'];
$pass_user = $_POST['pass_user'];


$sql = ("SELECT * FROM `users` WHERE `email_user` = '$email_user' OR `login_user` = '$lodin_user'");
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();

if (isset($signup)) {
	if($email_user ==''){
		$_SESSION['login_user_error'] = "<script> alert('Введите корректный электронный адрес!');
		email.style.background = 'rgb(243, 5, 5, 0.500)';
		</script>";
		header('Location: ./signup_user.php');
	} else if(($lodin_user =='')||($login_user.length > 8 )){
		$_SESSION['login_user_error'] = "<script> alert('Введите корректное имя пользователя! Не больше 8 знаков');
		login.style.background = 'rgb(243, 5, 5, 0.500)';
		</script>";
		// <i class='fa fa-times-circle' onclick ='closeQuery()'></i>
		header('Location: ./signup_user.php');
	} else if(count($user)>=1){
		$_SESSION['login_user_error'] = "<script> alert('Такой пользователь уже существует!');
		login.style.background = 'rgb(243, 5, 5, 0.500)';
		email.style.background = 'rgb(243, 5, 5, 0.500)';
		var show = document.querySelector('form');
		
		</script>";
		// <i class='fa fa-times-circle' onclick ='closeQuery()'></i>
		header('Location: ./signup_user.php');
	}
	else{
		$sql = "INSERT INTO `users` (`email_user`, `pass_user`, `cat_user`, `ava_user`, `login_user`) VALUES ('$email_user', '$pass_user', '1', 'https://i.pinimg.com/originals/ff/a0/9a/ffa09aec412db3f54deadf1b3781de2a.png', '$lodin_user')";
		$result = $mysqli->query($sql);
		if ($result === True) {
			$_SESSION['query_ok'] = "<script> alert('Ваш запрос успешен! Войдите в аккаунт:')</script>";
			header('Location: ./login_user.php');
		} else {
			$_SESSION['signup_error'] = "<script> alert('Ошибка, не удалось отправить данные!')</script>";
			header('Location: ./signup_user.php');
		}
	}
}



// $email_user = $_POST['email_user'];


// if (isset($done_img)) {
// 	$_SESSION['user'] == "on";
// 	if (move_uploaded_file($_FILES['filename']['tmp_name'], 'images/user_logo/' . $img_user)) {

// 		$directoty = 'images/user_logo/' .$img_user;
// 		$_SESSION['yes_file'] = "yes";

// 		$sql = "UPDATE `users` SET `ava_user` = '$directoty' WHERE `email_user`= '$email_user'";
// 		$result = $mysqli->query($sql);
// 		header('Location: ./personal_area.php');
// 	}else{
// 		header('Location: ./personal_area.php');
// 	}
// }


$edit_user = $_POST['done_edit_user'];
$email_user = $_POST['email_user'];
$login_user = $_POST['login_user'];
$pass_user = $_POST['pass_user'];
$id_user = $_POST['id_user'];
$ava_user = $_POST['ava_user'];


$img_user= time() . $_FILES["filename1"]["name"];

// if($img_user != ''){
	if (isset($edit_user)) {

		if (strlen($login_user) > 8 ){
			$_SESSION['edit_off'] = "<script> alert('Введите корректное имя пользователя! Не больше 8 знаков'); </script>";
			header("Location: ./chest.php?email=".$email_user."&pass=".$pass_user);

		} else{

	

		if (move_uploaded_file($_FILES['filename1']['tmp_name'], 'images/user_logo/' . $img_user)) {
			
			$directoty = 'images/user_logo/' .$img_user;
			$_SESSION['yes_file'] = "yes";

			
			$sql = "UPDATE `users` SET `login_user`='$login_user',`email_user`='$email_user', `pass_user`='$pass_user', `ava_user`='$directoty' WHERE `id_user` = '$id_user'";
			$result = $mysqli->query($sql);
		}
		else{
			$_SESSION['yes_file'] = "yes";
			$sql = "UPDATE `users` SET `login_user`='$login_user',`email_user`='$email_user', `pass_user`='$pass_user', `ava_user`='$ava_user' WHERE `id_user` = '$id_user'";
			$result = $mysqli->query($sql);
		}

		if (($result === True) && ($_SESSION['yes_file']) == "yes") {
			$_SESSION['edit_ok'] = "<script> alert('Ваш запрос успешен!'); </script>";
			// <i class='fa fa-times-circle' onclick ='closeQuery()'></i>
			header("Location: ./chest.php?email=".$email_user."&pass=".$pass_user);
		} else {
			$_SESSION['edit_off'] = "<script> alert('Ваш запрос провален!'); </script>";
			header("Location: ./chest.php?email=".$email_user."&pass=".$pass_user);
		}
		}
	}
// }
// } else{
// 	if (isset($edit_user)) {

// 		if (strlen($login_user) > 8 ){
// 			$_SESSION['edit_off'] = "<script> alert('Введите корректное имя пользователя! Не больше 8 знаков'); </script>";
// 			header("Location: ./chest.php?email=".$email_user."&pass=".$pass_user);
// 		} 

// 		$sql = "UPDATE `users` SET `login_user`='$login_user',`email_user`='$email_user', `pass_user`='$pass_user', WHERE `id_user` = '$id_user'";
// 		$result = $mysqli->query($sql);
		
	
// 		if ($result === True) {
// 			$_SESSION['edit_ok'] = "<script> alert('Ваш запрос успешен!'); </script>";
// 			// <i class='fa fa-times-circle' onclick ='closeQuery()'></i>
// 			header("Location: ./chest.php?email=".$email_user."&pass=".$pass_user);
// 		} else {
// 			$_SESSION['edit_off'] = "<script> alert('Ваш запрос провален!'); </script>";
// 			header("Location: ./chest.php?email=".$email_user."&pass=".$pass_user);
// 		}
// 	}
// }