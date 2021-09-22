<?php



session_start();
$_SESSION["admin_email"] = $_GET['admin'];
$admin_email = $_GET['admin'];
include('simple_html_dom.php');

require_once "connect.php";
require_once "validate.php";


$html = file_get_html('https://nb-bet.com/');
//ПАРСИМ СТАТИСТИКУ ТОЛЬКО С МАТЧЕЙ КОТОРЫЕ ЕЩЁ НЕ ПЕРЕЙШИ В LIVE
$mass = array();
$count_links = 0;
$i = 1;
foreach ($html->find('a[class="a-popular-events"]') as $element) {

	$mystring = $element;
	$findme   = 'LIVE';
	$live = strpos($mystring, $findme);


	if ($live === false) {
		$count_links++;
		$link = "https://nb-bet.com/" . $element->href;
		array_push($mass, $link);
		$i++;
	}
}

$html->clear();
unset($html);



//echo "<br><br>";

if (count($link) == 0) {
	$_SESSION['query_ok'] = "<div class='alert_true'>Из <b> 0 </b> добавлено <b>0</b></div> ";
	header('Location: ./adminka.php');
} else {
	// Получаем ссылку на статистику команд, на данный момент имеем массив ссылок на матчи
	$array = array();
	$mass_link = array();
	for ($i = 0; $i < count($link); $i++) { // count($mass)
		$url = $mass[$i];
		if (!empty($url)) {
			$array[$i] = file_get_html($mass[$i]);
			$url = $array[$i];
			if (!empty($url)) {
				foreach ($array[$i]->find('a.default-color') as $k) {
					$link = 'https://nb-bet.com/' . $k->href;
					array_push($mass_link, $link);
				}
			}
		}
		// $array[$i]->clear();
	}


	// Записываем ссылки статиски команд в масиив======================================================
	$teams_link = array();

	foreach ($mass_link as $e) {
		$url = $mass_link[$i];
		if (!empty($url)) {
			$mystring = $e;
			$findme   = 'Teams';
			$Teams = strpos($mystring, $findme);

			if ($Teams !== false) {
				array_push($teams_link, $e);
			}
		}
	}

	//print_r($teams_link);
	//НАЧИНАЕМ ПАРСИТЬ ДАННЫЕ СТАТИСТИКИ КОМАНДЫ 
	//echo "<br><br>";
	$b = 0;
	if (count($teams_link) != 0) {
		for ($i = 0; $i < count($teams_link); $i++) {
			$html[$i] = file_get_html($teams_link[$i]);

			// СПАРСИЛ ИМЯ КОМАНДИ
			$ret['team_name'] = $html[$i]->find('h2.h2-title', 0)->innertext;
			$t_name = $ret['team_name'];
			//echo $ret['team_name'];

			$sql = "SELECT `teams_name` FROM `statistics` WHERE `teams_name` = '$t_name'";
			$result = $mysqli->query($sql);
			$search_team_name = $result->fetch_assoc();



			$trim = preg_replace("/\s+/", "", $ret['team_name']); // УБИРАЕМ ВСЕ НЕ НУЖНЫЕ ЗНАКСИ ЧТО БЫ ЗАПИСАТЬ КАРТИНКУ В БД

			//СПАРСИЛ ЛОГОТИП КОМАНДИ
			foreach ($html[$i]->find('img.league-image') as $e) {
				$img_src = $e->src;
			}

			$img_src_full = "https://nb-bet.com" . $img_src;
			$img = file_get_contents($img_src_full);
			$directoty = "images/teams_logo/" . $trim . ".png";
			file_put_contents($directoty, $img);
			//echo "<img src =" . $directoty . ">";

			// УЗНАЕМ С КАКОГО ПО СЧЕТУ КЛАСА НАЧИНАТЬ ПАРСИТЬ ИНФОРМАЦИЮ 
			$k = 1;
			foreach ($html[$i]->find('td.first-td-content-results') as $el) {
				$mystring = $el;
				$findme   = 'Победы';
				$pos = strpos($mystring, $findme);
				$k++;
				if ($pos !== false) {
					if ($wins % 2) {
						$wins = $k / 2;
						$wins--;
						break;
					} else {
						$wins = ($k - 1) / 2;
						$wins = $wins - 0.5;

						break;
					}
				}
			}
			// echo $wins;

			//ПАРСИМ СТАТИСТИКУ
			$statistic = array(
				"wins" => $html[$i]->find('td.td-avg-summary-with-border', $wins)->innertext,
				"draws" => $html[$i]->find('td.td-avg-summary-with-border', ++$wins)->innertext,
				"loses" => $html[$i]->find('td.td-avg-summary-with-border', ++$wins)->innertext,
				"wins_first_time" => $html[$i]->find('td.td-avg-summary-with-border', ++$wins)->innertext,
				"draws_first_time"  => $html[$i]->find('td.td-avg-summary-with-border', ++$wins)->innertext,
				"loses_first_time"  => $html[$i]->find('td.td-avg-summary-with-border', ++$wins)->innertext,
				"wins_sec_time" => $html[$i]->find('td.td-avg-summary-with-border', ++$wins)->innertext,
				"draws_sec_time"  => $html[$i]->find('td.td-avg-summary-with-border', ++$wins)->innertext,
				"loses_sec_time"  => $html[$i]->find('td.td-avg-summary-with-border', ++$wins)->innertext,
				"goals" => $html[$i]->find('td.first-td-content-results', 1)->innertext,
				"loses_goals" => $html[$i]->find('td.first-td-content-results', 3)->innertext
			);

			foreach ($statistic as $k => $v) {
				$winss = $statistic["wins"];
				$draws = $statistic["draws"];
				$loses = $statistic["loses"];

				if ($winss + $draws + $loses == 10) {
					$eror_matches_limited = "корректная статистика";
				} else if ($winss + $draws == 10) {
					$loses = 0;
					$eror_matches_limited = "корректная статистика";
				} else if ($winss == 10) {
					$draws = 0;
					$loses = 0;
					$eror_matches_limited = "корректная статистика";
				} else if ($winss + $draws + $loses > 10) {
					$winss = 5;
					$draws = 3;
					$loses = 2;
					$eror_matches_limited = "корректная статистика";
				}


				$wins_first_time = $statistic["wins_first_time"];
				$draws_first_time = $statistic["draws_first_time"];
				$loses_first_time = $statistic["loses_first_time"];
				$wins_sec_time = $statistic["wins_sec_time"];
				$draws_sec_time = $statistic["draws_sec_time"];
				$loses_sec_time = $statistic["loses_sec_time"];

				$goals = $statistic["goals"];
				$loses_goals = $statistic["loses_goals"];

				// нельзя записать в бд значение у которого есть ',' поэтому делаем проверку 
				// на на личие запятой и меняем её на точку если она есть 
				$needle = ",";
				$v_goals = strripos($goals, $needle);
				$v_lose_goals = strripos($loses_goals, $needle);

				if ($v_goals == true) {
					$goals = str_replace(',', '.', $statistic["goals"]);
				}

				if ($v_lose_goals == true) {
					$loses_goals = str_replace(',', '.', $statistic["loses_goals"]);
				}
			}

			//echo "<p>" . $t_name . " " . $directoty . " " . $winss . " " . $draws . " " . $loses . " " . $wins_first_time . " " . $draws_first_time . " " . $loses_first_time . " " . $wins_sec_time . " " . $draws_sec_time . " " . $loses_sec_time . " " . $goals . " " . $loses_goals . "</p>";

			// ПРОВЕРЯЕ ЗАПРОССЫ К БД НА УСПЕШНОСТЬ
			if ($eror_matches_limited == "корректная статистика") {
				if (count($search_team_name) == 1) {
					$sql = "UPDATE `statistics` SET `teams_name`='$t_name', `teams_logo`='$directoty', `wins`='$winss', `draws`='$draws', `loses`='$loses', `wins_first_time`='$wins_first_time', `draws_first_time`='$draws_first_time', `loses_first_time`='$loses_first_time', `wins_sec_time`='$wins_sec_time', `draws_sec_time`='$draws_sec_time', `loses_sec_time`='$loses_sec_time', `goals`=$goals, `loses_goals`='$loses_goals' WHERE `teams_name` = '$t_name'";
					$result = $mysqli->query($sql);
					if ($result === TRUE) {		// ПРОВЕРКА запрос к БД был успешный или нет 
						$validate_teams[$b] = 3;
					} else {
						$validate_teams[$b] = 2;
					}
				} else {
					$sql = "INSERT INTO `statistics`(`teams_name`, `teams_logo`, `wins`, `draws`, `loses`, `wins_first_time`, `draws_first_time`, `loses_first_time`, `wins_sec_time`, `draws_sec_time`, `loses_sec_time`, `goals`, `loses_goals`) VALUES ('$t_name', '$directoty', '$winss', '$draws', '$loses', '$wins_first_time', '$draws_first_time', '$loses_first_time', '$wins_sec_time', '$draws_sec_time', '$loses_sec_time', '$goals', '$loses_goals')";
					$result = $mysqli->query($sql);
					if ($result === TRUE) {		// ПРОВЕРКА ЗАПРОСОВ ДО БД
						$validate_teams[$b] = 1;
					} else {
						$validate_teams[$b] = 0;
					}
				}
			} else {
				$eror_matches_limited = "не корректная статистика";
				$validate_teams[$b] = 0;
			}
			$b++;

			// echo "<p>";
			// print_r($statistic);
			// echo "<p>";
		}
	}
}

$add = 0;
$edit = 0;
$false_add = 0;
$false_edit = 0;
if ($b != 0) {
	for ($z = 0; $z < $b; $z++) {
		if ($validate_teams[$z] == 1) {
			$add++;
		} else if ($validate_teams[$z] == 3) {
			$edit++;
		} else if ($validate_teams[$z] == 2) {
			$false_edit++;
		} else if ($validate_teams[$z] == 0) {
			$false_add++;
		}
	}
}



$_SESSION['query_ok'] = "<div class='alert_true'>ИЗ " . $b . " КОМАНД " . $add . " ДОБАВЛЕНО " . $false_add . " ПРОПУЩЕНО <br>ИЗ " . $b . " КОМАНД ИЗМЕНЕНО " . $edit . " ПРОВАЛЕНО " . $false_edit . "</div>";
header('Location: ./adminka.php?admin='.$admin_email.'');
//$_SESSION['query_ok'] = "<div class='alert_true'><div>ИЗ " . $b . " КОМАНД <div class='tadd'>" . $add . " ДОБАВЛЕНО</div> <div class='tnoadd'>" . $false_add . " ПРОПУЩЕНО </div><br>ИЗ " . $b . " <div class='tedit'>ИЗМЕНЕНО" . $edit . "</div> ПРОВАЛЕНО <div class='tfedit'>" . $false_edit . "</div></div></div>";
//  ИЗ " . $b . " КОМАНД изменено:" . $edit . "ИЗМЕНЕНО не успешно:" . $false_edit;

// 	$_SESSION['query_ok'] = "<div class='alert_true'>Ваш запрос успешно обработан!</div>";
// 	// <i class='fa fa-times-circle' onclick ='closeQuery()'></i>
// 	header('Location: ./adminka.php');
// } else {
// 	$_SESSION['query_off'] = "<div  class='alert-false'>Ошибка, не удалось отпраивть данные</div>";
// 	header('Location: ./adminka.php');
// }
