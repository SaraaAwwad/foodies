//sign up elements
var e = document.getElementById("em");
var pass = document.getElementById("pw");
var reppass = document.getElementById("rpw");

//sign in elements
var eIn = document.getElementById("emIn");
var pwIn = document.getElementById("pwIn");

//checks validity when you leave the key
pass.addEventListener("change", pwVal);
pass.addEventListener("change", reppwVal);
e.addEventListener("change", eVal);
reppass.addEventListener("keyup", reppwVal);

document.getElementById("streetID").addEventListener("change", checkrest);
document.getElementById("areaID").addEventListener("change", checkrest);
document.getElementById("buildID").addEventListener("change", checkrest);
document.getElementById("fnID").addEventListener("change", checkrest);
document.getElementById("lnID").addEventListener("change", checkrest);

var numTxt = document.getElementById("phnum");
numTxt.addEventListener("change", checkNum);

//log in validity
eIn.addEventListener("change", eInVal);
pwIn.addEventListener("change", pwInVal);

//sign up submission
document.getElementById("formSu").addEventListener('submit', checkUp);

//sign in sub
document.getElementById("formSi").addEventListener('submit', checkIn);

document.getElementById("logM").addEventListener("click", logAcc);
document.getElementById("logHref").addEventListener("click", logAcc);

document.getElementById("createM").addEventListener("click", createAcc);
document.getElementById("closeM").addEventListener("click", closeMod);
document.getElementById("closeSi").addEventListener("click", closeSi);


var pw1="";
var Evalid = false;
var Pvalid = false;
var Cvalid = false;
var Nvalid = false;

var I_Evalid = true;
var I_Pvalid = false;

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.documentElement.scrollTop > 180) {
        document.getElementById("navmenu").style.backgroundColor = "white";
    } else {
        document.getElementById("navmenu").style.backgroundColor = "";
    }
}

function timeFunc(){
	var t = document.getElementById("fTitle");
	var d = new Date();
	var hr = d.getHours();
    var min = d.getMinutes();

    if (min < 10){
    	min="0"+min;
    }

    if(hr < 10){
    	t.innerHTML = "0"+hr+" : "+min+ " Is the Perfect <br> Time for Breakfast!<br> Don't You Agree? <hr>";}
    else if (hr < 17){
   		t.innerHTML = ""+hr+" : "+min+ " Is the Perfect <br> Time for Lunch!<br> Don't You Agree? <hr>";
    } else {
    	t.innerHTML = ""+hr+" : "+min+ " Is the Perfect <br> Time for Dinner!<br> Don't You Agree? <hr> ";
    } 
}

function checkNum(){
	var x = numTxt.value;
	var re = /^\d+$/;

	if (x.length < 11 || re.test(x)==false){
		numTxt.style.borderWidth = "3px";
		numTxt.style.borderColor = "#ff4d4d";
		numTxt.style.backgroundColor = "#ffcccc";
		Nvalid=false;
	}else{
		numTxt.style.borderColor = "#99ff99";
		numTxt.style.backgroundColor = "#ccffcc";
		Nvalid=true;
	}
}

function checkrest(event){
	var x = event.target || event.srcElement;
	var xVal = x.value;
	
	if(xVal.length < 1)
	{
		x.style.borderWidth = "3px";
		x.style.borderColor = "#ff4d4d";
		x.style.backgroundColor = "#ffcccc";
	}
	else{
		x.style.borderWidth = "3px";
		x.style.borderColor = "#99ff99";
		x.style.backgroundColor = "#ccffcc";
	}
}

function logAcc(){
	closeMod();
	document.getElementById('signIn').style.display='block';
}

function closeSi(){
	pwIn.value="";
	pwIn.style.borderColor="grey";
	pwIn.style.borderWidth="1px";
	pwIn.style.backgroundColor="white";

	emIn.value="";
	emIn.style.borderColor="grey";
	emIn.style.backgroundColor="white";
	emIn.style.borderWidth="1px";
	
	var error = document.getElementById("errorSi").innerHTML="";

	document.getElementById('signIn').style.display='none';
}

function createAcc() {
    document.getElementById('signUp').style.display='block';
}

function closeMod(){
	pass.value="";
	pass.style.borderColor="grey";
	pass.style.borderWidth="1px";
	pass.style.backgroundColor="white";

	e.value="";
	e.style.borderColor="grey";
	e.style.backgroundColor="white";
	e.style.borderWidth="1px";

	reppass.value="";
	reppass.style.borderColor="grey";
	reppass.style.borderWidth="1px";
	reppass.style.backgroundColor="white";

	var error = document.getElementById("error").innerHTML="";

	document.getElementById('signUp').style.display='none';
}

function eInVal(){
	var re = /\S+@\S+\.\S+/;
	var x = eIn.value;

	if(re.test(x) == false)
	{	
		//false entry;
		eIn.style.borderWidth = "3px";
		eIn.style.borderColor = "#ff4d4d";
		eIn.style.backgroundColor = "#ffcccc";
		I_Evalid= false;
	}
	else{
		eIn.style.borderWidth = "3px";
		eIn.style.borderColor = "#99ff99";
		eIn.style.backgroundColor = "#ccffcc";
		I_Evalid=true;
	}
}

function pwInVal(){

	var x = pwIn.value;
	pw1 = x;
	
	if(x.length < 4)
	{
		pwIn.style.borderWidth = "3px";
		pwIn.style.borderColor = "#ff4d4d";
		pwIn.style.backgroundColor = "#ffcccc";
		I_Pvalid=false;
	}
	else{
		pwIn.style.borderWidth = "3px";
		pwIn.style.borderColor = "#99ff99";
		pwIn.style.backgroundColor = "#ccffcc";
		I_Pvalid=true;
	}
}

function eVal(){

	//very simple regEx for email validation
	var re = /\S+@\S+\.\S+/;
	var x = e.value;

	if(re.test(x) == false)
	{	
		//false entry;
		e.style.borderWidth = "3px";
		e.style.borderColor = "#ff4d4d";
		e.style.backgroundColor = "#ffcccc";
		Evalid= false;
	}
	else{
		e.style.borderWidth = "3px";
		e.style.borderWidth = "3px";
		e.style.borderColor = "#99ff99";
		e.style.backgroundColor = "#ccffcc";
		Evalid=true;
	}
}

function pwVal(){

	var x = pass.value;
	pw1 = x;
	
	if(x.length < 4)
	{
		pass.style.borderWidth = "3px";
		pass.style.borderColor = "#ff4d4d";
		pass.style.backgroundColor = "#ffcccc";
		Pvalid=false;
	}
	else{
		pass.style.borderWidth = "3px";
		pass.style.borderColor = "#99ff99";
		pass.style.backgroundColor = "#ccffcc";
		Pvalid=true;
	}
}

function reppwVal(){

	var x = reppass.value;
		if(x!=pw1)
	{
		reppass.style.borderWidth = "3px";
		reppass.style.borderColor = "#ff4d4d";
		reppass.style.backgroundColor = "#ffcccc";
		Cvalid=false;
	}
	else{
		reppass.style.borderWidth = "3px";
		reppass.style.borderColor = "#99ff99";
		reppass.style.backgroundColor = "#ccffcc";
		Cvalid=true;
	}	
}

function checkUp(evt){

	if(Evalid && Pvalid && Cvalid && Nvalid){
		return true;
	}
	else{
		var error = document.getElementById("error");
		error.style.color="red";
		error.style.fontSize = "20px";
		error.innerHTML = "Please check that all your inputs are valid! <br><br>";
		evt.preventDefault();
		return false;
	}
}

function checkIn(evt){
	
	if(I_Evalid && I_Pvalid){
		return true;
	}
	else{
		var error = document.getElementById("errorSi");
		error.style.color="red";
		error.style.fontSize = "20px";
		error.innerHTML = "Please check that all your inputs are valid! <br><br>";
		evt.preventDefault();
		return false;
	}
}