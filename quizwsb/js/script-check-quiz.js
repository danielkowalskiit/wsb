$("#confirm-quiz").hide();
$('#score-box').hide();
$('#box-score-info').hide();
var counter=0;
var countQuest=0; 
var resultsQuiz=0;
	
function goodAnswer(questions,answer){
	if($('input[name='+questions+']:checked').val()==answer){counter++; $('input[name='+questions+']:checked').parents('label').addClass('good-answer');}
		else{$('input[name='+questions+']:checked').parents('label').addClass('bad-answer');}
}

function check()
{
	counter=0;	
	
	var quiz= $("select").val(); //id file xml with db to check quiz
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    
		if (this.readyState == 4 && this.status == 200) {
			var i;
			var xmlDoc = this.responseXML;
			var x = xmlDoc.getElementsByTagName("QUESTION");
		
			for (i = 0; i < x.length; i++) { 
				goodAnswer(x[i].getElementsByTagName("NAMEQUEST")[0].childNodes[0].nodeValue,x[i].getElementsByTagName("GOODQUEST")[0].childNodes[0].nodeValue)
			}
			
			countQues=x.length;
			$('#score-box').show().text("Score: "+counter+"/"+countQues);	//Show score
			
			
			$('#box-score-info').show();
			if(counter>0)
			{
				resultsQuiz = Math.floor((counter/countQues)*100);
				if(resultsQuiz==100){$('#box-score-info').html('<div class="row"><div class="col-8">Jesteś najlepszy <i class="icon-award"></i> \
					Gratulacje!! Czy następnym razem będzie tak samo?</i></div><div class="col-4 text-right">'+resultsQuiz+'% <i class="icon-battery-4"></i></div></div>')}
				else if(resultsQuiz<100 && resultsQuiz>=80){$('#box-score-info').html('<div class="row"><div class="col-8">Świetnie <i class="icon-rocket"></i> \
					Nie wiele brakuje do ideału, ale zobacz co przeoczyłeś...</i></div><div class="col-4 text-right">'+resultsQuiz+'% <i class="icon-battery-3"></i></div></div>')}
				else if(resultsQuiz<80 && resultsQuiz>=50){$('#box-score-info').html('<div class="row"><div class="col-8">Super <i class="icon-emo-happy"></i> \
					Już masz tą połówkę za sobą, ale zobacz co przeoczyłeś...</i></div><div class="col-4 text-right">'+resultsQuiz+'% <i class="icon-battery-2"></i></div></div>')}
				else if(resultsQuiz<50 && resultsQuiz>=30){$('#box-score-info').html('<div class="row"><div class="col-8">Hm<i class="icon-emo-surprised"></i> \
					Chyba nie dokładnie uważałeś, więc zobacz co przeoczyłeś...</i></div><div class="col-4 text-right">'+resultsQuiz+'% <i class="icon-battery-1"></i></div></div>')}
				else {$('#box-score-info').html('<div class="row"><div class="col-8">Słabo<i class="icon-emo-displeased"></i> \
					Bardzo słabo, przed Tobą dużoo pracy. Zobacz co przeoczyłeś...</i></div><div class="col-4 text-right">'+resultsQuiz+'% <i class="icon-battery-0"></i></div></div>')}
			
			}
			else
			{
				$('#box-score-info').html('<div class="row"><div class="col-8">Nie postarałeś się <i class="icon-emo-unhappy"></i> \
					masz wszystko do powtórki</div><div class="col-4 text-right">0% <i class="icon-battery-0"></i></div></div>')
			}
			
			
			$('#btn-check-quiz').hide();
			$('#btn-return').show();
		
			$.post('update.php',{scorePlayer:counter,idQuiz:quiz},function(data){});
			
			$('html, body').animate({scrollTop:0}, 300);
		}
	};
  
  
	$.post('readquiz.php',{idQuiz:quiz},function(data)
	{	
		const filename = data;
		xhttp.open("GET", "xml/"+filename+".xml", true);
		xhttp.send();
	});

}
	
$("#btn-check-quiz").click(function(){
	$("#confirm-quiz").show();
})
	
$("#btn-confirm-quiz").click(function(){
	check();
	$("#confirm-quiz").hide();
})
	
$("#btn-return-quiz").click(function(){
	$("#confirm-quiz").hide();
})

$('#btn-return').click(function(){
	location.href = "instruction.php";
})