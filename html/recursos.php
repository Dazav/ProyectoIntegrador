<?php
include "../db/crear_tablas.php";
session_start();
if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $premium = 0;
  // Seleccionamos el premium del usuario
  $stmt = $conexion->prepare("SELECT premium FROM usuario WHERE id=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    while ($user = $result->fetch_assoc()) {
      $premium = $user['premium'];
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/recurso.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="../js/recurso1.js"></script>
  <script src="../js/main.js"></script>

  <title>Recurso</title>
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
      Recursos
    </h1>
  </div>

  <!-- need add php -->
  <main class="primera-parte">
    <h2>RECURSOS DE ANSIEDAD</h2>
    <hr>
    <section>
      <div class="tema-ansiedad">
        <?php


        $sql = "SELECT * FROM recursos";
        $result = mysqli_query($conexion, $sql);
        if ($result->num_rows > 0) {
          while ($recurso = $result->fetch_assoc()) {
            if ($recurso['premium'] == 1 && $premium == 1) {
              $link = '<a href="recursosContenido.php?id_recurso=' . $recurso['id'] . '">
                                    ver detalle<i class="bx bx-right-arrow-alt"></i>
                                  </a>';
            } else if ($recurso['premium'] == 1 && $premium == 0) {
              $link = '<a href="premium.php">
                                    Hazte premium<i class="bx bx-lock-alt"></i>
                                  </a>';
            } else {
              $link = '<a href="recursosContenido.php?id_recurso=' . $recurso['id'] . '">
                                    ver detalle<i class="bx bx-right-arrow-alt"></i>
                                  </a>';
            }
            echo '
                      <div class="tema' . $recurso['id'] . '">
                        <div>
                          <h3>' . $recurso['titular'] . '</h3>' .
              $link
              . '</div>
                        <img src="../img/' . $recurso['img_portada'] . '" alt="">
                      </div>
                      ';
          }

        }
        ?>

      </div>
    </section>
  </main>
  <!--  -->
  <main class="segundo-parte">
    <h2>TÉCNICAS DE RELAJACIÓN</h2>
    <hr>
    <section>
      <div class="tema-relajacion">
        <a href="relajacion.php?id_relaja=1">
          <div class="tema">
            <img src="../img/inspirar.png" alt="">
            <div>
              <h3>Inspirar</h3>
              <i class='bx bx-right-arrow-circle'></i>
            </div>
          </div>
        </a>
        <a href="relajacion.php?id_relaja=2">
          <div class="tema">
            <img src="../img/expirar.png" alt="">
            <div>
              <h3>Expirar</h3>
              <i class='bx bx-right-arrow-circle'></i>
            </div>
          </div>
        </a>
        <a href="relajacion.php?id_relaja=3">
          <div class="tema">
            <img src="../img/silencio.png" alt="">
            <div>
              <h3>Meditamos en silencio</h3>
              <i class='bx bx-right-arrow-circle'></i>
            </div>
          </div>
        </a>
      </div>
    </section>
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
      <pre>Contacto   Centro de Ayuda   Preferencias</pre>
    </div>
  </footer>
</body>

</html>