
<?php
include "../db/crear_tablas.php"; // Asumiendo que este archivo establece la conexión a la base de datos

// Recoger los datos de los filtros
$especialidad = $_POST['especialidad'] ?? null;
$nacionalidades = $_POST['nacionalidades'] ?? [];
$idiomas = $_POST['idiomas'] ?? [];

// Comenzar a construir la consulta SQL
$sql = "SELECT * FROM terapeuta WHERE 1"; // '1' es siempre verdadero, sirve como punto de inicio para los filtros
$params = []; // Aquí se almacenarán los parámetros para la sentencia preparada
$types = ''; // Aquí se almacenarán los tipos de parámetros para la sentencia preparada

// Añadir filtro de especialidad si fue enviado
if ($especialidad) {
    $sql .= " AND especializacion = ?";
    $params[] = $especialidad;
    $types .= 's'; // 's' indica que el parámetro es una cadena (string)
}

// Añadir filtro de nacionalidad si hay alguna seleccionada
if (!empty($nacionalidades)) {
    $inQuery = implode(',', array_fill(0, count($nacionalidades), '?'));
    $sql .= " AND nacionalidad IN ($inQuery)";
    $params = array_merge($params, $nacionalidades);
    $types .= str_repeat('s', count($nacionalidades)); // Añadir un 's' por cada nacionalidad
}

// Añadir filtro de idioma si hay alguno seleccionado
if (!empty($idiomas)) {
    $idiomaConditions = [];
    foreach ($idiomas as $idioma) {
        $idiomaConditions[] = "idiomas LIKE ?";
        $params[] = "%$idioma%";
        $types .= 's'; // Añadir un 's' por cada idioma
    }
    $sql .= " AND (" . implode(' OR ', $idiomaConditions) . ")";
}

if (!empty($params)) {
    // Preparar la sentencia solo si hay parámetros
    $stmt = $conexion->prepare($sql);

    // Solo llamar a bind_param si hay tipos definidos
    if ($types) {
        $stmt->bind_param($types, ...$params);
    }

    // Ejecutar la sentencia
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Si no hay parámetros, no necesitas una sentencia preparada
    $result = $conexion->query($sql);
}

if ($result->num_rows > 0) {
    while ($terapeuta = $result->fetch_assoc()) {
        $sql = "SELECT fecha_disponible FROM cita WHERE id_terapeuta = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $terapeuta['id']);
        $stmt->execute();
        $resultado = $stmt->get_result();
        // Verificar si la consulta tuvo éxito
        if ($resultado) {
            // Recuperar los resultados en un array
            $arrayResultados = [];
            while ($fila = $resultado->fetch_assoc()) {
                $arrayResultados[] = $fila['fecha_disponible'];
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
} else {
    echo '<p>No se encontraron terapeutas con los criterios especificados.</p>';
}

// Cerrar la sentencia y la conexión si ya no se necesitan
$stmt->close();
$conexion->close();
?>
