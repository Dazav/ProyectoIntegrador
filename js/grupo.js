//la deferencia de tiempo de aparecer el título
$(document).ready(function () {
    var time=0;
    $("b").each(function () {  
        time += 0.8;
        $(this).css("--delay", time+"s");
    });
});
// animación hover de icon de buscador
$(document).ready(function () {
    var agitar="bx-tada";
    $("input").mouseenter(function () { 
        $(".bx-search-alt").addClass(agitar);
    }).mouseleave(function () { 
        $(".bx-search-alt").removeClass(agitar);
    });
});
//animacion del tema
$(document).ready(function () {
    //configurar estado inicial
    $(".tema").css({
        opacity:0,
        transform: "rotateX(10deg)",
        transformOrigin: "0 0"
    });
    //desplazarse el barra de deplazamiento del nevagador
    $(window).scroll(function () { 
        var scrollTop = $(document).scrollTop()
        //
        var topTitulo=$(".gruposTitulo").height()/3;
        var time=0;
        if (scrollTop > topTitulo) {
            $('.tema').each( function () { 
                time +=100;
                $(this).delay(time).animate({
                    opacity:1,
                },0,function () {  
                    $(this).css({
                        transform: "rotateX(0deg)",
                        transition: "0.3s ease-out",
                    });
                });
            }); 
        }
    }); 
    //expandir la carta de tema por clic
});

//hacer un función del buscador
function buscador() {  
    // contenido introducido
    var contenido=$("#buscarInput").val().toUpperCase(); 
    // restablecer estilos de todas temas
    $(".tema").css("display", "flex"); 
    //atravesar array de todas temas
    $(".temaTitulo").each(function (index,titulo){
        var tituloContenido=$(titulo).text().trim().toUpperCase();
        //buscar la letra de contenido introducido si está en el título de temas,esconder todas las resultas que no comforme
        if(tituloContenido.indexOf(contenido)==-1){
            //cada index indica cada tema
            $(".tema").eq(index).css("display", "none");
        }
    });
}
//buscador
$(document).ready(function () {
    // buscar tema
    $(".bx-search-alt").on("click", function () {
        buscador();
    });
    //buscar tema existante en cada momento
    $("#buscarInput").on("input", function (){
        buscador();
    }).keydown(function (e) {
        //13 es código de tecla "intro" sobre evento de keyDown,8 es el código de tecla "borrar"
        if (e.which == 8 || e.which ==13) {
            buscador();
        }
    });
});


$(document).ready(function() {
    $('.formulario-inscripcion button').click(function(e) {
        var form = $(this).closest('form'); // Encuentra el formulario más cercano
        $.ajax({
            url: 'procesarInscripcion.php', // La URL del script PHP que procesa la inscripción
            type: 'POST', // Método HTTP
            data: form.serialize(), // Serializa los datos del formulario
            success: function(response) {
                // Aquí manejas la respuesta exitosa
                alert(response.mensaje); // Muestra un mensaje con la respuesta
                // Puedes hacer más cosas aquí, como actualizar partes de tu página según sea necesario.
            },
            error: function(xhr, status, error) {
                // Manejo de error
                alert("Error al inscribirse.");
            }
        });
    });
});

