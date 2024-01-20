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

        $tabla_respuestas = "CREATE TABLE respuestas(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            respuesta VARCHAR(250),
            fecha DATE DEFAULT(CURDATE),
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        );";

        $tabla_opiniones = "CREATE TABLE OPINIONES(
            id int auto_increment primary key,
            titulo varchar(255),
            descripcion varchar(255),
            foreign key (id_autor) references usuario(id)
        );";

        $tabla_contacto = "CREATE TABLE CONTACTO(
            id INT PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(100),
            email VARCHAR(200),
            asunto VARCHAR(100),
            descripcion VARCHAR(200)
        );";

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
    }