//animacion títulos
$(document).ready(function () {
    $("main>h2").html(function () { 
        return $(this).text().replace(/([^\s])/g,"<span>$&</span>");
     });

    var time=0;
    $("main>h2>span").each(function (index,span) {
        time += 200;
        span.style.setProperty("--time", time+"ms");
    });
});
//animación de las temas
$(document).ready(function () {
    var tiempo=0;
    $(".tema-ansiedad>div").each(function (index, tema) {
        // element == this
        tiempo+=500;
        $(tema).hover(function () {
                // over
                $(this).animate({ 
                    scale: 0.95, 
                    boxShadow: "0 0 10px #6545A1"},200);
            }, function () {
                // out
                $(this).animate({ 
                    scale: 1, 
                    boxShadow: "0 0 10px #00000025"},200);
            }
        );
        switch (index) {
            case 0:
            $(tema).css({
                position:"relative",
                right:"200px",
            });
            $(tema).delay(tiempo).animate({
                opacity:1,
                right:"0px"
            },1000);
            break;
            case 1:
                $(tema).css({
                    position:"relative",
                    left:"200px",
                });
                $(tema).delay(tiempo).animate({
                    opacity:1,
                    left:"0px"
                },1000);
            break;
            case 2:
                $(tema).css({
                    position:"relative",
                    right:"200px",
                });
                $(tema).delay(tiempo).animate({
                    opacity:1,
                    right:"0px"
                },1000);
            break;
            case 3:
                $(tema).css({
                    position:"relative",
                    left:"200px",
                });
                $(tema).delay(tiempo).animate({
                    opacity:1,
                    left:"0px"
                },1000);
            break;
        }

    });
});
