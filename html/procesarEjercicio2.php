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

    try {
        foreach ($inputs as $respuesta) {
            $insert = "INSERT INTO respuestaEjercicio (id_usuario, id_pregunta, respuesta) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conexion, $insert);
            mysqli_stmt_bind_param($stmt, "iis", $id, $index, $respuesta);
            if (mysqli_stmt_execute($stmt)) {
                // No establezca $response aquí ya que se sobrescribirá en el bucle
            } else {
                // Si hay un error, lanzar una excepción para manejarlo
                throw new Exception('Error en la inserción de datos.');
            }
            $index++;
        }
        // Si todas las inserciones son exitosas, actualizar $response
        $response = array('status' => 'success', 'message' => 'Datos insertados con éxito.');

        // Confirmar la transacción
        mysqli_commit($conexion);
    } catch (Exception $e) {
        // Si hay una excepción, cancelar la transacción
        mysqli_rollback($conexion);

        // Actualizar $response con el mensaje de error
        $response = array('status' => 'error', 'message' => $e->getMessage());
    }
} else {
    $response = array('status' => 'error', 'message' => 'Datos POST requeridos no están presentes.');
}

// Establecer el tipo de contenido y codificar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
