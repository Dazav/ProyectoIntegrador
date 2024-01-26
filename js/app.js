// presentar el título como mágina de escribir
document.addEventListener("DOMContentLoaded", function() {
    // conseguir id de título
    const h1 = document.getElementById('titulo');
    // dividir el título en cada letra que incluir espacio
    h1.innerHTML = h1.textContent.replace(/./g,"<span>$&</span>");
    // configurar delay inicial
    let delay =0;
    document.querySelectorAll('#titulo>span').forEach(function(span,index){
        // cada 0.05s escribir una letra
        delay+=0.05;
        // colocar propiedad al animación
        span.style.setProperty('--delay', delay+'s');
    });

    // animación de imagenes
    $(".introduccion1>div:last-child img").animate({
        bottom:"0%",
        opacity: 1,
    },1000);
    $(".introduccion1 .bg-verde").delay(500).animate({
        opacity: 0.8,
        scale:1
    },1000);
});
//animación de scroll de introducción2
$(document).ready(function () {
    //configurar el tiempo inicial
    var time=0;
    // dividir contenido en cada letra y guardar las letras en forma de etiqueta span.
    $(".contenido>p").each(function (index, element) {
        $(element).html(function () {  
            return $(this).text().replace(/([^\s])/g,"<span>$&</span>");
        });
    });
    // la barra se despalaza
    $(window).scroll(function () { 
        var scrollTop = $(document).scrollTop();
        var scrollStart=$(".introduccion1").height()*2/3;
        var scrollFin=$(".introduccion1").height();
        var scrollPorcentaje=(scrollTop-scrollStart)/(scrollFin-scrollStart);
        if (scrollTop > scrollStart && scrollPorcentaje<=1) {
            //animación de imagen en el caso que el barra bajando cada momento
            $(".foto>div:first-child").animate({
                left: "-2%",
                bottom: "2%",
                opacity: 1
            },500);
            $(".foto>div:last-child").animate({
                left: "2%",
                bottom: "14%",
                opacity: 0.7
            },500);
            // animación de título
            $(".contenido>h1").animate({
                top: "0",
                opacity: 1
            },500);
            //animación de contenido
            $(".contenido p>span").each(function (index,span) {
                time+=10;
                $(span).delay(time).animate({
                    opacity: 1,
                });
            });
            // animación de linea horizontal
            $(".introduccion2+hr").css({
                width: scrollPorcentaje*70+"%",
                opacity:scrollPorcentaje,
            });
        }
    });
});
// animación de carta del recurso
$(document).ready(function () {
    // 
    // en el caso de clic bóton add, se presenta la descripción
    $(".bx-plus-circle").click(function () {
         var p=$(this).siblings("p");
         var img=$(this).siblings("center").find("div");
         if (!$(this).hasClass("bxs-plus-circle")) {
            $(p).animate({
                height: "140px",
                opacity:1
            },500);
            $(img).animate({
                height: "0px",
                opacity:0
            },500);
            $(this).addClass("bxs-plus-circle");
            toggle = true;
         }else{
            $(p).animate({
                height: "0",
                opacity:0
            },500);
            $(img).animate({
                height: "170px",
                opacity:1
            },500);
            $(this).removeClass("bxs-plus-circle");
            toggle = false;
         }
    });
    // 
});
//animacion de opiniones
$(document).ready(function () {
    var widthComentario = $(".comentario").width();
    var paddingRight= parseInt($(".comentario").css("padding-right"),10);
    var marginRight = parseInt($(".comentario").css("margin-right"),10);
    var comentarioArra=document.getElementsByClassName("comentario");
    var index=0;
    $("#flecha2").on("click", function () {
        index++;
        $("#flecha1").css("color", "white");
        $("#flecha1").prop("disabled", false);
        // mover iziquierda longitud de 4 comentarios
        $(".cartaList").animate({"left": -(widthComentario+(paddingRight+marginRight)*2)*index*4},"easeInOut");
        //se para en el caso que longitud de mover es mayor que longitud de array de comentarios
        if (index >= comentarioArra.length/4-1) {
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
        $(".cartaList").animate({"left": -(widthComentario+(paddingRight+marginRight)*2)*index*4},"easeInOut");
        //se para en el caso que se mueve en sitio primero.
        if (index < 1) {
            $("#flecha1").css("color", "#D3D3D3");
            $("#flecha2").css("color", "white");
            $("#flecha1").prop("disabled", true);
            $("#flecha2").prop("disabled", false);
        }
    });
});