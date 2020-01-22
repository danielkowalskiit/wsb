$("#box-players").hide();

$("#btn-show-boxplayers").click(function(){
	$("#box-player").hide();
	$("#box-players").show();
})

$("#btn-hide-boxplayers").click(function(){
	$("#box-players").hide();
	$("#box-player").show();
})

//############################################################################

$("#box-player-add").hide();

$("#btn-show-boxplayer-add").click(function(){
	$("#box-player-add").show();
	document.querySelector("#box-player-add").scrollIntoView()
})

$("#btn-hide-boxplayer-add").click(function(){
	$("#box-player-add").hide();
	$('#box-player-add input').val('');
	$('#infoAdd').text('');
})


$("#box-player-add input, #box-player-add select").click(function(){$('#infoAdd').text(''); $('#statusQuiz').text('');})

$("#add-player").click(function(){

	var valInputFirstname = $('#inputFisrtname').val();
	var valInputSurname = $('#inputSurname').val();
	var valInputLogin = $('#inputLogin').val();
	var valInputPassword = $('#inputPassword').val();
	
	
	if(valInputFirstname=="" || valInputSurname=="" || valInputLogin=="" || valInputPassword=="")
	{
		$('#infoAdd').text('*Uzupełnij wszystkie pola');
	}
	else
	{
		if(valInputLogin.length<3 || valInputPassword.length<3)
		{
			$('#infoAdd').text('*Login i hasło nie mogą być krótsze niż 3 znaki');
		}
		else
		{
			$.post('modules/addplayer.php',{inputFirstname:valInputFirstname,inputSurname:valInputSurname,inputLogin:valInputLogin,inputPassword:valInputPassword},function(data){
				$('#infoAdd').html(data);
			});
		}
	}
})

//############################################################################

$("button#refreash").click(function(){
	location.reload();
})





