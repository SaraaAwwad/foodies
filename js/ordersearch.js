var srch = document.getElementById("searchrest");
srch.addEventListener("keyup", tblSrch);





function tblSrch(){
 var input, filter, table, tr, td;

  filter = srch.value.toUpperCase();

  table = document.getElementById("otable");
  tr = table.getElementsByTagName("tr");

  for (i = 1; i < tr.length; i++) {

    td = tr[i].getElementsByTagName("td")[2];
   

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 

      else {

        tr[i].style.display = "none";
      }
    }

    else{
        tr[i].style.display="none";
      }
    }       
  }

