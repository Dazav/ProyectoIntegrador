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
    // eventos de clic
    $("i").on("click", function () {
        // $(this).addClass("bx-spin");
        var contenido=$(".buscar").val();
        if(contenido==$(".forosTitulo").text().trim()){
            
        };
    });
});