<?php
include "../db/crear_tablas.php";
session_start();
$id=$_SESSION["id"];
if (isset($_POST["modificar"])) {
    //obtener imagen de perfil que modificar
    $dir_subido="../img/";
    $img=$_FILES["addImg"]["name"];
    $tmp=$_FILES["addImg"]["tmp_name"];
    $ruta=$dir_subido . $img;
    move_uploaded_file($tmp,$ruta);
    $img=mysqli_escape_string($conexion,$ruta);
    // conseguir nombre,apellidos,correo,contraseña
    $nombre=$_POST["nombre"];
    $apellidos=$_POST["apellidos"];
    $email=$_POST["email"];
    $pwd=$_POST["pwd"];
    $nombre=mysqli_escape_string($conexion,$nombre);
    $apellidos=mysqli_escape_string($conexion,$apellidos);
    $email=mysqli_escape_string($conexion,$email);
    //actualizar usuario
    $update="UPDATE usuario 
    SET nombre='$nombre', email='$email',apellidos='$apellidos',pssword=$pwd,imagen='$img'
    WHERE id=$id";
    mysqli_query($conexion,$update);
}
if (isset($_POST["modifiCard"])) {
    $numTarjeta=$_POST["num-tarjeta"];
    $fecha=$_POST["fecha"];
    $cvv=$_POST["cvv"];
    $metodo=$_POST["metodo"];
    $numTarjeta=mysqli_escape_string($conexion,$numTarjeta);
    $fecha=mysqli_escape_string($conexion,$fecha);
    $metodo=mysqli_escape_string($conexion,$metodo);
    // actualizar nombre de título de tarjeta
    $update="UPDATE pago
    SET num_tajeta='$numTarjeta',metodo='$metodo',cvv=$cvv,fecha_valida='$fecha'
    WHERE id_usuario=$id";
    mysqli_query($conexion,$update);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/main.css">
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
    <main>
        <h1>Perfil de usuario</h1>
        <div class="informacion">
            <div>
                <div class="bg-img">
                    <?php
                    $select="SELECT * FROM usuario WHERE id=$id";
                    $result=mysqli_query($conexion,$select,);
                    while ($user=$result->fetch_assoc()) {
                        echo "<img src='{$user['imagen']}'>";
                    }
                    ?>
                </div>
                <div class="btn">
                    <button>Editar Perfil</button>
                </div>
            </div>
            <div class="infor-user">
                <?php
                    $select="SELECT nombre AS nombre, email AS email, metodo AS metodo
                    FROM usuario us
                    INNER JOIN pago p ON us.id=p.id_usuario
                    WHERE us.id=$id";
                    $result=mysqli_query($conexion,$select);
                    while ($user=$result->fetch_assoc()) {
                        echo "
                            <h3>Nombre:</h3>
                            <p>{$user["nombre"]}</p>
                            <h3>Correo:</h3>
                            <p>{$user["email"]}</p>
                            <h3>Metodo de pago:</h3>
                            <p>{$user['metodo']}<i class='bx bxs-credit-card-alt'></i></p>
                        ";
                    }
                ?>
                
                
                <button onclick="window.location.href='premium.php'">Hazte premium</button>
            </div>
        </div>
        <!-- editar perfil -->
        <form class="editar" method="post" enctype="multipart/form-data">
            <i class='bx bx-x'></i>
            <label class="addImg">
                <input type="file" name="addImg" accept=".png,.jpg,.jpeg">
                <i class='bx bx-image-add' ></i>
            </label>
            <?php
                $select="SELECT * FROM usuario WHERE id=$id";
                $result=mysqli_query($conexion,$select);
                while ($user=$result->fetch_assoc()) {
                    # code...
                    echo "
                    <label for='nombre'>nombre</label>
                    <input type='text' name='nombre' value='{$user['nombre']}'>
                    <label for='apellidos'>apellidos</label>
                    <input type='text' name='apellidos' value='{$user['apellidos']}'>
                    <label for='email'>correo</label>
                    <input type='email' name='email' value='{$user['email']}'>
                    <label for='new password'>contraseña nueva</label>
                    <input type='password' name='pwd' id=''>
                    ";
                }
            ?>
            <input type="submit" value="Guardar" name="modificar">
        </form>
        <!-- cambio de met'odo de pago -->
        <form class="pago">
            <i class='bx bx-x'></i>
            <div class="card-border"></div>
            <img src="../img/logo.png" alt="">
            <hr>
            <?php
                $select="SELECT p.num_tarjeta AS tarjeta, us.nombre AS nombre,p.fecha_valida AS fecha,p.cvv AS cvv,p.metodo AS metodo
                FROM usuario us
                INNER JOIN pago p ON p.id_usuario=us.id
                WHERE us.id=$id";
                $result=mysqli_query($conexion,$select);
                if ($user=$result->fetch_assoc()) {
                    echo "
                    <input type='text' name='num-tarjeta' value='{$user['tarjeta']}' class='tarjeta'  maxlength='19' minlength='19' placeholder='xxxx-xxxx-xxxx-xxxx'>
                    <p name='nombre'  class='nombre' >Nombre de título: {$user['nombre']}</p>
                    <fieldset>
                        <input type='date' name='fecha' value='{$user['fecha']}' placeholder='dd/mm/yy'>
                        <input type='text' name='cvv' value='{$user['cvv']}' placeholder='CVV' pattern='\d{3}' maxlength='3' minlength='3'>
                        <input type='text' name='metodo' value='{$user['metodo']}' id='metodo' placeholder='metodo de pago' >
                    </fieldset>
                    ";
                }
            ?>
            <div class="btn-pago">
                <i class='bx bx-credit-card'></i>
                <i class='bx bxl-paypal' ></i>
            </div>
            <input type="submit" value="Guardar" name="modifCard">
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