<?php
	session_start();
	
	if (!isset($_SESSION['loginnow']))
	{
		header('Location: index.php');
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
		<title>Quiz | Scores</title>
		<link rel="shortcut icon" href="images/favico.png" />
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center" style="margin: 50px auto">
				<div class="col-12 col-sm-12 col-md-12 col-lg-10 bar-user">
					<div class="row">
						<div class="col-6">
							<i class="icon-user-circle-o lead"></i><?php echo $_SESSION['firstname']; ?>
						</div>
						<div class="col-6 text-right">
							<a href="instruction.php" class="text-white"><i class="icon-rocket lead"></i>| powrót</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-5 box-content-left text-center">
					<i class="icon-award text-warning"></i>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-5 box-content">
					<div class="row">
						<?php 
							echo "<div class='col-12'><h4 class='text-center'>WYNIKI<i class='icon-sort-alt-up'></i></h4></div>"; 
							require_once "connect.php";

							$conn = new mysqli($host, $db_user, $db_password, $db_name);
							$conn -> query('SET NAMES utf8');
							$conn -> query('SET CHARACTER_SET utf8_unicode_ci');
								
							if($conn->connect_error){
								die("Connection failed: ".$conn->connect_error);
							}
							
							$player = $_SESSION['id'];
							$ins = "SELECT * FROM score where idplayer='$player' ORDER BY idquiz ASC"; 
								
							$resalt = $conn->query($ins);

							$dataPoints = [];
							
							if($resalt->num_rows > 0)
							{
								while($row = $resalt -> fetch_assoc())
								{
									echo "<div class='col-9 score-player'>Quiz".$row["idquiz"]."</div><div class='col-3 score-player'> | ".$row["score"]."</div>";
									array_push($dataPoints, array("label"=> "Quiz".$row["idquiz"], "y"=> $row["score"]));
								}
							}
							else
							{
								echo "<p class='mt-5'>
									<span class='text-danger'>Nie rozwiązałeś jeszcze żadnej gry 
									<i class='icon-emo-displeased'></i></span> <br> 
									<a class='text-dark' href='instruction.php'><span class='text-success'>Kliknij aby spróbować 
									<i class='icon-emo-happy'></i></span></a>
								</p>";
								array_push($dataPoints, array("label"=> "Quiz", "y"=> ""));
							}
						
						?>
					</div>
				</div>
				<div class="col-12 col-lg-10 box-content">
					<!-- This bar-chart code with https://canvasjs.com/php-charts/bar-chart/ -->
					<script>
						window.onload = function() {
 
						var chart = new CanvasJS.Chart("chartContainer", {
							animationEnabled: true,
							title:{
								text: "Porównanie Wyników"
							},

							data: [{
								type: "bar",
								yValueFormatString: "#,##0.00pkt",
								indexLabel: "{y}",
								indexLabelPlacement: "inside",
								indexLabelFontWeight: "bolder",
								indexLabelFontColor: "white",
								dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
							}]
						});
						chart.render();
						 
						}
					</script>
					<div id="chartContainer" style="height: 370px; width: 100%;"></div>
					<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
				</div>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>