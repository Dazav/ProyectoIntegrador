<?php
include "../db/crear_tablas.php";
session_start();
if (isset($_SESSION["id"])) {
    $id=$_SESSION["id"];
    $premium = 0;
    // Seleccionamos el premium del usuario
    $stmt = $conexion->prepare("SELECT premium FROM usuario WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      while ($user = $result->fetch_assoc()) {
        $premium = $user['premium'];
        if($premium==1){
            header('Location: perfil.php');
        }
      }
    }
}else{
    header('Location: registrar.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/pago.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../js/pago.js"></script>
    <title>Pago</title>
</head>

<body>
    <!-- barra navegación -->
    <nav>
        <div class="usuario">
            <!-- Botón de menú para móviles -->
            <button class="menu-mobile">☰</button>
            <img src="../img/logo.png" alt="">
            <a href="index.php">Brain Hub</a>
        </div>
        <div class="menu">
            <button onclick="window.location.href='recursos.php'">Recursos</button>
            <div class="dropdown">
                Apoyo
                <div class="dropdown-menu">
                    <button onclick="window.location.href='grupo_apoyo.php'">Grupo Apoyo</button>
                    <button onclick="window.location.href='ejercicios_apoyo.php'">Ejercicios de Apoyo</button>
                </div>
            </div>
            <button onclick="window.location.href='terapeutas.php'">Terapeutas</button>
            <button onclick="window.location.href='foros.php'">Social</button>
        </div>
        <?php
        if (isset($_SESSION["id"])) {
            $stmt = $conexion->prepare("SELECT imagen AS img,id AS id FROM usuario WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) { //si nuevo usuario no tiene la imagen,le ponemos la defecta.
                while ($user = $result->fetch_assoc()) {
                    echo "<a href='perfil.php'>
                              <img src='{$user['img']}' class='usr-circulo'>
                            </a>";
                }
            } else {
                echo "<a href='perfil.php'>
                    <img src='../img/defecto.png' class='usr-circulo'>
                    </a>";
            }
        } else {
            echo "
                <div class='iniciarUser'>
                    <input type='button' value='Iniciar Sesión' id='iniciar' />
                    <input type='button' value='Comenzar' id='comenzar' />
                </div>
                ";
        }
        ?>
    </nav>
    <!-- parte de pago -->
    <form id="formPago" class="pago" method="post" action="procesarPago.php">
        <!-- detalle -->
        <section>
            <div class="detalle">
                <legend>Detalles del Pago</legend>
                <fieldset>
                    <label>Nombre<input type="text" required></label>
                    <label>Apellidos<input type="text" required></label>
                    <label class="tarjeta">Nº Tarjeta<input type="text" name="n_tarjeta" id="n_tarjeta"
                            placeholder="xxxx xxxx xxxx xxxx" required></label>
                    <span id="error_n_tarjeta" class="error-message"></span><br>
                    <label class="input_pequeño_pago">Fecha<input type="text" id="fecha" placeholder="mm/yy"
                            required></label>
                    <label class="input_pequeño_pago">CVV<input type="text" id="cvv" required></label>
                    <span id="error_fecha" class="error-message"></span>
                    <span id="error_cvv" class="error-message"></span>
                </fieldset>

            </div>
        </section>
        <!-- pedido -->
        <div class="pedido">
            <h1>Tu Pedido</h1>
            <div>

            </div>
            <div>
                <input id="elegir" type="checkbox" name="" id="">
                <p>Premium</p>
                <p id="cantidad">0</p>
                <p>10€</p>
            </div>
            <div class="pago-last">
                <input type="submit" value="Pagar">
                <div>
                    <p>Total: 10€</p>
                    <input type="checkbox" name="" id="" required>Aceptas Términos y Condiciones
                </div>
            </div>
        </div>
    </form>
    <!-- contacto -->
    <div class="contacto">
        <h1>¿TIENES DUDAS?</h1>
        <p>Nuestro equipo de soporte está disponible 24/7</p>
        <input type="button" value="CONTACTO" onclick="window.location.href='contacto.php'" />
    </div>
    <!-- footer -->
    <footer>
        <div class="elementos">
            <div>
                <img src="../img/logo.png" alt="">
                <h2>Brain Hub</h2>
            </div>
            <div>
                <h2>Recursos</h2>
                <ul>
                    <a href="recursos.php">
                        <li>Recursos de Ansiedad</li>
                    </a>
                    <a href="relajacion.php">
                        <li>Técnicas Relajación</li>
                    </a>
                </ul>
            </div>
            <div>
                <h2>Apoyo</h2>
                <ul>
                    <a href="grupo_apoyo.php">
                        <li>Grupos de apoyo</li>
                    </a>
                    <a href="ejercicios_apoyo.php">
                        <li>Ejercicios de apoyo</li>
                    </a>
                </ul>
            </div>
            <div class="social">
                <h2>Social</h2>
                <ul>
                    <a href="foros.php">
                        <li>Foros de Comunidad</li>
                    </a>
                    <li>
                        <a href="">
                            <i class='bx bxl-facebook-circle' style='color:#fffcfc'></i>
                        </a>
                        <a href="">
                            <i class='bx bxl-twitter' style='color:#fffcfc'></i>
                        </a>
                        <a href="">
                            <i class='bx bxl-instagram' style='color:#fffcfc'></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="avisos">
            <pre>● Política de Privacidad   Términos de Uso   Configuración de Cookies</pre>
            <pre>Contacto  Preferencias</pre>
        </div>
    </footer>
</body>
<script>
    // funciones de validación 
    function validarNTarjeta() {
        const nTarjeta = document.getElementById("n_tarjeta");
        const errorNTarjeta = document.getElementById("error_n_tarjeta");
        if (!/^\d{16}$/.test(nTarjeta.value.replace(/\s+/g, ''))) {
            errorNTarjeta.textContent = "El número de tarjeta debe tener 16 dígitos.";
            nTarjeta.classList.add("error");
            return false;
        } else {
            errorNTarjeta.textContent = "";
            nTarjeta.classList.remove("error");
            return true;
        }
    }

    function validarFecha() {
        const fecha = document.getElementById("fecha");
        const errorFecha = document.getElementById("error_fecha");
        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(fecha.value)) {
            errorFecha.textContent = "La fecha debe estar en formato mm/yy.";
            fecha.classList.add("error");
            return false;
        } else {
            errorFecha.textContent = "";
            fecha.classList.remove("error");
            return true;
        }
    }

    function validarCvv() {
        const cvv = document.getElementById("cvv");
        const errorCvv = document.getElementById("error_cvv");
        if (!/^\d{3}$/.test(cvv.value)) {
            errorCvv.textContent = "El CVV debe tener 3 dígitos.";
            cvv.classList.add("error");
            return false;
        } else {
            errorCvv.textContent = "";
            cvv.classList.remove("error");
            return true;
        }
    }

    // Agregar event listeners a los campos para validación en tiempo real
    document.getElementById("n_tarjeta").addEventListener("input", validarNTarjeta);
    document.getElementById("fecha").addEventListener("input", validarFecha);
    document.getElementById("cvv").addEventListener("input", validarCvv);

    // Función para validar todo el formulario antes de enviar
    function validarFormulario(event) {
        // Llamada a las funciones de validación
        const esNTarjetaValido = validarNTarjeta();
        const esFechaValida = validarFecha();
        const esCvvValido = validarCvv();

        // Si alguno falla, prevenir el envío del formulario
        if (!esNTarjetaValido || !esFechaValida || !esCvvValido) {
            event.preventDefault();
            alert("Por favor, corrija los errores en el formulario.");
        }
    }

    // Agregar event listener al formulario para interceptar el envío
    document.getElementById("formPago").addEventListener("submit", validarFormulario);
</script>

</html>