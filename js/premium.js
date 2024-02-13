// desplazarse a la p'agina de tarjetas
$(document).ready(function () {
    var main=document.getElementById('tarjetas');;
    $(".btnDes").click(function () { 
        main.scrollIntoView({behavior: "smooth"});
    });
});
//
$(document).ready(function () {
    $(window).scroll(function () { 
        var scroll = $(window).scrollTop();
        var scrollTop= $("nav").height()*2+$(".desPlus").height();
        var scrollEnd=scrollTop+$(".intro").height();
        if (scroll>scrollTop && scroll<scrollEnd) {
            $("#intro1").css("opacity", ((scroll-scrollTop)/(scrollEnd-scrollTop)));
        }else if (scroll>scrollEnd && scroll<scrollEnd+$(".intro").height()*2) {
            $("#intro1").css("opacity", (1-(scroll-scrollEnd)/(scrollEnd-scrollTop)));
            $("#intro2").css("opacity", ((scroll-scrollEnd)/(scrollEnd-scrollTop)));
        }else if(scroll>scrollEnd+$(".intro").height()*2) {
            $("#intro2").css("opacity", (1-(scroll-scrollEnd-$(".intro").height())/(scrollEnd-scrollTop)));
        }
    });
});