<?php

function getConexion(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "brainhub";

    // Crear conexión
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Error de conexión");

    return $conexion;
}
function getConexionsindb(){
    $servername = "localhost";
    $username = "root";
    $password = "root";

    // Crear conexión
    $conexion = mysqli_connect($servername, $username, $password) or die("Error de conexión");

    return $conexion;
}

