<?php
	session_start();
	
	if (!isset($_SESSION['loginnow']))
	{
		header('Location: index.php');
		exit();
	}
	
	$idQuiz = $_POST['idQuiz'];
	$score = $_POST['scorePlayer'];
	$player = $_SESSION['id'];
	
	$level = 0;//Brak dostępu do ponownego wykonania quizu dla wartosci 0
	
	require_once "connect.php";

	
	$conn = new mysqli($host, $db_user, $db_password, $db_name);
	$conn -> query('SET NAMES utf8');
	$conn -> query('SET CHARACTER_SET utf8_unicode_ci');
			
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
			
	$insUpdate = "UPDATE games SET access='$level' WHERE idplayer='$player' AND idquiz='$idQuiz'";
	$insInsert = "INSERT INTO `score`(`idplayer`, `idquiz`, `score`) VALUES ('$player','$idQuiz','$score')";
	
	$conn->query($insUpdate); 
	$conn->query($insInsert); 
	
	$conn->close(); 
	
	$_SESSION['quizStart'] = false;
	
	//session_unset();
?>