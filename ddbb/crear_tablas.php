<?php
    include "conecta.php";
    // FUNCION PARA CREAR LAS TABLAS
    function crearTablas($conexion){
        $tabla_usuario = "CREATE TABLE USUARIOS(
            id int auto_increment primary key,
            nombre varchar(255),
            password varchar(255),
            email varchar(255),
            nombreUser varchar(255),
            imagen varchar(255)
        );";

        mysqli_query($conexion, $tabla_usuario) or die("Error en tabla usuario");

        $tabla_terapeuta = "CREATE TABLE terapeuta(
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(200),
            apellidos VARCHAR(200),
            n_identificacion INT(6),
            especializacion VARCHAR(200),
            nacionalidad VARCHAR(100),
            idiomas VARCHAR(200)
        );";

        mysqli_query($conexion, $tabla_terapeuta) or die("Error en tabla terapeuta");

        $tabla_foro = "CREATE TABLE FORO(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            titular VARCHAR(250),
            descripcion VARCHAR(250),
            img VARCHAR(100),
            fecha_creacion DATE DEFAULT(CURDATE),
            fecha_modificacion DATE DEFAULT(CURDATE),
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        );";

        mysqli_query($conexion, $tabla_foro) or die("Error en tabla usuario");

        $tabla_respuestas = "CREATE TABLE respuestas(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            respuesta VARCHAR(250),
            fecha DATE DEFAULT(CURDATE),
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        );";

        mysqli_query($conexion, $tabla_respuestas) or die("Error en tabla usuario");

        $tabla_opiniones = "CREATE TABLE OPINIONES(
            id int auto_increment primary key,
            titulo varchar(255),
            descripcion varchar(255),
            foreign key (id_autor) references usuario(id)
        );";

        mysqli_query($conexion, $tabla_opiniones) or die("Error en tabla usuario");

        $tabla_contacto = "CREATE TABLE CONTACTO(
            id INT PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(100),
            email VARCHAR(200),
            asunto VARCHAR(100),
            descripcion VARCHAR(200)
        );";

        mysqli_query($conexion, $tabla_contacto) or die("Error en tabla usuario");

        $tabla_recursos = "CREATE TABLE recursos(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            titular VARCHAR(250),
            descripcion VARCHAR(250),
            img VARCHAR(100),
            fecha_creacion DATE DEFAULT(CURDATE),
            fecha_modificacion DATE DEFAULT(CURDATE),
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        )";

        mysqli_query($conexion, $tabla_recursos) or die("Error en tabla usuario");

        $tabla_gruposApoyo = "CREATE TABLE GruposApoyo(
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
    $result = mysqli_query($conexion, "SHOW DATABASES LIKE 'ambulatorio'");
    // Si no existe, la creamos y creamos las tablas
    if (!$result->num_rows > 0){
        $db = "CREATE DATABASE ambulatorio";
        mysqli_query($conexion, $db)or die("Error al crear la database");
        mysqli_select_db($conexion, "ambulatorio");
        crearTablas($conexion);
        
    }else{
        // Si ya existe, pasamos tambien el crear tablas por si acaso ya existiese pero sin contenido
        mysqli_select_db($conexion, "ambulatorio");
        crearTablas($conexion);
    }