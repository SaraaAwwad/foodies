var srch = document.getElementById("searchInput");
srch.addEventListener("keyup", tblSrch);

/*var ul = document.getElementById("searchImg");
ul.addEventListener("click", imgSrch);

var li = ul.getElementsByTagName("li");
*/

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
    }       
  }
}

/*function getEventTarget(e) {
    e = e || window.event;
    return e.target || e.srcElement; 
}

function imgSrch(event){
 var target = getEventTarget(event);
}*/