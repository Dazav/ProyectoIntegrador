<?php
include "../db/conecta.php";
session_start();
if (isset($_SESSION["id"])) {
    $id=$_SESSION["id"];
}else{
    header('Location: registrar.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = getConexion();

    // Preparar la consulta SQL para actualizar la base de datos
    $stmt = $conexion->prepare("UPDATE usuario SET premium = 1 WHERE id=?"); // Completa la consulta
    $stmt->bind_param("i", $id); // Vincular parámetros

    // Intentar ejecutar la consulta
    if ($stmt->execute()) {
        // Si la actualización es exitosa, redireccionar a perfil.php
        header("Location: perfil.php");
        exit;
    } else {
        // Si falla, manejar el error (p.ej., mostrar un mensaje de error)
        echo "Error al procesar el pago.";
    }
}else{
    header("Location: index.php");
}