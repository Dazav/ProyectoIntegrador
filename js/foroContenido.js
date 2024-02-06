$(document).ready(function () {
    $(".bx-arrow-back").click(function () { 
        window.location.href="foros.php";
    });

    // altitud de comentario
    var h=$(".comentario_arti").height()+60;
    $(".comentarios_arti>form").css({
        height:"0px",
        opacity:0,
        top:"10px",
    });
    $(".responder").click(function(){
        $(".comentarios_arti>form").animate({
            height:h+"px",
            opacity: 1,
            top:"0px",
        },500);
    });
    $(".comentarios_arti>form>div>input[type='button']").click(function(){
        $(".comentarios_arti>form").animate({
            height:"0px",
            opacity: 0,
            top:"10px",
        },500);
    });
});