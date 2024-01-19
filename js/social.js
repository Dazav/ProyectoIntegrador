$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b) {  
        time += 0.2;
        b.style.setProperty("--delay", time+"s");
    });
});
// 
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
        bottom: "-100px",
        right:"-50px",
    });
    $(window).scroll(function () { 
        var scrollTop = $(document).scrollTop()
        var topTitulo=$(".forosTitulo").height()/3;
        var time=0;
        if (scrollTop > topTitulo) {
            $('.tema').each( function (index,tema) { 
                time +=300;
                $(tema).delay(time).animate({
                    opacity:1,
                    bottom: "0",
                    right:"0"
                },{
                    duration: 500
                });
            }); 
        }
    });        
});


//
$(document).ready(function () {
    // buscar tema
    $("i").on("click", function () {
        var contenido=$("#buscarInput").val(); 
        console.log(contenido);
        $(".temaTitulo").each(function (index,titulo){
            var tituloContenido=$(titulo).text().trim();

            if(contenido!=tituloContenido){
                //1
                $(".tema").eq(index).animate({ opacity: 0 }, function() {
                    $(this).css("display", "none");
                });
            }
            if(contenido==""){
                $(".tema").animate({ opacity: 1 }, function() {
                    $(this).css("display", "flex");
                });
            };
        });
    });
});