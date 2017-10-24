
var centerView = document.getElementById("cvId");

var fCont = document.getElementById("fCont");
var lCont = document.getElementById("lCont");
var aCont = document.getElementById("aCont");
var nCont = document.getElementById("nCont");

var fname = document.getElementById("fname");
var lname = document.getElementById("lname");
var add = document.getElementById("add");
var num = document.getElementById("phonenum");

var saveBtn = document.getElementById("saveBtn");

var fTxt = document.createElement("input");
fTxt.type = "text";
fTxt.value= fname.innerHTML;

var lTxt = document.createElement("input");
lTxt.type = "text";
lTxt.value= lname.innerHTML;

var addTxt = document.createElement("input");
addTxt.type = "text";
addTxt.value= add.innerHTML;

var numTxt = document.createElement("input");
numTxt.type = "text";
numTxt.value= num.innerHTML;

saveBtn.addEventListener("click", saveInfo);

var editBtn= document.getElementById("edit");
editBtn.addEventListener("click", editInfo);

document.getElementById("formIn").addEventListener("submit", checkInfo);

function editInfo(){

	editBtn.disabled= true;

	saveBtn.style.display="block";

	fCont.replaceChild(fTxt,fname);

	lCont.replaceChild(lTxt,lname);

	aCont.replaceChild(addTxt,add);

	nCont.replaceChild(numTxt,num);	
}

function saveInfo(){

	if(fTxt.value=="" || lTxt.value=="" || addTxt.value=="" || numTxt.value==""){
		document.getElementById("err").innerHTML="Please enter valid inputs!";
	}
	else{
	editBtn.disabled= false;

	document.getElementById("err").innerHTML="";

	centerView.appendChild(saveBtn);

	fname.innerHTML = fTxt.value;
	fCont.replaceChild(fname,fTxt);

	lname.innerHTML = lTxt.value;
	lCont.replaceChild(lname,lTxt);

	add.innerHTML = addTxt.value;
	aCont.replaceChild(add,addTxt);

	num.innerHTML = numTxt.value;
	nCont.replaceChild(num,numTxt);

	saveBtn.style.display="none";
	}
}

function checkInfo(evt){
	if(fTxt.value=="" || lTxt.value=="" || addTxt.value=="" || numTxt.value==""){
		document.getElementById("err").innerHTML="Please enter all fields!";
		evt.preventDefault();
		return false;
	}else if(isNan(numTxt) || numTxt.length<11){
		document.getElementById("err").innerHTML="Please Enter a proper Phone Number!";
		evt.preventDefault();
		return false;
	}else{
		document.getElementById("success").innerHTML="Successfully Changed!";
		//evt.preventDefault();
		alert("success");
		return true;
	}
}