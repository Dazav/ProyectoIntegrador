<?php
include "../db/conecta.php"; // Incluye el archivo de conexión a la base de datos
header('Content-Type: application/json');

$user = $_POST['user-register']; // Obtiene el nombre de usuario desde el formulario
$email = $_POST['email-register']; // Obtiene el correo electrónico desde el formulario
$password = $_POST['password-register']; // Obtiene la contraseña desde el formulario
// Hash de la contraseña
$password = password_hash($password, PASSWORD_DEFAULT); // Hashea la contraseña usando el algoritmo por defecto
$conexion = getConexion(); // Obtiene la conexión a la base de datos

// Consulta SQL para verificar si el nombre de usuario ya está en uso
$sql = "SELECT * FROM usuario WHERE nombreUser = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo json_encode(['success' => false, 'mensaje' => "Este nombre de usuario ya está en uso. Prueba con otro"]);
} else {
    // Consulta SQL para verificar si el correo electrónico ya está registrado
    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo json_encode(['success' => false, 'mensaje' => "Este correo ya está registrado. Prueba a iniciar sesión"]);
    } else {
        // Consulta SQL para insertar el nuevo usuario con contraseña hasheada
        $sql = "INSERT INTO usuario (nombreUser, email, pssword) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $user, $email, $password);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'mensaje' => "Se ha registrado exitosamente. Inicie sesión."]);
        } else {
            echo json_encode(['success' => false, 'mensaje' => "Error al registrar tu cuenta. Por favor, inténtalo de nuevo más tarde."]);
        }
    }
}
?>
