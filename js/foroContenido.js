$(document).ready(function () {
    $(".bx-arrow-back").click(function () { 
        window.location.href="foros.php";
    });

    // altitud de comentario
    var h=$(".comentario_arti").height()+60;
    //animación de bóton del responder
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
$(document).ready(function () {
    //animación de contenido
    $(".articulo").html(
        $(".articulo").text().replace(/([^\s])/g,"<span>$&</span>")
    );
    let time=0;
    $(".articulo>span").each(function () { 
        time+=100;

        this.style.setProperty('--timeP', time+'ms')
    });
});