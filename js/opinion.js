//solver problema de bóton que no puede navegar
$(document).ready(function () {
    $("#iniciar").click(function () { 
        window.location.href="registrar.php";
    });
    $("#comenzar").click(function () { 
        window.location.href="registrar.php?mostrar=registro";
    });
});
// contar las opiniones y calcular promedio de cantidad estrellas
$(document).ready(function () {
    // Contar las opiniones
    var contar=0;
    var sumaStar=0;
    var a1=Array(5).fill(0);
    var starS=[];
    $("aside>section>div").each(function (index,opinion) { 
        contar=index+1;
         $(".text-opinion").text(index+1+" opiniones");//contar todos opiniones
         $(".total").text(index+1+" opiniones en total");
    });
    // promedio
    $(".opinion input").each(function (index, star) { 
        // conseguir los cantidad de estrellas
        var estrella=parseInt($(star).val());
        // añadir al array starS
        starS.push(estrella);
        // estrella de cada opinion
         sumaStar+=estrella;
         //calcula promedio
        var promedio=sumaStar/contar;
        // inserta promedio a la que necesita
        $(".promedio-star").text(promedio+" ");
        for (let i = 0; i < promedio; i++) {
            // agregar estrellas
            $(".promedio-star").append("⭐");
        }
        // porcentaje de estrellas
        for (let i = 0; i < a1.length; i++) {
            if (estrella==i+1) {
                a1[i]++;
            }
        }
    });
    // longitud de %
    $(".star>div").each( function (index, longitud) { 
        $(longitud).animate({width: a1[index]*100/contar+"%"},2000);
    });
    // agregar estrella correspondiente al cada opinion
    $(".star-cada").each( function (index, star) { 
        for (let i = 0; i < starS[index]; i++) {
            $(star).append("⭐");
        }
    });
});
// animacion de navagar a parte main
$(document).ready(function () {
    // click bóton
    $(".opinion-nav").click(function () { 
        $("html,body").animate({
            scrollTop: ($("main").offset().top-70)+"px"//quita altura del menu
        },1000,"easeInExpo");
    });
});
// en caso apuntar  estrellas
$(document).ready(function () {
    var click=false;
    // conseguir obj de todas estrellas
    $(".estrellas>input").each(function (index, star) { 
        //en caso hover sin clic
        $(star).hover(function () {
            // comprobar si está clic
            if (!click) {
                for (let i = 0; i <= index; i++) {
                    // las estrellas delante de la tocado se convierte en moradas
                    $(".estrellas>input").eq(i).css({ background: "#6541A6"});
                    $("fieldset>span").text(i+1);
                }
            }
        }, function () {
            // el cursor se va a las estrellas
            if (!click) {
                $(".estrellas>input").css({background:"#cecece"});
                $("fieldset>span").text(0);  
            }
        });   
         //en caso elegir las estrellas
         $(star).click(function () { 
            click=true;
            for (let i = 0; i <= index; i++) {
                // las estrellas delante de esto se convierte en moradas
                $(".estrellas>input").eq(i).css({ background: "#6541A6"});
            }
         });
    });
    // reestabelecer cantidad de estrellas
    $(".bx-revision").click(function () { 
        // fondo = gris
        $(".estrellas>input").css({background:"#cecece"});
        // cantidad =0
        $("fieldset>span").text(0);
        // variable click=false
        click=false;
    });
});