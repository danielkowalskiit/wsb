<?php
	session_start();
	if (!isset($_SESSION['admin']))
	{
		header('Location: ../index.php');
	}
	
	if (!isset($_POST['inputSurname']) || !isset($_POST['inputLogin']) || !isset($_POST['inputPassword']))
	{
		header('Location: ../index.php'); 
	}
	else
	{
	
		require_once "crypto_script.php";
		
		$firstname = $_POST['inputFirstname'];
		$surename = $_POST['inputSurname'];
		$login = $_POST['inputLogin'];
		$password = $_POST['inputPassword'];
		
		$cryptPassword = crypto("encrypt",$password);
		
		require_once "../../connect.php";

		
		$conn = new mysqli($host, $db_user, $db_password, $db_name);
		$conn -> query('SET NAMES utf8');
		$conn -> query('SET CHARACTER_SET utf8_unicode_ci');
				
		if($conn->connect_error){
			die("Connection failed: ".$conn->connect_error);
		}
				
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$conn->query(
		sprintf("SELECT * FROM player WHERE login='%s'",
		mysqli_real_escape_string($conn,$login))))
		{
			$countPlayer = $rezultat->num_rows;
			if($countPlayer >0)
			{	
				echo '<span class="text-danger">*Podany Login już istnieje. Proszę podać inny</span>';
			}
			else
			{
				$ins = "INSERT INTO player SET firstname='$firstname', surname='$surename', login='$login', password='$cryptPassword'";
				$conn->query($ins); 
				echo '<span class="text-success">*Nowego Gracza dodano pomyślnie</span>';
			}
		}
		
		$conn->close();
	}
?>