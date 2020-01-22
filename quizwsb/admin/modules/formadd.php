<?php 
	if (!isset($_SESSION['admin']))
	{
		header('Location: ../index.php');
		exit();
	}


	echo '	<div class="col-12">
				<div class="row">';
	
	echo '
	
			<div class="form-group col-12 col-sm-6">
				<label for="inputFisrtname">Imię</label>
				<input type="text" class="form-control" id="inputFisrtname" name="inputFirstname" placeholder="Podaj Imię">
			</div>
			<div class="form-group col-12 col-sm-6">
				<label for="inputSurname">Nazwisko</label>
				<input type="text" class="form-control" id="inputSurname" name="inputSurname" placeholder="Podaj Nazwisko">
			</div>
			<div class="form-group col-12 col-sm-6">
				<label for="inputSurname">Login</label>
				<input type="text" class="form-control" id="inputLogin" name="inputLogin" placeholder="Podaj Login">
			</div>
			<div class="form-group col-12 col-sm-6">
				<label for="inputPassword">Hasło</label>
				<input type="text" class="form-control" id="inputPassword" name="inputPassword" placeholder="Podaj Hasło">
			</div>
			<div class="form-group col-12 col-sm-6">
				<button id="add-player" class="btn col-12">Dodaj</button>
			</div>
			<div id="infoAdd" class="form-group col-12 col-sm-12 text-danger">
			</div>
	
	';
	
	echo '		</div>
			</div>';
?>