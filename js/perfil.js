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
// animación de click buton 
$(document).ready(function () {
    $(".btn>button").click(function () { 
        $(".editar").animate({
            height: "600px",
            top: "150px",
            opacity: 1,
        },1000,"easeInOutBack");
    });
    $(".bx-x").click(function () { 
        $(".editar").animate({
            height: "0",
            top: "0",
            opacity: 0
        },1000,"easeInOutCirc");
       
    }).hover(function () {
        $(this).toggleClass("bxs-x-circle");
    });
});