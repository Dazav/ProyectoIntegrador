<?php
include "../db/crear_tablas.php";
session_start();
if (isset($_SESSION["id"])) {
    $id=$_SESSION["id"];
}else{
    header('Location: registrar.php');
}
if (isset($_POST["modificar"])) {
    $email = mysqli_escape_string($conexion, $_POST["email"]);
    $error='';
    // Inicializar una variable para almacenar los campos a actualizar
    $camposAActualizar = [];
    // Verificar si el correo electrónico ya está registrado por otro usuario
    $sql = "SELECT * FROM usuario WHERE email = ? AND id != ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $email, $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        // Correo ya registrado por otro usuario
        $error = "El correo electrónico ya está en uso por otro usuario.";
    } else {
        // Verificar y procesar la nueva imagen de perfil si se ha proporcionado
        if (!empty($_FILES["addImg"]["name"])) {
            $dir_subido = "../img/";
            $img = $_FILES["addImg"]["name"];
            $tmp = $_FILES["addImg"]["tmp_name"];
            $ruta = $dir_subido . basename($img); // Usar basename() para evitar problemas de ruta

            if (move_uploaded_file($tmp, $ruta)) {
                $img = mysqli_escape_string($conexion, $ruta);
                $camposAActualizar[] = "imagen='$img'";
            }
        }

        // Procesar otros campos si se han proporcionado
        if (!empty($_POST["nombre"])) {
            $nombre = mysqli_escape_string($conexion, $_POST["nombre"]);
            $camposAActualizar[] = "nombre='$nombre'";
        }

        if (!empty($_POST["apellidos"])) {
            $apellidos = mysqli_escape_string($conexion, $_POST["apellidos"]);
            $camposAActualizar[] = "apellidos='$apellidos'";
        }

        if (!empty($_POST["email"])) {
            $email = mysqli_escape_string($conexion, $_POST["email"]);
            $camposAActualizar[] = "email='$email'";
        }

        // Verificar y procesar la nueva contraseña si se ha proporcionado
        if (!empty($_POST["pwd"])) {
            $pwd = mysqli_escape_string($conexion, $_POST["pwd"]);
            // Aquí deberías aplicar alguna forma de encriptación a la contraseña antes de guardarla, por ejemplo, password_hash
            $pwdEncriptada = password_hash($pwd, PASSWORD_DEFAULT);
            $camposAActualizar[] = "pssword='$pwdEncriptada'";
        }

        // Si hay campos para actualizar, construir y ejecutar la consulta de actualización
        if (!empty($camposAActualizar)) {
            $update = "UPDATE usuario SET " . implode(", ", $camposAActualizar) . " WHERE id=$id";
            mysqli_query($conexion, $update);
        }
    }
}
// Obtiene el ID del usuario logueado
$id_usuario = $_SESSION["id"];

// Realiza la consulta para obtener las citas del usuario logueado
// Realiza la consulta para obtener las citas del usuario logueado
$query_citas = "SELECT c.id, t.nombre AS nombre_terapeuta, t.telefono, c.fecha_cita 
                FROM cita c
                INNER JOIN terapeuta t ON c.id_terapeuta = t.id
                WHERE c.id_usuario = $id_usuario";

$resultado_citas = mysqli_query($conexion, $query_citas);

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
    <script src="../js/main.js"></script>
    <title>Perfil</title>
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
            if(isset($_SESSION["id"])){
                $stmt = $conexion->prepare("SELECT imagen AS img,id AS id FROM usuario WHERE id=?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows>0) {//si nuevo usuario no tiene la imagen,le ponemos la defecta.
                    while ($user=$result->fetch_assoc()) {
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
    <!--  -->
    <main>
        <h1>Perfil de usuario</h1>
        <div class="informacion">
            <div>
                <div class="bg-img">
                    <?php
                    $select="SELECT * FROM usuario WHERE id=$id AND imagen != '' ";
                    $result=mysqli_query($conexion,$select);
                    if ($result->num_rows>0) {
                        while ($user=$result->fetch_assoc()) {
                            echo "<img src='{$user['imagen']}'>";
                        }
                    }else {
                        echo "<img src='../img/defecto.png'>";
                    }
                    ?>
                </div>
                <div class="btn">
                    <button id="editar">Editar Perfil</button>
                    <button id="logout">Cerrar Sesión</button>
                </div>
            </div>
            <div class="infor-user">
                <?php
                    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($user=$result->fetch_assoc()) {
                        echo "
                            <h3>Nombre:</h3>
                            <p>{$user["nombre"]}</p>
                            <h3>Apellidos:</h3>
                            <p>{$user["apellidos"]}</p>
                            <h3>Correo:</h3>
                            <p>{$user["email"]}</p>
                        ";
                        if($user['premium']==0){
                            echo '<button onclick="window.location.href=\'premium.php\'">Hazte premium</button>';
                        }else{
                            echo "<button>¡Eres premium!</button>";
                        }
                    }
                    
                ?>  
            </div>
           
        </div>
        <!-- cita -->
        <section class="informacion" id="cita">
        <?php
        if (mysqli_num_rows($resultado_citas) > 0) {
            while ($cita = mysqli_fetch_assoc($resultado_citas)) {
                echo "<div class='cita-container' data-cita-id='{$cita['id']}'>";
                echo "<div class='img-informacion'>";
                echo "<img src='../img/defecto.png' alt='' class='img-cita'>";
                echo "<div class='informacion-cita'>";
                echo "<h1>Cita Proxima:</h1>";
                echo "<p>Nombre del terapeuta: {$cita['nombre_terapeuta']}</p>";
                echo "<p>Número de teléfono: {$cita['telefono']}</p>";
                echo "<p>Fecha de la cita: {$cita['fecha_cita']}</p>";
                echo "</div>"; // Cierre de div 'informacion-cita'
                echo "</div>"; // Cierre de div 'img-informacion'
                // Formulario para cancelar la cita
                echo "<form method='post' name='cancelar_cita'>";
                echo "<input type='hidden' name='id_cita' value='{$cita['id']}'>";
                echo "<button type='submit' id='cancelar_cita' class='cancelar-btn'>Cancelar</button>";
                echo "</form>";
                echo "</div>"; // Cierre de div 'cita-container'
            }
        } else {
            echo "<p>No hay citas programadas.</p>";
        }
        ?>
    </section>
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
                    <label>Nombre:</label>
                    <input type='text' name='nombre' value='{$user['nombre']}'>
                    <label>Apellidos:</label>
                    <input type='text' name='apellidos' value='{$user['apellidos']}'>
                    <label>Email:</label>
                    <input type='email' name='email' value='{$user['email']}'>
                    ";
                }
            ?>
            <label>Establecer nueva contraseña:</label>
            <input type="password" name="pwd" id="">
            <input type="submit" value="Guardar" name="modificar">
            <?php
                if (!empty($error)) {
                    echo "<div style='color: red;'>$error</div>";
                }
            ?>
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
                    <a href="recursos.php"><li>Recursos de Ansiedad</li></a>
                    <a href="relajacion.php"><li>Técnicas Relajación</li></a>
                </ul>
            </div>
            <div>
                <h2>Apoyo</h2>
                <ul>
                    <a href="grupo_apoyo.php"><li>Grupos de apoyo</li></a>
                    <a href="ejercicios_apoyo.php"><li>Ejercicios de apoyo</li></a>
                </ul>
            </div>
            <div class="social">
                <h2>Social</h2>
                <ul>
                    <a href="foros.php"><li>Foros de Comunidad</li></a>
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
<?php
// Procesamiento del formulario de cancelación de cita
if (isset($_POST['cancelar_cita'])) {
    $id_cita = $_POST['id_cita']; // Obtén el ID de la cita a cancelar

    // Ejecuta la consulta para eliminar la cita de la base de datos
    $query_eliminar_cita = "DELETE FROM cita WHERE id = $id_cita";

    if (mysqli_query($conexion, $query_eliminar_cita)) {
        echo "<script>alert('La cita ha sido cancelada correctamente.');</script>";
        // Puedes redirigir al usuario o mostrar un mensaje de éxito aquí
    } else {
        echo "<script>alert('Error al cancelar la cita: " . mysqli_error($conexion) . "');</script>";
        // Maneja el error de alguna manera apropiada
    }
}
?>  