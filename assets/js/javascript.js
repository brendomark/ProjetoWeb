var div1;
var div2;
var div3;

window.onload = function(){
    div1 = document.getElementById("div1");
    div2 = document.getElementById("div2");
    div3 = document.getElementById("div3");

    var bt1 = document.getElementById("bt1");
    bt1.onclick = mostrarDiv1;
    var bt2 = document.getElementById("bt2");
    bt2.onclick = mostrarDiv2;
    var bt3 = document.getElementById("bt3");
    bt3.onclick = mostrarDiv3;

    div1.classList.add("escondido");
    div2.classList.add("escondido");
    div3.classList.add("escondido");
}

function mostrarDiv1(){
    div1.classList.remove("escondido");
    div2.classList.add("escondido");
    div3.classList.add("escondido");
}

function mostrarDiv2(){
    div1.classList.add("escondido");
    div2.classList.remove("escondido");
    div3.classList.add("escondido");
}

function mostrarDiv3(){
    div1.classList.add("escondido");
    div2.classList.add("escondido");
    div3.classList.remove("escondido");
}