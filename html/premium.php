<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/premium.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../js/premium.js"></script>
    <title>ejercicios de apoyo</title>
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
            <input type="button" value="Comenzar" onclick="window.location.href='registrar.php?mostrar=registro'" />
        </div>
    </nav>
    
    <div class="desPlus">
        <img src="../img/bg-plus.png" alt="">
        <div class="des">
            <h1>Brain Hub Plus</h1>
            <li>Acceso Prioritario a Profesionales Expertos</li><br>
            <li>Sesiones Ilimitadas</li><br>
            <li>Seguimiento Continuo</li>
            <button class="btnDes">
                <p>Prueba gratis</p>
            </button>
        </div>
    </div>
    <!-- titulo -->
    <div class="titulo">
        <div class="texto">
            <h1>Brain Hub</h1>
        </div>
        <div class="intro"></div>
        <div class="intro" id="intro1">
            <p>Te ofrecemos un universo de posibilidades para cuidar tu salud mental.</p>
        </div>
        <div class="intro" id="intro2">
            <p>Por un precio accesible de solo 10 euros, abrimos la puerta a un espacio donde cada recurso está diseñado pensando en ti. </p>
        </div>
    </div>
    <div class="last-intro">
        <p>Invertir en tu bienestar emocional nunca fue tan sencillo. Brain Hub se adapta a tus necesidades, brindándote opciones accesibles para tu cuidado mental.</p>
    </div>
    <!-- tarjeta -->
    <main id="tarjetas">
        <div class="tarjeta1 tarjeta">
            <h1>Servicio Gratis</h1>
            <div>
                <li>Recursos de acceso gratuito</li>
                <li>Servicio de seguimiento</li>
                <li>Contacto con terapeutas</li>
            </div>

        </div>
        <div class="tarjeta2 tarjeta">
            <h1>Servicio Premium</h1>
            <div>
                <li>Toda la biblioteca de recursos disponible</li>
                <li>Todas las características desbloqueadas</li>
                <li>Descuento en sesiones con terapeutas</li>
            </div>
            <button>10€/mes</button>
        </div>
        <i class='bx bx-up-arrow-circle' ></i>
    </main>

    
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