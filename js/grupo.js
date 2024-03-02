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

//carusel,
document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.grupos-wrapper');
    const slides = document.querySelectorAll('.grupo-de-apoyo');
    const prevBtn = document.querySelector('.anterior');
    const nextBtn = document.querySelector('.siguiente');
    let counter = 0;
    const slideWidth = slides[0].clientWidth;

    nextBtn.addEventListener('click', () => {
        if (counter >= slides.length - 1) return;
        counter++;
        slider.style.transition = 'transform 0.4s ease-in-out';
        slider.style.transform = `translateX(${-slideWidth * counter}px)`;
    });

    prevBtn.addEventListener('click', () => {
        if (counter <= 0) return;
        counter--;
        slider.style.transition = 'transform 0.4s ease-in-out';
        slider.style.transform = `translateX(${-slideWidth * counter}px)`;
    });
});

$(document).ready(function () {
    $(".bx-menu").click(function () { 
        $("nav,.menu,.iniciarUser").toggleClass("resp-active");
    });
});

// Definir toggleMenu en el ámbito global

$(document).ready(function() {
    // Asigna el evento click al botón de menú usando jQuery
    $('.menu-mobile').click(function() {
        // Alterna las clases 'active' para los elementos del menú y del botón de inicio de sesión
        $('.menu').toggleClass('active');
        $('.iniciarUser').toggleClass('active');
    });
});

//fetch 
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-inscribir').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Previene la acción por defecto del botón
            const idGrupo = this.getAttribute('data-id-grupo');

            fetch('inscribir_grupo.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_grupo=' + idGrupo,
            })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    // Cambiar el texto y color del botón
                    this.innerText = '¡Te has apuntado!';
                    this.style.backgroundColor = 'green';
                    // Opcionalmente, deshabilitar el botón para evitar múltiples inscripciones
                    this.disabled = true;

                    // Actualizar el número de participantes
                    const participantesElement = document.querySelector(`.num-participantes[data-id-grupo="${idGrupo}"]`);
                    let numParticipantes = parseInt(participantesElement.innerText);
                    participantesElement.innerText = numParticipantes + 1; // Incrementa el número de participantes
                } else {
                    alert(data.mensaje); // Muestra el mensaje de error
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    });
});
