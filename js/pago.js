$(document).ready(function () {
    // si ha elegido premium
    $("#elegir").on("change",function () { 
        if ($(this).prop( "checked" )) {
            $("#cantidad").text(1);
        } else {
            $("#cantidad").text(0);
        }
        
    });  
});


// Función para validar el número de tarjeta
function validarNTarjeta() {
    const nTarjeta = document.getElementById("n_tarjeta");
    const errorNTarjeta = document.getElementById("error_n_tarjeta");
    if (!/^\d{16}$/.test(nTarjeta.value.replace(/\s+/g, ''))) {
        errorNTarjeta.textContent = "El número de tarjeta debe tener 16 dígitos.";
        nTarjeta.classList.add("error");
    } else {
        errorNTarjeta.textContent = "";
        nTarjeta.classList.remove("error");
    }
}

// Función para validar la fecha
function validarFecha() {
    const fecha = document.getElementById("fecha");
    const errorFecha = document.getElementById("error_fecha");
    if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(fecha.value)) {
        errorFecha.textContent = "La fecha debe estar en formato mm/yy.";
        fecha.classList.add("error");
    } else {
        errorFecha.textContent = "";
        fecha.classList.remove("error");
    }
}

// Función para validar el CVV
function validarCvv() {
    const cvv = document.getElementById("cvv");
    const errorCvv = document.getElementById("error_cvv");
    if (!/^\d{3}$/.test(cvv.value)) {
        errorCvv.textContent = "El CVV debe tener 3 dígitos.";
        cvv.classList.add("error");
    } else {
        errorCvv.textContent = "";
        cvv.classList.remove("error");
    }
}

// Agregar event listeners
document.getElementById("n_tarjeta").addEventListener("input", validarNTarjeta);
document.getElementById("fecha").addEventListener("input", validarFecha);
document.getElementById("cvv").addEventListener("input", validarCvv);
