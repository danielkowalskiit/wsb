<?php
	session_start();
	
	if (!isset($_SESSION['loginnow']))
	{
		header('Location: index.php');
		exit();
	}
	
	//$_SESSION['quizStart'] = true;
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
		<title>Quiz Go!</title>
		<link rel="shortcut icon" href="images/favico.png" />
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12 bar-user"><i class="icon-user-circle-o lead"></i><?php echo $_SESSION['firstname']; ?><span id="score-box"style="position: absolute; right: 10px;"></span></div>
				<div class="col-12 box-score-info" id="box-score-info"></div>
				<div class="col-12 bg-green text-white text-center pt-4 pb-4" id="box-list-quiz">
					<h5>Twoje Quizy</h5>
					<select class="mt-3 custom-select bg-light">
						<option disabled selected>Wybierz quiz</option>
						<?php
							require_once "connect.php";

							$conn = new mysqli($host, $db_user, $db_password, $db_name);
							$conn -> query('SET NAMES utf8');
							$conn -> query('SET CHARACTER_SET utf8_unicode_ci');
								
							if($conn->connect_error){
								die("Connection failed: ".$conn->connect_error);
							}

							//$ins = "SELECT * FROM games where idplayer='".$_SESSION['id']."'"; 
							$ins = "SELECT idquiz, access, namequiz FROM games inner join filesquiz on games.idquiz=filesquiz.id where idplayer='".$_SESSION['id']."'";
							$resalt = $conn->query($ins);
								
							if($resalt->num_rows > 0)
							{
								while($row = $resalt -> fetch_assoc())
								{
									echo $row["idquiz"];
									echo $row["namequiz"];
	
									if($row["access"]==1){
										echo "<option class='text-success' value='".$row['idquiz']."'>".ucwords($row['namequiz'])."</option>";
									}else{ 
										echo "<option class='text-danger' value='".$row['idquiz']."' disabled>".ucwords($row['namequiz'])."</option>";
									};
								}
							}
							else
							{
								echo "";
							}	
						?>
					</select>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 box-content text-center bg-light" id="box-start-quiz">
					<div class="row">	
						<h3 class="col-12 mb-4">Czy jesteś gotów??</h3>
						<button class="btn col-6" id="btn-start-quiz">TAK<i class="icon-right-open" style="font-size: 12px;"></i></button>
						<button class="btn col-6 btn-red" id="btn-cancel-quiz">NIE<i class="icon-right-open" style="font-size: 12px;"></i></button>
					</div>
				</div>
				<div class="col-12 text-center box-content" id="hide-icon-aword"><i class="icon-award text-warning" style="font-size: 200px"></i></div>
				<div class="col-12"><div class="row" id="quiz"></div></div>
				<div class="col-12" style="padding:0px;">
					<button class="btn col-12 btn-quiz" id="btn-check-quiz">Zakończ <i class="icon-ok"></i></button>
					<button class="btn col-12 btn-quiz bg-warning text-dark" id="btn-return">Powrót</i></button>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 box-content text-center bg-light fixed-bottom" id="confirm-quiz">
			<div class="container">
				<div class="row">
					<h3 class="col-12 mb-4">Czy chcesz zakończyć??</h3>
					<button class="btn col-6" id="btn-confirm-quiz">TAK<i class="icon-right-open" style="font-size: 12px;"></i></button>
					<button class="btn col-6 btn-red" id="btn-return-quiz">NIE<i class="icon-right-open" style="font-size: 12px;"></i></button>
				</div>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="js/script-generate-quiz.js"></script>
		<script src="js/script-check-quiz.js"></script>
	</body>
</html>