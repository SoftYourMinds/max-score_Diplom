<?php
session_start();
require_once "connect.php";

$user_id = $_POST['id_user'];
echo "<div>".$user_id."</div>";
// $_SESSION['id_user'] = $_GET['id_u'];
// function get(){
// 	require_once "connect.php";
	// if($_SESSION['id_user']){
	// 	$team1 = $_POST['team1'];
	// 	$team2 = $_POST['team2'];
	// 	$time= $_POST['time'];
	// 	$score = $_POST['score'];
	// 	$id_user = $_SESSION['id_user'];
	// 	if($team1 != ''){
	// 		$sql ="INSERT INTO `history` (`team1`, `team2`, `score`, `date`, `id_user`) VALUES  ('$team1', '$team2', '$score', '$time', '$id_user')";
	// 		$result =$mysqli->query($sql);
	// 		return $result;
	// 	}
	// }

	// print_r($_POST);
// }
// $btn1 = $_POST['btn1'];
// if(isset($btn1)){
// 	get();
// }
// echo $_SESSION['id_user'];
// echo $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Max-score.com</title>
	
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style\main1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.google.com/icons?selected=Material%20Icons%20Outlined%3Aaccount_box">
	<link rel="stylesheet" href="style\main2.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">



	<style>


		.footer{
			width: 100%;
			margin-top: 60px;
			height: 40px;
			font-size: 10px;
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			align-items: center;
			background-color: rgba(13, 24, 46);
			padding-left: 60px;
			padding-right: 60px;
			opacity: 0.8;
			color: black;

		}
		.footer a {
			text-decoration: none;
			color: black;
			padding: 0px;
			margin: 0px;
		}


	
	</style>
</head>
	
<body>
	<div class="header">

		<div class="h-logo">
			<span class="h-l-s1">MAX</span>
			<span class="h-l-s2">SCORE</span>
		</div>

		<div class="navigation">
			<a href="index.php">
				<div class="n-num">ГЛАВНАЯ</div>
			</a>
			<div  onmouseenter="dropMenu()" onmouseleave="cleanMenu()" class="n-num">

				ПРОГНОЗИ
				<div id="myDropdown" class="dropdown-content">
				
						<a  href='#mat-prognoz'>Математический</a>
						<a  href='#stat-prognoz'>Аналитический</a>
				
					</div>
				
			</div>

			<div onmouseenter="dropMenu2()" onmouseleave="cleanMenu2()" class="n-num">

				АВТОРИЗАЦИЯ
				<div id="myDropdown2" class="dropdown-content2">
				<?php
					if($_SESSION['id_user']){
						$id= $_SESSION['id_user'];
				$sql = "SELECT * FROM `users` WHERE `id_user` = '$id'";
				$result = $mysqli->query($sql);
				while($row = $result->fetch_object()){
					$login = $row->login_user;
					$email_user = $row->email_user;
					$ava_user = $row->ava_user;
					$id_user = $row->id_user;
					$pass=$row->pass_user;
				}	
					echo "<a href ='chest.php?email=".$email_user."&pass=".$pass."'>ВХОД</a>
						<a href ='chest.php?email=".$email_user."&pass=".$pass."'>РЕГИСТРАЦИЯ</a>";
					}
					else{	
						echo "
						<a href='login_user.php'>ВХОД</a>
						<a href='signup_user.php'>РЕГИСТРАЦИЯ</a>";
					}

					
				?>
				</div>


			</div>

			<a href="#bottom">
				<div class="n-num">ИНФОРМАЦИЯ</div>
			</a>
		</div>
<!-- 
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
			<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
			<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
		</svg> -->
		<?php
			if($_SESSION['id_user']){
				$id= $_SESSION['id_user'];
				$sql = "SELECT * FROM `users` WHERE `id_user` = '$id'";
				$result = $mysqli->query($sql);
				while($row = $result->fetch_object()){
					$login = $row->login_user;
					$email_user = $row->email_user;
					$ava_user = $row->ava_user;
					$id_user = $row->id_user;
					$pass=$row->pass_user;
				}
				
				echo "<a href ='chest.php?email=".$email_user."&pass=".$pass."'><div>
					<img id='lg' width = '40px' height ='40px' src = '".$ava_user."'>
					
					</div>
					</a>
				";
			}
			else {
				echo "<a href ='login_user.php'><i class='fa fa-user'></i></a>";
			}
		?>
	

	</div>

	<div class="content">
		<div class="c-sign">УЗНАЙ ПОБЕДИТЕЛЯ</div>

		<div class="c-nav">
			<i class="c-arrow" onclick="clickLeft()">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-left">
					<path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z" />
				</svg>
			</i>

			<div id="c-tool1" class="c-tool1">СТАТИСТИКА КОМАНД</div>

			<i class="c-arrow" onclick="clickRight()">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-right">
					<path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z" />
				</svg>
			</i>
		</div>

		<a href="#stat-prognoz" id="setii"><button class="c-btn">ПЕРЕЙТИ</button></a>
		<a name ="mat-prognoz"></a>
	</div>


	<div class="venshka" id="venshka">
	<div class="math-prognoz">
		
	<span class="math-prognoz-h">МАТЕМАТИЧЕСКИЕ ПРОГНОЗЫ</span>
		<div class="prognoz">
			<div class="team1">
			
		
				<div class="logo1" ><img  src="images/football_PNG52775.png" id="logo1" alt="логотип команды" class="href"></div> 
				<!-- <span class="name-team1" id="name_team1">Команда1</span>
				<div class ="alert-error1" id="alert_error1"></div> -->
			

			</div>
			<div class ="cont-score">
				<div class="rahunok">
					<div class="rahunok-first" id="rahunok_first">0</div>
					<div class="v">V</div>

					<div class="s">S</div>
					<div class="rahunok-second" id="rahunok_second">0</div>

				</div>
			</div>
			<div class="team2">

				<div class="logo2"><img id="logo2" src="images/football_PNG52775.png" alt="логотип команды" class="href"></div> <!-- ЛОГОТИП -->
				<!-- <div class="name-team2" id="name_team2">Команда2</div>
				<div class ="alert-error2" id="alert_error2"></div> -->
			</div>
		</div>

		<div class ='t-names'>
			<span class="name-team1" id="name_team1">Команда1</span>
			<span class="name-team2" id="name_team2">Команда2</span>
		</div>
		<!-- <img src="images\Football manager by McDonald's (create your own team).png"> -->
			<div class ="cont">
				<div>
					
			
				
				<div class ="alert-error1" id="alert_error1"></div>
			
				<input type="text" id="search-team1"  onkeyup="tableSearch1()" placeholder="Выберите команду">
				<table id ='teams1' style="display: none" class="team_searches1">
					<?php
					$sql = "SELECT * FROM `statistics`";
					$result = $mysqli->query($sql);
					while ($row = $result->fetch_object()) {
						$team_name = $row->teams_name;
						$id= $row->id_statistics;
						
						$teams_logo = $row->teams_logo;
		
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
						echo "<tr class='str-name1'>";
						echo "<td class='id-team1' id =".$id." >
						<input type='hidden' value = ".$id.">
						<input type='hidden' value = ".$teams_logo.">
						<input type='hidden' value = ".$team_name.">
						<input type='hidden' value = ".$wins.">
						<input type='hidden' value = ".$draws.">
						<input type='hidden' value = ".$loses.">
						<input type='hidden' value = ".$wins_first_time.">
						<input type='hidden' value = ".$draws_first_time.">
						<input type='hidden' value = ".$loses_first_time.">

						<input type='hidden' value = ".$wins_sec_time.">
						<input type='hidden' value = ".$draws_sec_time.">
						<input type='hidden' value = ".$loses_sec_time .">

						<input type='hidden' value = ".$goals.">
						<input type='hidden' value = ".$loses_goals .">

						".$team_name ."</td>";
						
						// echo "<td class='id-team1' >". $team_name . "<input type ='hidden' value='".$id."'></td>";
						echo "</tr>";
					}
					?>
				</table>
			</div>
				
				
			<div class ="plays" id = "play">СЫГРАТЬ</div>
		
				<a name ="stat_match"></a>	
				<!-- // <form id='zbs' action ='' method='post'> 
					<form id='zbs' action ='' method='post' onsubmit='send() return: false'> -->
			<div>

				
				<div class ="alert-error2" id="alert_error2"></div>
				<input type="text" id="search-team2"  onkeyup="tableSearch2()" placeholder="Выберите команду">

				<table id ='teams2'  class="team_searches2" style="display: none">
					<?php
					$sql = "SELECT * FROM `statistics`";
					$result = $mysqli->query($sql);
					while ($row = $result->fetch_object()) {
						$team_name = $row->teams_name;
						$id= $row->id_statistics;
					
						$teams_logo = $row->teams_logo;
		
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
						echo "<tr class='str-name2'>";
						echo "<td class='id-team2' id =".$id." >
						<input type='hidden' value = ".$id.">
						<input type='hidden' value = ".$teams_logo.">
						<input type='hidden' value = ".$team_name.">
						<input type='hidden' value = ".$wins.">
						<input type='hidden' value = ".$draws.">
						<input type='hidden' value = ".$loses.">
						<input type='hidden' value = ".$wins_first_time.">
						<input type='hidden' value = ".$draws_first_time.">
						<input type='hidden' value = ".$loses_first_time.">

						<input type='hidden' value = ".$wins_sec_time.">
						<input type='hidden' value = ".$draws_sec_time.">
						<input type='hidden' value = ".$loses_sec_time .">

						<input type='hidden' value = ".$goals.">
						<input type='hidden' value = ".$loses_goals .">

						".$team_name ."</td>";
						
						// echo "<td class='id-team1' >". $team_name . "<input type ='hidden' value='".$id."'></td>";
						echo "</tr>";
					}
					?>
				</table>
			</div>
			
			
	</div> 
	<?php 
				if($_SESSION['id_user']){
					echo "
					<form id='zbs' action ='some.php' method='POST'>
						<input id='off' type ='hidden' name='ou' value='on'>
						<input class='t1' id='t1' type='hidden' name='team1' value=''>
						<input class='t2' id='t2' type='hidden' name='team2' value=''>
						<input class='time' id='time' type ='hidden' name='time' value=''>
						<input calss='score' id='score' type ='hidden' name='score' value=''>
						<input id='id123' type ='hidden' name='id_user' value='".$id_user."'>
						<input class='give' id='give' TYPE ='hidden' value='Добавить в истрию'>
					</form>";
				}else{
                	echo "<input class='give' id='give' type='hidden' value='no'>";
                }
	
			?>
	<div class='stat' id="stat">
				<div class="show-stat" id="show_stat">ПОКАЗАТЬ СТАТИСТИКУ КОМАНД</div>
				<i id="arrow_down" class ="fa fa-chevron-down" style ="display: block"></i>
				<i id="arrow_up" class ="fa fa-chevron-up" style ="display: none"></i>
	</div>
		<table class="show-stat-table" id="show_stat_table" style="display: none">
				<thead>
					<tr class="green">
						<th id="stat-name1"></th>
						<th class="stat-name">Название команды</th>
						<th id="stat-name2"></th>
					</tr>
				</thead>
				<tbody>

					<!-- WINS -->
					<tr class="red" id="s2">
						<td id ="w11" class="please"></td>
						<td align ="center" class="please"  id="1s"> Победы</td>
						<td id="w22" class="please"></td>
					</tr>

					<!-- DRAWS -->
					<tr class="red"  id="s3">
						<td id ="d11" class="please"></td>
						<td align ="center" class="please" id="2s">Ничьи</td>
						<td id ="d22" class="please"></td>
					</tr>

					<!-- LOSES -->
					<tr class="red" id="s4">
						<td id ="l11" class="please"></td>
						<td align ="center" class="please" id="3s">Поражения</td>
						<td id ="l22" class="please"></td>
					</tr>
					<!-- WINS FIRST TIME -->
					<tr class="red" id="s5">
						<td id="w1_1" class="please"></td>
						<td align ="center" class="please" id="4s" > Победы в 1 тайме</td>
						<td  id="w1_2" class="please" ></td>
					</tr>
					<!-- DRAWS FIRST TIME -->
					<tr class="red" id="s6">
						<td id="d1_1" class="please"></td>
						<td align ="center" class="please" id="5s"> Ничьи в 1 тайме</td>
						<td  id="d1_2" class="please"></td>
					</tr>
					<!-- LOSES FIRST TIME -->
					<tr class="red" id="s7">
						<td id="l1_1" class="please"></td>
						<td align ="center" class="please" id="6s">Поражения в 1 тайме</td>
						<td id ="l1_2" class="please"></td>
					</tr>
					
					<!-- WINS SECOND TIME -->
					<tr class="red" id="s8">
						<td id="w2_1" class="please"></td>
						<td align ="center" class="please" id="7s"> Победы во 2 тайме</td>
						<td  id="w2_2" class="please"></td>
					</tr>
					<!-- DRAWS SECOND TIME -->
					<tr class="red" id="s9">
						<td id="d2_1" class="please"></td>
						<td align ="center" class="please" id="8s"> Ничьи во 2 тайме</td>
						<td  id="d2_2" class="please"></td>
					</tr>
					<!-- LOSES SECOND TIME -->
					<tr class="red" id="s10">
						<td id="l2_1" class="please"></td>
						<td align ="center" class="please" id="9s">Поражения  во 2 тайме</td>
						<td id ="l2_2" class="please"></td>
					</tr>
					
					<!-- GOALS FIRST TIME -->
					<tr class="red" id="s11">
						<td id ="g1_1" class="please"></td>
						<td align ="center" class="please" id="10s"> Забитые голы</td>
						<td id ="g1_2" class="please"></td>
					</tr >
					
			<!-- LOSEЫ GOALS FIRST TIME -->
					<tr class="red"  id="s12">
						<td id="lg_1" class="please"></td>
						<td align ="center" class="please" id="11s">Пропущеные голы</td>
						<td class="please" id="lg_2"></td>
					</tr>
					
				</tbody>
		</table>

		</div>

			<!-- <div class ="alert-error" id="alert_error"></div> -->
			<a name="stat-prognoz"></a>
	</div>


	
			<input type='hidden' id = 'wins1' value = "">
			<input type='hidden' id ='draws1' value = "">
			<input type='hidden' id = 'loses1' value = "">
			<input type='hidden' id = 'wins_first_time1' value = "0">
			<input type='hidden' id = 'draws_first_time1' value = "0">
			<input type='hidden' id = 'loses_first_time1' value = "0">
			<input type='hidden' id = 'wins_sec_time1' value = "0">
			<input type='hidden' id = 'draws_sec_time1' value = "0">
			<input type='hidden' id = 'loses_sec_time1' value = "0">
			<input type="hidden" id="goals1" value="">
			<input type="hidden" id="loses_goals1" value="">
			
			<input type='hidden' id = 'wins2' value = "">
			<input type='hidden' id ='draws2' value = "">
			<input type='hidden' id = 'loses2' value = "">
			<input type='hidden' id = 'wins_first_time2' value = "0">
			<input type='hidden' id = 'draws_first_time2' value = "0">
			<input type='hidden' id = 'loses_first_time2' value = "0">
			<input type='hidden' id = 'wins_sec_time2' value = "0">
			<input type='hidden' id = 'draws_sec_time2' value = "0">
			<input type='hidden' id = 'loses_sec_time2' value = "0">
			<input type="hidden" id="goals2" value="">
			<input type="hidden" id="loses_goals2" value="">
		
		</div>
		
	</div>

	
<!-- КОНТЕНТ -->
<h1 class="text">СТАТИСТИКА КОМАНД</h1>
<div class ="out-content">


	<div class = "cards">
		<?php 
			$sql = "SELECT * FROM `statistics` where `wins` >= 6";
			$result = $mysqli->query($sql);
			while ($row = $result->fetch_object()) {
				$team_name = $row->teams_name;
				$id= $row->id_statistics;
			
				$teams_logo = $row->teams_logo;

				$wins = $row->wins;
				$wins = $wins * 10;
				$draws = $row->draws;
				$loses = $row->loses;
			
			
				$goals = $row->goals;
				echo "
				<div class='card-team' id='ct-hover'>
				<div class='c-t-info'>
					<img class='c-t-logo' src=".$teams_logo.">
					<div class ='c-t-name'>
					".$team_name ."				
					</div>
				</div>
			
				<div class='c-t-stat'>
					<div>
						<span> Победы</span>
						<div class='c-t-wins'>
							".$wins."%
						</div>
					</div>
		
					<div class='c-t-goals'>
						<span> Забитые мячи</span>
						<div class='c-t-g'>
							".$goals."
						</div>
		
					</div>
				</div>
			</div>
				";
				
			}
		?>

	
	</div>

	</div>
<a name="bottom"></a>
	<div class="footer">
			<div class='link'>
				@MAX SCORE 2021
			</div>



			<div class='link'> 
			Разработчик:
				<a href="https://www.instagram.com/maks_barishov/?hl=ru"> Maxim Barisov </a>
			</div>
</div>

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
	<script src="js\anime.min.js"></script>
	<script>
		//АНИМАЦИЯ ВИПАДАЮЩЕГО ОФФЕРА 
		var cssSelector = anime({
			targets: ['c-sign', '.c-nav', '.c-btn'],
			top: '0px', // -> '250px'
			opacity: [0, 1],
			easing: 'easeInOutQuad'
		});

		var cssSelector1 = anime({
			targets: '.c-sign',
			top: '0px', // -> '250px'
			opacity: [0, 0.6],
			easing: 'easeInOutQuad'
		});

		//НАВИГАЦИЯ - ВИПАДАЮЩИЙ СПИСОК 

		function dropMenu() {
			document.getElementById("myDropdown").classList.toggle("show");
			var a = document.getElementById("myDropdown");
			a.style.opacity = 1;
		}

		function cleanMenu() {
			var a = document.getElementById("myDropdown");
			a.style.opacity = 0;
		}

		function dropMenu2() {
			document.getElementById("myDropdown2").classList.toggle("show2");
			var a = document.getElementById("myDropdown2");
			a.style.opacity = 1;
		}

		function cleanMenu2() {
			var a = document.getElementById("myDropdown2");
			a.style.opacity = 0;
		}

	
		// АНИМАЦИЯ МЕНЯЮЩЕГОСЯ ЗАГОЛОВКА ОФФЕРНОЙ СТРУКТУРЫ
		var k = 0;
		var setOffer = document.getElementById('setii');

		function setHeadlines() {

			var s1 = document.getElementById('c-tool1');
			var animHl = anime({
				targets: '.c-tool1',
				opacity: [1, 0],

				easing: 'easeInOutQuad'
			});
			for (i = 0; i < 1; i++) {

				if (k == 0) {
					s1.innerHTML = "МАТЕМАТИЧЕСКИЕ ПРОГНОЗЫ";
					setOffer.href = "#mat-prognoz";
					var animHl = anime({
						targets: '.c-tool1',
						opacity: [0, 1],

						easing: 'easeInOutQuad'
					});
					k++;
				} else if (k == 1) {
					s1.innerHTML = "СТАТИСТИКА МАТЧЕЙ";
					setOffer.href = "#stat_match";
					var animHl = anime({
						targets: '.c-tool1',
						opacity: [0, 1],


						easing: 'easeInOutQuad'
					});
					k++;
				} else if (k == 2) {
					s1.innerHTML = "СТАТИСТИКА КОМАНД";
					setOffer.href = "#stat-prognoz";
					var animHl = anime({
						targets: '.c-tool1',
						opacity: [0, 1],

						easing: 'easeInOutQuad'
					});
					k = 0;
				}
			}
		}
		let timerId = setInterval(() => setHeadlines(), 5000);


		// КНОПКИ ДЛЯ ИЗМЕНЕНИЯ ПУНКОТОВ ОФФЕРНОЙ СТРУКТУРЫ
		function clickRight() {
			var s1 = document.getElementById('c-tool1');
			s1.style.right = "+400px";
			var animHl = anime({
				targets: '.c-tool1',
				opacity: [1, 0],

				easing: 'easeInOutQuad'
			});

			setTimeout(() => {
				clearInterval(timerId), 5000
			});
			for (i = 0; i < 1; i++) {

				if (k == 0) {
					s1.innerHTML = "МАТЕМАТИЧЕСКИЕ ПРОГНОЗЫ";
					setOffer.href = "#mat-prognoz";
					var animHl1 = anime({
						targets: '.c-tool1',
						opacity: [0, 1],
						right: 0

					});
					k++;
				} else if (k == 1) {
					s1.innerHTML = "СТАТИСТИКА МАТЧЕЙ";
					setOffer.href = "#stat_match";
					var animHl1 = anime({
						targets: '.c-tool1',
						opacity: [0, 1],
						right: 0

					});
					k++;
				} else if (k == 2) {
					s1.innerHTML = "СТАТИСТИКА КОМАНД";
					setOffer.href = "#stat-prognoz";
					var animHl1 = anime({
						targets: '.c-tool1',
						opacity: [0, 1],
						right: 0

					});
					k = 0;
				}
			}
		}

		function clickLeft() {
			var s1 = document.getElementById('c-tool1');
			s1.style.right = "-400px";
			var animHl = anime({
				targets: '.c-tool1',
				opacity: [1, 0],

				easing: 'easeInOutExpo'
			});


			setTimeout(() => {
				clearInterval(timerId), 5000
			});
			for (i = 0; i < 1; i++) {

				if (k == 0) {
					s1.innerHTML = "МАТЕМАТИЧЕСКИЕ ПРОГНОЗЫ";
					setOffer.href = "#mat-prognoz";
					var animHl1 = anime({
						targets: '.c-tool1',
						opacity: [0, 1],
						right: 0

					});
					k++;
				} else if (k == 1) {
					s1.innerHTML = "СТАТИСТИКА МАТЧЕЙ";
					setOffer.href = "#stat_match";
					var animHl1 = anime({
						targets: '.c-tool1',
						opacity: [0, 1],
						right: 0

					});
					k++;
				} else if (k == 2) {
					s1.innerHTML = "СТАТИСТИКА КОМАНД";
					setOffer.href = "#stat-prognoz";
					var animHl1 = anime({
						targets: '.c-tool1',
						opacity: [0, 1],
						right: 0

					});
					k = 0;
				}
			}
		}
		
		function tableSearch1() {
			var phrase = document.getElementById('search-team1');
			var table = document.getElementById('teams1');
			var regPhrase = new RegExp(phrase.value, 'i');
			var flag = false;
			for (var i = 1; i < table.rows.length; i++) {
				flag = false;
				for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
					flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
					if (flag) break;
				}
				if (flag) {
					table.rows[i].style.display = "";

				} else {
					table.rows[i].style.display = "none";
				}

			}
		}
		
		var teams1= document.getElementById('teams1');
		var search_team1 = document.getElementById('search-team1');
		search_team1.addEventListener("click", function() {
			var teams1= document.getElementById('teams1');
			var isMenuShow = teams1.style.display;
			search_team1.style.borderRight = "2px solid #d53a54";
			search_team1.style.borderLeft = "2px solid #d53a54";
			search_team1.style.borderTop = "2px solid #d53a54";
				search_team1.style.transition = "0.3s";
			search_team1.style.borderBottom = "none";
		
    		if (isMenuShow == "none"){
				teams1.style.display = "block";

				var join1= anime({
					targets: ['#teams1'],
					
					opacity: [0,1],
				
					easing: 'easeInOutQuad'
				});
			 }
			 	if(give.value != "no"){

					give.type = "hidden";
      		}
		});


		function tableSearch2() {
			var phrase = document.getElementById('search-team2');
			var table = document.getElementById('teams2');
			var regPhrase = new RegExp(phrase.value, 'i');
			var flag = false;
			for (var i = 1; i < table.rows.length; i++) {
				flag = false;
				for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
					flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
					if (flag) break;
				}
				if (flag) {
					table.rows[i].style.display = "";

				} else {
					table.rows[i].style.display = "none";
				}

			}
		}
		
		var teams2= document.getElementById('teams2');
		var search_team2 = document.getElementById('search-team2');
		search_team2.addEventListener("click", function() {
			var teams2= document.getElementById('teams2');
			var isMenuShow = teams2.style.display;
			search_team2.style.borderRight = "2px solid #66d53a";
			search_team2.style.borderLeft = "2px solid #66d53a";
			search_team2.style.borderTop = "2px solid #66d53a";
			search_team2.style.transition = "0.3s";
			search_team2.style.borderBottom = "none";
    		if (isMenuShow == "none"){
				teams2.style.display = "block";

				var  join2 = anime({
					targets: ['#teams2'],
					
					opacity: [0,1],
					easing: 'easeInOutQuad'
				});
			 }
			 	if(give.value != "no"){

					give.type = "hidden";
      		}
		});

		document.onclick = function(e){
			if((e.target != search_team1)&&( e.target != search_team2)){
				teams1.style.display = "none";
				teams2.style.display = "none";
				
				search_team1.style.border = "none";
				search_team1.style.borderBottom = "2px solid #d53a54";
				search_team1.style.transition = "0.3s";

				search_team2.style.border = "none";
				search_team2.style.borderBottom = "2px solid #66d53a";
				search_team2.style.transition = "0.3s";
			
			}
		}		

		var give = document.getElementById('give');
		//===============1


		var vivod1= document.getElementById('goals1');
		var vivod2= document.getElementById('loses_goals1');

		var vivod3 = document.getElementById('wins1');
		var vivod4 = document.getElementById('draws1');
		var vivod5 = document.getElementById('loses1');

		var vivod6 = document.getElementById('wins_first_time1');
		var vivod7 = document.getElementById('draws_first_time1');
		var vivod8 = document.getElementById('loses_first_time1');

		var vivod9 = document.getElementById('wins_sec_time1');
		var vivod10 = document.getElementById('draws_sec_time1');
		var vivod11 = document.getElementById('loses_sec_time1');
		
		var name_team1= document.getElementById("name_team1");
		var logo1 = document.getElementById('logo1');

		// var catch1 = document.getElementById('search-team1');
		var a = document.querySelectorAll('.id-team1');
		var info = new Array();
  		for(i=0; i<a.length; i++){
			a[i].addEventListener('click', function(e){ // Вешаем обработчик клика на UL, не LI
				var id = e.target.id; // Получили ID, т.к. в e.target содержится элемент по которому кликнули
				var selector = document.getElementById(id).className;
				var go = "."+selector +" input";
				var b = document.querySelectorAll(go);
				for(j = 0; j<b.length; j++){
					info[j] = b[j].value;
				}
			
				for(j = 0; j<b.length; j++){
					if( info[j] == id){
						var u = j;
						var statistic1= new Map([
							['id', info[u++]],
							['logo', info[u++]],
							['name', info[u++]],
							['wins', info[u++]],
							['draws', info[u++]],
							['loses', info[u++]],
							['wins_first_time', info[u++]],
							['draws_first_time', info[u++]],
							['loses_first_time', info[u++]],
							['wins_sec_time', info[u++]],
							['draws_sec_time', info[u++]],
							['loses_sec_time', info[u++]],
							['goals', info[u++]],
							['loses_goals', info[u++]]
						]);  
						break;
				
					}

				}	

				var move1= anime({
					targets: ['.team1'],
					left: "10px",
					
					
					boxhadow: "none",
					opacity: [0,1],
					
					easing: 'easeInOutQuad'
				});
				var move_1= anime({
					targets: ['#name_team1'],
					right: "0px",
			
					
					boxhadow: "none",
					opacity: [0,1],
					
					easing: 'easeInOutQuad'
				});


			

				
				for (let value of statistic1.values()) {
					name_team1.innerHTML = statistic1.get('name');

					logo1.src = statistic1.get('logo');
										
					var wins1 = statistic1.get('wins');
					var draws1 = statistic1.get('draws');
					var loses1 = statistic1.get('loses');

					var wins_first_time1 = statistic1.get('wins_first_time');
					var draws_first_time1 = statistic1.get('draws_first_time');
					var loses_first_time1 = statistic1.get('loses_first_time');

					var wins_sec_time1= statistic1.get('wins_sec_time');
					var draws_sec_time1 = statistic1.get('draws_sec_time');
					var loses_sec_time1 = statistic1.get('loses_sec_time');

					var goals1 = statistic1.get('goals');
					var loses_goals1 = statistic1.get('loses_goals');


					
					vivod1.value = goals1; 
					vivod2.value = loses_goals1;
					vivod3.value = wins1;
					vivod4.value = draws1;
					vivod5.value = loses1;
					vivod6.value = wins_first_time1;
					vivod7.value = draws_first_time1;
					vivod8.value = loses_first_time1;
					vivod9.value = wins_sec_time1;
					vivod10.value = draws_sec_time1;
					vivod11.value = loses_sec_time1;
				
					
					var gymp1 = document.getElementById('stat-name1').innerHTML =statistic1.get('name');
					var gymp2 = document.getElementById('w11').innerHTML =wins1;
					var gymp3 = document.getElementById('d11').innerHTML =draws1;
					var gymp4 = document.getElementById('l11').innerHTML =loses1;
					var gymp6 = document.getElementById('w1_1').innerHTML = wins_first_time1;
					var gymp7 = document.getElementById('d1_1').innerHTML =draws_first_time1;
					var gymp8 = document.getElementById('l1_1').innerHTML = loses_first_time1;
					var gymp9 = document.getElementById('w2_1').innerHTML = wins_sec_time1;
					var gymp10 = document.getElementById('d2_1').innerHTML =draws_sec_time1;
					var gymp11 = document.getElementById('l2_1').innerHTML = loses_sec_time1;
					var gymp12 = document.getElementById('g1_1').innerHTML = goals1;
					var gymp13 = document.getElementById('lg_1').innerHTML =loses_goals1;


				
				}
		
			
			});

			
		}

//==============2
		var vivod10= document.getElementById('goals2');
		var vivod20= document.getElementById('loses_goals2');

		var vivod30 = document.getElementById('wins2');
		var vivod40 = document.getElementById('draws2');
		var vivod50 = document.getElementById('loses2');

		var vivod60 = document.getElementById('wins_first_time2');
		var vivod70 = document.getElementById('draws_first_time2');
		var vivod80 = document.getElementById('loses_first_time2');

		var vivod90 = document.getElementById('wins_sec_time2');
		var vivod100 = document.getElementById('draws_sec_time2')
		var vivod110 = document.getElementById('loses_sec_time2');

		var name_team2 = document.getElementById("name_team2");
		var logo2 = document.getElementById('logo2');
		// var catch1 = document.getElementById('search-team1');
		var a = document.querySelectorAll('.id-team2');
		var info = new Array();
  		for(i=0; i<a.length; i++){
			a[i].addEventListener('click', function(e){ // Вешаем обработчик клика на UL, не LI
				var id = e.target.id; // Получили ID, т.к. в e.target содержится элемент по которому кликнули
				selector = document.getElementById(id).className;
				go = "."+selector +" input";
				var b = document.querySelectorAll(go);
				for(j = 0; j<b.length; j++){
					info[j] = b[j].value;
				}
				// var statistic = new Map();
				for(j = 0; j<b.length; j++){
					if( info[j] == id){
						var u = j;
						var statistic2= new Map([
							['id', info[u++]],
							['logo', info[u++]],
							['name', info[u++]],
							['wins', info[u++]],
							['draws', info[u++]],
							['loses', info[u++]],
							['wins_first_time', info[u++]],
							['draws_first_time', info[u++]],
							['loses_first_time', info[u++]],
							['wins_sec_time', info[u++]],
							['draws_sec_time', info[u++]],
							['loses_sec_time', info[u++]],
							['goals', info[u++]],
							['loses_goals', info[u++]]
						]);  
						break;
					}
				}	
				var move2= anime({
					targets: ['.team2'],
					right: "10px",
					
					
					boxhadow: "none",
					opacity: [0,1],
					
					easing: 'easeInOutQuad'
				});
				var move_2= anime({
					targets: ['#name_team2'],
					left: "0px",
			
					
					boxhadow: "none",
					opacity: [0,1],
					
					easing: 'easeInOutQuad'
				});
				
				for (let value of statistic2.values()) {
					name_team2.innerHTML = statistic2.get('name');
					logo2.src = statistic2.get('logo');
					var wins2 = statistic2.get('wins');
					var draws2 = statistic2.get('draws');
					var loses2 = statistic2.get('loses');

					var wins_first_time2 = statistic2.get('wins_first_time');
					var draws_first_time2 = statistic2.get('draws_first_time');
					var loses_first_time2 = statistic2.get('loses_first_time');

					var wins_sec_time2= statistic2.get('wins_sec_time');
					var draws_sec_time2 = statistic2.get('draws_sec_time');
					var loses_sec_time2 = statistic2.get('loses_sec_time');

					var goals2 = statistic2.get('goals');
					var loses_goals2 = statistic2.get('loses_goals');

					vivod10.value = goals2; 
					vivod20.value = loses_goals2;
					vivod30.value = wins2;
					vivod40.value = draws2;
					vivod50.value = loses2;
					vivod60.value = wins_first_time2;
					vivod70.value = draws_first_time2;
					vivod80.value = loses_first_time2;
					vivod90.value = wins_sec_time2;
					vivod100.value = draws_sec_time2;
					vivod110.value = loses_sec_time2;
				
					var gymp1 = document.getElementById('stat-name2').innerHTML =statistic2.get('name');
					var gymp2 = document.getElementById('w22').innerHTML =wins2;
					var gymp3 = document.getElementById('d22').innerHTML =draws2;
					var gymp4 = document.getElementById('l22').innerHTML =loses2;
					var gymp6 = document.getElementById('w1_2').innerHTML = wins_first_time2;
					var gymp7 = document.getElementById('d1_2').innerHTML =draws_first_time2;
					var gymp8 = document.getElementById('l1_2').innerHTML = loses_first_time2;
					var gymp9 = document.getElementById('w2_2').innerHTML = wins_sec_time2
					var gymp10 = document.getElementById('d2_2').innerHTML =draws_sec_time2;
					var gymp11 = document.getElementById('l2_2').innerHTML = loses_sec_time2;
					var gymp12 = document.getElementById('g1_2').innerHTML = goals2;
					var gymp13 = document.getElementById('lg_2').innerHTML =loses_goals2;
				}
				if(give.value == "Добавить в истрию"){
					give.type = "hidden";
      		}				
			});
		}

		// ==========СЫГРАТЬ 


		function formatDate(date) {
			var monthNames = [
				"01", "02", "03",
				"04", "05", "06", "07",
				"08", "09", "10",
				"11", "12"
			];

			var day = date.getDate();
			var monthIndex = date.getMonth();
			var year = date.getFullYear();

			return day + '.' + monthNames[monthIndex] + '.' + year;
		}
      	var give = document.getElementById('give');
		
		var name_team1= document.getElementById("name_team1");
		var name_team2 = document.getElementById("name_team2");

		var play = document.getElementById('play');
		var error1 = document.getElementById("alert_error1");
		var error2 = document.getElementById("alert_error2");
		play.addEventListener('click', function(){
			error1.innerHTML = " ";
			error2.innerHTML = " ";
          	if(give.value != "no"){
					give.type = "hidden";
      		}
			
			if((name_team2.innerHTML == "Команда2")&&(name_team1.innerHTML == "Команда1")){
				console.log("1");
				error1.innerHTML = "Выбирете команду!";
				error2.innerHTML = "Выбирете команду!";
				if(give.value != "no"){
					give.type = "hidden";
      			}
				
			} else if((name_team1.innerHTML == "Команда1")&&(name_team2.innerHTML != "Команда2")){
					error1.innerHTML = "Выбирете команду!";
					if(give.value != "no"){
						give.type = "hidden";
      				}
					console.log("1");
				} else if((name_team2.innerHTML == "Команда2")&&(name_team1.innerHTML != "Команда1")){
					error2.innerHTML = "Выбирете команду!";
					if(give.value != "no"){
						give.type = "hidden";
      				}
					console.log("1");
				} else if(( name_team2.innerHTML == name_team1.innerHTML)&&(name_team2.innerHTML != "Команда2")&&(name_team1.innerHTML != "Команда1")){
				console.log("1");
				if(give.value != "no"){
						give.type = "hidden";
      				}
				error1.innerHTML = "Выбирете другую команду!";
				error2.innerHTML = "Выбирете другую команду!";
			} else{
              if(give.value != "no"){
						give.type = "submit";
      				}
			
				error1.innerHTML = " ";
				error2.innerHTML = " ";

			


	//СЧИТАЕМ ПРОГНОЗ 
				var n = 10;
				var g1 = document.getElementById('goals1').value;
				var lg1 = document.getElementById('loses_goals1').value;
				var g2 = document.getElementById('goals2').value;
				var lg2 = document.getElementById('loses_goals2').value;

				// // let gs = ((Number(g2)+Number(lg2))/(2));
				// let gs = Number(g2);
				// let ls = gs*10;
				// console.log(gs);
				// console.log(g1);
				// console.log(lg2);
				// console.log(ls);
			

					var all_goals = (Number(g1)+Number(g2))/2; //СЕРЕДНЄ АРИФМЕТИЧНЕ
					var kz2= (Number(lg2)/Number(g1));// СИЛА ОБОРОНИ
					var kg2= Number(g2) * Number(kz2) * Number(all_goals); //СЕРЕДНЯ КІЛЬКІСТЬ ЗАБИТИХ
					var ls = Number(kg2);
					console.log(ls);

					// var all_goals = (Number(g1)*Number(g2))/2;
					// var kz1  = ((Number(lg1)/Number(g2)));//коэфициент защитыж
					
					// var kg1= Number(g1) * Number(kz1) * Number(all_goals);
					// var l = Number(kg1);
					// console.log(l);

					var factorial = 1;

					var P1 = new Array();
					for (i = 0; i < 5; i++) {
						
						if (i == 0) {
							P1[i] = Math.exp(-ls);
						} else {

							for (n = 1; n <= i; n++) {
								factorial = factorial  * n;
							}

							P1[i] = (((Math.pow(ls, i) / factorial) *  Math.exp(-ls)));
						}
					}

					var score2 = document.getElementById('rahunok_second');
					
					
					var max2 = Math.max.apply(null, P1);


					Array.max= function(array){

    					var max2= Math.max.apply( Math, P1 );

					};

					console.log(P1);
					console.log(max2);

					for(i=0; i<5; i++){

						console.log(Math.round(P1[i]*100)+"%");

					}
					for(i = 0; i<5; i++){
						if(P1[i] == max2){
							
							score2.innerHTML = i;
							var move_2_1= anime({
							targets: ['.rahunok-second', '.rahunok-first'],
							
							opacity: [0,1]
	
						
						});
						}
					}


					//==================2 команда

				var g1 = document.getElementById('goals1').value;
				var lg1 = document.getElementById('loses_goals1').value;
				var g2 = document.getElementById('goals2').value;
				var lg2 = document.getElementById('loses_goals2').value;

				// let g = ((Number(g1)+Number(lg2))/(2));
				// let g = Number(g1);
				// let l = g*10;
				// 	console.log(g);
				// console.log(g1);
				// console.log(lg2);
				// console.log(l);
				
				// коэфициент атаки g1
				// коэфициент защиты kz1 = lg1/g2;
					var all_goals = (Number(g1)+Number(g2))/2;
					var kz1  = ((Number(lg1)/Number(g2)));//коэфициент защитыж
					
					var kg1= Number(g1) * Number(kz1) * Number(all_goals);
					var l = Number(kg1);
					console.log(l);

			
			


					var factorial = 1;

					var P = new Array();
					for (i = 0; i < 5; i++) {
						
						if (i == 0) {
							P[i] = Math.exp(-l);
						} else {

							for (n = 1; n <= i; n++) {
								factorial = factorial  * n;
							}

							P[i] = (((Math.pow(l, i) / factorial) *  Math.exp(-l)));
						}
					}
					
					for(i=0; i<5; i++){

						console.log(Math.round(P[i]*100)+"%");
						
					}
		
					var score1 = document.getElementById('rahunok_first');
					
					
					var max1 = Math.max.apply(null, P);


					Array.max= function(array){

    					var max1=  Math.max.apply( Math, P );

					};

					console.log(P);
					console.log(max1);
					


					
					for(i = 0; i<5; i++){
						if(P[i] == max1){
						
						var move_2_1= anime({
							targets: ['.rahunok-second', '.rahunok-first'],
							
							opacity: [0,1]
	
						
						});

							score1.innerHTML = i;
						}
					}
					
					if(give.value != "no"){
						var off = document.getElementById('off').value;	
					if(off =="on"){
						
						var data =  new Date();
						var hours = data.getHours();
						var minutes = data.getMinutes();


						if (hours < 10) hours = '0' + hours;
						if (minutes < 10) minutes = '0' + minutes;
						var score = document.getElementById('score').value = score1.innerHTML+" : "+score2.innerHTML;
						var time =document.getElementById('time').value = formatDate(data)+" "+hours+":"+minutes;
						var ut1 = document.getElementById('t1').value =  name_team1.innerHTML;	
						var ut2 = document.getElementById('t2').value =  name_team2.innerHTML;
						var tm = formatDate(data);
						var id = document.getElementById('id123').value;
				
						console.log(score);
						console.log(time);
						console.log(ut1);
						console.log(ut2);
						console.log(tm);

						// let form = document.getElementById('zbs');
						// form.submit();
					// 	$.ajax({
					// 	method: "POST",
					// 	url: "some.php",
					// 	data: { 
					// 		team1: ut1,
					// 		team2: ut2,
					// 		time: tm,
					// 		score: score,
					// 		id_user: id 
					// 	}
						
					// }).done( function(){
								
						
					// });
					
						
						
						
					}
				}


// let form = document.getElementById('zbs');
						// form.submit();
						// send();
					
					
			}		
				
			
		});

	


		var btnShowStatistic = document.getElementById('stat');
		var tableShowStatistic = document.getElementById('show_stat_table');

		btnShowStatistic.addEventListener('click', function(){
			error1.innerHTML = " ";
			error2.innerHTML = " ";
			if((name_team2.innerHTML == "Команда2")&&(name_team1.innerHTML == "Команда1")){
				console.log("1");
				error1.innerHTML = "Выбирете команду!";
				error2.innerHTML = "Выбирете команду!";
		
			} else if((name_team1.innerHTML == "Команда1")&&(name_team2.innerHTML != "Команда2")){
					error1.innerHTML = "Выбирете команду!";
					console.log("1");
				} else if((name_team2.innerHTML == "Команда2")&&(name_team1.innerHTML != "Команда1")){
					error2.innerHTML = "Выбирете команду!";
					console.log("1");
				} else if(( name_team2.innerHTML == name_team1.innerHTML)&&(name_team2.innerHTML != "Команда2")&&(name_team1.innerHTML != "Команда1")){
				console.log("1");
				error1.innerHTML = "Выбирете другую команду!";
				error2.innerHTML = "Выбирете другую команду!";
			} else{
			
				error1.innerHTML = " ";
				error2.innerHTML = " ";

				// tableShowStatistic.style.display= none;
				var arrow_down = document.getElementById('arrow_down');
				var arrow_up = document.getElementById('arrow_up');



				if (tableShowStatistic.style.display == "none"){
					
				
						console.log(0);
						tableShowStatistic.style.top = "1020px";
						tableShowStatistic.style.display = "block";
						arrow_up.style.display = "block";
						arrow_down.style.display = "none";
						var venshka = document.getElementById('venshka');
						venshka.style.height = "1050px";
						arrow_down.style.transition ="0.5s";
						var join123= anime({
							targets: ['#show_stat_table'],
							
							top: '1070px',
							opacity: [0,1],
							duration: 1000,
							easing: 'easeInOutQuad'
						});
			 		
				}
				else{
					var venshka = document.getElementById('venshka');

					
					venshka.style.height = "600px";
					tableShowStatistic.style.top = "1020px";
					tableShowStatistic.style.display = "none";

					arrow_up.style.display = "none";
					arrow_down.style.display = "block";
					arrow_up.style.transition ="0.5s";
					
					var join1234= anime({
						targets: ['#show_stat_table'],
				
						opacity: [1,0],
					
						easing: 'easeInOutQuad'
					});
				
				}

			
			}		
				
			
		});	
	
		var arr = [];

$(".red").each(function() {
  arr.push(this.id);
});

var childClases = [];
$(".please").each(function() {
  childClases.push(this.id);
});



console.log(arr);


// for(i=0; i<arr.length; i++){
	// $(document).ready(function() {
	// 	$("#"+arr[i]).bind('click', function() {
	// 		console.log(arr[i]);
	// 	} 
	// )});
// 	var number = document.getElementById(arr[i]);
// 	console.log(number.className);
// }
var clasesids=[];
var amoung = document.querySelectorAll(".please");
for(i=0; i <amoung.length; i++){

	amoung[i].addEventListener("mouseover", function(e){
		var idsel = e.target.id;
		// var z = document.getElementById(id);
		console.log(idsel);
		// console.log(amoung[j].id);
		for(j=0; j<amoung.length; j++){
		
			clasesids[j] = amoung[j].id;
			console.log(j+" "+clasesids[j]);
			// console.log(idsel);
			if((amoung[j].id == idsel)&&(amoung[j].align =="center")){
				var p = j;
				console.log(p);
			}
		}
		// console.log(amoung[q1]);
		// console.log(amoung[q2]);
		for(j=0; j<amoung.length; j++){
			var q1 = p-1;
			var q2 = p+1;
			
			// console.log(amoung[q1]);
			// console.log(amoung[q2]);
					
		}
	   var end1 = document.getElementById(amoung[q1].id);
		var end2 = document.getElementById(amoung[q2].id);
		
		if(Number(end1.innerText)>Number(end2.innerText)){
			end1.style.color = "#66d53a";
			end2.style.color = "red";
			end1.style.textShadow = "0 0 2px white";
			// end2.style.textShadow = "0 0 5px white";
			end1.style.transition = "0.3s";
			end2.style.transition = "0.3s";
		}else if(Number(end1.innerText)<Number(end2.innerText)){
			end1.style.color = "red";
			end2.style.color = "#66d53a";
			// end1.style.textShadow = "0 0 5px white";
			end2.style.textShadow = "0 0 2px white";
			end1.style.transition = "0.3s";
			end2.style.transition = "0.3s";
		}
		else{
			end1.style.color = "rgb(166, 81, 245)";
			end2.style.color = "rgb(166, 81, 245)";
			end1.style.textShadow = "0 0 5px black";
			end2.style.textShadow = "0 0 5px black";
			end1.style.transition = "0.3s";
			end2.style.transition = "0.3s";
	 	}
		// end1.style.color = "red";
		// console.log(end1.style.color);

		
		
		// var z = document.getElementById(id);
		// var id2 = e.target.id > "td:nth-child(3)";
		// console.log(z.innerText);
	});
}


var amoung = document.querySelectorAll(".please");
for(i=0; i <amoung.length; i++){

	amoung[i].addEventListener("mouseout", function(e){
		var idsel = e.target.id;
		// var z = document.getElementById(id);
		console.log(idsel);
		// console.log(amoung[j].id);
		for(j=0; j<amoung.length; j++){
		
			clasesids[j] = amoung[j].id;
			console.log(j+" "+clasesids[j]);
			// console.log(idsel);
			if((amoung[j].id == idsel)&&(amoung[j].align =="center")){
				var p = j;
				console.log(p);
			}
		}
		// console.log(amoung[q1]);
		// console.log(amoung[q2]);
		for(j=0; j<amoung.length; j++){
			var q1 = p-1;
			var q2 = p+1;
			// console.log(amoung[q1]);
			// console.log(amoung[q2]);
					
		}
	   var end1 = document.getElementById(amoung[q1].id);
		var end2 = document.getElementById(amoung[q2].id);
		end1.style.color = "";
		end2.style.color = "";
		end1.style.textShadow = "";
			end2.style.textShadow = "";
		// console.log(end1.style.color);

		
		
		// var z = document.getElementById(id);
		// var id2 = e.target.id > "td:nth-child(3)";
		// console.log(z.innerText);
	});
}



	// var a = document.querySelectorAll("."+number.className);
	
	// number.addEventListener("mouseover", function(e){
		
		//var a = document.querySelector('#'+arr[i]+' > td:nth-child(1)').id;
		
		//console.log(e.target.querySelectorAll.className);
	// });
// }


// var arr = [];
// var cla = [];





// console.log(arr);
// var getStat  = document.querySelectorAll(".red");
// for(i=0; i<21; i++){
// 		getStat.addEventListener("mouseover", function(){
// 				a1 = document.getElementById(arr[i]).innerHTML;
// 				a2 = document.getElementById(arr[i+1]).innerHTML;
// 			if(a1>a2){
// 				console.log("a1>a2");
// 			}else if(a2>a1){
// 				console.log("a2>a1");
// 			}
// 			else{
// 				console.log("a2=a1");
// 			}
// 		});
	
// 	}
	

// var selector = [];
//  var element1 = [];
//  var element2 = [];
		// var t = document.getElementById("show_stat_table");
		// getStat  = document.getElementsByClassName(".red");
		// for(i=0; i<arr.length; i++){
		// 	element1[i]= document.querySelector('#'+arr[i]+' > td:nth-child(1)').id;
		// 	element2[i]= document.querySelector('#'+arr[i]+' > td:nth-child(3)').id;
		// 	console.log(element1[i]);
		// 	console.log(element2[i]);
		

		// }
		// for(i=0; i<arr.length; i++){
		// 	selector[i] = document.getElementById(arr[i]);
		// 	selector[i].addEventListener("mouseover", function(){
			
				
		// 		element1= document.querySelector('#'+arr[i]+' > td:nth-child(1)').id;
		// 		element2= document.querySelector('#'+arr[i]+' > td:nth-child(3)').id;
		// 		console.log(element1);
		// 		console.log(element2);
		// 	});

		// }
			// arr[i].addEventListener("mouseover", function(e){ // Вешаем обработчик клика на UL, не LI
				// e.target = document.querySelectorAll('td');
				// console.log(getStat.className);
				// var ia = e.target.id;
				// console.log(ia);
				// selector = document.getElementById(ia).className;
				// idChest.querySelectorAll('.please');
	
				// for(i = 0; i < selector.length; i++){
					
				// 	console.log(selector[i].id);
				// }
				//var id = e.target.id; // Получили ID, т.к. в e.target содержится элемент по которому кликнули
 				//document.querySelector('#test strong').innerHTML = id; // For example
			// });
		// }

	
	
	</script>

	
</body>

</html>