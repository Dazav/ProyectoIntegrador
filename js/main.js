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