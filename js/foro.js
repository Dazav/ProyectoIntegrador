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
        var contenido=$(".buscar").text().trim(); 
        document.querySelectorAll(".temaTitulo").forEach(function (titulo,index){
            var tituloContenido=$(titulo).text().trim();
            if(contenido==tituloContenido){
                console.log(true);
            };
        });
    });
});