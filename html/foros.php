<?php
    include("../db/crear_tablas.php");
    session_start();
    //obtener el id de usuario de login
    $id=$_SESSION["id"];

    // añadir los datos de tema nueva a bd
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        // id usuario
        $idUser=$id;
        //asignamos a la variable "$titulo" el llave "addTitulo" obtiene del array 
        $titulo=$_POST["addTitulo"];
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
        $img=mysqli_escape_string($conexion,$ruta_completa);
        // insertar los datos a base de datos
        $insert="INSERT INTO foro(id_usuario,titular,descripcion,img)VALUES ($idUser,'$titulo','$contenido','$img')";
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
            <b>Foros</b> <b>de</b> <b>Comunidad</b>
        </h1>
    </div>
    
    <!-- need add php -->
    <main>
      <!-- buscador -->
      <div class="buscar">
          <input type="text" id="buscarInput" placeholder="Buscar un tema existente"/>
          <i class='bx bx-search-alt' ></i>
      </div>
      <!-- temas -->
      <div class="tema-bg">
          <h1 style="color: #6545A1;">TEMAS</h1>
              <?php
              // saca todas temas de autores de bd
              // combinamos tabla foro en usuarios
                  $select="SELECT f.id AS idForo,f.titular AS titulo,f.fecha_creacion AS fecha,us.imagen AS img
                  FROM foro f
                  INNER JOIN usuario us ON us.id=f.id_usuario";
                  $resulta=mysqli_query($conexion,$select);
                  // atravesamos todas temas y lo presentamos
                  while ($tema=$resulta->fetch_assoc()) {
                      # code...
                      echo "
                      <a class='tema' href='foroContenido.php?idForo={$tema['idForo']}' >
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
              <a class='tema' id="addtema">
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