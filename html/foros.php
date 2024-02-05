<?php
    include("../db/crear_tablas.php");
    // añadir los datos de foros a bd
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      //está asignando a la variable "$titulo" el llave "addTitulo" obtiene del array 
      $titulo=$_POST["addTitulo"];
      //tomar la cadena "$titulo"
      $titulo=mysqli_escape_string($conexion,$titulo);
      $contenido=$_POST['addContenido'];
      $contenido=mysqli_escape_string($conexion,$contenido);
      //asignar directorio "../img/" a la variable
      $directorio_subido="../img/";
      // obtener nombre de imagen
      $img=$_FILES["addImg"]['name'];
      // propociona un ubicacion temporal que se almancener imagen subido
      $imgTmp=$_FILES["addImg"]['tmp_name'];
      //obtener directorio completo
      $ruta_completa=$directorio_subido . $img;
      // mover la imagen desde la ubicación temporal a la carpeta indicada
      move_uploaded_file($imgTmp,$ruta_completa);
      //tomar la cadena "$titulo" y la limpiar para que sea segura de usuario
      $img=mysqli_escape_string($conexion,$img);
      // insertar los datos a base de datos
      $insert="INSERT INTO foro(titular,descripcion,img)VALUES ('$titulo','$contenido','$img')";
      mysqli_query($conexion,$insert);
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/foros.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/foros.js"></script>
    <title>Social</title>
</head>
<body>
    <!-- barra navegación -->
    <nav>
        <div class="usuario">
            <img src="../img/logo.png" alt="" srcset="">
            <a href="index.html">Brain Hub</a>
        </div>
        <div class="menu">
            <button onclick="window.location.href='recursos.html'">Recursos</button>
            <div class="dropdown">
                Apoyo
                <div class="dropdown-menu">
                    <button onclick="window.location.href='grupo_apoyo.html'">Grupo Apoyo</button>
                    <button onclick="window.location.href='ejercicios_apoyo.html'">Ejercicios de Apoyo</button>
                </div>
            </div>
            <button onclick="window.location.href='terapeutas.html'">Terapeutas</button>
            <button onclick="window.location.href='social.html'">Social</button>
        </div>
        <div class="iniciarUser">
            <input type="button" value="Iniciar Sesión" onclick="window.location.href='logIn.html'" />
            <input type="button" value="Comenzar" onclick="window.location.href='comenzar.html'" />
        </div>
    </nav>
    <!--  -->
    <div class="forosTitulo">
        <h1>
            <b>Foros</b> <b>de</b> <b>Comunidad</b>
        </h1>
    </div>
    <div class="buscar">
        <input type="text" id="buscarInput" placeholder="Buscar un tema existente"/>
        <i class='bx bx-search-alt' ></i>
    </div>
    <!-- need add php -->
    <main>
        <div class="tema-bg">
            <!-- <p>
                <a>El último</a>
                <a>Mas antigua</a>
            </p> -->
                <?php
                // saca todas temas de autores de bd
                    $select="SELECT f.id AS idForo,f.titular AS titulo,f.fecha_creacion AS fecha,us.imagen AS img
                    FROM foro f
                    INNER JOIN usuario us ON us.id=f.id_usuario";
                    $resulta=mysqli_query($conexion,$select);
                    while ($tema=$resulta->fetch_assoc()) {
                        # code...
                        echo "
                        <a class='tema' href='foroContenido.php?{$tema['idForo']}' >
                            <div class='descripcion'>
                                <h2 class='temaTitulo'>{$tema['titulo']}</h2>
                                <p>{$tema['fecha']}</p>
                            </div>
                            <img class='imgAutor'  src='{$tema['img']}'/>
                        </a>
                        ";
                    }
                ?>
                <!-- propociona un enlace a formulario -->
                <a class='tema' >
                  <div class='descripcion'>
                      <h2 class='temaTitulo'>Agrega tu título</h2>
                      <p>También apunte tu artículo</p>
                  </div>
                  <div class='imgAutor'><i class='bx bx-add-to-queue'></i></div>
                </a>

                <form class='add-tema' action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                  <i class='bx bx-arrow-back'></i>
                  <label><input type="file" name="addImg" accept=".png,.jpg,.jpeg"><i class='bx bx-image-add' ></i></label>
                  <input type="text" placeholder="Apunte título de artículo" name="addTitulo">
                  <textarea name="addContenido" id="" placeholder="Apunte lo que quiera"></textarea>
                  <input type="submit" value="Agregar tu artículo">
                </form>
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
</body>
</html>