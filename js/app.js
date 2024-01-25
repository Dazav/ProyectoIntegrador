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
        // colocar propiedad al animación
        span.style.setProperty('--delay', delay+'s');
    });
});
//animación de scroll de introducción2
$(document).ready(function () {
    $(window).scroll(function () { 
        var scrollTop = $(document).scrollTop();
        var scrollStart = 0;
        var scrollFin=$(".introduccion1").height()*2/3;
        var scrollPorcentaje = (scrollTop - scrollStart)/(scrollFin - scrollStart)
        $(".foto").css({
            position: "relative",
        });
        if (scrollTop > scrollStart && scrollTop<=scrollFin) {
            //animación de imagen en el caso que el barra bajando cada momento
            $(".foto").css({
                right: (95-scrollPorcentaje*100)+"%",
                scale: scrollPorcentaje,
                opacity: scrollPorcentaje
            });
        } 
        // else if (scrollTop>scrollFin){
        //     $(".contenido>p:first-child").html(
        //         $(".contenido>p:first-child").text().replace(/\S/g, "<span>$&</span>")
        //     );            
        //     let time=0;
        //     $(".contenido>span").each(function (index, element) {
        //         // element == this
        //         time+=0.05;
        //         console.log(time);
        //         element.style.setProperty("--timeContenido", time+"s");
        //     });
        // }
    });
});
// animación de carta del recurso
$(document).ready(function () {
    // 
    // en el caso de entre la carta, se presenta la descripción
    $(".carta1").mouseenter(function () {
        $(".carta1").addClass("active1"); 
    }).mouseleave(function () {
        $(".carta1").removeClass("active1");
    });
});
$(document).ready(function () {
    $(".carta2").mouseenter(function () {
        $(".carta2").addClass("active2");
    }).mouseleave(function () {
        $(".carta2").removeClass("active2");
    });
});
$(document).ready(function () {
    // nevega a la página apoyo por bóton IR
    $(".carta3").mouseenter(function () {
        $(".carta3").addClass("active3");
    }).mouseleave(function () { 
        $(".carta3").removeClass("active3");
    });
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