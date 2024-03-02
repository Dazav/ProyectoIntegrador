// animación de título
$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b){
        time +=0.2;
        b.style.setProperty("--delayTitulo", time+'s');
    });
});
// animación de preguntas
$(document).ready(function () {
    var widthPregunta=$(".pregunta").width();
    var preguntaArray=document.getElementsByClassName("pregunta");
    var index=0;
    $("#flecha2").on("click", function () {
        index++;
        $("#flecha1").css("color", "black");
        $("#flecha1").prop("disabled", false);
        $(".preguntas").animate({
            left : -widthPregunta*index,
        },"easeInOut");
        if (index >= preguntaArray.length-1) {
            $("#flecha2").css("color", "#D3D3D3");
            $("#flecha1").css("color", "black");
            $("#flecha2").prop("disabled", true);
            $("#flecha1").prop("disabled", false);
        }
    });
    $("#flecha1").on("click", function () {
        index--;
        $("#flecha2").css("color", "black");
        $("#flecha2").prop("disabled", false);
        console.log(index+"/"+preguntaArray.length);
        $(".preguntas").animate({"left": -widthPregunta*index},"easeInOut");
        if (index <= 0) {
            $("#flecha1").css("color", "#D3D3D3");
            $("#flecha2").css("color", "black");
            $("#flecha1").prop("disabled", true);
            $("#flecha2").prop("disabled", false);
        }
    });
});
// animación de otros ejercicios
$(document).ready(function () {
    $(window).scroll(function () { 
        var scrollTop = $(document).scrollTop()
        var topApoyoMitad=$(".apoyoTitulo").height()+$(".parte_preguntas").height()/2;
        var time=0;
        if (scrollTop > topApoyoMitad) {
            $('.otroEje').each( function (index,otroEje) { 
                time +=500;
                switch (index) {
                    case 0:
                        $(otroEje).delay(time).animate({
                            opacity:1,
                            left: "0",
                        },1000);
                    case 1:
                        $(otroEje).delay(time).animate({
                            opacity:1,
                            right: "0",
                        },1000);
                    case 2:
                        $(otroEje).delay(time).animate({
                            opacity:1,
                            bottom: "0",
                        },1000);
                }
            }); 
        }
    });        
});
// despalazarse a otro página que se llama "pregunta de otro pagina"
$(document).ready(function () {
    var pregunta = document.getElementById("preguntaOtra");
    $(".bxs-caret-down-circle").click(function () { 
        $(pregunta).css({
            height: "100vh",
            opacity: 1,
        });
        pregunta.scrollIntoView({ behavior: 'smooth' });
        $(".contenido").find(".masPregunta").css({
            height:"0",
            opacity: 0
        });
        $(".up-icon").animate({
            opacity:1,
        },500,function () { 
            $(".up-icon").css({
                backgroundColor: "#969090",
                transition: "1s"
            });
            $(".bx-caret-up-circle").animate({
                bottom: "5px"
            });
            $(pregunta).addClass("active-bg");
        });
    });
    // volver a página Otro ejercicios
    var carta=document.querySelector("main");
    $(".bx-caret-up-circle").click(function () { 

        $(".bx-caret-up-circle").animate({
            bottom: "60px",
        },500,function () { 
            carta.scrollIntoView({ behavior: 'smooth' });
            $(pregunta).animate({
                height: "0",
                opacity: 0,
            },1000);
         });
         $(".up-icon").css({
            backgroundColor: "#ffffff",
            transition: "1s"
        });
        $(".up-icon").animate({
            opacity:0,
        },500);
        $(".contenido").animate({
            height: "0",
        });
        $(".contenido").find(".masPregunta").css({
            height:"0",
            opacity: 0
        });
    });
// animación carta de otra pregunta de otro ejercicios
    // basicamente realizar la animaci'on de carta después de clic a través de zindex mientras cada fondo cambiable corresponder a cada carta por foreach
    // carta  0 1 2         0       1       2
    // zindex 2 1 0  bottom b0      b1      b2
    // zindex 0 2 1         b0+40   b1-20   b2-20
    $(".cartaP").click(function () {
        //para obtener bottom 
        var widthT=$(pregunta).width();
        var heightT=$(pregunta).height();
        var widthC=$(".cartaP").width();
        var heightC=$(".cartaP").height();
        //obtener dom cartaP 
        $(".cartaP").each(function (index, cartaP) { 
            //conseguir la posici'on de carta
            var position = $(cartaP).position();
            var bottom = heightT-heightC-position.top;
            var right = widthT-widthC-position.left;
            var zindex=$(cartaP).css("z-index");
            console.log(index);
            zindex++;
            // colocar la tarjeta más delantera al final en clic proxima
            if (zindex > 2) {
                zindex=0;
                bottom=bottom+40;
                right=right+40;
                $(cartaP).animate({
                    zIndex: zindex,
                    bottom: bottom,
                    right: right,
                    opacity: 0
                },200,function(){
                    $(cartaP).animate({
                        opacity: 1
                    })
                });
                $(".contenido").eq(index).animate({
                    height: "100vh",
                },1000);
                $(".contenido").eq(index).find(".masPregunta").animate({
                    height: "100%",
                    opacity: 1
                });
            }else{
                //otras avanzarán
                bottom=bottom-20;
                right=right-20;
                $(cartaP).animate({
                    zIndex: zindex,
                    bottom: bottom,
                    right: right,
                },200);
                $(".contenido").eq(index).animate({
                    height: "0",
                });
                $(".contenido").eq(index).find(".masPregunta").animate({
                    height: "0",
                    opacity: 0
                });
            }
        });
    });
    
});

// Definir toggleMenu en el ámbito global

$(document).ready(function() {
    // Asigna el evento click al botón de menú usando jQuery
    $('.menu-mobile').click(function() {
        // Alterna las clases 'active' para los elementos del menú y del botón de inicio de sesión
        $('.menu').toggleClass('active');
        $('.iniciarUser').toggleClass('active');
    });
});
// // conseguir id_ejercicio a través de bóton del tarjeta
// $(document).ready(function () {
//     $(".bxs-caret-down-circle").each(function (index, boton) { 
//         $(boton).click(function () { 
//             $("#idEje").val(index+2);//guardar id de ejercicio
//             $.ajax({
//                 type: "POST",
//                 url: "ejercicio.php",
//                 data: {idEje: $("#idEje").val()},
//             });
//         });
//     });
// });