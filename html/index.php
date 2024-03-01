<?php
  include "../db/conecta.php";
  $conexion = getConexion();
    session_start();
    if (isset($_SESSION["id"])) {
        # code...
        $id=$_SESSION["id"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/app.js"></script>
    <title>Página Principal</title>
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
                    <input type='button' value='Iniciar Sesión' id='iniciar' />
                    <input type='button' value='Comenzar' id='comenzar' />
                </div>
                ";
            }
        ?>
    </nav>
    <!-- introducción principal -->
    <div class="introduccion1">
        <div>
            <pre id="titulo">La mejor web psicológica
en el mercado</pre>
            <ul>
                <li>Recursos para tratar la ansiedad</li>
                <li>Herramientas de apoyo y seguimiento</li>
                <li>+1000 terapeutas especializado a tu alcance</li>
            </ul>
            <button>Comenzar ahora</button>
        </div>
        <div>
            <img src="../img/img1.png" alt="">
            <div class="bg-verde"></div>
        </div>
    </div>
    <!-- introducción de ventaje -->
    <div class="introduccion2">
        <div class="foto">
            <div></div>
            <div></div>
        </div>
        <div class="contenido">
            <h1>Psicólogos online experimentados, listos para ayudarte a construir una vida con mayor bienestar</h1>
            <p>En nuestro equipo de psicólogos en línea, encontrarás psicólogos altamente capacitados y experimentados, con una sólida formación académica en psicología y maestría en psicoterapia.</p>
            <p>Todos nuestros psicólogos online cuentan con la documentación necesaria para ejercer su profesión y tienen más de 5 años de experiencia profesional comprobable.</p>
            <p>Con horarios flexibles y una amplia variedad de días disponibles, podrás comenzar tu terapia psicológica en línea en el momento que lo necesites.</p> 
        </div>
    </div>
    <!-- linea horizontal -->
    <hr>
    <!-- recursos -->
    <div class="recursos">
        <h1>Variedad de recursos</h1>
        <div class="cartas">
            <div class="carta1 responsiveCarta carta">
                <center>
                    <div></div>
                </center>
                <h1>Ejercicios de exposición gradual</h1>
                <p>La técnica de exposición es un tipo de procedimiento terapéutico empleado en psicología clínica para tratar los trastornos de ansiedad. Esta técnica implica enfrentar al paciente con el objeto, el contexto o el pensamiento temido para ayudarle a superar los síntomas de ansiedad.</p>
                <a href="">Ver Detalle<i class='bx bxs-right-arrow-circle'></i></a>
                <i class='bx bx-plus-circle' ></i>
            </div>
            <div class="carta2 responsiveCarta carta">
                <center>
                    <div></div>
                </center>
                <h1>Técnicas de relajación</h1>
                <p>Las técnicas de relajación son métodos que se utilizan para reducir el estrés, la ansiedad y la tensión muscular, promoviendo un estado de calma y bienestar.</p>
                <a href="" >Ver Detalle<i class='bx bxs-right-arrow-circle'></i></a>
                <i class='bx bx-plus-circle' ></i>
            </div>
            <div class="carta3 responsiveCarta carta">
                <center>
                    <div></div>
                </center>
                <h1>Ejercicios de apoyo</h1>
                <p>
                    Los ejercicios de apoyo psicológico son técnicas y actividades diseñadas para mejorar la salud mental y el bienestar emocional de una persona. </p>
                <a href="">Ver Detalle<i class='bx bxs-right-arrow-circle'></i></a>
                <i class='bx bx-plus-circle' ></i>
            </div>
        </div>
    </div>
    <!-- opiniones -->
    <div class="opiniones">
        <div class="tituloComentarios">
            <h1>Opiniones de clientes</h1>
            <div class="comentarios">
                <button class="flecha" id="flecha1" disabled>
                    <i class='bx bxs-left-arrow' ></i>
                </button>
                <div class="outer">
                    <div class="cartaList">
                        <!-- 1º lista -->
                        <?php
                            $select="SELECT DISTINCT u.nombre as nombre, u.apellidos as apellidos, u.Imagen as src, o.estrellas as star, o.titulo as comentario
                            FROM opiniones o
                            INNER JOIN usuario u ON u.id=o.id_autor";
                            $resulta=mysqli_query($conexion,$select);
                            while ($opinion=$resulta->fetch_assoc()) {
                                echo "
                                    <div class='comentario'>
                                        <div>
                                            <img src='{$opinion['src']}'>
                                        </div>
                                        <div>
                                            <h4>{$opinion['nombre']} {$opinion['apellidos']}</h4>
                                            <p>{$opinion['comentario']}</p>
                                            <p>{$opinion['star']}</p>
                                        </div>
                                    </div>";
                            }
                        ?>
                        <!--  -->
                        <div class="comentario verMas">
                            <div>
                                <h4>Ve más comentarios de cuentas</h4>
                                <h4><a href="opinion.php">Ver Más</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="flecha" id="flecha2">
                    <i class='bx bxs-right-arrow' ></i>             
                </button>
            </div>
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