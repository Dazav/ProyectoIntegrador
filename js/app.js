// presentar el título como mágina de escribir
document.addEventListener("DOMContentLoaded", function() {
    // conseguir id de título
    const h1 = document.getElementById('titulo');
    // dividir el título en cada letra que incluir espacio
    h1.innerHTML = h1.textContent.replace(/./g,"<span>$&</span>");
    // configurar delay inicial
    let delay =0;
    document.querySelectorAll('span').forEach(function(span,index){
        // cada 0.05s escribir una letra
        delay+=0.05;
        // cambiar el color del palabra "psicológico" en el caso que escribir este
        if (index>11 && index<24){
            span.style.setProperty('color', '#48A45A');
        }
        // colocar propiedad al animación
        span.style.setProperty('--delay', delay+'s');
    });
});
// animación de carta del recurso
$(document).ready(function () {
    // 
    $("#btn1").on("click", function () {
        window.location.href = "";
    });
    // en el caso de clic la carta, cambiará la clase. 
    $(".carta1").on("click", function () {
        $(".carta1").toggleClass("active1"); 
    });
});
$(document).ready(function () {
    $("#btn2").on("click", function () {
        window.location.href = "";
    });
    $(".carta2").on("click", function () {
        $(".carta2").toggleClass("active2");
    });
});
$(document).ready(function () {
    // nevega a la página apoyo por bóton IR
    $("#btn3").on("click", function () {
        window.location.href = "apoyo.html";
    });
    $(".carta3").on("click", function () {
        $(".carta3").toggleClass("active3");
    });
});
//animacion de opiniones
$(document).ready(function () {
    var widthComentario = $(".comentario").width();
    var comentarioArra=document.getElementsByClassName("comentario");
    var index=0;
    $("#flecha2").on("click", function () {
        index++;
        $("#flecha1").css("color", "white");
        $("#flecha1").prop("disabled", false);
        $(".cartaList").animate({"left": -(widthComentario+50)*index*4},"easeInOut");
        console.log(widthComentario);
        if (index >= 1) {
            $("#flecha2").css("color", "#D3D3D3");
            $("#flecha1").css("color", "white");
            $("#flecha2").prop("disabled", true);
            $("#flecha1").prop("disabled", false);
        }
    });
    $("#flecha1").on("click", function () {
        index--;
        $("#flecha2").css("color", "white");
        $("#flecha2").prop("disabled", false);
        $(".cartaList").animate({"left": -(widthComentario+50)*index*4},"easeInOut");
        if (index < 1) {
            $("#flecha1").css("color", "#D3D3D3");
            $("#flecha2").css("color", "white");
            $("#flecha1").prop("disabled", true);
            $("#flecha2").prop("disabled", false);
        }
    });
});