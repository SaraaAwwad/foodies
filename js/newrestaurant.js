var savebutton = document.getElementById("saverest");
savebutton.addEventListener("click",validateForm);


function validateForm() {


    var name = document.forms["restForm"]["Name"].value;
    var type = document.forms["restForm"]["Type"].value;
    //var area = document.forms["restForm"]["Area"].value;
    var hotln = document.forms["restForm"]["Hotline"].value;
    var dfees = document.forms["restForm"]["DelvFees"].value;
    var dtime = document.forms["restForm"]["DelvTime"].value;
    var img = document.forms["restForm"]["Image"].value;
    //var admid = document.forms["restForm"]["AdminID"].value;



    if (name == "") || (type == "") || () {

        window.alert("The areas must be filled out");
        name.focus();
        return false;
    }

    if (type == ""){

  		alert("Please write the type pf cuisine");
  		type.focus();
  		return false;  	
    }

    if (document.forms["restForm"].Area.value == "0")
    {
    	alert("Please choose an area");
    	Area.focus();
    	return false;
    }
}
