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

// carusel movile
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.terapeutas-carousel');
    const prevBtn = document.querySelector('.carousel-control.prev');
    const nextBtn = document.querySelector('.carousel-control.next');

    let currentPosition = 0;
    const cardWidth = carousel.querySelector('.tarjeta-tera').offsetWidth;
    const cardMarginRight = parseInt(window.getComputedStyle(carousel.querySelector('.tarjeta-tera')).marginRight);

    // Configurar el ancho del carousel
    carousel.style.width = (cardWidth + cardMarginRight) * carousel.children.length + 'px';

    nextBtn.addEventListener('click', () => {
        if (currentPosition > -(carousel.offsetWidth - carousel.parentNode.offsetWidth)) {
            currentPosition -= cardWidth + cardMarginRight;
            carousel.style.transform = `translateX(${currentPosition}px)`;
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentPosition < 0) {
            currentPosition += cardWidth + cardMarginRight;
            carousel.style.transform = `translateX(${currentPosition}px)`;
        }
    });
});