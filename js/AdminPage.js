

function show(){
	var panel = document.getElementById("paneltoggle");
	var button = document.getElementById("buttontoggle");
	
    //button.toggle("active");
    //var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
   

}
