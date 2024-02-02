<?php
  include "../db/crear_tablas.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registrar.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Iniciar Sesión</title>
</head>
<body>
    <!-- barra navegación -->
    <div class="navbar">
        <div class="navbar-logo">
          <img src="../img/logo.png" alt="Brain Hub" height="50"> 
          <span>Brain Hub</span>
        </div>
        <div class="nav-links">
          <a href="#recursos">Recursos</a>
          <a href="#apoyo">Apoyo</a>
          <a href="#terapeutas">Terapeutas</a>
        </div>
        <div class="navbar-toggle" onclick="toggleMenu()">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </div>
      
    <main>
        <div class="box">
            <div class="inner-box">
                <!-- formularios -->
                <div class="forms-wrap">
                    <!-- Formulario de login -->
                <form action="" autocomplete="off" method="post" class="sign-in-form">
                    <div class="logos">
                        <img src="../img/logo.png" alt="Brainhub">
                        <h4>Brainhub</h4>
                    </div>

                    <div class="heading">
                        <h2>Bienvenido de vuelta</h2>
                        <h6>¿No estas registrado?</h6>
                        <a href="#" class="toggle">Registrate</a>
                    </div>
                    
                    <div class="actual-form">
                        <div class="input-wrap"> 
                            <input type="text" 
                            minlength="2" 
                            class="input-field" 
                            autocomplete="off"
                            required
                            />
                            <label>Name</label>
                        </div>
                        <p class="error-nombre">Introducir nombre con forma correcto<i class='bx bxs-error bx-burst' ></i></p>
                        <div class="input-wrap">
                            <input 
                            type="password" 
                            minlength="4" 
                            class="input-field" 
                            autocomplete="off"
                            required 
                            />
                            <label>Password</label>
                        </div>
                        <p class="error-pwd">Introducir contraseña sin simbólo con limite entre 8 y 14 letras<i class='bx bxs-error bx-burst' ></i></p>
                        <input type="Submit" value="Sign in" class="sign-btn"/>

                        <p class="text">
                            <a href="recurso.html">¿Olvidaste tu contraseña?</a>
                        </p>
                    </div>
                </form>
                
                <!-- Formulario de registro -->
                <form action="" autocomplete="off" class="sign-up-form" method="post">
                    <div class="logos">
                        <img src="../img/logo.png" alt="Brainhub">
                        <h4>Brainhub</h4>
                    </div>

                    <div class="heading">
                        <h2>Empecemos</h2>
                        <h6>¿Ya tienes una cuenta?</h6>
                        <a href="#" class="toggle">Inicia sesión</a>
                    </div>

                    <div class="actual-form">
                        <div class="input-wrap">
                            <input type="text" 
                            minlength="2" 
                            class="input-field" 
                            autocomplete="off"
                            required 
                            />
                            <label>Nombre</label>
                        </div>
                        <p class="error-nombre">Introducir nombre con forma correcto<i class='bx bxs-error bx-burst' ></i></p>
                        <div class="input-wrap">
                            <input 
                            type="email" 
                            class="input-field" 
                            autocomplete="off"
                            required 
                            />
                            <label>Email</label>
                        </div>
                        <p class="error-email">Introducir correo con forma correcto<i class='bx bxs-error bx-burst' ></i></p>
                        <div class="input-wrap">
                            <input 
                            type="password" 
                            minlength="4" 
                            class="input-field" 
                            autocomplete="off"
                            required 
                            />
                            <label>Contraseña</label>
                        </div>
                        <p class="error-pwd">Introducir contraseña sin simbólo con limite entre 8 y 14 letras<i class='bx bxs-error bx-burst' ></i></p>
                        <input type="Submit" value="Sign Un" class="sign-btn"/>

                        <p class="text">
                           Al registrarme, Acepto los <a href="#">Terminos de servicio</a>
                           y la <a href="#">Politica de privacidad</a>

                        </p>
                    </div>
                </form>
            </div>

            <div class="carousel">
                <div class="images-wrapper">
                    <img src="../img/shape1.png" class="image img-1 show" alt="">
                    <img src="../img/LOL.png" class="image img-2" alt="">
                    <img src="../img/LOCOXD.jpg" class="image img-3" alt="">
                </div>

                <div class="text-slider">
                    <div class="text-wrap">
                        <div class="text-group">
                            <h2>Hola buenasds</h2>
                            <h2>EL 94%</h2>
                            <h2>ESTOY LOCO XD</h2>
                        </div>
                    </div>

                    <div class="bullets">
                        <span class="active" data-value="1"></span>
                        <span data-value="2"></span>
                        <span data-value="3"></span>
                    </div>
                </div>
            </div>
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
    <script src="../js/register.js"></script>
</body>
</html>