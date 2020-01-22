$("#btn-check-quiz").hide();
$("#box-start-quiz").hide();

function generateQuestionsFull(nameQuestAtt,goodQuestAtt,numQuest,descQuest,answOne,answTwo,answThree,answFour)
{
				var content = '<section class="col-sm-6">\
					<label>\
						<h3>Pytanie'+numQuest+'</h3>\
						<h6>'+descQuest+'</h6>\
					</label>\
					<fieldset>\
						<label class="container-radio text-left btn btn-lg btn-block">'+answOne+'\
							<input type="radio" name="'+nameQuestAtt+'" id="" value="a">\
							<span class="checkmark"></span>\
						</label>\
						<label class="container-radio text-left btn btn-lg btn-block">'+answTwo+'\
							<input type="radio" name="'+nameQuestAtt+'" id="" value="b">\
							<span class="checkmark"></span>\
						</label>\
						<label class="container-radio text-left btn btn-lg btn-block">'+answThree+'\
							<input type="radio" name="'+nameQuestAtt+'" id="" value="c">\
							<span class="checkmark"></span>\
						</label>\
						<label class="container-radio text-left btn btn-lg btn-block">'+answFour+'\
							<input type="radio" name="'+nameQuestAtt+'" id="" value="d">\
							<span class="checkmark"></span>\
						</label>\
					</fieldset>\
				</section>'
				
				document.querySelector("#quiz").innerHTML += content
}

function generateQuestionsShort(nameQuestAtt,goodQuestAtt,numQuest,descQuest,answOne,answTwo,answThree)
{
				var content = '<section class="col-sm-6">\
					<label>\
						<h3>Pytanie'+numQuest+'</h3>\
						<h6>'+descQuest+'</h6>\
					</label>\
					<fieldset>\
						<label class="container-radio text-left btn btn-lg btn-block">'+answOne+'\
							<input type="radio" name="'+nameQuestAtt+'" id="" value="a">\
							<span class="checkmark"></span>\
						</label>\
						<label class="container-radio text-left btn btn-lg btn-block">'+answTwo+'\
							<input type="radio" name="'+nameQuestAtt+'" id="" value="b">\
							<span class="checkmark"></span>\
						</label>\
						<label class="container-radio text-left btn btn-lg btn-block">'+answThree+'\
							<input type="radio" name="'+nameQuestAtt+'" id="" value="c">\
							<span class="checkmark"></span>\
						</label>\
					</fieldset>\
				</section>'
				
				document.querySelector("#quiz").innerHTML += content
}

function generateQuestionsDefault(nameQuestAtt,goodQuestAtt,numQuest,descQuest,answOne,answTwo)
{
				var content = '<section class="col-sm-6">\
					<label>\
						<h3>Pytanie'+numQuest+'</h3>\
						<h6>'+descQuest+'</h6>\
					</label>\
					<fieldset>\
						<label class="container-radio text-left btn btn-lg btn-block">'+answOne+'\
							<input type="radio" name="'+nameQuestAtt+'" id="" value="a">\
							<span class="checkmark"></span>\
						</label>\
						<label class="container-radio text-left btn btn-lg btn-block">'+answTwo+'\
							<input type="radio" name="'+nameQuestAtt+'" id="" value="b">\
							<span class="checkmark"></span>\
						</label>\
					</fieldset>\
				</section>'
				
				document.querySelector("#quiz").innerHTML += content
}


function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var x = xmlDoc.getElementsByTagName("QUESTION");
  for (i = 0; i < x.length; i++) 
  { 
	if(typeof(x[i].getElementsByTagName("ANSWTHREE")[0]) == 'undefined' && typeof(x[i].getElementsByTagName("ANSWFOUR")[0]) == 'undefined' )
	{
		generateQuestionsDefault(
						x[i].getElementsByTagName("NAMEQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("GOODQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("NUMQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("DESCQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("ANSWONE")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("ANSWTWO")[0].childNodes[0].nodeValue
		);
	}
	else if(typeof(x[i].getElementsByTagName("ANSWFOUR")[0]) == 'undefined')
	{
		generateQuestionsShort(
						x[i].getElementsByTagName("NAMEQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("GOODQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("NUMQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("DESCQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("ANSWONE")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("ANSWTWO")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("ANSWTHREE")[0].childNodes[0].nodeValue
		);
	}
	else
	{
		generateQuestionsFull(
						x[i].getElementsByTagName("NAMEQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("GOODQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("NUMQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("DESCQUEST")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("ANSWONE")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("ANSWTWO")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("ANSWTHREE")[0].childNodes[0].nodeValue,
						x[i].getElementsByTagName("ANSWFOUR")[0].childNodes[0].nodeValue
		);
	}
  }
}


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

function readQuiz(a){ 		//function read with database name file xml

$("#menu-quiz").show();

var quiz=a;

var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  
$.post('readquiz.php',{idQuiz:quiz},function(data)
{	
	const filename = data;
	xhttp.open("GET", "xml/"+filename+".xml", true);
	xhttp.send();
});

};



$("select").change(function(){			//function select and view choose quiz with option list
	$("#box-start-quiz").show();		//show button end quiz
	
	$("#btn-start-quiz").click(function(){	//function generate quiz after choose quiz and click button 
		
		$("#box-start-quiz").hide(); 	//hidden menu starting quiz 
		$("#box-list-quiz").hide();		//hidden menu select quiz
		$("#hide-icon-aword").hide();		//hidden icon quiz after start quiz
		
		readQuiz($("select").val());	//read quiz
		
		$("#btn-check-quiz").show();	//show button end quiz
		$("#btn-return").hide();		//hidden button return main menu quiz
	});
		
});

$("#btn-cancel-quiz").click(function(){		//function cancel start quiz with menu starting quiz so reload actual site
	location.reload();		
});
