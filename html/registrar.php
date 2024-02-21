<?php
include "../db/crear_tablas.php";

// if(isset($_POST['registro'])){

//   $user = $_POST['user-register'];
//   $email = $_POST['email-register'];
//   $password = $_POST['password-register'];

//   $conexion = getConexion();

//   $sql = "SELECT * FROM usuario WHERE nombreUser = '$user'";

//   $resultado = $conexion->query($sql);

//   if (($resultado->num_rows > 0)){
//     $mensajeRegister = "Este nombre de usuario ya está en uso. Prueba con otro";
//   }else{
//     $sql = "SELECT * FROM usuario WHERE email = '$email'";
//     $resultado = $conexion->query($sql);
//     if (($resultado->num_rows > 0)){
//       $mensajeRegister = "Este correo ya está registrado. Prueba a iniciar sesión";
//     }else{
//       $sql = "INSERT INTO usuario (nombreUser, email, pssword) VALUES ('$user', '$email', '$password')";
//       if (mysqli_query($conexion, $sql)) {
//           $mensajeRegister = "Hemos recibido tu respuesta, contactaremos lo antes posible.";
//       } else {
//           $mensajeRegister = "Ha habido un problema al enviar tu respuesta. Intétalo más tarde.";
//       }
//     }
//   }
// }

// if(isset($_POST['Login'])){
//     $email = $_POST['email-login'];
//     $password = $_POST['password-login'];

//     $conexion = getConexion();

//     $sql = "SELECT * FROM usuario WHERE email = '$email' AND pssword = '$password'";

//     $resultado = $conexion->query($sql);
//     if ($resultado->num_rows > 0) {
//       while ($fila = $resultado->fetch_assoc()) {
//         $id_usuario = $fila['id'];
//         // header("Location: index.php");
//       }
//     }else{
//       $mensaje = "El email o la contraseña no son correctos";
//     }
// }

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
  <nav>
    <div class="usuario">
      <!-- <img src="../img/logo.png" alt="" srcset=""> -->
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
    <?php
    if (isset($_POST['Login'])) {
      $email = $_POST['email-login'];
      $password = $_POST['password-login'];
      $sql = "SELECT imagen AS img, id AS id
          FROM usuario
          WHERE email = '$email' AND pssword = '$password'";

      $resultado = $conexion->query($sql);
      if ($resultado->num_rows > 0) {
        while ($user = $resultado->fetch_assoc()) {
          echo "<a href='perfil.php'>
                      <img src='{$user['img']}' class='usr-circulo'>
                    </a>";
          echo "<input type='hidden' value='{$user['id']}' >";
        }
      }
    } else {
      echo "<img src='../img/bg-ejercicio.png' class='usr-circulo'>";
    }
    ?>
  </nav>
  <main>
    <div class="box">
      <div class="inner-box">
        <!-- formularios -->
        <div class="forms-wrap">
          <!-- Formulario de login -->
          <form autocomplete="off" method="post" class="sign-in-form">
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
                <input type="email" minlength="2" name="email-login" class="input-field" autocomplete="off" required />
                <label>Email</label>
              </div>
              <p class="error-email">Introducir correo con forma correcto<i class='bx bxs-error bx-burst'></i></p>
              <div class="input-wrap">
                <input type="password" class="input-field" name="password-login" autocomplete="off" required />
                <label>Password</label>
              </div>
              <div id="mensajeRespuesta"></div>
              <input type="Submit" name="Login" value="Login" class="sign-btn" />

              <p class="text">
                <a href="recurso.html">¿Olvidaste tu contraseña?</a>
              </p>
            </div>
          </form>

          <!-- Formulario de registro -->
          <form method="post" autocomplete="off" class="sign-up-form">
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
                <input type="text" name="user-register" minlength="2" class="input-field" autocomplete="off" required />
                <label>Nombre de usuario</label>
              </div>
              <p class="error-nombre">Introducir nombre con forma correcto<i class='bx bxs-error bx-burst'></i></p>
              <div class="input-wrap">
                <input type="email" name="email-register" class="input-field" autocomplete="off" required />
                <label>Email</label>
              </div>
              <p class="error-email">Introducir correo con forma correcto<i class='bx bxs-error bx-burst'></i></p>
              <div class="input-wrap">
                <input type="password" name="password-register" minlength="4" class="input-field" autocomplete="off" required />
                <label>Contraseña</label>
              </div>
              <p class="error-pwd">Introducir contraseña sin espacio con limite entre 8 y 14 letras<i class='bx bxs-error bx-burst'></i></p>

              <div id="mensajeRespuestaRegister"></div>

              <input type="submit" name="registro" value="Registro" class="sign-btn" />

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
    <input type="button" value="CONTACTO" class="contact-button" onclick="window.location.href='contacto.php'" />
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
          <a href="https://www.facebook.com"><img src="../img/facebook.png" alt="Facebook"></a>
          <a href="https://www.twitter.com"><img src="../img/twitter.png" alt="Twitter"></a>
          <a href="https://www.instagram.com"><img src="../img/instagram.png" alt="Instagram"></a>
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
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Evento submit del formulario

    // Encuentra el formulario de registro por su clase o id
    var formRegistro = document.querySelector('.sign-up-form');

    formRegistro.addEventListener('submit', function(e) {
      e.preventDefault(); // Evita el envío del formulario

      // Crea un objeto FormData con los datos del formulario
      var formData = new FormData(formRegistro);
      console.log("Se ha presionado el form de register");
      // Usa fetch para enviar los datos al servidor
      fetch('procesarRegister.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json()) // Espera una respuesta en formato JSON
        .then(data => {
          // Utiliza la respuesta de tu servidor
          if (data.success) {
            document.getElementById('mensajeRespuestaRegister').textContent = data.mensaje;
            document.getElementById('mensajeRespuestaRegister').style.color = 'green'; // Texto de éxito en verde
          } else {
            document.getElementById('mensajeRespuestaRegister').textContent = data.mensaje;
            document.getElementById('mensajeRespuestaRegister').style.color = 'red'; // Texto de error en rojo
          }
        })
        .catch(error => {
          // Manejo de errores de la petición
          document.getElementById('mensajeRespuestaRegister').textContent = 'Error al enviar el formulario: ' + error;
          document.getElementById('mensajeRespuestaRegister').style.color = 'red';
        });
    });

    // Procesar el formulario login
    // Manejador del formulario de inicio de sesión
    var formLogin = document.querySelector('.sign-in-form');
    formLogin.addEventListener('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(formLogin);
      console.log("Se ha presionado el form de login");
      fetch('procesarLogin.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            window.location.href = data.redirect;
          } else {
            document.getElementById('mensajeRespuesta').textContent = data.mensaje;
            document.getElementById('mensajeRespuesta').style.color = 'red'; // Texto de error en rojo
          }
        })
        .catch(error => {
          // Manejo de errores de la petición
          document.getElementById('mensajeRespuesta').textContent = 'Error al enviar el formulario: ' + error;
          document.getElementById('mensajeRespuesta').style.color = 'red';
        });
    });
  });
</script>

</html>