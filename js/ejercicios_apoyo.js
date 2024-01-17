$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b,index){
        time +=0.2;
        b.style.setProperty("--delayTitulo", time+'s');
    });
});