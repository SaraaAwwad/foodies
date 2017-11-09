var buttonaccr = document.getElementById("buttontoggle");
buttonaccr.addEventListener("click",show);


var buttondelete1 = document.getElementById("deletebutton1");
var buttondelete2 = document.getElementById("deletebutton2");
var buttondelete3 = document.getElementById("deletebutton3");

buttondelete1.addEventListener("click",deleterow);
buttondelete2.addEventListener("click",deleterow);
buttondelete3.addEventListener("click",deleterow);

function deleterow(){
	
	console.log("Button clicked, id "+this.id+", text");
	
var table = document.getElementById("restaurantTable");
  var rowCount = table.rows.length;
  if(rowCount === 1) {
    alert('Cannot delete the last row');
    return;
  }

  // get the "<tr>" that is the parent of the clicked button
  var row = this.parentNode.parentNode; 
  row.parentNode.removeChild(row); // remove the row
	
}

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