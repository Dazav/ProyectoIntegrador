<?php
include "../db/crear_tablas.php";
session_start();
$id=$_SESSION['id'];
//obtener datos enviados
//manejo img
if (isset($_FILES['addImg'])) {
    # code...
    $img=$_FILES['addImg']['name'];
    $tmp=$_FILES['addImg']['tmp_name'];
    $dir_subido='../img/';
    $ruta=$dir_subido . $img;
    move_uploaded_file($tmp,$ruta);
    $ruta_escape=mysqli_escape_string($conexion,$ruta);
}
// $img=mysqli_real_escape_string($conexion,$ruta);
//maneja titulo y contenido
if (isset($_POST['addTitulo'])) {
    $titulo=mysqli_real_escape_string($conexion, $_POST['addTitulo']);
}
if (isset($_POST['addContenido'])) {
    $contenido=mysqli_real_escape_string($conexion,$_POST['addContenido']);
}
//prepare para facil analizar y complicar consulta,"?" significa marcador de posición
$stmt = $conexion->prepare("INSERT INTO foro(id_usuario, titular, descripcion, img) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $id, $titulo, $contenido, $ruta_escape);//vincular parámetros a mercadores de posición
//método excute es para insertar los datos 
if ($stmt->execute()) {
    # code...
    $respone = array('status'=>'success','mensaje'=>'Datos insertado con éxitos');
}else {
    # code...
    $respone=array('status'=>'error','mensaje'=>'error al insertado datos'.mysqli_error($conexion));
}

//enviar la respuesta como json
header('Content-Type: application/json');
echo json_encode($respone);
?>