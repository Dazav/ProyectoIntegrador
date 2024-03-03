<?php
include "../db/crear_tablas.php";
session_start();

    
//conseguir id ejercicio y numero de pregunta desde ajax
// if (isset($_POST["aInput"]) && isset($_SESSION["id"])) {
    mysqli_begin_transaction($conexion);
    $json = $_POST["jsonInputs"];//conseguir array de input value
    $inputs=json_decode($json,true);
    $id=$_SESSION["id"];
    $index=1;
    // foreach ($array as $respuesta) {
    //     $stmt = mysqli_prepare($conexion, "INSERT INTO respuestaEjercicio (id_usuario, id_pregunta, respuesta) VALUES (?, ?, ?)");
    //     mysqli_stmt_bind_param($stmt, "iis", $id, $index, $respuesta);
    //     mysqli_stmt_execute($stmt);
    //     mysqli_stmt_close($stmt);
    //     $index++;
    // }
// }

// header('Content-Type: application/json');
// echo json_encode($data);
?>