//
$(document).ready(function () {
    $(".bx-menu").click(function () { 
        $("html,body").animate({
            scrollTop: $(".califica").offset().top
        },2000,"easeInOutExpo");
        $("aside").animate({
            left:"0%",
        },2000,"easeInOutExpo");
        $("section").animate({
            width:"80%",
            marginLeft:"20%"
        },2000,"easeInOutExpo");
    });
});
//
$(document).ready(function () {
    $(".bx-x").click(function(){
        $("aside").animate({
            left:"-20%"
        },1500,"easeInOutExpo");
        $("section").animate({
            width:"100%",
            marginLeft:"0%"
        },1500,"easeInOutExpo");
    });
});

function buscador() {  
    // Contenido introducido en el campo de búsqueda
    var contenido = $(".buscador").val().toUpperCase(); 

    // Restablecer estilos de todas las tarjetas de terapeutas
    $(".tarjeta-tera").css("display", "flex"); 

    // Iterar sobre cada tarjeta de terapeuta
    $(".tarjeta-tera").each(function (index, tarjeta) {
        var tarjetaContenido = $(tarjeta).text().trim().toUpperCase();

        // Ocultar la tarjeta de terapeuta si no coincide con el contenido buscado
        if (tarjetaContenido.indexOf(contenido) === -1) {
            $(tarjeta).css("display", "none");
        }
    });
}
$(document).ready(function () {
    // buscar tema
    $(".bx-search").on("click", function () {
        buscador();
    });

    // buscar tema existente en cada momento
    $(".buscador").on("input", function () {
        buscador();
    }).keydown(function (e) {
        // 13 es el código de tecla "intro" y 8 es el código de tecla "borrar"
        if (e.which == 8 || e.which == 13) {
            buscador();
        }
    });
});