$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b) {  
        time += 0.2;
        b.style.setProperty("--delay", time+"s");
    });
});
// 
$(document).ready(function () {
    var agitar="bx-tada";
    $("input").mouseenter(function () { 
        $("i").addClass(agitar);
    }).mouseleave(function () { 
        $("i").removeClass(agitar);
    });
});
// 
$(document).ready(function () {
    // buscar tema
    
    $("i").on("click", function () {
        var contenido=$("#buscarInput").val(); 
        console.log(contenido);
        $(".temaTitulo").each(function (index,titulo){
            var tituloContenido=$(titulo).text().trim();
            console.log(tituloContenido);
            if(contenido==tituloContenido){
                console.log(true);
            }else{
                console.log(false);
            };
        });
    });
});