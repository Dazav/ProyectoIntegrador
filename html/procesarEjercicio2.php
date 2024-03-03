<?php
include "../db/crear_tablas.php";
session_start();

// Inicializa la variable de respuesta
$response = array('status' => 'error', 'message' => 'Error desconocido.');

// mysqli_begin_transaction($conexion);

// Conseguir id ejercicio y número de pregunta desde ajax
if (isset($_POST["jsonInputs"]) && isset($_SESSION["id"])) {
    // $json 
    $inputs  = $_POST["jsonInputs"]; // Conseguir array de input value
    
    // = json_decode($json, true);
    $id = $_SESSION["id"];
    $index = 1;

    // Inicializa la transacción
    mysqli_begin_transaction($conexion);

        foreach ($inputs as $respuesta) {
            $query = "SELECT COUNT(*) FROM respuestaEjercicio WHERE id_usuario = ? AND id_pregunta = ?";
            $stmt = mysqli_prepare($conexion, $query);
            mysqli_stmt_bind_param($stmt, "ii", $id, $index);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $count);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
            if ($count > 0) {//si existe respuestas mismas ,no inserta

            } else {
                 //si no existe inserta
                $insert = "INSERT INTO respuestaEjercicio (id_usuario, id_pregunta, respuesta) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conexion, $insert);
                mysqli_stmt_bind_param($stmt, "iis", $id, $index, $respuesta);
                if (mysqli_stmt_execute($stmt)) {
                    $response = array('status' => 'success', 'message' => 'Datos insertados con éxito.');
                } else {
                    $response = array('status' => 'error', 'message' => 'Error al insertar datos.');
                }
                mysqli_stmt_close($stmt);

                $index++;
            }
        }
        // Si todas las inserciones son exitosas, actualizar $response
        $response = array('status' => 'success', 'message' => 'Datos insertados con éxito.');

        // Confirmar la transacción
        mysqli_commit($conexion);
} else {
    $response = array('status' => 'error', 'message' => 'Datos POST requeridos no están presentes.');
}

// Establecer el tipo de contenido y codificar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
