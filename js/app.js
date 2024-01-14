// presentar el título como mágina de escribir
document.addEventListener("DOMContentLoaded", function() {
    // conseguir id de título
    const h1 = document.getElementById('titulo');
    // dividir el título en cada letra que incluir espacio
    h1.innerHTML = h1.textContent.replace(/./g,"<span>$&</span>");
    // configurar delay inicial
    let delay =0;
    document.querySelectorAll('span').forEach(function(span,index){
        // cada 0.05s escribir una letra
        delay+=0.05;
        // cambiar el color del palabra "psicológico" en el caso que escribir este
        if (index>11 && index<24){
            span.style.setProperty('color', '#48A45A');
        }
        // colocar propiedad al animación
        span.style.setProperty('--delay', delay+'s');
        console.log(delay);
    });
});
// animación de carta del recurso
$(document).ready(function () {
    // en el caso de clic la carta, cambiará la clase. 
    $(".carta1").on("click", function () {
        $(".carta1").toggleClass("active1");
    });
});
$(document).ready(function () {
    $(".carta2").on("click", function () {
        $(".carta2").toggleClass("active2");
    });
});
$(document).ready(function () {
    $(".carta3").on("click", function () {
        $(".carta3").toggleClass("active3");
    });
});