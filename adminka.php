<?php
session_start();
require_once "connect.php";
require_once "validate.php";

// $_SESSION["admin_email"]=$_GET['admin'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Max-score.com</title>

	<link rel="stylesheet" href="style\adminka.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style>
		.info a{
	color: white;
	text-decoration: none;
	cursor: pointer;
}
.admin-info {
	margin-left: 15px;
	padding-left: 10px;
	display: flex;
	flex-direction: row;
	justify-content:center;
	align-items: center;
	min-width: auto;
	height: 40px;
	border-left: 3px rgb(248, 248, 248) solid;
	cursor: default;
	border-radius: 2px;
}
	</style>
</head>

<body>

	<div class="header">
		<div class="info">
			<a href="index.php">
			<div class="h-logo">

				<span class="h-l-s1">MAX</span>
				<span class="h-l-s2">SCORE</span>

			</div>
			</a>	
			<div class="admin-info">
				<span>АДМИН ПАНЕЛЬ</span>
				<!-- <span id = "email_info" class="email-info"></span> -->
						
			</div>
			<div class="admin-info2">

				<a onclick="exit()" ID="exit" href="login_admin.php"><i class="fa fa-sign-out"></i></a>
				<span>выход</span>
			</div>
		</div>

		<div onclick="dropMenu()" onmouseleave="cleanMenu()" class="n-num">
			<div class="tools">
				<span сlass="one">ИНСТРУМЕНТЫ</span>
				<i class="fa fa-gear"></i>
			</div>

			<div id="myDropdown" class="dropdown-content">
				<!-- <hr> -->
				<a id="sortView" onclick="viewSort()" class="sort-off">
					<span class="one">сортировка</span>
					<i class="fa fa-sort-amount-asc"></i>
				</a>

				<a id="editShow" onclick="viewEdit()" class="sort-off">
					<span class="one ">изменить</span>
					<i class="fa fa-edit"></i>
				</a>
				<a id="editTrash" onclick="viewTrash()" class="sort-off">
					<span class="one">удалить</span>
					<i class="fa fa-trash-o"></i>
				</a>

				<hr class="hr2">
				<a>
					<span class="one">Добавить</span>
				</a>



				<a>


				</a>

				<?php echo "<a href='edit.php?select=add_admin&admin=".$admin_email."'>
					<span class='one' id='bog'>Администратора</span>

				</a>" ?>
				<?php echo "<a href='edit.php?select=add_team&admin=".$admin_email."'>
					<span class='one' id='bog'>Команду</span>

				</a>" ?>
			</div>
		</div>
	</div>

	<div id="result_query">
		<?php
		if ($_SESSION['query_off']) {
			echo $_SESSION['query_off'];
		}
		unset($_SESSION['query_off']);

		if ($_SESSION['query_ok']) {
			echo $_SESSION['query_ok'];
		}
		unset($_SESSION['query_ok']);
		?>

	</div>

	<div class="container">
		<div class="nav">

			<select class="aboba" id="demo" name="demo" onchange="fun1()">
				<option class="update-statistic" value="temas">Статистика команд</option>
				<option class="update-statistic" value="admin">Администраторы</option>
				<option class="update-statistic" value="users">Пользователи</option>
			</select>

			
			
			<form class="dnone" action="processing.php?admin=<?php echo $_SESSION['admin_email'];?>" method="GET">

				<button id="btn" onclick="download()" type="submit" name="btn-update">
					<span class="update"> ОБНОВИТЬ </span>
					<i id="f5" class="fa fa-repeat"></i>
				</button>
			</form>

			<input id="search-text" onkeyup="tableSearch()" placeholder="Найти" type="text">
		</div>
		<div id="table-teams">
			<table id="table-id">

				<thead>
					<tr>
						<th><div class="teams-name">
								#

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div></th>
						<th onclick="sortAZ()">
							<div class="teams-name">
								<span class="name-team">Название</span>
								<i id="sort-AZ" class="fa fa-sort-alpha-asc"></i>
								<i id="sort-ZA" class="fa fa-sort-alpha-desc"></i>
							</div>
						</th>
						<th>Логотип</th>
						<th>
							<div class="teams-name">
								<div class="circle-wins"></div>

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>
							<div class="teams-name">
								<div class="circle-draws"></div>

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>
							<div class="teams-name">
								<div class="circle-loses"></div>

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>

						</th>
						<th>
							<div class="teams-name">
								<div class="circle-wins"></div>

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>
							<div class="teams-name">
								<div class="circle-draws"></div>

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>

							<div class="teams-name">
								<div class="circle-loses"></div>

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>
							<div class="teams-name">
								<div class="circle-wins"></div>

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>
							<div class="teams-name">
								<div class="circle-draws"></div>

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>

							<div class="teams-name">
								<div class="circle-loses"></div>
								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>
							<div class="teams-name">
								<div class="circle-wins"></div>

								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>
							<div class="teams-name">
								<div class="circle-loses"></div>
								<i id="sort-ikon" class="fa fa-arrows-v"></i>

							</div>
						</th>
						<th>
							<!-- <div class="container-ok">
							<form id="ok-form" method="post" action="edit.php">
								<input class="ok-inp" name = 'chek-ok' type='submit'>
							
							</form>
							<a href="adminka.php"><i class="fa fa-minus-circle"></i></a>
						</div> -->
						</th>
					</tr>
				</thead>
				<tbody class="stat-teams">
					<?php

					$sql = 'SELECT * FROM `statistics`';
					$result = $mysqli->query($sql);

					$k = 0;
					while ($row = $result->fetch_object()) {


						echo "<tr>";
						echo "<th>";
						print $row->id_statistics . " ";
						echo "</th>";
						echo "<td >";
						// if($_SESSION){

						// }
						print $row->teams_name . " ";
						echo "</td>";

						echo "<td>";
						$var = $row->teams_logo;
						$folder = "img/save";
						echo "<img src=" . $var . " width=50 height=50>";
						echo "</td>";

						echo "<td>";
						print $row->wins . " ";
						echo "</td>";

						echo "<td>";
						print $row->draws . " ";
						echo "</td>";

						echo "<td>";
						print $row->loses . " ";
						echo "</td>";

						echo "<td>";
						print $row->wins_first_time . " ";
						echo "</td>";

						echo "<td >";
						print $row->draws_first_time . " ";
						echo "</td>";

						echo "<td >";
						print $row->loses_first_time . " ";
						echo "</td>";

						echo "<td>";
						print $row->wins_sec_time . " ";
						echo "</td>";

						echo "<td>";
						print $row->draws_sec_time . " ";
						echo "</td>";

						echo "<td>";
						print $row->loses_sec_time . " ";
						echo "</td>";

						echo "<td>";
						print $row->goals . " ";
						echo "</td>";

						echo "<td>";
						print $row->loses_goals . " ";
						echo "</td>";

						echo "<td id='edit' class='edited'>";

						$del_team = "del_team";
						$edit_team = "edit_team";
						$k++;

						echo "
							
							<div class = 'edit-btn'>
								<a  href = 'edit.php ?id=$row->id_statistics &select=$edit_team'><i id = 'pencil' class = 'fa fa-pencil'></i></a>
								<a href = 'edit.php ?id=$row->id_statistics &select=$del_team'><i id = 'trash' class = 'fa fa-trash'></i></a>
							</div>
							";
						echo "</td>";
						// <div class = 'change'>

						// 		<input class='chekbox' type='checkbox' name='chekbox[$row->id_statistics]' value=$k>


						// </div>

						// 	<div id = 'do' class='dropdown1'>
						// 	  <button class='btn btn-primary btn-sm dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
						// 	    Действие
						// 	  </button>
						// 	  <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
						// 	    <li><a class='dropdown-item' href='update_admin.php ?id=$row->adminid 
						// 	   '>Изменить</a></li>

						// 	    <li><a class='dropdown-item' href='delete_admin.php ?id= $row->adminid '>Удалить</a></li>
						// 	    </ul>
						// 	</div>";
						// echo "</td>";


					}



					//В АЛФАВИТНОМ ПОРЯДКЕ

					//ПРОГНОЗЫ НА МАТЧ
					// echo "<br><br>";
					// $n = 10;
					// $g = (1.2 + 0.8) / 2;
					// $l = $n * $g;


					// $factorial = 1;

					// for ($i = 0; $i < 4; $i++) {

					// 	if ($i == 0) {
					// 		$P[$i] = exp(-$l);
					// 	} else {

					// 		for ($n = 1; $n <= $i; $n++) {
					// 			$factorial = $factorial  * $n;
					// 		}

					// 		$P[$i] = (((pow($l, $i) / $factorial) * exp(-$l)));
					// 	}
					// }







					// print_r($P);

					// echo "<br><br>";
					// $n = 10;
					// $g = (1.5 + 1.2) / 2;
					// $l = $n * $g;


					// $factorial = 1;

					// for ($i = 0; $i < 4; $i++) {

					// 	if ($i == 0) {
					// 		$P[$i] = exp(-$l);
					// 	} else {

					// 		for ($n = 1; $n <= $i; $n++) {
					// 			$factorial = $factorial  * $n;
					// 		}

					// 		$P[$i] = (((pow($l, $i) / $factorial) * exp(-$l)));
					// 	}
					// }

					// print_r($P);

					?>
				</tbody>
			</table>
		</div>


		<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
		<div id="table-admin">
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>
							Категория пользователя
						</th>
						<th>
							Электронный адрес
						</th>
						<th>
							Пароль
						</th>

						<th>

						</th>
					</tr>
				</thead>
				<tbody class="stat-teams">
					<?php

					$sql = 'SELECT * FROM `users` WHERE `cat_user`=2';
					$result = $mysqli->query($sql);

					$k = 0;
					while ($row = $result->fetch_object()) {


						echo "<tr>";
						echo "<th>";
						print $row->id_user . " ";
						echo "</th>";
						echo "<td >";
						print $row->cat_user . " ";
						echo "</td>";

						echo "<td id='email-a'>";
						print $row->email_user . " ";
						echo "</td>";
						if ($admin == $row->email_user) {
							$id = $row->id_user;
							$cut = 1;
						} else {
							$cut = 2;
						}

						echo "<td>";
						print $row->pass_user . " ";
						echo "</td>";

						echo "<td>";
						echo "							
							<div class = 'edit-btn'>";
						if ($cut == 1) {
							echo "<a  href = 'edit.php ?id=$row->id_user &select=edit_admin&admin=$admin_email'><i id = 'pencil' class = 'fa fa-pencil'></i></a>";
						} else if ($cut == 2) {

							echo "<a  href = 'edit.php ?id=$row->id_user &select=edit_admin&admin=$admin_email'><i id = 'pencil' class = 'fa fa-pencil'></i></a>";
							echo " <a href = 'edit.php ?id=$row->id_user &select=del_admin&admin=$admin_email'><i id = 'trash' class = 'fa fa-trash'></i></a>
							</div>";
						}

						echo "</td>";

						echo "</tr>";
					}

					?>
				</tbody>
			</table>
		</div>

		<div id='table-user'>
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>
							Категория пользователя
						</th>
						<th>
							Электронный адрес
						</th>
						<th>
							Пароль
						</th>

						<th>
							Логотип
						</th>

						<th>

						</th>
					</tr>
				</thead>
				<tbody class="stat-teams">
					<?php

					$sql = 'SELECT * FROM `users` WHERE `cat_user`=1';
					$result = $mysqli->query($sql);

					$k = 0;
					while ($row = $result->fetch_object()) {


						echo "<tr>";
						echo "<th>";
						print $row->id_user . " ";
						echo "</th>";
						echo "<td >";
						print $row->cat_user . " ";
						echo "</td>";

						echo "<td>";
						print $row->email_user . " ";
						echo "</td>";

						echo "<td>";
						print $row->pass_user . " ";
						echo "</td>";

						echo "<td>";
						$var = $row->ava_user;
						$folder = "images\user_logo";
						echo "<img src=" . $var . " width=50 height=50>";
						echo "</td>";


						echo "<td>";
						echo "							
							<div class = 'edit-btn'>
								
								<a href = 'edit.php ?id=$row->id_user &select=del_user&admin=$admin_email'><i id = 'trash' class = 'fa fa-trash'></i></a>
							</div>
							";
						echo "</td>";

						echo "</tr>";
					}

					?>
				</tbody>
			</table>

		</div>
	</div>
</body>
<script src='tablesort.min.js'></script>

<!-- Include sort types you need -->
<script src='tablesort.number.js'></script>
<script src='tablesort.date.js'></script>

<script>
	new Tablesort(document.getElementById('table-id'));
</script>

<script>
	function sortAZ() {

		var a = document.getElementById('sort-AZ');
		var b = document.getElementById('sort-ZA');
		if (a.style.display == "block") {
			b.style.display = "block";
			a.style.display = "none";
		} else {
			a.style.display = "block";
			b.style.display = "none";
		}

	}

	function dropMenu() {
		document.getElementById("myDropdown").classList.toggle("show");
		var a = document.getElementById("myDropdown");
		a.style.opacity = 1;
	}

	function cleanMenu() {
		var a = document.getElementById("myDropdown");
		a.style.opacity = 0;
	}

	function tableSearch() {
		var phrase = document.getElementById('search-text');
		var table = document.getElementById('table-id');
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


	function viewSort() {
		var k1 = document.getElementById('sort-AZ');
		// var k2 = document.getElementById('sort-ikon');
		const k2 = document.getElementsByClassName('fa-arrows-v');
		var k3 = document.getElementById('sort-ZA');
		var k4 = document.getElementById('sortView').className;
		var k5 = document.getElementById('sortView');
		if (k4 == "sort-off") {
			for (i = 0; i < 11; i++) {

				k2[i].style.display = "block";

			}


			k1.style.display = "block";
			// k2.style.display = "block";
			// k5.classList.remove("sort-off");
			k5.classList.toggle("sort-on");

		} else {
			const k2 = document.getElementsByClassName('fa-arrows-v');
			for (i = 0; i < 11; i++) {

				k2[i].style.display = "none";

			}

			k1.style.display = "none";

			k3.style.display = "none";
		}
		k5.classList.remove("sort-on");
		k5.classList.toggle("sort-off");
	}

	function viewEdit() {
		// var k2 = document.getElementById('sort-ikon');
		const k2 = document.getElementsByClassName('fa-pencil');
		var k4 = document.getElementById('editShow').className;
		var k5 = document.getElementById('editShow');
		if (k4 == "sort-off") {
			for (i = 0; i < k2.length; i++) {

				k2[i].style.display = "block";

			}
			k5.classList.toggle("sort-on");

		} else {
			const k2 = document.getElementsByClassName('fa-pencil');
			for (i = 0; i < k2.length; i++) {

				k2[i].style.display = "none";

			}
		}
		k5.classList.remove("sort-on");
		k5.classList.toggle("sort-off");
	}

	function viewTrash() {
		const k2 = document.getElementsByClassName('fa-trash');
		var k4 = document.getElementById('editTrash').className;
		var k5 = document.getElementById('editTrash');
		if (k4 == "sort-off") {
			for (i = 0; i < k2.length; i++) {

				k2[i].style.display = "block";

			}
			k5.classList.toggle("sort-on");

		} else {
			const k2 = document.getElementsByClassName('fa-trash');
			for (i = 0; i < k2.length; i++) {

				k2[i].style.display = "none";

			}
		}
		k5.classList.remove("sort-on");
		k5.classList.toggle("sort-off");
	}

	function download() {
		var k4 = document.getElementById('f5').className;
		var k5 = document.getElementById('f5');

		k5.classList.remove("fa-repeat");

		k5.classList.toggle("fa-spinner");
		k5.classList.toggle("fa-spin");


	
		
	}

	
	// var spanInput = document.getElementById('admin').value;
	// var spanEmail = document.getElementById('email_info').innerHTML = spanInput;
	// var sesion = "<?php $admin="+spanInput+";?>";

	function fun1() {
		admin = document.getElementById('table-admin');
		user = document.getElementById('table-user');
		teams = document.getElementById('table-teams');
		var sel = document.getElementById('demo').selectedIndex;
		var options = document.getElementById('demo').options;
		if (options[sel].value == "admin") {
			admin.style.display = 'block';
			user.style.display = 'none';
			teams.style.display = 'none';
		} else if (options[sel].value == "users") {
			user.style.display = 'block';
			admin.style.display = 'none';
			teams.style.display = 'none';
		} else {
			teams.style.display = 'block';
			admin.style.display = 'none';
			user.style.display = 'none';
		}
	}

	function exit() {
		
	}

	function closeQuery() {
		var a = document.getElementById('result_query');
		a.style.display = "none";

	}

	
	// function goEditTeam() {
	// var a = "<?php $_COOKIE['select'] = 'edit_team'; ?>";
	// }
	// function selectEdit() {
	// 	const a = document.getElementsByClassName('edit-btn');
	// 	const b = document.getElementsByClassName('chekbox ');
	// 	for (i = 0; i < a.length; i++) {
	// 		a[i].style.display = 'none';
	// 		b[i].style.display = 'block';

	// 	}
	// }

	// function countCheckbox() {
	// 	var element = document.querySelector('input[type=checkbox]');
	// 	var array_link = array();
	// 	const b = document.getElementsByClassName('chekbox');
	// 	for (i = 0; i < b.length; i++) {
	// 		if (element.checked) {
	// 			array_link[i] = b.name;
	// 		}

	// 	}
	// 	for (i = 0; i < b.length; i++) {
	// 		consolelog(array_link[i]);
	// 	}
	// }
</script>


</html>