<?php
require_once "connect.php";

// print_r($_POST);
	$team1 = $_POST['team1'];
	$team2 = $_POST['team2'];
	$time= $_POST['time'];
	$score = $_POST['score'];
	$id = $_POST['id_user'];
	// echo $team1;
	// echo $team2;
	// echo $time;
	if($team1 != ''){
		$sql ="INSERT INTO `history` (`team1`, `team2`, `score`, `date`, `id_user`) VALUES  ('$team1', '$team2', '$score', '$time', '$id')";
		$result =$mysqli->query($sql);
	}
	$_SESSION['id_user'] = $id;
	header('Location: ./index.php#mat-prognoz');


