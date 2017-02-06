function checkLength(text, min, max){
	min = min || 0;
	max = max || 10000;
	
	if (text.length < min || text.length > max) {
		return false;
	}
	return true;
}

function checkEmail(email){
	if (!checkLength(email, 6)) {
		return false;
	} else if (email.indexOf("@") == -1) {
		return false;
	} else if (email.indexOf(".") == -1) {
		return false;
	} else if (email.lastIndexOf(".") < email.lastIndexOf("@")) {
		return false;
	}
	return true;
}

function checkTextArea(textArea, max){
	var numChars, chopped, message;
	if (!checkLength(textArea.value, 1, max)) {
		numChars = textArea.value.length;
		chopped = textArea.value.substr(0, max);
		message = 'You typed ' + numChars + ' characters.\n';
		message += 'The limit is ' + max + '.';
		message += 'Your entry will be shortened to:\n\n' + chopped;
		alert(message);
		textArea.value = chopped;
	}
}

function subtractingDots(){
	var loadingText= document.getElementById("loadingtext");
		loadingText.innerHTML = "Sending Your Message......";
	var subtractPeriod=setInterval(function(){
	var	length=loadingText.innerHTML.length;	
		loadingText.innerHTML = loadingText.innerHTML.substring(0,length-1);
			if (loadingText.innerHTML.indexOf(".") == -1){
					clearInterval(subtractPeriod);
					subtractingDots(loadingText);
			}
		},100);
}

function processForm(form, fullName, Email, message){
	
	form.style.display = "none";
        $('#df_c_heading, #icon2, .df_page_title').css("visibility","hidden");
	container = document.getElementById("animationContainer");
        loadingText=document.getElementById("loading_c_text");
        loadingText.style.display="block";
	container.style.display = "block";	
	envelope=document.getElementById("envelope");
	envelope.style.display="block";
        $('#containerbox12').css("top","40px");
	
        
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("post","http://104.236.221.43/DriverFriendly/includes/processForm.php",true);
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    setTimeout(function(){
			contactResults();
                    },4000);
		}
	};
	
	subtractingDots();
	
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
	xmlhttp.send("FullName=" + fullName + "&Email=" + Email + "&Message=" + message);	
	 
	function contactResults() {
		var mailMsg=document.getElementById("mailMsg");
			mailMsg.innerHTML=xmlhttp.responseText;
			container.style.display = "none";
                        $('#icon2').css("visibility","visible");
                        $('#containerbox12').css("top","264px");
	}	
}

function validate(form){
                var patt = /contact/i;
                var result = patt.test(location.href);
    
                if(result){
                    var fullName=document.getElementById("FullName").value;
                    var email = document.getElementById("Email").value;
                    var message=document.getElementById("Message").value;

                    var errors = [];

                    if (!checkLength(fullName,1,20)) {
                            errors[errors.length] = "You must enter your name.";
                    }

                    if (!checkEmail(email)) {
                            errors[errors.length] = "You must enter a valid email address.";
                    }

                    if (!checkLength(message,1,20)) {
                            errors[errors.length] = "You must enter a message.";
                    }
                    
                    if (errors.length > 0) {
			reportErrors(errors);
			return false;    
                    }
                    
                    processForm(form,fullName, email, message);
                    
                }else{
                    var title=document.getElementById("textbox12").value;
                    var selected_option=document.getElementById("add_select").selectedIndex;
                    var startDate=document.getElementById("textbox2").value;
                    var endDate=document.getElementById("textbox2a").value;
                    var address=document.getElementById("textbox3").value;
                    var highway=document.getElementById("textbox4").value;
                    var website=document.getElementById("textbox5").value;
                    var selected_event=document.getElementById("event_select").selectedIndex;
                    /*var road_closure=document.getElementById("checkbox1a").checked;
                    var lane_closure=document.getElementById("checkbox3a").checked;
                    var other_closure=document.getElementById("checkbox2a").checked;*/
                    var description=document.getElementById("textarea1").value;
                    
                        errors = [];
                    
                    if (!checkLength(title,1,50)) {
                            errors[errors.length] = "You must enter a title that is less than 50 characters.";
                    }
                    
                    if (selected_option=='0'){
                            errors[errors.length] = "You must select a city.";
                    }
					
					if (selected_event=='0'){
                            errors[errors.length] = "You must select an event type.";
                    }

                    if (!checkLength(startDate,1,24)) {
                            errors[errors.length] = "You must enter a start date that is less than 16 characters.";
                    }
                    
                    if (!checkLength(endDate,0,24)) {
                            errors[errors.length] = "You must enter a end date that is less than 16 characters.";
                    }
                    
                    if (!checkLength(address,0,75)) {
                            errors[errors.length] = "You must enter an address that is less than 75 characters.";
                    }
                    
                    if (!checkLength(highway,1,60)) {
                            errors[errors.length] = "You must enter a highway that is less than 60 characters.";
                    }
                    if (!checkLength(website,0,255)) {
                            errors[errors.length] = "Your website is too long.";
                    }
                    
                    /*if (!road_closure && !lane_closure && !other_closure){
                        errors[errors.length] = "You must check an event type.";
                    }else if(
                            road_closure && lane_closure && other_closure ||
                            !road_closure && lane_closure && other_closure ||
                            road_closure && !lane_closure && other_closure ||
                            road_closure && lane_closure && !other_closure
                            )
                    {
                        errors[errors.length] = "Please only check one option.";
                    }else{
                        if(road_closure){
                            closure=1;
                        }else if(lane_closure){
                            closure=3;
                        }else{
                            closure=2;
                        }  
                    }*/
                    
                    if (!checkLength(description,1,300)) {
                            errors[errors.length] = "You must enter a description that is less than 300 characters.";
                    }
                    
                    if (errors.length > 0) {
			reportErrors(errors);
			return false;    
                    }
                    addingScreen(title, selected_option, startDate, endDate, address, highway, website, selected_event, description);
                    return true;
                }
		
		
		return true;
	}

	function reportErrors(errors){
		
		var msg = "There were some problems...\n";
		
		var numError;
		
		for (var i = 0; i<errors.length; i++) {
			numError = i + 1;
			msg += "\n" + numError + ". " + errors[i];
		}
		
		alert(msg);
	}
        
        function subtractingDots(){
                var loadingText= document.getElementById("loading_c_text");
		loadingText.innerHTML = "Just a Moment......";
                var subtractPeriod=setInterval(
                    function(){
			var length=loadingText.innerHTML.length;	
			loadingText.innerHTML = loadingText.innerHTML.substring(0,length-1);
			if (loadingText.innerHTML.indexOf(".") == -1){
			    clearInterval(subtractPeriod);
                                subtractingDots();
			}
		    }
                ,100);
        }