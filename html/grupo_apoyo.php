<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/grupos.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/grupo.js"></script>
    <title>Grupos de apoyo</title>
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
                    <input type='button' value='Iniciar Sesión' onclick='window.location.href='registrar.php'' />
                    <input type='button' value='Comenzar' onclick='window.location.href='registrar.php?mostrar=registro'' />
                </div>
                ";
            }
        ?>
    </nav>
   <!-- titulo -->
    <div class="gruposTitulo">
        <h1>
           <b>Grupos</b> <b>de</b> <b>apoyo</b>
        </h1>
    </div>
            <!-- main  -->
    <main>
    <div class="buscar">
          <input type="text" id="buscarInput" placeholder="Buscar un grupo"/>
          <i class='bx bx-search-alt' ></i>
      </div>
    </main>
</body>
</html>