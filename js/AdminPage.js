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
