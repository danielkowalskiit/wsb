<?php
	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: index.php');
		exit();
	}

	require "connect.php";

	$conn = @new mysqli($host, $db_user, $db_password, $db_name);	

	if ($conn->connect_errno!=0)
	{
		echo "Error: ".$conn->connect_errno;
	}
	else
	{	
		require "./admin/modules/crypto_script.php";
		
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
		
		$password = crypto("encrypt",$password);
		
		if ($rezultat = @$conn->query(
		sprintf("SELECT * FROM player WHERE login='%s' AND password='%s'",
		mysqli_real_escape_string($conn,$login),
		mysqli_real_escape_string($conn,$password))))
		{
			$countUsers = $rezultat->num_rows;
			if($countUsers >0)
			{	
				$_SESSION['loginnow'] = true;
				$rows = $rezultat->fetch_assoc();
				
				$_SESSION['id'] = $rows['id'];
				$_SESSION['firstname'] = $rows['firstname'];
				$_SESSION['surname'] = $rows['surname'];
					
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: instruction.php');

			} else {
				
				$_SESSION['errorLog'] = '*Hm... Chyba się pomyliłeś <i class="icon-emo-unhappy"></i> Spróbuj jeszcze raz !';
				header('Location: index.php');
				
			}	
		}
		
		$conn->close();
	}
?>