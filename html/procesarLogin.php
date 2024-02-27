<?php
include "../db/conecta.php";
// session
session_start();
// 

header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);
// $email = $_POST['email-login'];
// $password = $_POST['password-login'];

$email = 'lokojo@gmail.com ';
$password = '12345678';
$conexion = getConexion();

// Consulta el usuario por su email
$sql = "SELECT id, pssword FROM usuario WHERE email = '$email'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
  $fila = $resultado->fetch_assoc();
  $hashed_password = $fila['pssword'];
  
  // Verifica si la contraseña proporcionada coincide con el hash almacenado
  if (password_verify($password, $hashed_password)) {
    // Si coincide, establece la sesión y redirige
    $_SESSION["id"] = $fila['id'];
    echo json_encode(['success' => true, 'mensaje' => "Inicio de sesión exitoso.", 'redirect' => 'index.php']);
  } else {
    // Si no coincide, muestra un mensaje de error
    echo json_encode(['success' => false, 'mensaje' => "Error en el inicio de sesión."]);
  }
} else {
  // Si el usuario no existe, muestra un mensaje de error
  echo json_encode(['success' => false, 'mensaje' => "Error en el inicio de sesión."]);
}
?>