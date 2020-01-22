<?php
	session_start();
	
	if (!isset($_SESSION['loginnow']))
	{
		header('Location: index.php');
		exit();
	}
	
	if ((isset($_SESSION['quizStart'])) && ($_SESSION['quizStart']==true))
	{
		header('Location: quiz.php');
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
		<link rel="stylesheet" href="main-style.css">
		<link rel="stylesheet" href="css/fontello.css">
		<title>Quiz | Are you ready??</title>
		<link rel="shortcut icon" href="images/favico.png" />
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12 col-lg-10 bar-user">
					<div class="row">
						<div class="col-6">
							<i class="icon-user-circle-o lead"></i><?php echo "Witaj ".$_SESSION['firstname']; ?>
						</div>
						<div class="col-6 text-right">
							<a href="results.php" class="text-white"><i class="icon-chart-bar lead"></i> | wyniki</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-5 box-content-left text-center">
					<i class="icon-rocket"></i>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-5 box-content">
					<div class="row">
						<h3 class="col-12 text-center" style="padding-left: 0;">Zanim mnie wykonasz!</h3>
						<p class="col-12">
							<ul class="list-group col-12 box-instruction">
								<fieldset>
									<h5>Uruchomienie Quizu</h5>
									<li class="list-group-item">Każdy uczestnik Quizu ma tylko jedno podejście do każdego quizu</li>
									<li class="list-group-item">Wybranie przycisku Let's GO! przeniesie Ciebie do listy quizów, które możesz wykonać są koloru zielonego</li>
									<li class="list-group-item">Wybranie przycisku Wyjście spowoduje wylogowanie z Quizu bez wykorzystania podejścia</li>
								</fieldset>
							</ul>
						</p>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-10 box-content text-center">
					<div class="row">
						<h3 class="col-12 mb-4">Are you ready??</h3>
						<button class="btn col-6" id="btn-start">Let's GO!<i class="icon-right-open" style="font-size: 12px;"></i></button>
						<a class="btn col-6 btn-a" href="logout.php">Wyjście<i class="icon-right-open" style="font-size: 12px;"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="js/main-script.js"></script>
	</body>
</html>