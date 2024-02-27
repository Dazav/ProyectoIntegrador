<?php
include "../db/conecta.php";
// session
// session_start();
// 

header('Content-Type: application/json');

ini_set('display_errors', 1);
error_reporting(E_ALL);
$email = $_POST['email-login'];
$password = $_POST['password-login'];

$conexion = getConexion();
// Consulta el usuario por su email
$sql = "SELECT * FROM usuario WHERE email = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$resultado = $stmt->get_result();
if ($resultado->num_rows > 0) {
  // Recorrer cada fila del resultado
  while ($fila = $resultado->fetch_assoc()) {
    $hashed_password = $fila['pssword'];
    $id_user = $fila['id'];
  }

  // Verifica si la contraseña proporcionada coincide con el hash almacenado
  if (password_verify($password, $hashed_password)) {
    // Si coincide, establece la sesión y redirige
    session_start();
    $_SESSION["id"] = $id_user;
    echo json_encode(['success' => true, 'mensaje' => "Inicio de sesión exitoso.", 'redirect' => 'index.php']);
  } else {
    // Si no coincide, muestra un mensaje de error
    echo json_encode(['success' => false, 'mensaje' => "El correo o la contraseña no son correctos"]);
  }
} else {
  // Si el usuario no existe, muestra un mensaje de error
  echo json_encode(['success' => false, 'mensaje' => "No se encuentra al usuario"]);
}
