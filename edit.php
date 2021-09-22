<?php
session_start();
require_once "connect.php";
$id = $_GET['id'];
$_SESSION['update_id'] = $id;

$_SESSION["admin_email"] = $_GET['admin'];

$select = $_GET['select'];
if ($select == "del_team") {
	$sql = "DELETE FROM `statistics` WHERE `id_statistics` = '$id'";
	$result = $mysqli->query($sql);
	header('Location: ./adminka.php');
}
if ($select == "del_admin") {
	$sql = "DELETE FROM `users` WHERE `id_user` = '$id'";
	$result = $mysqli->query($sql);
	header('Location: ./adminka.php');
}
if ($select == "del_user") {
	$sql = "DELETE FROM `users` WHERE `id_user` = '$id'";
	$result = $mysqli->query($sql);
	header('Location: ./adminka.php');
}

$sql = "SELECT * FROM `statistics` WHERE `id_statistics` = '$id'";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
	$id_stat = $row->id_statistics;

	$teams_name = $row->teams_name;
	$teams_logo = $row->teams_logo;
	$_SESSION['teams_logo'] = $teams_logo;


	$wins = $row->wins;
	$draws = $row->draws;
	$loses = $row->loses;

	$wins_first_time = $row->wins_first_time;
	$draws_first_time = $row->draws_first_time;
	$loses_first_time = $row->loses_first_time;

	$wins_sec_time = $row->wins_sec_time;
	$draws_sec_time = $row->draws_sec_time;
	$loses_sec_time = $row->loses_sec_time;

	$goals = $row->goals;
	$loses_goals = $row->loses_goals;
}

$sql = "SELECT * FROM `users` WHERE `id_user`='$id'";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
	$id_user = $row->$id_user;

	$cat_user = $row->$cat_user;

	$email_user = $row->email_user;
	$pass_user = $row->pass_user;
	$user_ava = $row->user_ava;
}
?>

<!DOCTYPE html>
<html>

<head>

	<title>MaxScore\Admin</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style/adminka.css">
</head>


<body>

	<h1 id="chest"><?php echo $select; ?></h1>


	<!-- HEADER -->
	<div class="header">
		<div class="info">
			<div class="h-logo">

				<span class="h-l-s1">MAX</span>
				<span class="h-l-s2">SCORE</span>

			</div>


		</div>
		<div class="admin-info3">
			<span>АДМИН ПАНЕЛЬ</span>

		</div>
		<div class="admin-info2">

			<a onclick="exit()" ID="exit" href="login_admin.php"><i class="fa fa-sign-out"></i></a>
			<span>выход</span>
		</div>
	</div>

	<div class='pad'>
		<div id="form_add_team" class="border border-success">
			<h1 class="zag1">Добавление команды</h1>

			<form action="obrobka.php" method="post" enctype="multipart/form-data">

				<!-- ИМЯ -->
				<div class="group mb-1">
					<label for="exampleInputEmail1" class="form-label">Название</label>
					<input type="text" name="name_team" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
				</div>

				<!-- КАРТИНКА -->
				<div class="group mb-1">
					<label for="exampleInputEmail1" class="form-label">Логотип</label><br>
					<input name="filename" type="file" class="form-control" id="inputGroupFile01">
				</div>

				<div class="stat-wrap">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Победы</label>
						<input name="w" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Ничьи</label>
						<input name="d" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Поражения</label>
						<input name="l" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Победы в 1 тайме</label>
						<input name="w1" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Ничьи в 1 тайме</label>
						<input name="d1" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Поражения в 1 тайме</label>
						<input name="l1" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Победы во 2 тайме</label>
						<input name="w2" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>


					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Ничьи во 2 тайме</label>
						<input name="d2" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Поражения во 2 тайме</label>
						<input name="l2" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Забитые мячи</label>
						<input name="goals" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Пропущеные мячи</label>
						<input name="loses_goals" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>
				</div>

				<div class="mb-4">
					<a href="adminka.php" class="btn btn-outline-light">Назад</a>
					<input id="btb" type="submit" name="done_team" value="Добавить" class="btn btn-outline-light">
				</div>
			</form>
		</div>


		<div id="form_edit_team" class="border border-success" >
			<h1 class="zag1">Редактировать команды</h1>

			<form action="obrobka.php" method="post" enctype="multipart/form-data">

				<!-- ИМЯ -->
				<div class="group mb-1">
					<label for="exampleInputEmail1" class="form-label">Название</label>
					<input value="<?php echo $teams_name ?>" type="text" name="name_team" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
				</div>

				<!-- КАРТИНКА -->
				<div class="group mb-1">
					<label for="exampleInputEmail1" class="form-label">Логотип</label><br>

					<?php

					echo "<img src=" . $teams_logo . " width=100 height=100><br><br>";

					?>
					<input name="filename" type="file" class="form-control" id="inputGroupFile01">
				</div>

				<div class="stat-wrap">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Победы</label>
						<input value="<?php echo $wins;  ?>" name="w" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Ничьи</label>
						<input value="<?php echo $draws;  ?>" name="d" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Поражения</label>
						<input value="<?php echo $loses;  ?>" name="l" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Победы в 1 тайме</label>
						<input value="<?php echo $wins_first_time; ?>" name="w1" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Ничьи в 1 тайме</label>
						<input value="<?php echo $draws_first_time; ?>" name="d1" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Поражения в 1 тайме</label>
						<input value="<?php echo $loses_first_time; ?>" name="l1" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Победы во 2 тайме</label>
						<input value="<?php echo $wins_sec_time; ?>" name="w2" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>


					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Ничьи во 2 тайме</label>
						<input value="<?php echo $draws_sec_time; ?>" name="d2" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Поражения во 2 тайме</label>
						<input value="<?php echo $loses_first_time; ?>" name="l2" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Забитые мячи</label>
						<input value="<?php echo $goals; ?>" name="goals" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Пропущеные мячи</label>
						<input value="<?php echo $loses_goals;  ?>" name="loses_goals" type="number" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
					</div>
				</div>


				<div class="mb-4">
					<a href="adminka.php" class="btn btn-outline-light">Назад</a>
					<input id="btb" type="submit" name="done_update_team" value="Сохранить" class="btn btn-outline-light">
				</div>
			</form>
		</div>

		<div id="form_add_admin" class="border border-success">
			<h1 class="zag1">Добавление нового Администратора</h1>

			<form action="obrobka.php" method="post" enctype="multipart/form-data">

				<!-- ИМЯ -->
				<div class="group mb-1">
					<label for="exampleInputEmail1" class="form-label">Электронный адрес</label>
					<input type="email" name="name_email" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
				</div>

				<div class="group mb-1">
					<label for="exampleInputEmail1" class="form-label">Пароль</label>
					<input type="pass" name="pass_admin" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
				</div>

				<div class="mb-4">
					<a href="adminka.php" class="btn btn-outline-light">Назад</a>
					<input id="btb" type="submit" name="done_add_admin" value="Добавить" class="btn btn-outline-light">
				</div>
			</form>
		</div>

		<div id="form_edit_admin" class="border border-success">
			<h1 class="zag1">Редактировать Администратора</h1>

			<form action="obrobka.php" method="post" enctype="multipart/form-data">

				<!-- ИМЯ -->
				<div class="group mb-1">
					<label for="exampleInputEmail1" class="form-label">Изменить электронный адрес</label>
					<input value="<?php echo $email_user; ?> " type="email" name="name_email_new" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
				</div>

				<div class="group mb-1">
					<label for="exampleInputEmail1" class="form-label">Изменить пароль</label>
					<input value="<?php echo $pass_user; ?>" type="text" name="pass_admin_new" class="form-control form-control-lg" placeholder="" aria-label=".form-control-lg example" required>
				</div>

				<div class="mb-4">
					<a href="adminka.php" class="btn btn-outline-light">Назад</a>
					<input id="btb" type="submit" name="done_edit_admin" value="Сохранить" class="btn btn-outline-light">
				</div>
			</form>
		</div>
	</div>
	<!-- СКРИПТЫ  -->
	<!-- Бутстрап -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

	<script>
		var b = document.getElementById('chest').innerHTML;
		if (b == "add_team") {
			function go() {
				var a = document.getElementById('form_add_team');
				a.style.display = 'block';
				var l = document.getElementById('form_edit_team').style.display = "none";
			}
			go();
		} else if (b == "edit_team") {
			function go() {
				var l = document.getElementById('form_edit_team').style.display = "block";
			}
			go();
		} else if (b == "add_admin") {
			function go() {
				var a = document.getElementById('form_add_admin');
				a.style.display = 'block';
				var l = document.getElementById('form_edit_team').style.display = "none";
			}
			go();
		} else if (b == "edit_admin") {
			function go() {
				var a = document.getElementById('form_edit_admin');
				a.style.display = 'block';
				var l = document.getElementById('form_edit_team').style.display = "none";
			}
			go();
		}

		function exit() {
			var a = "<?php unset($_SESSION['admin_email']);  ?>";
		}
	</script>
</body>

</html>