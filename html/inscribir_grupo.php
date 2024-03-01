<?php
include "../db/conecta.php";
$conexion = getConexion();
session_start();

// Verificar si el usuario está logueado y si se ha enviado la ID del grupo
if (isset($_SESSION['id']) && isset($_POST['id_grupo'])) {
    $id_usuario = $_SESSION['id'];
    $id_grupo = $_POST['id_grupo'];

    // Verificar si el usuario ya está inscrito en el grupo
    $stmt_verificar = $conexion->prepare("SELECT * FROM inscripcion_grupo WHERE id_usuario = ? AND id_grupo = ?");
    $stmt_verificar->bind_param("ii", $id_usuario, $id_grupo);
    $stmt_verificar->execute();
    $resultado_verificar = $stmt_verificar->get_result();

    if ($resultado_verificar->num_rows > 0) {
        // El usuario ya está inscrito en el grupo
        $response = array('status' => 'error', 'mensaje' => 'Ya estás inscrito en este grupo');
    } else {
        // El usuario no está inscrito, proceder con la inscripción
        $stmt = $conexion->prepare("INSERT INTO inscripcion_grupo (id_usuario, id_grupo) VALUES (?, ?)");
        $stmt->bind_param("ii", $id_usuario, $id_grupo);

        if ($stmt->execute()) {
            $response = array('status' => 'success', 'mensaje' => 'Inscripción exitosa');
        } else {
            $response = array('status' => 'error', 'mensaje' => 'Error al inscribirse en el grupo');
        }
        $stmt->close();
    }
    $stmt_verificar->close();
} else {
    $response = array('status' => 'error', 'mensaje' => 'No estás logueado o falta información');
}

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>