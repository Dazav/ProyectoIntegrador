<?php
  include "../db/conecta.php";
  $conexion = getConexion();
    session_start();
    if (isset($_SESSION["id"])) {
        # code...
        $id=$_SESSION["id"];
    }
// Verificar si la conexión fue exitosa
if ($conexion) {
    // Consulta para obtener los grupos de apoyo junto con el nombre del organizador
    $consulta = "SELECT ga.id, u.nombre AS organizador, u.imagen AS imagen_organizador, ga.idioma, ga.tema, ga.fecha, (SELECT COUNT(*) FROM inscripcion_grupo WHERE id_grupo = ga.id) AS participantes 
                 FROM GruposApoyo ga 
                 JOIN usuario u ON ga.organizador = u.id 
                 WHERE ga.fecha > NOW() 
                 ORDER BY ga.fecha ASC";

    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si la consulta fue exitosa y si hay datos
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Convertir los resultados de la consulta en un array
        $grupos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    } else {
        $grupos = []; // Asegúrate de que $grupos esté definido como un array vacío si no hay datos
        echo "No se encontraron grupos de apoyo o la consulta falló.";
    }
} else {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/grupos.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/grupo.js"></script>
    <title>Grupos de apoyo</title>
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
            $select = "SELECT imagen AS img,id AS id FROM usuario WHERE id=$id";
            $resulta = mysqli_query($conexion, $select);
            if ($resulta->num_rows > 0) {
                while ($user = $resulta->fetch_assoc()) {
                    echo "<a href='perfil.php'>
                              <img src='{$user['img']}' class='usr-circulo'>
                            </a>";
                }
            } else {
                echo "<img src='../img/bg-ejercicio.png' class='usr-circulo'>";
            }
        } else {
            echo "
                <div class='iniciarUser'>
                    <input type='button' value='Iniciar Sesión' onclick='window.location.href='registrar.php'' />
                    <input type='button' value='Comenzar' onclick='window.location.href='registrar.php?mostrar=registro'' />
                </div>
                ";
        }
        ?>
    </nav>
    <!-- titulo -->
    <div class="gruposTitulo">
        <h1>
            <b>Grupos</b> <b>de</b> <b>apoyo</b>
        </h1>
    </div>
    <div class="buscar">
    <input type="text" id="buscarInput" placeholder="Buscar un grupo" />
    <i class='bx bx-search-alt'></i>
</div>
        <main>
    <div class="contenedor-grupos">
        <div class="grupos-wrapper">
            <?php foreach ($grupos as $grupo): ?>
                <div class="grupo-de-apoyo">
                    <div class="grupo-imagen">
                        <!-- Muestra la imagen del organizador usando la ruta de la base de datos -->
                        <img src="<?php echo htmlspecialchars($grupo['imagen_organizador']); ?>" alt="Organizador">
                        <div class="grupo-idioma">
                            <?php echo htmlspecialchars($grupo['idioma']); ?>
                        </div>
                    </div>
                    <div class="grupo-info">
                        <p class="grupo-organizador"><b>Organizado por:</b>
                            <?php echo htmlspecialchars($grupo['organizador']); ?>
                        </p>
                        <p class="grupo-tema">Tema:
                            <?php echo htmlspecialchars($grupo['tema']); ?>
                        </p>
                        <p class="grupo-fecha">Fecha:
                            <?php echo htmlspecialchars($grupo['fecha']); ?>
                        </p>
                        <p class="grupo-participantes">
                            Participantes: 
                            <span class="num-participantes" data-id-grupo="<?php echo $grupo['id']; ?>"><?php echo htmlspecialchars($grupo['participantes']); ?>
                        </span>
                        </p>
                    </div>
                    <div class="grupo-accion">
                    <button class="btn-inscribir" data-id-grupo="<?php echo $grupo['id']; ?>"
                    >Apuntarse ahora
                    </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="contenedor-botones">
    <button class="anterior">Anterior</button>
    <button class="siguiente">Siguiente</button>
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