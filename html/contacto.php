<?php
include "../db/crear_tablas.php";
//   $conexion = getConexion();
session_start();
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/contacto.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="../js/contacto.js"></script>
        <title>Iniciar Sesión</title>
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
                if ($result->num_rows > 0) {//si nuevo usuario no tiene la imagen,le ponemos la defecta.
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
        <!-- título de Contacto -->
        <div class="contactoTitulo">
            <h1><b>Contacto </b><b> con </b><b> Nosotros</b></h1>
        </div>
        <div class="containerContacto">
            <h2>Hola ¿cómo podemos ayudarte?</h2>
            <div class="form">
                <form id="formularioContacto" method="post">
                    <h3>¿Tienes alguna pregunta o necesitas informar de un problema con un servicio?</h3>
                    <input type="text" class="nombre" name="nombre" placeholder="Nombre" required>
                    <p class="error-nombre">Introduce un nombre correcto</p>
                    <input type="email" name="email" placeholder="Email" required>
                    <p class="error-email">Introduce un correo correcto</p>
                    <input type="text" class="asunto" name="asunto" placeholder="Asunto" required>
                    <p class="error-asunto">El asunto tiene que ser más corto</p>
                    <textarea name="mensaje" id="" cols="30" rows="10" placeholder="Descrpción"></textarea>
                    <p class="error-msg">CONTENIDO INTRODUCIDO CONTIENE PALABRA RACISTA,PEACE AND LOVE,PORFAVOR</p>
                    <div id="mensajeRespuesta"></div>
                    <input type="submit" class="btn" name="enviar" value="Enviar">
                </form>
            </div>
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
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('formularioContacto');

            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Previene la recarga de la página por el envío del formulario
                console.log("Se presionó el form");
                // Crea un objeto FormData con los datos del formulario
                var formData = new FormData(form);

                // Usa fetch para enviar los datos al servidor
                fetch('procesarContacto.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        // Manejo de la respuesta del servidor
                        var mensajeRespuesta = document.getElementById('mensajeRespuesta');
                        mensajeRespuesta.innerText = data.mensaje;
                        mensajeRespuesta.className = 'mensaje-exito';
                    })
                    .catch(error => {
                        // Manejo de errores de la petición
                        var mensajeRespuesta = document.getElementById('mensajeRespuesta');
                        mensajeRespuesta.innerText = 'Error al enviar el formulario: ' + error;
                        mensajeRespuesta.className = 'mensaje-error';
                    });
                console.log("Se completó el fetch");
            });
        });
    </script>

    </html>