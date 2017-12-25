var srch = document.getElementById("searchInput");
srch.addEventListener("keyup", tblSrch);

/*var ul = document.getElementById("searchImg");
ul.addEventListener("click", imgSrch);

var li = ul.getElementsByTagName("li");
*/
function icoevent(){
document.getElementById("im0").addEventListener("click", icoSrch);
document.getElementById("im1").addEventListener("click", icoSrch);
document.getElementById("im2").addEventListener("click", icoSrch);
document.getElementById("im3").addEventListener("click", icoSrch);
document.getElementById("im4").addEventListener("click", icoSrch);
document.getElementById("im5").addEventListener("click", icoSrch);
}

function icoSrch(event){

	 var img = event.target || event.srcElement;
	 var img = img.alt;
	 var input, filter, table, tr, td, div, p, i;

  	var filter = img.toUpperCase();
  	var table = document.getElementById("rTable");
  	var tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    div = td.getElementsByTagName("div")[1];
    p = div.getElementsByTagName("p")[0];
    if (p) {
      if (p.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }

}

function tblSrch(){
 var input, filter, table, tr, td, div, h2, a, i;

  filter = srch.value.toUpperCase();

  table = document.getElementById("rTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    div = td.getElementsByTagName("div")[1];
    h2 = div.getElementsByTagName("h2")[0];
    a = h2.getElementsByTagName("a")[0];

    if (a) {
      if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }else if (h2){
      if(h2.innerHTML.toUpperCase().indexOf(filter) > -1){
        tr[i].style.display="";
      }else{
        tr[i].style.display="none";
      }
    }       
  }
}
