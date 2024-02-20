<?php
include "../db/conecta.php";

header('Content-Type: application/json');

// Asegúrate de sanitizar y validar los datos de entrada
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$conexion = getConexion();
// Usa declaraciones preparadas para proteger contra inyecciones SQL
$stmt = $conexion->prepare("INSERT INTO contacto (nombre, email, asunto, descripcion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $email, $asunto, $mensaje);
if ($stmt->execute()) {
    echo json_encode(['mensaje' => "Hemos recibido tu respuesta, contactaremos lo antes posible."]);
} else {
    echo json_encode(['mensaje' => "Ha habido un problema al enviar tu respuesta. Inténtalo más tarde."]);
}
$stmt->close();
