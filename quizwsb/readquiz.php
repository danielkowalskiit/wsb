<?php
session_start();
$_SESSION['quizStart'] = true;

require_once "connect.php";

$conn = new mysqli($host, $db_user, $db_password, $db_name);
$conn -> query('SET NAMES utf8');
$conn -> query('SET CHARACTER_SET utf8_unicode_ci');
								
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

$idQuiz = $_POST['idQuiz'];

$ins = "SELECT namequiz FROM filesquiz where id='$idQuiz'"; 
								
$resalt = $conn->query($ins);
								
if($resalt->num_rows > 0)
{
	while($row = $resalt -> fetch_assoc())
	{
		echo $row["namequiz"];
	}
}
else
{
	echo "";
}		
?>