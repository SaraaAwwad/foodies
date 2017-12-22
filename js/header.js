window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.documentElement.scrollTop > 120) {
        document.getElementById("navmenu").style.backgroundColor = "white";
    } else {
        document.getElementById("navmenu").style.backgroundColor = "";
    }
}
