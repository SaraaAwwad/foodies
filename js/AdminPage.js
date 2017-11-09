var buttonaccr = document.getElementById("buttontoggle");
buttonaccr.addEventListener("click",show);

function show(){
	var panel = document.getElementById("paneltoggle");	
    
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  
}

var addrestbutton = document.getElementById("addrest");
addrestbutton.addEventListener("click",addRest);
function addRest() 
{
  window.location.href = "newrestaurant.html";
}

/* function update(id){
    //Get contents off cell clicked
    var content = document.getElementById(id).firstChild.nodeValue;
    //Switch to text input field
	var newcontent ="";
    document.getElementById(id).innerHTML = "<input type = 'text' name = 'txtNewInput' id = 'txtNewInput' value = '" + content +"'/>";
	
  }
  // IN TD
   id = "txtFirstname" onclick = "update(this.id)"
*/

/*
var deleting = document.getElementById("deletebutton");
deleting.addEventListener("click",update);
function update(id){
	
document.getElementsByClassName("highlight").deleteRow(1);
}
*/