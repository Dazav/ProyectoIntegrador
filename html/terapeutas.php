<?php
include "../db/crear_tablas.php";
$conexion = getConexion();
session_start();
if (isset($_SESSION["id"])) {
    // Scamos la ide de la session
    $id = $_SESSION["id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/terapeuta.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../js/teuapeuta.js"></script>
    <title>terapeuta</title>
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
        // Si la session está iniciada, ponemos el logo del usuario, si no, el iniciar sesión
        if (isset($_SESSION["id"])) {
            $select = "SELECT imagen AS img,id AS id FROM usuario WHERE id=$id";
            $resulta = mysqli_query($conexion, $select);
            if ($resulta->num_rows > 0) {
                while ($user = $resulta->fetch_assoc()) {
                    echo "<a href='perfil.php'>
                              <img src='{$user['img']}' class='usr-circulo'>
                            </a>";
                }
            } else {
                echo "<img src='../img/bg-ejercicio.png' class='usr-circulo'>";
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
    <!-- main -->
    <main>
        <div class="califica">
            <i class='bx bx-menu'></i>
            <div class="buscar">
                <input class="buscador" type="text">
                <i class='bx bx-search'></i>
            </div>
            <div class="selecciones">
                <?php
                // La consulta SQL
                $sql = "SELECT DISTINCT especializacion FROM terapeuta";
                $conexion=getConexion();
                // Ejecutamos la consulta
                $result = $conexion->query($sql);

                // Verificamos si la consulta fue exitosa y si hay resultados
                if ($result && $result->num_rows > 0) {
                    echo '<select id="filtro-especialidad" name="especialidad">';
                    echo '<option value="">Especialización</option>';
                    // Iterar a través de los resultados y añadir cada opción al select
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($row['especializacion']) . '">' . htmlspecialchars($row['especializacion']) . '</option>';
                    }
                    echo '</select>';
                } else {
                    echo 'No se encontraron especialidades.';
                }
                ?>
            </div>
        </div>
        <div class="contenido">
            <aside>
                <i class='bx bx-x'></i>
                <form id="formularioFiltro" method="POST">
                    <p>Nacionalidad</p>
                    <?php

                    // Sacamos los arrays de la nacionalidades e idiomas únicos
                    $nacionalidadesUnicas = obtenerNacionalidadesUnicas($conexion);
                    $idiomasUnicos = obtenerIdiomasUnicos($conexion);
                    // Imprimimos los checkboxes de nacionalidad
                    foreach ($nacionalidadesUnicas as $nacionalidad) {
                        echo '<label><input type="checkbox" name="nacionalidades[]" value="' . htmlspecialchars($nacionalidad) . '"> ' . htmlspecialchars($nacionalidad) . '</label><br>';
                    }
                    echo "<hr><p>Idioma</p>";
                    // Imprimimos los checkboxes de idioma
                    foreach ($idiomasUnicos as $idioma) {
                        echo '<label><input type="checkbox" name="idiomas[]" value="' . htmlspecialchars($idioma) . '"> ' . htmlspecialchars($idioma) . '</label><br>';
                    }

                    // Función para obtener los idiomas
                    function obtenerIdiomasUnicos($conexion) {
                        $sql = "SELECT idiomas FROM terapeuta";
                        $result = mysqli_query($conexion, $sql);
                        $todosIdiomas = [];
                        // Como los idiomas están separados por un ", ", y es un array, lo separamos con explode.
                        while ($fila = mysqli_fetch_assoc($result)) {
                            $idiomasTerapeuta = explode(', ', $fila['idiomas']);
                            foreach ($idiomasTerapeuta as $idioma) {
                                $idiomaLimpio = trim($idioma); // Lo arreglamos un poco por si acaso
                                if (!in_array($idiomaLimpio, $todosIdiomas)) {
                                    // Lo añadimos al array
                                    $todosIdiomas[] = $idiomaLimpio;
                                }
                            }
                        }

                        return $todosIdiomas;
                    }

                    // Función para obtener las nacionalidades
                    function obtenerNacionalidadesUnicas($conexion) {
                        $nacionalidades = [];

                        // La consulta SQL para seleccionar nacionalidades únicas
                        $sql = "SELECT DISTINCT nacionalidad FROM terapeuta ORDER BY nacionalidad ASC";

                        $resultado = mysqli_query($conexion, $sql);

                        // Verificamos si se obtuvieron resultados
                        if ($resultado && mysqli_num_rows($resultado) > 0) {
                            // Recorremos los resultados y agregamos cada nacionalidad al array
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $nacionalidades[] = $fila['nacionalidad'];
                            }
                        }

                        return $nacionalidades;
                    }

                    ?>
                </form>
                <hr>
                <img src="../img/logo.png" alt="" srcset="">
            </aside>
            <section>
                <div class="scrollbar">
                    <?php
                    // Para todos los terapeutas hacemos su "card"
                    $sql = "SELECT * FROM terapeuta";
                    $conexion = getConexion();
                    $result = mysqli_query($conexion, $sql);
                    if ($result->num_rows > 0) {
                        while ($terapeuta = $result->fetch_assoc()) {
                            // Para cada terapeuta miramos su disponibilidad para luego ponerla en la tabla
                            $sql = "SELECT fecha_cita FROM cita WHERE id_terapeuta = ?";
                            $stmt = $conexion->prepare($sql);
                            $stmt->bind_param("i", $terapeuta['id']);
                            $stmt->execute();
                            $resultado = $stmt->get_result();

                            // Verificar si la consulta tuvo éxito
                            if ($resultado) {
                                // Recuperar los resultados en un array
                                $arrayResultados = [];
                                while ($fila = $resultado->fetch_assoc()) {
                                    $arrayResultados[] = $fila['fecha_cita'];
                                }
                            }
                            echo '
                                <div class="tarjeta-tera">
                                    <div class="infor1">
                                        <div class="img-des">
                                            <div class="img-tera">
                                                <img src="' . $terapeuta["img_perfil"] . '" alt="" srcset="">
                                                <img src="' . $terapeuta["img_nac"] . '" alt="">
                                            </div>
                                            <div>
                                                <h3>' . $terapeuta['nombre'] . ' ' . $terapeuta['apellidos'] . '</h3>
                                                <p>Nº Identificación: ' . $terapeuta['n_identificacion'] . '</p>
                                                <p>Especialización: ' . $terapeuta['especializacion'] . '</p>
                                            </div>
                                        </div>
                                        <div class="idiomas">
                                            <p><i class="bx bx-world"></i>Idiomas: ' . $terapeuta['idiomas'] . '</p>
                                            <p><i class="bx bx-map"></i>Nacionalidad: ' . $terapeuta['nacionalidad'] . '</p>
                                        </div>
                                        <hr>
                                        <div class="precio">
                                            <p>Cita - 50 minutos</p>
                                            <button>50.00€</button>
                                        </div>
                                    </div>
                                    <div class="infor2">
                                        <h3>Disponibilidad</h3>
                                        <table>
                                            <tr>
                                                <td>Hoy</td>
                                                <td>Mañana</td>
                                                <td>Pasado Mañana</td>
                                            </tr>
                                        </table>
                                        <div>
                                        <form>
                                            <table data-id-terapeuta=' . $terapeuta['id'] . '>';
                            $disponibilidad = explode(",", $terapeuta['disponibilidad']);
                            foreach ($disponibilidad as $hora) {
                                $hoy = date("Y-m-d $hora:00");
                                $tomorrow = date("Y-m-d $hora:00", strtotime('+1 day'));
                                $tomorrow_pasado = date("Y-m-d $hora:00", strtotime('+2 day'));

                                if (in_array($hoy, $arrayResultados)) {
                                    $clase1 = "class='hora-ocupada'";
                                } else {
                                    $clase1 = "";
                                }
                                if (in_array($tomorrow, $arrayResultados)) {
                                    $clase2 = "class='hora-ocupada'";
                                } else {
                                    $clase2 = "";
                                }
                                if (in_array($tomorrow_pasado, $arrayResultados)) {
                                    $clase3 = "class='hora-ocupada'";
                                } else {
                                    $clase3 = "";
                                }
                                echo "<tr>
                                                            <td $clase1 datetime='$hoy'>$hora</td>
                                                            <td $clase2 datetime='$tomorrow'>$hora</td>
                                                            <td $clase3 datetime='$tomorrow_pasado'>$hora</td> 
                                                        </tr> 
                                                        ";
                            }

                            echo '
                                            </table>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    }
                    ?>

            </section>
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
<script>
    $(document).ready(function() {
        // Escucha el evento click en los td que no tengan la clase 'hora-ocupada'
        $('td:not(.hora-ocupada)').click(function() {
            var fechaHora = $(this).attr('datetime'); // Obtiene la fecha y hora del atributo 'datetime'
            var idTerapeuta = $(this).closest('table').data('id-terapeuta'); // Obtiene la ID del terapeuta del atributo de la tabla
            var celdaSeleccionada = $(this); // Guarda la referencia a la celda seleccionada
            // Mensaje de confirmación
            var mensajeConfirmacion = '¿Quieres pedir cita para el día ' + fechaHora + '?';

            // Mostrar ventana de confirmación
            if (confirm(mensajeConfirmacion)) {
                // Aquí asumimos que la ID del usuario está almacenada en una variable de JavaScript
                // Esta variable debe ser establecida en algún lugar de tu script PHP donde la sesión esté disponible
                var idUsuario = <?php echo json_encode($_SESSION['id']); ?>;

                // Crear un objeto FormData y agregar los datos
                var formData = new FormData();
                formData.append('fechaHora', fechaHora);
                formData.append('idTerapeuta', idTerapeuta);
                formData.append('idUsuario', idUsuario);
                fetch('insertar_cita.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            celdaSeleccionada.addClass('hora-ocupada');
                            alert(data.mensaje);
                        } else {
                            alert(data.mensaje);
                        }
                    })
                    .catch(error => {
                        // Manejo de errores de la petición
                        alert(error);
                    });
            } else {
                // Si el usuario cancela, simplemente no hace nada
                alert('La reserva ha sido cancelada.');
            }
        });
    });
document.addEventListener('DOMContentLoaded', function() {
    var select = document.getElementById('filtro-especialidad');

    select.addEventListener('change', function() {
        var especialidadSeleccionada = this.value;

        // Utiliza fetch o jQuery.ajax para enviar esta información al servidor
        fetch('procesarTerapeuta.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'especialidad=' + encodeURIComponent(especialidadSeleccionada)
        })
        .then(response => response.text())
        .then(html => {
            // Aquí asumes que el servidor devuelve el HTML de la sección actualizada
            document.querySelector('.scrollbar').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    });


    // Selecciona todos los elementos de entrada y el selector dentro del formulario
    var inputs = document.querySelectorAll('#formularioFiltro input[type="checkbox"]');

    // Función para manejar el filtrado
    var handleFilterChange = function() {
        console.log("Se ha clikado un input");
        var formData = new FormData(document.getElementById('formularioFiltro'));

        fetch('procesarTerapeuta.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) // Asume que la respuesta es HTML
        .then(html => {
            document.querySelector('.scrollbar').innerHTML = html; // Actualiza el contenido
        })
        .catch(error => console.error('Error:', error));
    };

    // Agrega el evento change a cada elemento de entrada
    inputs.forEach(function(input) {
        input.addEventListener('change', handleFilterChange);
    });

});

</script>

</html>