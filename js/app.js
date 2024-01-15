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
    // en el caso de clic la carta, cambiará la clase. 
    $("#btn1").on("click", function () {
        window.location.href = "";
    });
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
    $("#btn3").on("click", function () {
        window.location.href = "";
    });
    $(".carta3").on("click", function () {
        $(".carta3").toggleClass("active3");
    });
});
//animacion de scroll
$(document).ready(function () {
    //coloca opacidad inicial
    $(".introduccion2").css("opacity",0.5);
    //desplazarse
    $(window).scroll(function () { 
        //conseguir Y de sitio actual
        let scrollY = window.scrollY;
        //offset div introduccion2
        var offsetIntroduccion2 = $('.introduccion2').offset();
        //conseguir altura de introduccion1
        var h = $('.introduccion1').height();
        //configura valor limite de animación
        var top = offsetIntroduccion2.top-h/2;
        var bottom = offsetIntroduccion2.top-h/3;
        //para que pueda cambiar el estilo css en cada momento
        const scrollPorcentaje = (scrollY-top)/(bottom-top);
        if (scrollY > top) {
            // console.log(scrollPercentage);
            $(".introduccion2").animate({
                //se muestra por la opacidad desde 0.5 hasta 1
                opacity:scrollPorcentaje+0.5
            },{
                duration: 1
            });
        }else{
            $(".introduccion2").css("opacity",0.5);
            // console.log(false);
        }
    });
});
//animacion de opiniones
$(document).ready(function () {
    var heightComentario = $(".comentario").height();
    var comentarioArra=document.getElementsByClassName("comentario");
    var index=0;
    $("#flecha1").on("click", function () {
        index++;
        $(".cartaList").animate({"top": -(heightComentario+10)*index},"easeInOut");
        if (index == comentarioArra.length-4) {
            $("#flecha1").css("color", "#D3D3D3");
            $("#flecha2").css("color", "white");
            $("#flecha1").prop("disabled", true);
            $("#flecha2").prop("disabled", false);
        }
    });
    $("#flecha2").on("click", function () {
        index--;
        $(".cartaList").animate({"top": -(heightComentario+10)*index},"easeInOut");
        if (index < 1) {
            $("#flecha2").css("color", "#D3D3D3");
            $("#flecha1").css("color", "white");
            $("#flecha2").prop("disabled", true);
            $("#flecha1").prop("disabled", false);
        }
    });
});