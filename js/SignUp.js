var modal = document.getElementById('signUp');

document.getElementById("createM").addEventListener("click", createAcc);
document.getElementById("closeM").addEventListener("click", closeMod);
document.getElementById("cancelM").addEventListener("click", closeMod);


function createAcc() {
    document.getElementById('signUp').style.display='block';
}

function closeMod(){
	document.getElementById('signUp').style.display='none';
}
