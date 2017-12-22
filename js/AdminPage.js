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
