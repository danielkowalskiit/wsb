<?php
	session_start();
	
	if (!isset($_SESSION['admin']))
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
		<link rel="stylesheet" href="../main-style.css">
		<link rel="stylesheet" href="../css/fontello.css">
		<style>
			section{padding: 15px !important;} 
			#box-status-quiz a{opacity: .9 !important;} 
			.pagination li{cursor: pointer;} 
			#box-player-add input, select, option:hover{background: #FBFBFB !important;}
			.form-control:focus{}
			@media all and (max-width:333px){.list-item{height:60px !important;}}
		</style>
		<title>Panel Admin</title>
		<link rel="shortcut icon" href="images/favico.png" />
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 bar-user">
					<div class="row">
						<div class="col-8"><i class="icon-user-circle-o"></i>Witaj Adminstrator</div>
						<div class="col-4 text-right"><a class="text-white" href="logout.php">Wyloguj się</a></div>
					</div>
				</div>
				<div class="col-12">
					<div class="row">
						<section class="col-12">
							<div class="row">
								<button id="btn-show-boxplayers" class="btn col-6 col-md-3 border d-none d-sm-none d-md-block d-lg-block">Wszyscy Gracze<i class="icon-right-open" style="font-size: 12px;"></i></button>
								<button id="btn-show-boxplayer-add" class="btn col-4 col-md-3 border">Nowy Gracz<i class="icon-right-open" style="font-size: 12px;"></i></button>
								<button id="" class="btn col-4 col-md-3 border">Usuń Gracza<i class="icon-right-open" style="font-size: 12px;"></i></button>
								<button id="" class="btn col-4 col-md-3 border">Modyfikuj Gracza<i class="icon-right-open" style="font-size: 12px;"></i></button>
								<button id="refreash" class="btn col-12 border" style="padding: 10px !important;  font-size: 12px">Odśwież</button>
							</div>
						</section>
						<section id="box-player" class="col-12">
							<h3>Gracz</h3>
							<fieldset id="page">
							<?php 
								require_once "modules/playerview.php";
							?>
							</fieldset>
							<nav>
								  <ul class='pagination'>
										<li id="previous-page" class='btn btn-dark'><a class='text-white' href="javascript:void(0)" aria-label=Previous><span aria-hidden=true>&laquo;</span></a></li>
								  </ul>
							</nav>							
						</section>
						<section id="box-players" class="col-12">
							<h3>Wszyscy Gracze</h3>
							<fieldset>
							<?php 
								require_once "modules/allplayerview.php";
							?>
							</fieldset>					
							<button id='btn-hide-boxplayers' class='btn bg-dark col-12 border mt-4'>Ukryj Listę<i class='icon-right-open' style='font-size: 12px;'></i></button>
						</section>
						<section id="box-player-add" class="col-12">
							<h3>Dodaj Gracza</h3>
								<?php 
									require_once "modules/formadd.php";
								?>
							<button id='btn-hide-boxplayer-add' class='btn bg-dark col-12 border mt-4'>Ukryj Panel<i class='icon-right-open' style='font-size: 12px;'></i></button>
						</section>
					</div>
				</div>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="js/script-admin.js"></script>
		<script src="js/script-pagination.js"></script>
	</body>
</html>