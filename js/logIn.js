// segurar el titulo sin caer en el caso que ha introducida correo o contraseña
$(document).ready(function () {
    $("#inputC").blur(function () { 
        if ($(this).val()!=='') {
            $(".email").addClass("active");
        } else {
            $(".email").removeClass("active");
        }
    });
    $("#inputC").focus(function (e) { 
        $(".email").addClass("active");        
    });
    $("#inputP").blur(function () { 
        if ($(this).val()!=='') {
            $(".pwd").addClass("active2");
        } else {
            $(".pwd").removeClass("active2");
        }
    });
    $("#inputP").focus(function (e) { 
        $(".pwd").addClass("active2");        
    });
});
// 
$(document).ready(function () {
    // animacion de formulario
    var time=0;
    document.querySelectorAll('.btn').forEach(function(btn){
        // cada 0.05s escribir una letra
        time+=0.2;
        // colocar propiedad al animación
        btn.style.setProperty('--time', time+'s');
        console.log(time);
    });
    $(".continua").animate({opacity: 1},{duration: 1000});
    var time=0.5;
    document.querySelectorAll('button').forEach(function(button){
        // cada 0.05s escribir una letra
        time+=0.3;
        // colocar propiedad al animación
        button.style.setProperty('--time', time+'s');
        console.log(time);
    });

});