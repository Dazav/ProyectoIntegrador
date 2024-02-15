<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../js/perfil.js"></script>
    <title>Perfil</title>
</head>
<body>
    <!-- barra navegación -->
    <header>
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
    </header>
    <!--  -->
    <main>
        <h1>Perfil de usuario</h1>
        <div class="informacion">
            <div>
                <div class="bg-img">
                    <img src="../img/autor4.png" alt="">
                </div>
                <div class="btn">
                    <button>Editar Perfil</button>
                </div>
            </div>
            <div class="infor-user">
                <h3>Nombre:</h3>
                <p>Andrea Monte</p>
                <h3>Correo:</h3>
                <p>andreamonte@valentine.es</p>
                <h3>Metodo de pago:</h3>
                <p>En efectivo<i class='bx bxs-credit-card-alt'></i></p>
                <button onclick="window.location.href='premium.php'">Hazte premium</button>
            </div>
        </div>
        <!-- editar perfil -->
        <form class="editar">
            <i class='bx bx-x'></i>
            <label for="nombre">nombre</label>
            <input type="text" value="Andrea Monte">
            <label for="email">correo</label>
            <input type="email" value="andreamonte@valentine.es">
            <label for="direccion">dirección</label>
            <input type="text" value="Avenida Portugal, 28940">
            <label for="provincia">provincia</label>
            <input type="text" value="Madrid">
            <label for="password">contraseña</label>
            <input type="password" name="" id="">
            <label for="new password">contraseña nueva</label>
            <input type="password" name="" id="">
            <input type="submit" value="Guardar">
        </form>
    </main>
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