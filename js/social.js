//la deferencia de tiempo de aparecer el título
$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b) {  
        time += 0.2;
        b.style.setProperty("--delay", time+"s");
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
        transformOrigin: "-20% -20%"
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
                        // transform: "rotate(0)",
                        transition: "0.4s ease-in-out"
                    });
                });
            }); 
        }
    });
    //expandir la carta de tema por clic
    $(".tema").on("click", function () {
        $(this).css({
            width: "50vw",
            height: "100vh",
            transform:  "rotate(0)",
            transformOrigin: "0 0",
            transition: "0.5s ease-in-out"
        });
        if ($(this).height()=="100vh") {
            $(this).css({
                width: "800px",
                height: "200px",
                transform: "rotateX(-20deg) rotateY(25deg)",
                transformOrigin: "50% 0",
                transition: "0.5s ease-in-out"
            });
        }
    });

        
        // $(".tema").toggleClass("temaActive");       
});
//buscador
$(document).ready(function () {
    // buscar tema
    $("i").on("click", function () {
        var contenido=$("#buscarInput").val(); 
        console.log(contenido);
        $(".temaTitulo").each(function (index,titulo){
            var tituloContenido=$(titulo).text().trim();

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

