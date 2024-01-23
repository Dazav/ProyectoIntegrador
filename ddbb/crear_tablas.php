<?php
    include "conecta.php";
    // FUNCION PARA CREAR LAS TABLAS
    function crearTablas($conexion){
        $tabla_usuario = "CREATE TABLE IF NOT EXISTS usuario(
            id int auto_increment primary key,
            nombre varchar(255),
            pssword varchar(255),
            email varchar(255),
            nombreUser varchar(255),
            imagen varchar(255)
        );";

        mysqli_query($conexion, $tabla_usuario) or die("Error en tabla usuario");

        $tabla_terapeuta = "CREATE TABLE IF NOT EXISTS terapeuta(
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(200),
            apellidos VARCHAR(200),
            n_identificacion INT(6),
            especializacion VARCHAR(200),
            nacionalidad VARCHAR(100),
            idiomas VARCHAR(200)
        );";

        mysqli_query($conexion, $tabla_terapeuta) or die("Error en tabla terapeuta");

        $tabla_foro = "CREATE TABLE IF NOT EXISTS foro(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            titular VARCHAR(250),
            descripcion VARCHAR(250),
            img VARCHAR(100),
            fecha_creacion DATE DEFAULT CURRENT_TIMESTAMP,
            fecha_modificacion DATE DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        );";

        mysqli_query($conexion, $tabla_foro) or die("Error en tabla usuario");

        $tabla_respuestas = "CREATE TABLE IF NOT EXISTS respuestas(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            respuesta VARCHAR(250),
            fecha DATE DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        );";

        mysqli_query($conexion, $tabla_respuestas) or die("Error en tabla usuario");

        $tabla_opiniones = "CREATE TABLE IF NOT EXISTS opiniones(
            id int AUTO_INCREMENT primary key,
            id_autor INT,
            titulo varchar(255),
            descripcion varchar(255),
            foreign key (id_autor) references usuario(id)
        );";

        mysqli_query($conexion, $tabla_opiniones) or die("Error en tabla usuario");

        $tabla_contacto = "CREATE TABLE IF NOT EXISTS contacto(
            id INT PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(100),
            email VARCHAR(200),
            asunto VARCHAR(100),
            descripcion VARCHAR(200)
        );";

        mysqli_query($conexion, $tabla_contacto) or die("Error en tabla usuario");

        $tabla_recursos = "CREATE TABLE IF NOT EXISTS recursos(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            titular VARCHAR(250),
            descripcion VARCHAR(250),
            img VARCHAR(100),
            fecha_creacion DATE DEFAULT CURRENT_TIMESTAMP,
            fecha_modificacion DATE DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        )";

        mysqli_query($conexion, $tabla_recursos) or die("Error en tabla usuario");

        $tabla_gruposApoyo = "CREATE TABLE IF NOT EXISTS GruposApoyo(
            id INT AUTO_INCREMENT PRIMARY KEY,
            organizador INT,
            idioma VARCHAR(250),
            tema VARCHAR(250),
            fecha DATETIME,
            FOREIGN KEY (organizador) REFERENCES usuario(id)
        );";

        mysqli_query($conexion, $tabla_gruposApoyo) or die("Error en tabla usuario");

    }


    // Conexio sin tener la base de datos
    $conexion = getConexionsindb();
    // Miramos is existe la base de datos
    $result = mysqli_query($conexion, "SHOW DATABASES LIKE 'brainhub'");
    // Si no existe, la creamos y creamos las tablas
    if (!$result->num_rows > 0){
        $db = "CREATE DATABASE brainhub";
        mysqli_query($conexion, $db)or die("Error al crear la database");
        mysqli_select_db($conexion, "brainhub");
        crearTablas($conexion);
        
    }else{
        // Si ya existe, pasamos tambien el crear tablas por si acaso ya existiese pero sin contenido
        mysqli_select_db($conexion, "brainhub");
        crearTablas($conexion);
    }