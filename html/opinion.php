<?php
    include "../db/crear_tablas.php";
    session_start();
    if (isset($_SESSION["id"])) {
        # code...
        $id=$_SESSION["id"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/opinion.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../js/opinion.js"></script>
    <script src="../js/main.js"></script>
    <title>Opiniones</title>
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
        <?php
            if(isset($_SESSION["id"])){
                $select="SELECT imagen AS img,id AS id FROM usuario WHERE id=$id";
                $resulta=mysqli_query($conexion,$select);
                if ($resulta->num_rows>0) {
                    while ($user=$resulta->fetch_assoc()) {
                        echo "<a href='perfil.php'>
                              <img src='{$user['img']}' class='usr-circulo'>
                            </a>";
                    }
                }else {
                    echo "<img src='../img/bg-ejercicio.png' class='usr-circulo'>";
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
    <header>
        <div class="opinion-intro">
            <img src="../img/logo.png" alt="">
            <div>
                <h1>Brain Hub</h1>
                <p class="text-opinion"></p>
                <span class="promedio-star"></span>
                <p><i class='bx bxs-check-shield'></i> EMPRESA VERIFICADA</p>
            </div>
        </div>
        <div class="opinion-nav">
            <h3>¡Comparte tu experiencia!</h3>
            <p class="text-opinion">ver los opiniones de usuarios</p>
            <i class='bx bx-right-arrow-alt'></i>
        </div>
    </header>
    <main>
        <aside>
            <section>
                <form method="post">
                    <fieldset>
                        <?php
                        $select="SELECT *
                        FROM usuario
                        WHERE id=$id";
                        $resulta=mysqli_query($conexion,$select);
                        while ($usr=$resulta->fetch_assoc()) {
                            echo "
                            <img src='{$usr['imagen']}' alt=''>
                            ";
                        }
                        ?>
                        <div class="apunta">
                            <?php
                            $select="SELECT *
                            FROM usuario
                            WHERE id=$id";
                            $resulta=mysqli_query($conexion,$select);
                            while ($usr=$resulta->fetch_assoc()) {
                                echo "
                                <p>{$usr['nombre']} {$usr['apellidos']}</p>
                                ";
                            }
                            ?>
                            <input type="text" placeholder="Apunte título" id="titulo">
                            <input type="text" placeholder="Apunte tu opinion" id="desc">
                        </div>
                        <div class="estrellas">
                            <input type="radio" name="" id="">
                            <input type="radio" name="" id="">
                            <input type="radio" name="" id="">
                            <input type="radio" name="" id="">
                            <input type="radio" name="" id="">
                        </div>
                        <span id="numStar">0</span>
                        <i class='bx bx-revision'></i>
                    </fieldset>
                    <input type="submit" class="enviar">
                </form>
                <?php
                    $select="SELECT op.titulo AS titulo, op.descripcion AS dsc, op.estrellas AS star,us.imagen AS img,us.nombre AS nombre,us.apellidos AS apellidos
                    FROM opiniones op
                    INNER JOIN usuario us ON  us.id=op.id_autor
                    ";
                    $resulta=mysqli_query($conexion,$select);
                    while ($op=$resulta->fetch_assoc()) {
                        echo "
                        <div class='opinion'>
                            <img src='{$op['img']}' alt=''>
                            <div>
                                <p style='color: #B19CD9;'>{$op['nombre']} {$op['apellidos']}</p>
                                <h1>{$op['titulo']}</h1>
                                <p>{$op['dsc']}</p>
                                <div class='star-cada'></div>
                                <input type='hidden' name='' value='{$op['star']}' >
                            </div>
                        </div>
                        ";
                    }
                ?>
            </section>
        </aside>
        <section class="sidebar">
            <div class="detalle">
                <h2>Opiniones <span class="promedio-star"></span></h2>
                <p class="total"></p>
                <p>1 ⭐</p>
                <div class="star"><div></div></div>
                <p>2 ⭐</p>
                <div class="star"><div></div></div>
                <p>3 ⭐</p>
                <div class="star"><div></div></div>
                <p>4 ⭐</p>
                <div class="star"><div></div></div>
                <p>5 ⭐</p>
                <div class="star"><div></div></div>
            </div>
        </section>
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
<script>
    $(".enviar").click(function (e) {
        e.preventDefault(); 
        var tituloValue = $("#titulo").val().toString();
        var descValue = $("#desc").val().toString();
        var numStarValue = $("#numStar").text();

        console.log("Titulo:", tituloValue);
        console.log("Desc:", descValue);
        console.log("NumStar:", numStarValue);
        $.ajax({
        type: "POST",
        url: "procesarOpinion.php",
        data: {
            titulo: tituloValue,
            desc: descValue,
            numStar: numStarValue
        },
        dataType: "JSON",
        success: function (response) {
            alert(response);
        },
        error: function (xhr, status, error){
            alert(xhr.responseText);
        }
    }); 
    });
</script>
</html>