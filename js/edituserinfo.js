var centerView = document.getElementById("cvId");

var fCont = document.getElementById("fCont");
var lCont = document.getElementById("lCont");
var aCont = document.getElementById("aCont");
var nCont = document.getElementById("nCont");

var fname = document.getElementById("fname");
var lname = document.getElementById("lname");
var add = document.getElementById("add");
var num = document.getElementById("phonenum");

var fTxt = document.getElementById("ftext");
fTxt.value= fname.innerHTML;
var lTxt = document.getElementById("ltext");
lTxt.value= lname.innerHTML;
var addTxt = document.getElementById("addtext");
addTxt.value= add.innerHTML;
var numTxt = document.getElementById("numtext");
numTxt.value= num.innerHTML;

var saveBtn = document.getElementById("saveBtn");

var editBtn= document.getElementById("edit");
editBtn.addEventListener("click", editInfo);

fTxt.addEventListener("change", checkVal);
addTxt.addEventListener("change", checkVal);
lTxt.addEventListener("change", checkVal);

numTxt.addEventListener("change", checkNum);

document.getElementById("formIn").addEventListener("submit", checkInfo);

var Evalid=true;
var Nvalid=true;

function checkVal(event){

 	var x = event.target || event.srcElement;
	var xVal = x.value;
	
	if(xVal.length < 1)
	{
		x.style.borderWidth = "3px";
		x.style.borderColor = "#ff4d4d";
		x.style.backgroundColor = "#ffcccc";
		Evalid=false;
	}
	else{
		x.style.borderColor = "#99ff99";
		x.style.backgroundColor = "#ccffcc";
		Evalid=true;
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

function editInfo(){

	editBtn.disabled= true;

	saveBtn.style.display="block";

	fTxt.type="text";
	lTxt.type="text";
	addTxt.type="text";
	numTxt.type="text";

	fname.style.display="none";
	lname.style.display="none";
	add.style.display="none";
	num.style.display="none";
}

function saveInfo(){

	editBtn.disabled= false;

	document.getElementById("err").innerHTML="";

	fname.innerHTML = fTxt.value;
	lname.innerHTML = lTxt.value;
	add.innerHTML = addTxt.value;
	num.innerHTML = numTxt.value;


	fTxt.type="hidden";
	lTxt.type="hidden";
	addTxt.type="hidden";
	numTxt.type="hidden";

	fname.style.display="block";
	lname.style.display="block";
	add.style.display="block";
	num.style.display="block";

	saveBtn.style.display="none";
	
}

function checkInfo(evt){

	if(Nvalid && Evalid){
		//So the edited form doesn't change on reloading with resubmitting(till be connected with php) 
		evt.preventDefault();
		alert("Success!");
		saveInfo();
		return true;

	}else{
		document.getElementById("err").innerHTML="Please enter valid values!";
		evt.preventDefault();
		return false;
	}
}