<?php
include "../db/crear_tablas.php";
session_start();
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $premium = 0;
    // Seleccionamos el premium del usuario
    $stmt = $conexion->prepare("SELECT premium FROM usuario WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($user = $result->fetch_assoc()) {
            $premium = $user['premium'];
        }
    }
}else{
    header('Location: registrar.php');
}
if (isset($_GET["id_recurso"])) {
    # code...
    $id_r = $_GET['id_recurso'];

}
// 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/recursosContenido.css">
    <link rel="stylesheet" href="../css/main.css">
    <link>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../js/recursosContenido.js"></script>
    <title>Recursos Contenidos</title>
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
        <div class="iniciarUser">
            <input type="button" value="Iniciar Sesión" onclick="window.location.href='registrar.php'" />
            <input type="button" value="Comenzar" onclick="window.location.href='registrar.php?mostrar=registro'" />
        </div>
    </nav>
    <!-- contenido y artículo -->
    <!--  -->
    <div class="descripcionClic">
        <main>
            <i class="bx bx-arrow-back"></i>
            <?php
            $select = "SELECT r.titular AS t, us.nombre AS nombre, us.apellidos AS ap,r.descripcion AS dsc,
                        r.fecha_creacion AS fc, r.img_banner AS img, r.premium as premium
                        FROM recursos r
                        INNER JOIN usuario us ON us.id = r.id_usuario
                        WHERE r.id=$id_r";
            $resulta = mysqli_query($conexion, $select);
            while ($contenido = $resulta->fetch_assoc()) {
                // Si el usuario no es premium y el recurso es sólo para premiums, le mandamos al premium.php
                if ($premium == 0 && $contenido['premium'] == 1) {
                    header("Location: premium.php");
                }
                echo "
                                <h1 style='font-size: 40px;'>{$contenido['t']}</h1>
                                <p>{$contenido['fc']}</p>
                                <div class='bg-contenido'>
                                    <img src='../img/{$contenido['img']}' class='img_des'>
                                </div>
                                <p style='font-size: 20px;' class='articulo'>{$contenido['dsc']}</p>
                            ";
            }
            ?>
            <!-- <h1 style="font-size: 40px;">¿Cómo podemos saber cuando tendremos un ataque de pánico?</h1>
            <p>12-12-2023 Wei Xu</p>
            <div class='bg-contenido'>
                <img src="../img/recursos-contenido1.png" class="img_des">
            </div>
            <p style="font-size: 20px;" class="articulo">Buenas, me llamo Ismael y me gustaría saber cuando podría darme un ataque de pánico. Desafortunadamente sufro de Trastorno del Pánico y eso me provoca que en ocasiones me quede parado en un lugar público.</p> -->
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