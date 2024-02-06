
<?php
include "../db/conecta.php";
$mensaje = '';
if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];


    $conexion = getConexion();

    $sql = "INSERT INTO contacto (nombre, email, asunto, descripcion) VALUES ('$nombre', '$email', '$asunto', '$mensaje')";

    if (mysqli_query($conexion, $sql)) {
        $mensaje = "Hemos recibido tu respuesta, contactaremos lo antes posible.";
    } else {
        $mensaje = "Ha habido un problema al enviar tu respuesta. Intétalo más tarde.";
    }

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
            <img src="../img/logo.png" alt="" srcset="">
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
        <div class="iniciarUser">
            <input type="button" value="Iniciar Sesión" onclick="window.location.href='registrar.php'" />
            <input type="button" value="Comenzar" onclick="window.location.href='registrar.php'" />
        </div>
    </nav>
    <!-- título de Contacto -->
    <div class="contactoTitulo">
        <h1><b>Contacto </b><b> con </b><b> Nosotros</b></h1>
    </div>
    <div class="containerContacto">
        <h2>Hola ¿cómo podemos ayudarte?</h2>
        <div class="form">
            <form action="contacto.php" method="post">
                <h3>¿Tienes alguna pregunta o necesitas informar de un problema con un servicio?</h3>
                <input type="text" class="nombre" name="nombre" placeholder="Nombre" required>
                <p class="error-nombre">Introduce un nombre correcto</p>
                <input type="email" name="email" placeholder="Email" required>
                <p class="error-email">Introduce un correo correcto</p>
                <input type="text" class="asunto" name="asunto" placeholder="Asunto" required>
                <p class="error-asunto">El asunto tiene que ser más corto</p>
                <textarea name="mensaje" id="" cols="30" rows="10" placeholder="Descrpción"></textarea>
                <p class="error-msg">CONTENIDO INTRODUCIDO CONTIENE PALABRA RACISTA,PEACE AND LOVE,PORFAVOR</p>
                <?php
                    if(!empty($mensaje)){
                        echo "<p class='mensaje-exito'>$mensaje</p>";
                    }
                ?>
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
                    <li>Recursos de Ansiedad</li>
                    <li>Técnicas Relajación</li>
                </ul>
            </div>
            <div>
                <h2>Apoyo</h2>
                <ul>
                    <li>Herramientas</li>
                    <li>Seguimiento y Progreso</li>
                </ul>
            </div>
            <div class="social">
                <h2>Social</h2>
                <ul>
                    <li>Grupos de Apoyo</li>
                    <li>Foros de Comunidad</li>
                    <li>
                        <a href="">
                            <i class='bx bxl-facebook-circle' style='color:#fffcfc' ></i>
                        </a>
                        <a href="">
                            <i class='bx bxl-twitter' style='color:#fffcfc'  ></i>
                        </a>
                        <a href="">
                            <i class='bx bxl-instagram' style='color:#fffcfc' ></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="avisos">
            <pre>● Política de Privacidad   Términos de Uso   Configuración de Cookies</pre>
            <pre>Contacto   Centro de Ayuda   Preferencias</pre>
        </div>
    </footer>
</body>
</html>