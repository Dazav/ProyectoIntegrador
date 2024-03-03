<?php
include "../db/crear_tablas.php";
session_start();

// mysqli_begin_transaction($conexion);

//conseguir id ejercicio y numero de pregunta desde ajax
if (isset($_POST["jsonInput"]) && isset($_SESSION["id"])) {

    $json = $_POST["jsonInputs"];//conseguir array de input value
    $inputs=json_decode($json,true);
    $id=$_SESSION["id"];
    $index=1;
    foreach ($inputs as $respuesta) {
        $insert="INSERT INTO respuestaEjercicio (id_usuario, id_pregunta, respuesta) VALUES (?, ?, ?)";
        $stmt=mysqli_prepare($conexion,$insert);
        $stmt->bind_param("iis",$id,$index,$respuesta);
        if ($stmt->execute()) {
            $response= array('status' =>'succes', 'messaje' =>'Datos insertado con éxitos');
            echo json_encode($response['messaje']);
        } else {
            $response= array('status' =>'error', 'messaje' =>'Error '.mysqli_error($conexion));
            echo json_encode($response);
        }
        $index++;
    }
} else {
    echo "Error";
}

// header('Content-Type: application/json');
// echo json_encode($data);
?>