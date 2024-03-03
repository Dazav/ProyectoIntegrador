//cerrar sesión
$(document).ready(function () {
    $("#logout").click(function () { 
        //conecta logout.php
        window.location.href="logout.php";
    }); 
});
//animación de hover button
$(document).ready(function () {
    $("#editar,#logout").hover(function () {
            // over
            $(".bg-img>img").addClass("active");
        }, function () {
            // out
            $(".bg-img>img").removeClass("active");
        }
    );
});
// animación de editar
$(document).ready(function () {
    $("#editar").click(function () { 
        $(".editar").css({zIndex:"100"}).animate({
            height: "600px",
            top: "150px",
            opacity: 1,
        },1000,"easeInOutBack");
    });
    $(".editar>.bx-x").click(function () { 
        $(".editar").animate({
            height: "0",
            top: "0",
            opacity: 0,
            zIndex: -1
        },1000,"easeInOutCirc"); 
    }).hover(function () {
        $(this).toggleClass("bxs-x-circle");
    });
});
// animación de tarjeta 
$(document).ready(function () {
    $(".bxs-credit-card-alt").click(function () { 
        $(".pago").css({zIndex:"100"}).animate({
            right: "500px",
            opacity: 1,
        },1000,"easeInOutBack");
    });
    $(".pago>.bx-x").click(function () { 
        $(".pago").animate({
            right: "0",
            opacity: 0,
            zIndex: -1
        },1000,"easeInOutCirc"); 
    }).hover(function () {
        $(this).toggleClass("bxs-x-circle");
    });
});
// metodos de pago
$(document).ready(function () {
    // click icon de tarjeta para modificar metódo de pago a tarjeta credito
    $(".bx-credit-card").click(function () { 
        $("#metodo").val("tarjeta credito");
    });
    // click icon de paypal para modificar metódo de pago a paypal
    $(".bxl-paypal").click(function () { 
        $("#metodo").val("paypal");
    });
});
$(document).ready(function() {
    $('.cancela').click(function() {
        var cita_id = $(this).data('cita-id');
        $.post('eliminar_cita.php', { id: cita_id }, function(response) {
            // Manejar la respuesta del servidor si es necesario
            // Por ejemplo, recargar la página o actualizar la lista de citas
        });
    });
});

$(document).ready(function() {
    // Manejador de eventos para cancelar cita
    $('form[name="cancelar_cita"]').submit(function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de manera convencional
        var citaId = $(this).find('input[name="id_cita"]').val(); // Obtiene el ID de la cita
        $.ajax({
            type: 'POST',
            url: 'cancelar_cita.php', // Script PHP que maneja la cancelación de la cita
            data: { id_cita: citaId }, // Envía el ID de la cita al servidor
            success: function(response) {
                $('div[data-cita-id="' + citaId + '"]').remove(); // Elimina el contenedor de la cita
            },
            error: function(xhr, status, error) {
                console.error(error); // Maneja los errores de la solicitud AJAX
            }
        });
    });
});