<?php
include "conecta.php";

// Asegúrate de iniciar la sesión si aún no está iniciada
session_start();

// Verificar si el usuario está logueado
if(isset($_SESSION['id_usuario']) && isset($_POST['id_grupo'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $id_grupo = $_POST['id_grupo'];

    // Preparar y ejecutar la consulta para inscribir al usuario al grupo
    $stmt = $conexion->prepare("INSERT INTO inscripcion_grupo (id_usuario, id_grupo) VALUES (?, ?)");
    $stmt->bind_param("ii", $id_usuario, $id_grupo);
    if ($stmt->execute()) {
        echo "Inscrito con éxito al grupo.";
    } else {
        echo "Error al inscribirse al grupo.";
    }
    $stmt->close();
} else {
    echo "Usuario no logueado o datos faltantes.";
}
?>