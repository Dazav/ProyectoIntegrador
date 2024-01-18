// animación de título
$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b,index){
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
        console.log(index);
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
    // $(window).scroll(function () { 
    //     var scrollTop = $(document).scrollTop()
    //     var topApoyoMitad=$(".apoyoTitulo").height()/2;
            var time=0;
            
            // document.querySelectorAll(".otroEje").forEach(function (otroEje,index){
            //     time +=0.2;
            //     otroEje.style.setProperty("--otroEje", time+'s');

            // });
            $('.otroEje').each( function (index,otroEje,) { 
                time +=0.2;
                 console.log(index,otroEje,time);
            });
                // $(".otroEje").animate({
                //     top:0,
                //     opacity:1
                // },{
                //     delay: del,
                //     duration: 2000
                // });
    // });        
});
