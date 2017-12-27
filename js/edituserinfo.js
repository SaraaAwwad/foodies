var centerView = document.getElementById("cvId");

var fCont = document.getElementById("fCont");
var lCont = document.getElementById("lCont");
var aCont = document.getElementById("aCont");
var nCont = document.getElementById("nCont");

var fname = document.getElementById("fname");
var lname = document.getElementById("lname");
var build = document.getElementById("build");
var street = document.getElementById("street");
var areaUser = document.getElementById("areaUser");
var num = document.getElementById("phonenum");

//take prev values
var fTxt = document.getElementById("ftext");
fTxt.value= fname.innerHTML;

var lTxt = document.getElementById("ltext");
lTxt.value= lname.innerHTML;

var buildTxt = document.getElementById("buildtext");
buildTxt.value= build.innerHTML;

var streetTxt = document.getElementById("streettext");
streetTxt.value= street.innerHTML;

var areaTxt = document.getElementById("areatext");
areaTxt.value= areaUser.innerHTML;

var numTxt = document.getElementById("numtext");
numTxt.value= num.innerHTML;
//


var saveBtn = document.getElementById("saveBtn");

var editBtn= document.getElementById("edit");
editBtn.addEventListener("click", editInfo);

fTxt.addEventListener("change", checkVal);
buildTxt.addEventListener("change", checkVal);
streetTxt.addEventListener("change", checkVal);
areaTxt.addEventListener("change", checkVal);
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
	var re = /^\+\d+$/;

	if (x.length > 15 || re.test(x)==false){
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
	buildTxt.type="text";
	streetTxt.type="text";
	areaTxt.type="text";
	numTxt.type="text";

	fname.style.display="none";
	lname.style.display="none";
	build.style.display="none";
	street.style.display="none";
	areaUser.style.display="none";
	num.style.display="none";
}

function saveInfo(){

	editBtn.disabled= false;

	document.getElementById("err").innerHTML="";

	fname.innerHTML = fTxt.value;
	lname.innerHTML = lTxt.value;
	build.innerHTML = buildTxt.value;
	street.innerHTML = streetTxt.value;
	areaUser.innerHTML = areaTxt.value;	
	num.innerHTML = numTxt.value;

	fTxt.type="hidden";
	lTxt.type="hidden";
	buildTxt.type="hidden";
	streetTxt.type="hidden";
	areaTxt.type="hidden";
	numTxt.type="hidden";

	fname.style.display="block";
	lname.style.display="block";
	build.style.display="inline-block";
	num.style.display="block";
	street.style.display="inline-block";
	areaUser.style.display="inline-block";

	saveBtn.style.display="none";
	
}

function checkInfo(evt){

	if(Nvalid && Evalid){ 
		saveInfo();
		return true;

	}else{
		document.getElementById("err").innerHTML="Please enter valid values!(Numbers Should have : '+ international call prefix' )";
		evt.preventDefault();
		return false;
	}
}