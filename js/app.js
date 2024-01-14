document.addEventListener("DOMContentLoaded", function() {
    const h1 = document.getElementById('titulo');
    h1.innerHTML = h1.textContent.replace(/./g,"<span>$&</span>");
    let delay =0;
    document.querySelectorAll('span').forEach(function(span,index){
        delay+=0.05;
        if (index>11 && index<24){
            span.style.setProperty('color', '#48A45A');
        }
        span.style.setProperty('--delay', delay+'s');
        console.log(delay);
    });
});
$(document).ready(function () {
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