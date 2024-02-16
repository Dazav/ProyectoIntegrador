
$(document).ready(function () {
    // desplazarse a la p'agina de tarjetas por bóton
    var main=document.getElementById('tarjetas');
    $(".btnDes").click(function () { 
        // main.scrollIntoView({behavior: "smooth"});
        $("html, body").animate({
            scrollTop: $(".titulo").offset().top//llegar parte descripción y titulo
          }, 2000,"easeInExpo",function () { 
            $(this).animate({
                scrollTop: $(".last-intro").offset().top
            },15000,"linear" ,function () { 
                $(this).animate({
                    scrollTop: $(main).offset().top//llegar tarjeta
                },2000, "easeOutCubic")
            });
        });
    });
    // arriba a la p'agina de tarjetas por bóton
    $(".bx-up-arrow-circle").click(function () { 
        $("html, body").animate({
            scrollTop: 0
          },4000,"easeInOutExpo");
    });
});
//
$(document).ready(function () {
    var scrollTop= $("nav").height()*2+$(".desPlus").height();
    var scrollEnd=scrollTop+$(".intro").height();
    var scrollEnd2=scrollEnd+$(".intro").height();
    var scrollEnd3=scrollEnd2+$(".intro").height();
    $(window).scroll(function () { 
        var scroll = $(window).scrollTop();
        if (scroll>scrollTop && scroll<scrollEnd) {
            $("#intro1").css("opacity", ((scroll-scrollTop)/(scrollEnd-scrollTop)));
        }else if (scroll>scrollEnd && scroll<scrollEnd2) {
            $("#intro1").css("opacity", (1-4*(scroll-scrollEnd)/$(".texto").height()));
            $("#intro2").css("opacity", ((scroll-scrollEnd)/(scrollEnd2-scrollEnd)));
        }else if(scroll>scrollEnd2 && scroll<scrollEnd3) {
            $("#intro2").css("opacity", (1-4*(scroll-scrollEnd2)/($(".texto").height())));
            $(".last-intro>p").css("opacity", ((scroll-scrollEnd2+20)/(scrollEnd2-scrollEnd)));
            $(".texto").css({scale:1-(scroll-scrollEnd2)/(scrollEnd2-scrollEnd)})
        }
        // animación carta
        var scrollTopPre =scrollTop+$(".titulo").height();
        console.log(scrollTopPre+"\n"+scroll);
        if (scroll>=scrollTopPre) {
            $(".tarjeta").addClass("active");
        }
        
    });

});