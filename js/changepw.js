var oldPass = document.getElementById("oldpw");
var newPass = document.getElementById("newpw");
var rePass  = document.getElementById("rnewpw");

newPass.addEventListener("keyup", pwVal);
newPass.addEventListener("keyup", reppwVal);
rePass.addEventListener("keyup", reppwVal);

document.getElementById("formPw").addEventListener("submit", checkPw);

var pw1="";
var Pvalid=false;
var Cvalid=false;

function pwVal(){

	var x = newPass.value;
	pw1 = x;
	
	if(x.length < 4)
	{
		newPass.style.borderWidth = "3px";
		newPass.style.borderColor = "#ff4d4d";
		newPass.style.backgroundColor = "#ffcccc";
		Pvalid=false;
	}
	else{
		newPass.style.borderColor = "#99ff99";
		newPass.style.backgroundColor = "#ccffcc";
		Pvalid=true;
	}

}

function reppwVal(){

	var x = rePass.value;
		if(x!=pw1 || x.length < 4)
	{
		rePass.style.borderWidth = "3px";
		rePass.style.borderColor = "#ff4d4d";
		rePass.style.backgroundColor = "#ffcccc";
		Cvalid=false;
	}
	else{
		rePass.style.borderColor = "#99ff99";
		rePass.style.backgroundColor = "#ccffcc";
		Cvalid=true;
	}	
}

function checkPw(evt){
	if(Cvalid && Pvalid){
		
		return true;
	}
	else{
		var error = document.getElementById("err");
		error.innerHTML = "Please check that all your inputs are valid! <br><br>";
		evt.preventDefault();
		return false;
	}

}