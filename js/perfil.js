//animación de hover button
$(document).ready(function () {
    $(".btn>button").hover(function () {
            // over
            $(".bg-img>img").addClass("active");
        }, function () {
            // out
            $(".bg-img>img").removeClass("active");
        }
    );
});
// animación de editar
$(document).ready(function () {
    $(".btn>button").click(function () { 
        $(".editar").css({zIndex:"100"}).animate({
            height: "600px",
            top: "150px",
            opacity: 1,
        },1000,"easeInOutBack");
    });
    $(".editar>.bx-x").click(function () { 
        $(".editar").animate({
            height: "0",
            top: "0",
            opacity: 0,
            zIndex: -1
        },1000,"easeInOutCirc"); 
    }).hover(function () {
        $(this).toggleClass("bxs-x-circle");
    });
});
// animación de tarjeta 
$(document).ready(function () {
    $(".bxs-credit-card-alt").click(function () { 
        $(".pago").css({zIndex:"100"}).animate({
            right: "500px",
            opacity: 1,
        },1000,"easeInOutBack");
    });
    $(".pago>.bx-x").click(function () { 
        $(".pago").animate({
            right: "0",
            opacity: 0,
            zIndex: -1
        },1000,"easeInOutCirc"); 
    }).hover(function () {
        $(this).toggleClass("bxs-x-circle");
    });
});