//la deferencia de tiempo de aparecer el título
$(document).ready(function () {
    var time=0;
    $("b").each(function () {  
        time += 0.2;
        $(this).css("--delay", time+"s");
    });
});
// animación hover de icon de buscador
$(document).ready(function () {
    var agitar="bx-tada";
    $("input").mouseenter(function () { 
        $("i").addClass(agitar);
    }).mouseleave(function () { 
        $("i").removeClass(agitar);
    });
});
//animacion del tema
$(document).ready(function () {
    //configurar estado inicial
    $(".tema").css({
        position: "relative",
        opacity:0,
        bottom: "20px",
        right:"-50px",
        transform: "rotateX(-20deg) rotateY(25deg)",
        transformOrigin: "-20% 0"
    });
    //desplazarse el barra de deplazamiento del nevagador
    $(window).scroll(function () { 
        var scrollTop = $(document).scrollTop()
        //
        var topTitulo=$(".forosTitulo").height()/3;
        var time=0;
        if (scrollTop > topTitulo) {
            $('.tema').each( function (index,tema) { 
                time +=400;
                $(tema).delay(time).animate({
                    opacity:1,
                    bottom: "0",
                    right:"0"
                },500, function () {
                    $(this).css({
                        transformOrigin: "50% 0",
                        transition: "0.4s ease-in-out"
                    });
                });
            }); 
        }
    });
    //expandir la carta de tema por clic

    $(".descripcion").on("click", function () {
        //expandir la carta de tema
        var tema= $(this).closest(".tema");
        $(tema).css({
            height: "80vh",
            transform:  "rotate(0) scale(0.95) ",
            transformOrigin: "0 0",
            transition: "0.5s ease-in-out",
            zIndex:100//cubrir tema actual arriba las cartas de temas no seleccionado
        });
        // encuentro la descripción, artículo escondido y imagen de autor de la tema que tomo clic actual
        var descripcionClic=$(this).siblings(".descripcionClic");
        var imgAutor=$(this).siblings(".imgAutor");
        $(this).css("display", "none");
        $(imgAutor).css("display", "none");
        //aparecer la artículo escondida
        $(descripcionClic).css("display", "block");
    }); 
    //tocar marca de volver
    $(".bx-arrow-back").hover(function(){
        $(this).toggleClass("bx-fade-left");
        $(this).css("font-weight", "bolder");
    },
    function () {  
        $(this).toggleClass("bx-fade-left");
        $(this).css("font-weight", "normal");
    });
    //clic marca de volver
    $(".bx-arrow-back").on("click",function () { 
        var tema = $(this).closest(".tema");
        $(tema).find(".descripcionClic").css("display", "none");
        $(tema).css({
            width: "800px",
            height: "200px",
            transform: "rotateX(-20deg) rotateY(25deg)",
            transformOrigin: "50% 50%",
            transition: "0.5s ease-in-out",
            zIndex:0
        })
        $(tema).find(".descripcion").css("display", "block");
        $(tema).find(".imgAutor").css("display", "block");
    });
    // responder desaparece y aparecer el formulario
    $(".responder").click(function () { 
        var form=$(this).siblings("form");
        $(form).animate({
            height: "300px",
            opacity: "1"
        },500);
        $(this).css("display", "none")
    }); 
    $("input:submit").click(function () { 
        //animacion de formulario
        var form=$(this).closest("form");
        $(form).animate({
            height:"0",
            opacity:"0"
        },500);
        //animacion de bóton repuesta
        var repuesta=$(this).closest("form").siblings(".responder");
        $(repuesta).css("display", "block")
        //agregar comentario introducido
        $(form).submit(function (e) { 
            e.preventDefault();
        
            var nombre=$(form).find("input[type='text']").val();
            var date=$(form).find("input[type='date']").val();
            var textarea=$(form).find("textarea").val();
            //agregar comentario introducido
            var comentario=$(this).closest(".descripcionClic").find(".comentarios_arti")
            $(comentario).append(
            "<div class='comentario_arti'>"+
                "<img src='../img/img7.png'>"+
                "<div>"+
                    "<h2>"+nombre+"</h2>"+
                    "<p>"+textarea+"</p>"+
                    "<p>"+date+"</p>"
                    +"</div>"+
            "</div>");
        });
    });
});
//buscador
$(document).ready(function () {
    // buscar tema
    $("i").on("click", function () {
        var contenido=$("#buscarInput").val().toUpperCase(); 
        $(".temaTitulo").each(function (index,titulo){
            var tituloContenido=$(titulo).text().trim().toUpperCase();

            if(contenido!=tituloContenido){
                //1
                $(".tema").eq(index).css("display", "none");

            }
            if(contenido==""){
                $(".tema").css("display", "flex");
            };
        });
    });
});

