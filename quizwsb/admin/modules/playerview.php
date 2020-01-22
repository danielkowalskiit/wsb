<?php 
	if (!isset($_SESSION['admin']))
	{
		header('Location: ../index.php');
	}
	

	require_once "./../connect.php";
	require_once "crypto_script.php";

	$conn = new mysqli($host, $db_user, $db_password, $db_name);
	$conn -> query('SET NAMES utf8');
	$conn -> query('SET CHARACTER_SET utf8_unicode_ci');
								
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}

	$ins = "SELECT * FROM player"; 
								
	$result = $conn->query($ins);

	if($result->num_rows > 0)
	{
		while($row = $result -> fetch_assoc())
		{
			//if($row["access"]==1){$l='TAK';}else{$l='NIE';}
			echo "
			<div class='col-12 mb-2 list-group'>
				<div class='row'>
					<div class='col-6 col-md-12 pl-md-4  pl-lg-4 pr-md-4'>
						<div class='row'>
							<div class='col-12 col-md-1 list-item'>ID</div>
							<div class='col-12 col-md-3 list-item'>Imię i Nazwisko</div>
							<div class='col-12 col-md-3 list-item'>Login</div>
							<div class='col-12 col-md-2 list-item'>Hasło</div>
						</div>
					</div>
					<div class='col-6 col-md-12 pl-md-4 pl-lg-4 pr-md-4'>
						<div class='row'>
							<div class='col-12 col-md-1 list-item'>".$row["id"]."</div>
							<div class='col-12 col-md-3 list-item'>".$row["firstname"]." ".$row["surname"]."</div>
							<div class='col-12 col-md-3 list-item'>".$row["login"]."</div>
							<div class='col-12 col-md-2 list-item'>".crypto("decrypt",$row["password"])."</div>
						</div>
					</div>
				</div>
			</div>		
				";
		}
	}
	else
	{
	}	

	$conn->close();
?>