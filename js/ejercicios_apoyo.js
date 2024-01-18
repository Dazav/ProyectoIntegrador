// animación de título
$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b,index){
        time +=0.5;
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
    //configurar estado inicial
    $(".otroEje").css({
        position: "relative",
        opacity:0,
        top: "-100px"
    });
    $(window).scroll(function () { 
        var scrollTop = $(document).scrollTop()
        var topApoyoMitad=$(".apoyoTitulo").height();
        var time=500;
        if (scrollTop > topApoyoMitad) {
            $('.otroEje').each( function (index,otroEje) { 
                time +=500;
                $(otroEje).delay(time).animate({
                    opacity:1,
                    top: "0"
                },{
                    duration: 500
                });
                console.log(otroEje);
            }); 
        }
    });        
});
