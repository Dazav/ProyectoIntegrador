<?php
include("../db/crear_tablas.php");
session_start();
//conseguir id y id de foro
$id = $_SESSION['id'];
if (isset($_GET["idForo"])) {
    # code...
    $idForo = $_GET['idForo'];
}
// 
if (isset($_POST["enviar"])) {
    $rep = $_POST["respuesta"];
    // Preparar la consulta con un marcador de posición (?)
    $insert = "INSERT INTO respuestas (id_usuario, id_foro, respuesta) VALUES (?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($insert);
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("iis", $id, $idForo, $rep);

        // Ejecutar la sentencia
        $stmt->execute();

        // Verificar si se insertaron filas
        if ($stmt->affected_rows > 0) {
            // Éxito
            echo "Respuesta insertada correctamente.";
        } else {
            // Error al insertar
            echo "Error al insertar la respuesta.";
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        // Error en la preparación de la sentencia
        echo "Error en la preparación de la consulta.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/foroContenido.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/foroContenido.js"></script>
    <title>Foro contenidos</title>
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
        <?php
            if(isset($_SESSION["id"])){
                $select="SELECT imagen AS img,id AS id FROM usuario WHERE id=$id";
                $resulta=mysqli_query($conexion,$select);
                if ($resulta->num_rows>0) {
                    while ($user=$resulta->fetch_assoc()) {
                        echo "<a href='perfil.php'>
                              <img src='{$user['img']}' class='usr-circulo'>
                            </a>";
                    }
                }else {
                    echo "<img src='../img/bg-ejercicio.png' class='usr-circulo'>";
                }
            }else{
                echo "
                <div class='iniciarUser'>
                    <input type='button' value='Iniciar Sesión' onclick='window.location.href='registrar.php'' />
                    <input type='button' value='Comenzar' onclick='window.location.href='registrar.php?mostrar=registro'' />
                </div>
                ";
            }
        ?>
    </nav>
    <!-- contenido y artículo -->
    <!--  -->
    <div class="descripcionClic">
        <div>
            <?php
            $select = "SELECT f.img AS src
            FROM foro f
            WHERE f.id=$idForo";
            $resulta = mysqli_query($conexion, $select);
            while ($tema = $resulta->fetch_assoc()) {
                echo "
                    <div class='bg-contenido'>
                        <img src='{$tema['src']}' class='img_des'>
                    </div>";
            }
            ?>
            <main>
                <div class="perfil-img">
                    <?php
                    // imagen de autor
                    $select = "SELECT us.imagen AS src
                   FROM foro f
                   INNER JOIN usuario us ON us.id = f.id_usuario
                   WHERE f.id=$idForo";
                    $resulta = mysqli_query($conexion, $select);
                    while ($tema = $resulta->fetch_assoc()) {
                        echo "
                            <img src='{$tema['src']}'>";
                    }
                    ?>
                </div>
                <i class="bx bx-arrow-back"></i>
                <?php
                $select = "SELECT *
                   FROM foro
                   WHERE id=$idForo";
                $resulta = mysqli_query($conexion, $select);
                while ($tema = $resulta->fetch_assoc()) {
                    echo "
                            <h1 style='font-size: 40px;'>{$tema['titular']}</h1>
                            <p>{$tema['fecha_creacion']}</p>
                            <p style='font-size: 20px;' class='articulo'>{$tema['descripcion']}</p>";
                }
                ?>
                <button class="responder">
                    Responder
                </button>
                <h2>Repuesta</h2>
                <div class="comentarios_arti">
                    <form method="post" class="comentario_arti">
                        <?php
                        $select = "SELECT * FROM usuario WHERE id=$id";
                        $resulta = mysqli_query($conexion, $select);
                        while ($user = $resulta->fetch_assoc()) {
                            # code...
                            echo "<img src='{$user['imagen']}'>
                                <div>
                                    <h2>{$user['nombre']} {$user['apellidos']}</h2>
                                    <input name='respuesta' type='text'>
                                    <input name='cancelar' type='button' value='Cancelar'>
                                    <input name='enviar' type='submit' value='Enviar'>
                                </div>
                                ";
                        }
                        ?>
                    </form>
                    <?php
                    $select = "SELECT us.imagen AS img, r.respuesta AS res , us.apellidos AS ap,us.nombre AS nombre
                        FROM respuestas r
                        INNER JOIN usuario us ON us.id = r.id_usuario
                        INNER JOIN foro f ON f.id = r.id_foro
                        WHERE r.id_foro=$idForo";
                    $resulta = mysqli_query($conexion, $select);
                    while ($user = $resulta->fetch_assoc()) {
                        # code...
                        echo "
                            <div class='comentario_arti'>
                                <img src='{$user['img']}'>
                                <div>
                                    <h2>{$user['nombre']} {$user['ap']}</h2>
                                    <p>{$user['res']}</p>
                                </div>
                            </div>
                            ";
                    }
                    ?>
                    <!-- <div class="comentario_arti">
                        <img src="../img/autor1.png" alt="">
                        <div>
                            <h2>Elizabeth Rex</h2>
                            <p>Destaca la versatilidad del tratamiento psicológico, resaltando la importancia de la resiliencia. Esencial para el bienestar emocional.</p>
                        </div>
                    </div>
                    <div class="comentario_arti">
                        <img src="../img/autor2.png" alt="">
                        <div>
                            <h2>Selena Brish</h2>
                            <p>Artículo clave sobre tratamiento psicológico, destaca resiliencia y bienestar emocional. Esencial.</p>
                        </div>
                    </div>
                    <div class="comentario_arti">
                        <img src="../img/autor3.png" alt="">
                        <div>
                            <h2>Evan Gelia</h2>
                            <p>I don like this 😡</p>
                        </div>
                    </div> -->
                </div>
            </main>
        </div>
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
            <pre>Contacto   Centro de Ayuda   Preferencias</pre>
        </div>
    </footer>
</body>

</html>