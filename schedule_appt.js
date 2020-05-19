//Name: Thomas Zhang
//IS448: HW4
//File: schedule_appt.js 
//Description: Javascript file checks errors for html page: email, phone number, state and empty text validation
window.onload=pageLoad;
function pageLoad()
{
	var clickButton = document.getElementById("Submit");
	clickButton.onclick = functionRun;
}

function functionRun(){
	
	//alert("functionRun");
	if (emptyInfo() == false || emptyCheckbox() == false)
	{
		return false;
	}
}


function emptyInfo(){
	
	//alert("emtpyInfo");
	var myUsername = document.getElementById("uname").value;
	var myPassword = document.getElementById("password").value;
	
	if(myUsername.length < 1 || myPassword.length < 1)
	{
		alert("One or more fields is empty. Please fill in all information");
		return false;
	}
	
	
}

function emptyCheckbox()
{
	
	//alert("checkbox");
	
	if (document.getElementById("checkbox1").checked == false && document.getElementById("checkbox2").checked == false
		&& document.getElementById("checkbox3").checked == false && document.getElementById("checkbox4").checked == false 
		&& document.getElementById("checkbox5").checked == false && document.getElementById("checkbox6").checked == false
		&& document.getElementById("checkbox7").checked == false && document.getElementById("checkbox8").checked == false
		&& document.getElementById("checkbox9").checked == false && document.getElementById("checkbox10").checked == false)
	{
		alert ("Please pick a time?");
		return false;
	}
}
