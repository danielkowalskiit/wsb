<?php
	session_start();

	if ((isset($_SESSION['admin'])) && ($_SESSION['admin']==true))
	{
		header('Location: admin.php');
		exit();
	}
?>
<!doctype html>
<html lang="pl">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="../main-style.css">
		<link rel="stylesheet" href="../css/fontello.css">
		<title>Quiz | Admin</title>
		<link rel="shortcut icon" href="images/favico.png" />
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center" style="margin: 50px auto">
				<div class="col-12 col-sm-12 col-md-6 col-lg-5 box-content-left text-center">
					<i class="icon-user-circle-o"></i>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-5 box-content">
					<form id="logIn" method="POST" action="index.php">
						<div class="form-group">
							<label for="exampleInputLogin">Login</label>
							<input type="text" class="form-control" id="exampleInputLogin" name="login" placeholder="Podaj Login">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword">Hasło</label>
							<input type="password" class="form-control" id="exampleInputPassword" name="haslo" placeholder="Podaj hasło">
						</div>
						<button type="submit" name="btn-login" class="btn col-12">Zaloguj się<i class="icon-right-open" style="font-size: 12px;"></i></button>
					</form>
					<?php 
						if(isset($_POST['btn-login']))
						{
							if($_POST['login']=="admin" && $_POST['haslo']=="adm")
							{
								session_start();
								$_SESSION['admin'] = true;
								header('Location: admin.php');
							}
							else
							{
								echo '<label id="errorLog" class="text-danger">Niepoprawne dane <i class="icon-emo-unhappy"></i> Spróbuj jeszcze raz !</label>';
							}
						}
					?> 
				</div>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="../js/main-script.js"></script>		
	</body>
</html>