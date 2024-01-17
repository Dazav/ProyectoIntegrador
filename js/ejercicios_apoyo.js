$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b,index){
        time +=0.2;
        b.style.setProperty("--delayTitulo", time+'s');
    });
});
$(document).ready(function () {
    var widthPregunta=$(".pregunta").width();
    var preguntaArray=document.getElementsByClassName("pregunta");
    var index=0;
});