<?php
include "../db/crear_tablas.php";
session_start();
if (isset($_SESSION["id"])) {
    # code...
    $id=$_SESSION["id"];
}

//enviar la respuesta como json
header('Content-Type: application/json');

if (isset($_POST['numStar']) && $_POST['desc'] && $_POST['titulo']) {
    // conseguir los datos
    $titulo=$_POST['titulo'];
    $desc=$_POST['desc'];
    $numStar=$_POST['numStar'];
}
// inserta los datos
$insert="INSERT INTO opiniones(id_autor,titulo,descripcion,estrellas) VALUES (?,?,?,?)";
$stmt=mysqli_prepare($conexion,$insert);
$stmt->bind_param("issi",$id,$titulo,$desc,$numStar);
// verificar si está insertado
if ($stmt->execute()) {
    $response= array('status' =>'succes', 'messaje' =>'Datos insertado con éxitos');
    echo json_encode($response);
} else {
    $response= array('status' =>'error', 'messaje' =>'Error '.mysqli_error($conexion));
    echo json_encode($response);
}
?>