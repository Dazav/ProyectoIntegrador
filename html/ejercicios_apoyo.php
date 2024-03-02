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
    <link rel="stylesheet" href="../css/ejercicios_apoyo.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/ejercicios_apoyo.js"></script>
    <title>ejercicios de apoyo</title>
</head>
<body>
    <header>
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
                $select="SELECT imagen AS img,id AS id FROM usuario WHERE id=$id AND imagen !=''";
                $resulta=mysqli_query($conexion,$select);
                if ($resulta->num_rows>0) {//si nuevo usuario no tiene la imagen,le ponemos la defecta.
                    while ($user=$resulta->fetch_assoc()) {
                        echo "<a href='perfil.php'>
                              <img src='{$user['img']}' class='usr-circulo'>
                            </a>";
                    }
                }else {
                    echo "<a href='perfil.php'>
                    <img src='../img/defecto.png' class='usr-circulo'>
                    </a>";
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
        <!-- ejercios de apoyo -->
        <!-- titulo -->
        <div class="apoyoTitulo">
            <h1><b>Ejercicios </b><b> de </b><b> Apoyo</b></h1>
        </div>
        <!-- preguntas -->
        <div class="parte_preguntas">
            <button disabled="disabled" id="flecha1">
                <i class='bx bx-right-arrow-alt bx-flip-horizontal' ></i>
            </button>
            <div class="ventana">
                <h2>Ejercicios de exposición</h2>
                <form class="preguntas">
                    <div class="pregunta">
                        <h3>¿Qué emociones has sentido con más frecuencia esta semana?</h3>
                        <p><input type="radio" name="test1" id="">Alegría</p>
                        <p><input type="radio" name="test1" id="">Tristeza</p>
                        <p><input type="radio" name="test1" id="">Otro</p>
                    </div>
                    <div class="pregunta">
                        <h3>¿Cuáles son las opciones de tratamiento que se discutieron para su condición?</h3>
                        <p><input type="radio" name="test2" id="">Medicamentos</p>
                        <p><input type="radio" name="test2" id="">Terapia física</p>
                        <p><input type="radio" name="test2" id="">Cambios en el estilo de vida</p>
                    </div>
                    <div class="pregunta">
                        <h3>¿Se discutieron posibles efectos secundarios de su tratamiento durante la exposición?</h3>
                        <p><input type="radio" name="test3" id="">Sí</p>
                        <p><input type="radio" name="test3" id="">No</p>
                        <p><input type="radio" name="test3" id="">No estoy seguro/a</p>
                    </div>
                </form>
            </div>
            <button id="flecha2">
                <i class='bx bx-right-arrow-alt'></i>
            </button>
        </div>
    </header>
    <!--  -->

    <!-- otros ejercicios -->
    <main>
        <h1>Otros Ejercicios</h1>
        <div class="parteOtro">
            <section>
                <div class="otroEje carta1">
                    <div class="descripcionEje">
                        <h2>Escala <br>De <br>Ansiedad</h2>
                        <i class='bx bxs-caret-down-circle' ></i>
                    </div>
                </div>
                <div class="otroEje carta2">
                    <div class="descripcionEje">
                        <h2>Evaluación <br>De <br>Estrés</h2>
                        <i class='bx bxs-caret-down-circle' ></i>
                    </div>
                    <img src="../img/imgEjeApoyo2.png" alt="">
                </div>
                <div class="otroEje carta3">
                    <img src="../img/imgEjeApoyo3.png" alt="">
                    <div class="descripcionEje">
                        <h2>Reflexión sobre la Autoestima</h2>
                        <i class='bx bxs-caret-down-circle' ></i>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!--  -->
    <div class="preguntaOtra" id="preguntaOtra">
        <div class="contenido">
            <form action="">
                <div class="masPregunta">
                    <h3>¿Has sentido que tu corazón late rápidamente o con fuerza sin motivo aparente?</h3>
                    <p><input type="radio" name="test1" id="">Nunca</p>
                    <p><input type="radio" name="test1" id="">En algunas ocasiones</p>
                    <p><input type="radio" name="test1" id="">A menudo</p>
                    <p><input type="radio" name="test1" id="">La mayoría del tiempo</p>
                </div>
            </form>
        </div>
        <div class="contenido">
            <form action="">
                <div class="masPregunta">
                    <h3>¿Has experimentado temblores o sacudidas en tu cuerpo sin razón evidente?</h3>
                    <p><input type="radio" name="test1" id="">Nunca</p>
                    <p><input type="radio" name="test1" id="">En algunas ocasiones</p>
                    <p><input type="radio" name="test1" id="">A menudo</p>
                    <p><input type="radio" name="test1" id="">La mayoría del tiempo</p>
                </div>
            </form>
        </div>
        <div class="contenido">
            <form action="">
                <div class="masPregunta">
                    <h3>¿Has sentido tensión o nerviosismo la mayor parte del tiempo?</h3>
                    <p><input type="radio" name="test1" id="">Nunca</p>
                    <p><input type="radio" name="test1" id="">En algunas ocasiones</p>
                    <p><input type="radio" name="test1" id="">A menudo</p>
                    <p><input type="radio" name="test1" id="">La mayoría del tiempo</p>
                </div>
            </form>
        </div>
        <div class="cartaP"></div>
        <div class="cartaP"></div>
        <div class="cartaP"></div>
        <div class="up-icon">
            <i class='bx bx-caret-up-circle' ></i>
        </div>
    </div>
    <!-- contacto -->
    <div class="contacto">
        <h1>¿TIENES DUDAS?</h1>
        <p>Nuestro equipo de soporte está disponible 24/7</p>
        <input type="button" value="CONTACTO" onclick="window.location.href='contacto.html'" />
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
                    <a href="https://www.facebook.com/psicologiapositiva">
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