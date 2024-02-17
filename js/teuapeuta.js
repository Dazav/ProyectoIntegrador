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