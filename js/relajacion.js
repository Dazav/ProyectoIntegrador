//devolver a recursos.php
$(document).ready(function () {
    $(".bx-arrow-back").click(function () { 
        window.location.href="recursos.php";
    });
});

$(document).ready(function () {
    //animación de contenido
    $(".articulo").html(
        $(".articulo").text().replace(/([^\s])/g,"<span>$&</span>")
    );
    let time=0;
    $(".articulo>span").each(function () { 
        time+=50;
        this.style.setProperty('--timeP', time+'ms')
    });
});