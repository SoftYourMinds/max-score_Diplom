<?php 
session_start();
require_once "connect.php";
// if($_SESSION['user']){

// }else{
// 	require_once "validate_user.php";
// }

$email_user = $_POST['email_user'];
$pass_user = $_POST['pass_user'];
$login = $_POST['login_user'];

$sql = ("SELECT * FROM `users` WHERE `email_user` = '$email_user' AND `pass_user` = '$pass_user'");
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();

if ((count($user) == 0) && ($_SESSION['user'] != "on")) {
		$_SESSION['user'] = "off";
		$_SESSION['login_user_error'] = "<script> alert('Такого пользователя не существует!');
			login.style.background = 'rgb(243, 5, 5, 0.500)';
			email.style.background = 'rgb(243, 5, 5, 0.500)';
		</script>";
		header('Location: ./login_user.php');
	} else {
		$_SESSION['user'] = "on";
	}



// $_SESSION['user_email'] = $_POST['email_user'];
// $email_user = $_SESSION['user_email'];
if($email_user){
	$sql = "SELECT * FROM `users` WHERE `email_user` = '$email_user' AND `cat_user` = 1";
	$result = $mysqli->query($sql);
	while($row = $result->fetch_object()){
		$email_user = $row->email_user;
		$ava_user = $row->ava_user;
		$id_user = $row->id_user;
		$login_user = $row->login_user;
		$pass_user = $row->pass_user;
		$_SESSION['id_user'] = $id_user;
	}
} else{
	$id = $_GET['id_user'];
	$sql = "SELECT * FROM `users` WHERE `id_user` = '$id' AND `cat_user` = 1";
	$result = $mysqli->query($sql);
	while($row = $result->fetch_object()){
		$email_user = $row->email_user;
		$ava_user = $row->ava_user;
		$id_user = $row->id_user;
		$login_user = $row->login_user;
		$pass_user = $row->pass_user;
		$_SESSION['id_user'] = $id_user;
	}
	
}




$result = $mysqli->query("SELECT * FROM `history` WHERE `id_user` = '$id_user'");
$k= mysqli_num_rows($result);
// echo $k;


// echo $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style\main1.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@900&display=swap');
		* {
			box-sizing: border-box;
		}

		html {
			min-height: 100vh;
		}


		body {
			padding: 0px;
			margin: 0px;
			color: white;
			background-color: rgba(13, 24, 46, 1);
			font-family: 'Roboto Mono', monospace;
		}
		
table {
	margin: 0px;
	padding: 0px;
	width: 100%;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.521);
	border-radius: 10px;
	border: 2px solid rgba(0, 183, 255, 0.623);
	text-align: center;
	border: 2px solid rgb(0, 183, 255);
}

th, td {
	padding: 15px;
	background-color: rgba(255, 255, 255, 0.2);
	color: #fff;
	cursor: pointer;
}

th {
	/* align-items: flex-end; */
	/* border: 1px solid rgba(0, 0, 0, 0.096); */
}

thead {
	border-right: 2px solid rgb(0, 183, 255);
	border-left: 2px solid rgb(0, 183, 255);

	/* border-left: 1px solid rgba(0, 0, 0, 0.096); */
}

tbody {
	/* border-right: 5px solid rgb(0, 183, 255);
	border-left: 5px solid rgb(0, 183, 255);
	border-bottom: 5px solid rgb(0, 183, 255); */
	background:  rgba(0, 183, 255, 0.459);
}

thead th {
	/* background-color: green; */
}

tbody tr:hover {
	background-color: rgba(255, 255, 255, 0.3);
}

tbody td {
	position: relative;
}

tbody td:hover:before {
	content: "";
	position: absolute;
	left: 0;
	right: 0;
	top: -9999px;
	bottom: -9999px;
	background-color: rgba(255, 255, 255, 0.2);
	z-index: -1;
}

	</style>
	<title>Personal Area</title>
</head>
<body>
<div class="header">
		

<div class="admin-info2">

			<a href="index.php"><i class="fa fa-reply"></i></a>
			<span>Вернуться</span>
		</div>
		<div class="info">
			<div class="h-logo">

				<span class="h-l-s1">MAX</span>
				<span class="h-l-s2">SCORE</span>

			</div>


		</div>
		
		
	</div>
<?php
		if ($_SESSION['edit_off']) {
			echo $_SESSION['edit_off'];
		}
		unset($_SESSION['edit_off']);

		if ($_SESSION['edit_ok']) {
			echo $_SESSION['edit_ok'];
		}
		unset($_SESSION['edit_ok']);
		?>
	<div class ="vneshka-user" >
		<h1 id="h-info">Личная Информация <i class ="fa fa-user"></i> </h1> 
		
		<div class="info-user" id="info-user1" >
			<div class = "logo-user" >
				<img src="<?php echo $ava_user;?>">
			</div>
			
				<div class="cont-info-user">
					<div class="koef">
						<span class="sig"><i class="fa fa-envelope"></i>email:</span>
						<div class="user-name">
							
							<i><?php echo $email_user;?></i>
						</div>
					</div>
					
					<div class="koef">
						<span class="sig"><i class="fa fa-soccer-ball-o"></i>login:</span>
						<div class="user-name">
							
							<i><?php echo $login_user;?></i>
						</div>
					</div>
					<span class="sig1"><a id ="edit">Изменить <i class="fa fa-pencil"></i></a><a id ="back" href = "chest2.php">Выйти <i class=" fa fa-share-square-o"></i></a></span>
				</div>
			
		</div>


		<div id="info-user2" style="display: none;">
			<form id ="all" action ="obrobka.php" method="post" enctype="multipart/form-data">	
			<?php

					echo "<img class='img_edit' src=" . $ava_user . " width=150 height=150><br>";

					?>
			<div class="group mb-1">
					

					
					<label for="exampleInputEmail1" class="form-label"><i class="fa fa-smile-o"></i>logo</label><br>
					<input name="filename1" type="file" class="form-control" id="inputGroupFile01">
				</div>
				<div class="cont-info-user">
					<div class="koef">
						<div class="group mb-1">
							<label for="exampleInputEmail1" class="form-label"><i class="fa fa-envelope"></i>email:</label>
							<input value="<?php echo $email_user;?>" type="email" name="email_user" class="form-control form-control-sm" placeholder="" aria-label=".form-control-sm example" required>
						</div>
					</div>
					
					<div class="koef">
						<div class="group mb-1">
							<label for="exampleInputEmail1" class="form-label"><i class="fa fa-soccer-ball-o"></i>login:</label>
							<input value="<?php echo $login_user;?>" type="text" name="login_user" class="form-control form-control-sm" placeholder="" aria-label=".form-control-lg example" required>
						</div>
					</div>

					<div class="koef">
						<div class="group mb-1">
							<label for="exampleInputEmail1" class="form-label"><i class="fa fa-eye"></i>password:</label>
							<input value="<?php echo $pass_user; ?>" type="text" name="pass_user" class="form-control form-control-sm" placeholder="" aria-label=".form-control-lg example" required>
						</div>
					</div>
					
					<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
					<input type="hidden" name="ava_user" value="<?php echo $ava_user; ?>">

					<div class="mb-4">
						<a id="cancel" class="btn btn-outline-light">Отмена</a>
						<input id="save" type="submit" name="done_edit_user" value="Сохранить" class="btn btn-outline-light">
					</div>
				</form>
					<!-- <span class="sig1"><a id ="save">Сохранить<i class="fa fa-pencil"></i></a><a id ="cancel" href = "index.php">Отмена <i class=" fa fa-share-square-o"></i></a></span> -->
			</div>
			
		</div>

		<!-- <h1 id="h-info">История Матчей</h1> -->
		<div class='vneshka-stat'>
			<table>
				<thead>
					<tr>
					<th>&nbsp</th>
					<th><h1 id="h-info"><i class="fa fa-server"></i>История Матчей <?php  echo $k;?></h1></th>
					<th>&nbsp</th>
					</tr>
				</thead>
				<tbody>
					
		<?php 
		
			$sql = "SELECT * FROM `history` WHERE `id_user`='$id_user' ORDER BY `id_history` DESC";
			$result = $mysqli->query($sql);

			
			while($row = $result->fetch_object()){
				$t1 = $row->team1;
				$t2 = $row->team2;
				$score = $row->score;
				$data = $row->date;
			
				echo "
				<tr> 
				<td></td>
				<td class='dt'>".$data."</td>
				<td></td>
				</tr>
				
					<tr class='gr-sc'>
						
						
							<td calss='tm1'>".$t1."</td>
							<td class='sc'>".$score."</td>
							<td calss='tm2'>".$t2."</td>
						
					</tr>
				
				";

			}
		?>
		</tbody>
			</table>
		</div>
		
	</div>
	<script>
	


		var edit = document.getElementById('edit');
		edit.addEventListener("click", function(){
			var edit = document.getElementById('info-user2').style.display ="block";
			var a = document.getElementById('info-user1').style.display ="none";
		});

		var cancel = document.getElementById('cancel');
		cancel.addEventListener("click", function(){
			var edit = document.getElementById('info-user1').style.display ="";
			var a = document.getElementById('info-user2').style.display ="none";
		});
	</script>
</body>
</html>
