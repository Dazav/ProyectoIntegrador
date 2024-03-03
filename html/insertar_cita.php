<?php
include "../db/conecta.php";

header('Content-Type: application/json');

session_start(); // Asegúrate de que la sesión esté iniciada

if (isset($_POST['fechaHora'], $_POST['idTerapeuta'], $_POST['idUsuario'])) {
    $fechaHora = $_POST['fechaHora'];
    $idTerapeuta = $_POST['idTerapeuta'];
    $idUsuario = $_POST['idUsuario'];

    $conexion = getConexion();
    // Usa declaraciones preparadas para proteger contra inyecciones SQL
    $stmt = $conexion->prepare("INSERT INTO cita (id_terapeuta, id_usuario, fecha_cita) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $idTerapeuta, $idUsuario, $fechaHora);
    // Ejecutar la sentencia
    if ($stmt->execute()) {
        // Si la inserción es exitosa, enviar una respuesta JSON
        echo json_encode(['success' => true, 'mensaje' => 'Reserva insertada correctamente']);
    } else {
        // Si hay un error, enviar una respuesta JSON
        echo json_encode(['success' => false, 'mensaje' => 'Error al insertar: ' . $conexion->error]);
    }
    $stmt->close();
} else {
    // Enviar una respuesta JSON si faltan datos
    echo json_encode(['success' => false, 'mensaje' => 'Datos incompletos']);
}

