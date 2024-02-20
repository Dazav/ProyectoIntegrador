<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/recurso.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/recurso.js"></script>
    <title>Recurso</title>
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
    <!--  -->
    <div class="forosTitulo">
        <h1>
            Recursos
        </h1>
    </div>
    
    <!-- need add php -->
    <main>
        <h2>RECURSOS DE ANSIEDAD</h2>
        <hr>
        <section>
          <div class="tema-ansiedad">
            <div class="tema1">
              <div>
                <h3>Ejercicios de exposición gradual</h3>
                <a href="">
                  ver detalle<i class='bx bx-right-arrow-alt'></i>
                </a>
              </div>
              <img src="../img/tema-an1.png" alt="">
            </div>
            <div class="tema2">
              <img src="../img/tema-an2.png" alt="">
              <div>
                <h3>Técnicas de relajación</h3>
                <a href="">
                  ver detalle<i class='bx bx-right-arrow-alt'></i>
                </a>
              </div>
            </div>
            <div class="tema3">
              <img src="../img/tema-an3.png" alt="" srcset="">
              <div>
                <h3>Ejercicio de atención plena </h3>
                <a href="">
                  ver detalle<i class='bx bx-right-arrow-alt'></i>
                </a>
              </div>
            </div>
            <div class="tema4">
              <img src="../img/tema-an4.png" alt="" srcset="">
              <div>
                <h3>Ejercicios de apoyo</h3>
                <a href="">
                  ver detalle<i class='bx bx-right-arrow-alt'></i>
                </a>
              </div>
            </div>
          </div>
        </section>
    </main>
    <!--  -->
    <main class="segundo-parte">
      <h2>TÉCNICAS DE RELAJACIÓN</h2>
      <hr>
      <section>
        <div class="tema-ansiedad">
          <div class="tema1">
            <div>
              <h3>Ejercicios de exposición gradual</h3>
              <a href="">
                ver detalle<i class='bx bx-right-arrow-alt'></i>
              </a>
            </div>
            <img src="../img/tema-an1.png" alt="">
          </div>
          <div class="tema2">
            <img src="../img/tema-an2.png" alt="">
            <div>
              <h3>Técnicas de relajación</h3>
              <a href="">
                ver detalle<i class='bx bx-right-arrow-alt'></i>
              </a>
            </div>
          </div>
          <div class="tema3">
            <img src="../img/tema-an3.png" alt="" srcset="">
            <div>
              <h3>Ejercicio de atención plena </h3>
              <a href="">
                ver detalle<i class='bx bx-right-arrow-alt'></i>
              </a>
            </div>
          </div>
          <div class="tema4">
            <img src="../img/tema-an4.png" alt="" srcset="">
            <div>
              <h3>Ejercicios de apoyo</h3>
              <a href="">
                ver detalle<i class='bx bx-right-arrow-alt'></i>
              </a>
            </div>
          </div>
        </div>
      </section>
  </main>
   <!-- contacto -->
   <div class="contact-div">
    <h2>¿Tienes dudas?</h2>
    <p>Nuestro equipo de soporte está disponible 24/7</p>
    <input type="button" value="CONTACTO" class="contact-button" onclick="window.location.href='contacto.html'" />
  </div>
<!-- footer -->
<footer class="footer">
    <div class="footer-container">
      <div class="footer-column">
        <h3>Recursos</h3>
        <ul>
          <li>Recursos de Ansiedad</li>
          <li>Técnicas Relajación</li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Apoyo</h3>
        <ul>
          <li>Herramientas</li>
          <li>Seguimiento y Progreso</li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Social</h3>
        <ul>
          <li>Grupos de Apoyo</li>
          <li>Foros de Comunidad</li>
        </ul>
        <div class="footer-social-media">
          <!-- Asumiendo que tienes imágenes de iconos sociales en tu servidor -->
          <a href="https://www.facebook.com"><img src="facebook-icon.png" alt="Facebook"></a>
          <a href="https://www.twitter.com"><img src="twitter-icon.png" alt="Twitter"></a>
          <a href="https://www.instagram.com"><img src="instagram-icon.png" alt="Instagram"></a>
        </div>
      </div>
    </div>
    <div class="enlaces-adicionales">
        <a href="#politicaprivacidad">Política de Privacidad</a>
        <a href="#terminosuso">Términos de Uso</a>
        <a href="#configuracioncookies">Configuración de Cookies</a>
    </div>
  </footer>
</body>
</html>