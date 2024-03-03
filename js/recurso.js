$(document).ready(function () {
    $("#iniciar").click(function () { 
        window.location.href="registrar.php";
    });
    $("#comenzar").click(function () { 
        window.location.href="registrar.php?mostrar=registro";
    });
});
//animacion títulos
$(document).ready(function () {
    $("main>h2").html(function () { 
        return $(this).text().replace(/([^\s])/g,"<span>$&</span>");
     });

    var time=0;
    $(".primera-parte>h2>span").each(function (index,span) {
        time += 200;
        span.style.setProperty("--time", time+"ms");
    });
});
//animación de las temas
$(document).ready(function () {
    var tiempo=0;
    // atravesar para estabalecer tiempo de aparecer de cada tema
    $(".tema-ansiedad>div").each(function (index, tema) {
        tiempo+=500;
        //animación de aparecer division, el index indica cada tema
        switch (index) {
            case 0:
                //estabelecer estilo de cada uno
            $(tema).css({
                position:"relative",
                right:"200px",
            });//pone animación
            $(tema).delay(tiempo).animate({
                opacity:1,
                right:"0px"
            },1000);
            //otras temas será blanco y negro cuando el cursor sobre la tema
            $(tema).hover(function () {
                // over
                $(this).animate({ scale: 0.95},200,function () {
                        $(this).css({
                            boxShadow: "0 0 10px #6545A1",
                        });
                        $(".tema4,.tema2,.tema3,.tema5").css({
                            transition: "0.5s",
                            filter: "grayscale(100%)",
                        });
                      });
                
            }, function () {
                // se volver estilo de antes cuando el cursor se va la tema
                $(this).animate({scale: 1},200,function () {
                        $(this).css({
                            boxShadow: "0 0 10px #00000025",
                        });
                        $(".tema4,.tema2,.tema3,.tema5").css({
                            transition: "0.5s",
                            filter: "grayscale(0)"
                        });
                      });
            }
        );
            break;
            //me da pereza comentario, las animaciones siguientes son iguales que arriba
            // tema2
            case 1:
                $(tema).css({
                    position:"relative",
                    left:"200px",
                });
                $(tema).delay(tiempo).animate({
                    opacity:1,
                    left:"0px"
                },1000);
                // animación de hover
                $(tema).hover(function () {
                    // over
                    $(this).animate({scale: 0.95},200,function () {
                            $(this).css({
                                boxShadow: "0 0 10px #6545A1",
                            });
                            $(".tema1,.tema3,.tema4,.tema5").css({
                                transition: "0.5s",
                                filter: "grayscale(100%)",
                            });
                          });
                    
                }, function () {
                    // out
                    $(this).animate({scale: 1},200,function () {
                            $(this).css({
                                boxShadow: "0 0 10px #00000025",
                            });
                            $(".tema1,.tema3,.tema4,.tema5").css({
                                transition: "0.5s",
                                filter: "none"
                            });
                          });
                }
            );
            break;
            //tema3
            case 2:
                $(tema).css({
                    position:"relative",
                    right:"200px",
                });
                $(tema).delay(tiempo).animate({
                    opacity:1,
                    right:"0px"
                },1000);
                // hover
                $(tema).hover(function () {
                    // over
                    $(this).animate({ 
                        scale: 0.95, 
                        },200,function () {
                            $(this).css({
                                boxShadow: "0 0 10px #6545A1",
                            });
                            $(".tema1,.tema2,.tema4,.tema5").css({
                                transition: "0.5s",
                                filter: "grayscale(100%)",
                            });
                          });
                    
                }, function () {
                    // out
                    $(this).animate({scale: 1},200,function () {
                            $(this).css({
                                boxShadow: "0 0 10px #00000025",
                            });
                            $(".tema1,.tema2,.tema4,.tema5").css({
                                transition: "0.5s",
                                filter: "none"
                            });
                          });
                }
            );
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
                // hover
                $(tema).hover(function () {
                    // over
                    $(this).animate({scale: 0.95},200,function () {
                            $(this).css({
                                boxShadow: "0 0 10px #6545A1",
                            });
                            $(".tema1,.tema2,.tema3.tema5").css({
                                transition: "0.5s",
                                filter: "grayscale(100%)",
                            });
                          });
                    
                }, function () {
                    // out
                    $(this).animate({scale: 1},200,function () {
                            $(this).css({
                                boxShadow: "0 0 10px #00000025",
                            });
                            $(".tema1,.tema2,.tema3,tema5").css({
                                transition: "0.5s",
                                filter: "none"
                            });
                          });
                }
            );
            break;
            // tema5
            case 4:
                $(tema).css({
                    position:"relative",
                    bottom:"-20px",
                });
                $(tema).delay(tiempo).animate({
                    opacity:1,
                    bottom:"0px"
                },1000);
                // hover
                $(tema).hover(function () {
                    // over
                    $(this).animate({scale: 0.95},200,function () {
                            $(this).css({
                                boxShadow: "0 0 10px #6545A1",
                            });
                            $(".tema1,.tema2,.tema3,.tema4").css({
                                transition: "0.5s",
                                filter: "grayscale(100%)",
                            });
                          });
                    
                }, function () {
                    // out
                    $(this).animate({scale: 1},200,function () {
                            $(this).css({
                                boxShadow: "0 0 10px #00000025",
                            });
                            $(".tema1,.tema2,.tema3,.tema4").css({
                                transition: "0.5s",
                                filter: "none"
                            });
                          });
                }
            );
            break;
        }

    });
});
//animacion de segunda sección cuando llega allí
$(document).ready(function () {
    $(window).scroll(function () { 
        var scroll=$(this).scrollTop();
        var offset = $(".primera-parte").offset().top+$(".primera-parte").height()/2;
        console.log(offset);
        console.log("scroll"+scroll);
        if (scroll>=offset) {
            var time2=0;
            $(".segundo-parte>h2>span").each(function (index,span) {
                time2 += 200;
                $(span).delay(time2).animate({
                    opacity: 1,
                    right: "0px"
                },500);
            });
            // animación de linea horizontal
            $(".segundo-parte>hr").animate({
                width:"100%"
            },5000,function () {
                //animación de tarjeta
                var time3=0;
                $(".tema").each(function () { 
                    time3+=200;
                    
                 });
            });
            
        }       
    });

});