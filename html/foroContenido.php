<?php
    include("../db/crear_tablas.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/foroContenido.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/foroContenido.js"></script>
    <title>Social</title>
</head>
<body>
    <div class="descripcionClic">
        <div>
            <i class='bx bx-arrow-back'></i>
            <h2>¿Cómo podemos saber cuando tendremos un ataque de pánico?</h2>
            <p>12-12-2023</p>
            <p>Buenas, me llamo Ismael y me gustaría saber cuando podría darme un ataque de pánico. Desafortunadamente sufro de Trastorno del Pánico y eso me provoca que en ocasiones me quede parado en un lugar público.</p>
            <img src="../img/tema1.png" alt="" class="img_des">
            <button class="responder">
                responder<i class='bx bx-share' ></i>
            </button>
        </div>
        <div class="comentarios_arti">
            <form method="post">
                Repuesta: <input type="text">
                <input type="submit" value="Enviar" class="enviar">
            </form>
            <div class="comentario_arti">
                <img src="../img/img7.png" alt="">
                <div>
                    <h2>Elizabeth Rex</h2>
                    <p>Destaca la versatilidad del tratamiento psicológico, resaltando la importancia de la resiliencia. Esencial para el bienestar emocional.</p>
                </div>
            </div>
            <div class="comentario_arti">
                <img src="../img/img6.png" alt="">
                <div>
                    <h2>Selena Brish</h2>
                    <p>Artículo clave sobre tratamiento psicológico, destaca resiliencia y bienestar emocional. Esencial.</p>
                </div>
            </div>
            <div class="comentario_arti">
                <img src="../img/img9.png" alt="">
                <div>
                    <h2>Evan Gelia</h2>
                    <p>I don like this</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>