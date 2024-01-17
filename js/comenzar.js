// segurar el titulo sin caer en el caso que ha introducida correo o contraseña
$(document).ready(function () {
    $("#inputC").blur(function () { 
        if ($(this).val()!=='') {
            //si no está vacio, va a agregar estilo css "active" en la palabra "email"
            $(".email").addClass("active");
        } else {
            //si está vacio, va a quitar eso estilo css
            $(".email").removeClass("active");
        }
    });
    $("#inputC").focus(function (e) { 
        //mientras enfoque el input, lo agregará tambien
        $(".email").addClass("active");        
    });
    // debido a que la posición de "password" después de animación es ditinto que la de "email",tambien hace falta configurar este.
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
    // nombre
    $("#inputN").blur(function () { 
        if ($(this).val()!=='') {
            //si no está vacio, va a agregar estilo css "active" en la palabra "email"
            $(".nombre").addClass("active3");
        } else {
            //si está vacio, va a quitar eso estilo css
            $(".nombre").removeClass("active3");
        }
    });
    //confirma email
    $("#inputN").focus(function () { 
        //mientras enfoque el input, lo agregará tambien
        $(".nombre").addClass("active3");        
    });
});
// 
$(document).ready(function () {
    // animacion de formulario
    //configurar tiempo inicial
    var time=0;
    // conseguir todas las clases que se llama btn
    document.querySelectorAll('.btn').forEach(function(btn){
        // se aparece el elemento más tarde 0.2 s que el anterior etc...
        time+=0.2;
        // colocar time al animaction-delay
        btn.style.setProperty('--time', time+'s');
        console.log(time);
    });
    $(".continua").animate({opacity: 1},{duration: 1000});
    var time=0.5;
    document.querySelectorAll('button').forEach(function(button){
        // El primero bóton se aparece después de 0.5s
        // luego se aparece cada uno más tarde 0.3 s que el anterior etc...
        time+=0.3;
        // colocar propiedad al animación
        button.style.setProperty('--time', time+'s');
        console.log(time);
    });

});