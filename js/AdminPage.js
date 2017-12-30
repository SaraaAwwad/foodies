window.onload = function(){
	
var numTxt = document.getElementById("hotlineid");
if(numTxt!=null){
numTxt.addEventListener("change", checkNum);
}


function checkNum(){
	var value= numTxt.value;
	if ((isNaN(value) == true)){
		numTxt.style.borderWidth = "3px";
		numTxt.style.borderColor = "#ff4d4d";
		numTxt.style.backgroundColor = "#ffcccc";
		numTxt.value="";
		//Nvalid=false;
	}else{
		if(value.length <5){
		numTxt.style.borderWidth = "3px";
		numTxt.style.borderColor = "#ff4d4d";
		numTxt.style.backgroundColor = "#ffcccc";
		numTxt.value="";
		}
		else{
		numTxt.style.borderWidth = "3px";
		numTxt.style.borderColor = "#99ff99";
		numTxt.style.backgroundColor = "#ccffcc";
		//Nvalid=true;
		}
	}
}

var numTxt1 = document.getElementById("feesid");
if(numTxt1!=null)
	numTxt1.addEventListener("change", checkNum1);

	function checkNum1(){
	var value= numTxt1.value;
	if (isNaN(value) == true){
		numTxt1.style.borderWidth = "3px";
		numTxt1.style.borderColor = "#ff4d4d";
		numTxt1.style.backgroundColor = "#ffcccc";
		numTxt1.value = "";
		//Nvalid=false;
	}else{
		numTxt1.style.borderWidth = "3px";
		numTxt1.style.borderColor = "#99ff99";
		numTxt1.style.backgroundColor = "#ccffcc";
		//Nvalid=true;
	}
}
	
var numTxt2 = document.getElementById("price1");
if(numTxt2!=null)
	numTxt2.addEventListener("change", checkNum2);


function checkNum2(){
	var value= numTxt2.value;
	console.log("saraaaaaaaahenaaaaa" + value);
	if (isNaN(value) == true){
		numTxt2.style.borderWidth = "3px";
		numTxt2.style.borderColor = "#ff4d4d";
		numTxt2.style.backgroundColor = "#ffcccc";
		//Nvalid=false;
	}else{
		numTxt2.style.borderWidth = "3px";
		numTxt2.style.borderColor = "#99ff99";
		numTxt2.style.backgroundColor = "#ccffcc";
		//Nvalid=true;
	}
}	

var numTxt3 = document.getElementById("price2");
if(numTxt3!=null)
	numTxt3.addEventListener("change", checkNum3);
//var Nvalid = false;

function checkNum3(){
	var value= numTxt3.value;
	if (isNaN(value) == true){
		numTxt3.style.borderWidth = "3px";
		numTxt3.style.borderColor = "#ff4d4d";
		numTxt3.style.backgroundColor = "#ffcccc";
		//Nvalid=false;
	}else{
		numTxt3.style.borderWidth = "3px";
		numTxt3.style.borderColor = "#99ff99";
		numTxt3.style.backgroundColor = "#ccffcc";
		//Nvalid=true;
	}
}	

var numTxt4 = document.getElementById("price3");
if(numTxt4!=null)
		numTxt4.addEventListener("change", checkNum4);
//var Nvalid = false;

function checkNum4(){
	var value= numTxt4.value;
	if (isNaN(value) == true){
		numTxt4.style.borderWidth = "3px";
		numTxt4.style.borderColor = "#ff4d4d";
		numTxt4.style.backgroundColor = "#ffcccc";
	//	Nvalid=false;
	}else{
		numTxt4.style.borderWidth = "3px";
		numTxt4.style.borderColor = "#99ff99";
		numTxt4.style.backgroundColor = "#ccffcc";
		//Nvalid=true;
	}
}
	
}