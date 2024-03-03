<?php
include "../db/conecta.php";
$conexion = getConexion();
session_start();
if (isset($_SESSION["id"])) {
    # code...
    $id = $_SESSION["id"];
}else{
    header('Location: registrar.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/relajacion.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../js/relajacion.js"></script>
    <script src="../js/main.js"></script>
    <title>Relajación Contenidos</title>
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
    <!-- contenido y artículo -->
    <!--  -->
    <div class="descripcionClic">
        <main>
            <i class="bx bx-arrow-back"></i>
            <h1 style="font-size: 40px;">¿Cómo podemos saber cuando tendremos un ataque de pánico?</h1>
            <p>12-12-2023</p>
            <div class='bg-contenido'>
                <img src="../img/recursos-contenido1.png" class="img_des">
            </div>
            <p style="font-size: 20px;" class="articulo">Buenas, me llamo Ismael y me gustaría saber cuando podría darme
                un ataque de pánico. Desafortunadamente sufro de Trastorno del Pánico y eso me provoca que en ocasiones
                me quede parado en un lugar público.</p>
            <h1>Paso :</h1>
            <div class="paso">
                <img src="../img/paso1.png" alt="">
                <div>
                    <h2>Conocer los síntomas comunes:</h2>
                    <p>
                        Los ataques de pánico pueden presentarse de diferentes maneras, pero algunos síntomas comunes
                        incluyen palpitaciones cardíacas rápidas o fuertes, dificultad para respirar, sensación de
                        ahogo, mareos, temblores, sudoración, sensación de irrealidad o desconexión, miedo intenso,
                        sensación de pérdida de control, entre otros.
                    </p>
                </div>
            </div>
            <div class="paso">
                <img src="../img/paso2.png" alt="">
                <div>
                    <h2>Estar atento a las señales físicas y emocionales:</h2>
                    <p>Antes de un ataque de pánico, es posible que experimentes señales físicas y emocionales que
                        indican que algo no está bien. Estos podrían incluir un aumento en la frecuencia cardíaca,
                        dificultad para respirar, sensación de nerviosismo o ansiedad intensa, tensión muscular,
                        sudoración excesiva, entre otros.</p>
                </div>
            </div>
            <div class="paso">
                <img src="../img/paso3.png" alt="">
                <div>
                    <h2>Autoevaluación y reconocimiento de patrones:</h2>
                    <p>Lleva un registro de tus síntomas y circunstancias que los preceden. Esto puede ayudarte a
                        identificar patrones o desencadenantes específicos que puedan preceder a tus ataques de pánico.
                        Estos desencadenantes pueden ser situacionales, emocionales, cognitivos o físicos.</p>
                </div>
            </div>
        </main>
    </div>
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
                    <a href="recursos.php"><li>Recursos de Ansiedad</li></a>
                    <a href="relajacion.php"><li>Técnicas Relajación</li></a>
                </ul>
            </div>
            <div>
                <h2>Apoyo</h2>
                <ul>
                    <a href="grupo_apoyo.php"><li>Grupos de apoyo</li></a>
                    <a href="ejercicios_apoyo.php"><li>Ejercicios de apoyo</li></a>
                </ul>
            </div>
            <div class="social">
                <h2>Social</h2>
                <ul>
                    <a href="foros.php"><li>Foros de Comunidad</li></a>
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
            <pre>Contacto  Preferencias</pre>
        </div>
    </footer>
</body>

</html>