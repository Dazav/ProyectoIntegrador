<?php
include "../db/conecta.php";
header('Content-Type: application/json');
$email = $_POST['email-login'];
$password = $_POST['password-login'];

$conexion = getConexion();

$sql = "SELECT * FROM usuario WHERE email = '$email' AND pssword = '$password'";

$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {
    $id_usuario = $fila['id'];
    echo json_encode(['success' => true, 'mensaje' => "Inicio de sesión exitoso.", 'redirect' => 'index.php']);
    
  }
}else{
    echo json_encode(['success' => false, 'mensaje' => "Error en el inicio de sesión."]);
}