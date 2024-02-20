<?php
include "../db/conecta.php";
header('Content-Type: application/json');

$user = $_POST['user-register'];
$email = $_POST['email-register'];
$password = $_POST['password-register'];

$conexion = getConexion();
$sql = "SELECT * FROM usuario WHERE nombreUser = '$user'";

$resultado = $conexion->query($sql);
if (($resultado->num_rows > 0)){
    echo json_encode(['success' => false, 'mensaje' => "Este nombre de usuario ya está en uso. Prueba con otro"]);
}else{
  $sql = "SELECT * FROM usuario WHERE email = '$email'";
  $resultado = $conexion->query($sql);

  if (($resultado->num_rows > 0)){
    echo json_encode(['success' => false, 'mensaje' => "Este correo ya está registrado. Prueba a iniciar sesión"]);
  }else{
    $sql = "INSERT INTO usuario (nombreUser, email, pssword) VALUES ('$user', '$email', '$password')";
    if (mysqli_query($conexion, $sql)) {
        echo json_encode(['success' => true, 'mensaje' => "Se ha registrado exitosamente. Inicie sesión."]);
    } else {
        echo json_encode(['success' => false, 'mensaje' => "Error al registrar tu cuenta. Por favor, inténtalo de nuevo más tarde."]);
    }
  }
}