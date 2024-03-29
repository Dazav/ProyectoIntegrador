<?php
include "../db/crear_tablas.php";
session_start();
if (isset($_SESSION["id"])) {
    $id=$_SESSION["id"];
}else{
    header('Location: registrar.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/foros.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/foros.js"></script>
    <script src="../js/main.js"></script>
    <title>Social</title>
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
    <!--  -->
    <div class="forosTitulo">
        <h1>
            <b>Foros</b> <b>de</b> <b>Comunidad</b>
        </h1>
    </div>

    <!-- need add php -->
    <main>
        <!-- buscador -->
        <div class="buscar">
            <input type="text" id="buscarInput" placeholder="Buscar un tema existente" />
            <i class='bx bx-search-alt'></i>
        </div>
        <!-- temas -->
        <div class="tema-bg">
            <h1 style="color: #6545A1;">TEMAS</h1>
            <?php
            // saca todas temas de autores de bd
            // combinamos tabla foro en usuarios
            $select = "SELECT f.id AS idForo,f.titular AS titulo,f.fecha_creacion AS fecha,us.imagen AS img
              FROM foro f
              INNER JOIN usuario us ON us.id=f.id_usuario";
            $stmt = $conexion->prepare($select);
            $stmt->execute();
            $resulta = $stmt->get_result();
            // atravesamos todas temas y lo presentamos
            while ($tema = $resulta->fetch_assoc()) {
                # code...
                echo "
                      <a class='tema' href='foroContenido.php?idForo={$tema['idForo']}' >
                          <div class='descripcion'>
                              <h2 class='temaTitulo'>{$tema['titulo']}</h2>
                              <p>{$tema['fecha']}</p>
                          </div>
                          <img class='imgAutor'  src='{$tema['img']}'/>
                      </a>
                      ";
            }
            ?>

            <a class='tema' id="addtema">
                <div class='descripcion'>
                    <h2 class='temaTitulo'>Agrega tu título</h2>
                    <p>También apunte tu artículo</p>
                </div>
                <div class='imgAutor'><i class='bx bx-add-to-queue'></i></div>
            </a>

            <form class='add-tema' id="add-tema" enctype="multipart/form-data">
                <i class='bx bx-arrow-back'></i>
                <label><input type="file" name="addImg" id="addImg" accept=".png,.jpg,.jpeg"><i
                        class='bx bx-image-add'></i></label>
                <input type="text" placeholder="Apunte título de artículo" name="addTitulo">
                <textarea name="addContenido" id="" placeholder="Apunte lo que quiera"></textarea>
                <input type="submit" value="Agregar tu artículo">
                <p></p>
            </form>
        </div>
    </main>
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
<script type="text/javascript">
    // jquery fetch de formulario de crear tema
    $(document).ready(function () {
        $("#add-tema").submit(function () {
            // e.preventDefault();//previene para no cargar la página
            //crea objeto FormData con los datos de formulario
            var formData = new FormData(this);
            //enviar formData a servidor
            fetch("procesarForo.php", {
                method: "POST",
                body: formData
            }).then(function (response) {
                //response no es ok, alanza error
                if (!response.ok) {
                    throw new Error("Error en la solicitud: " + response.statusText);
                }
                return response.json()//guardar response en forma json
            }).then(function (data) {
                //manejar las repuesta de servidor
                if (data.status == "success") {
                    $("#add-tema>p").css({ color: "green" }).text("Ha ido bien");
                } else {
                    $("#add-tema>p").css({ color: "red" }).text("Ha ido fallado");
                }
            }).catch(function (error) {
                //errores de la petición
                $("#add-tema>p").css({ color: "red" }).text("ERROR AL ENVIAR EL FORMULARIO" + error);
            });
        });
    });
</script>

</html>