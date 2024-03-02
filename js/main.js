$(document).ready(function () {
    $(".bx-menu").click(function () { 
        $("nav,.menu,.iniciarUser").toggleClass("resp-active");
    });
});

// Definir toggleMenu en el ámbito global

$(document).ready(function() {
    // Asigna el evento click al botón de menú usando jQuery
    $('.menu-mobile').click(function() {
        // Alterna las clases 'active' para los elementos del menú y del botón de inicio de sesión
        $('.menu').toggleClass('active');
        $('.iniciarUser').toggleClass('active');
    });
});
//solver problema de bóton que no puede navegar
$(document).ready(function () {
    $("#iniciar").click(function () { 
        window.location.href="registrar.php";
    });
    $("#comenzar").click(function () { 
        window.location.href="registrar.php?mostrar=registro";
    });
});