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
            descripcion TEXT,
            img VARCHAR(100),
            fecha_creacion DATE DEFAULT CURRENT_TIMESTAMP,
            fecha_modificacion DATE DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        );";

        mysqli_query($conexion, $tabla_foro) or die("Error en tabla usuario");

        $tabla_respuestas = "CREATE TABLE IF NOT EXISTS respuestas(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            id_foro INT,
            respuesta VARCHAR(250),
            fecha DATE DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_usuario) REFERENCES usuario(id),
            FOREIGN KEY (id_foro) REFERENCES foro(id)
        );";

        mysqli_query($conexion, $tabla_respuestas) or die("Error en tabla usuario");

        $tabla_opiniones = "CREATE TABLE IF NOT EXISTS opiniones(
            id int AUTO_INCREMENT primary key,
            id_autor INT,
            titulo varchar(255),
            descripcion varchar(255),
            estrellas INT(1),
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

        // INSERTAR DATOS

         $select = "SELECT * FROM usuario";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO usuario (nombre, pssword, email, nombreUser, imagen) VALUES
             ('Ismael Moreno', '1234', 'ismaelmormor@gmail.com', 'ismaelmormor', 'ismaelmormor.png'),
             ('Gabriel Rodríguez', '3343', 'gabir@gmail.com', 'gabigol', 'gabigol.png'),
             ('Ibai Llanos', 'llan0s', 'ibaillanos@gmail.com', 'ibaillanos', 'ibaillanos.png'),
             ('Wei Xu', 'we1', 'weixu@gmail.com', 'xuwei', 'xuwei.png'),
             ('Santiago Daza', 'd4z4', 'santiagodaza@gmail.com', 'santiagodaza', 'santiagodaza.png')";
             mysqli_query($conexion, $insert1) or die("Error insert usuario");
         }

         $select = "SELECT * FROM terapeuta";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO terapeuta (nombre, apellidos, n_identificacion, especializacion, nacionalidad, idiomas) VALUES
             ('María', 'Paveda Martínez', '247334', 'Fobia Social', 'Española', 'Español, English'),
             ('Nikolas', 'Müller Weber', '099834', 'Mutismo Selectivo', 'Alemana', 'Español, Deutsch'),
             ('John', 'Krsinski', '541634', 'Trastorno del Pánico', 'Estadounidense', 'English, Русский'),
             ('Mario', 'Vaquerizo Ruiz', '707234', 'Ansiedad', 'Española', 'Español, English'),
             ('Asan', 'Diop', '000634', 'Fobia Social', 'Francesa', 'Français, English')
             ";
             mysqli_query($conexion, $insert1) or die("Error insert terapeuta");
         }

         $select = "SELECT * FROM foro";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO foro (id_usuario, titular, descripcion, img) VALUES
             (1,
              '¿Cómo podemos saber cuando tendremos un ataque de pánico?', 'Buenas, me llamo Ismael y me gustaría saber cuando podría darme un ataque de pánico. Desafortunadamente sufro de Trastorno del Pánico y eso me provoca que en ocasiones me quede parado en un lugar público.',
              'panico.jpg'),
              (2,
              '¿Alguien sabe si la terapia con masajes ayuda al mutismo?', 'He escuchado entre gente conocida que han ido a un fisio que les daba masajes en la zona del cuello y el pecho. Después de los masajes, se les curaba el mutismo!',
              'masajes.jpg'),
              (3,
              '¿Merece la pena pagar BrainHub?', 'Eché un ojo a las ventajas, pero como no podemos ver los artículos de premium, ¿merece la pena?',
              'premium.jpg'),
              (4,
              '¿Cómo se usan los ejercicios de apoyo?', 'He estado intentando hacer ejercicios interactivos, pero parece que no llego a acceder al contenido. Alguien me ayuda?',
              'ayuda_ej_apoyo.jpg'),
              (5,
              '¿Por qué los gobiernos no dan ayudas?', 'Alguien sabe si dan alguna ayuda? Es que mirando por internet no encontré nada.',
              'ayudas_gobiernos.jpg')
             ";
             mysqli_query($conexion, $insert1) or die("Error insert foro");
         }

         $select = "SELECT * FROM respuestas";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO respuestas (id_usuario, id_foro, respuesta) VALUES
             (1, 5, 'Yo encontré ayudas del ayuntamiento de madrid.'),
             (2, 5, 'En Castilla la Mancha te subvencionan un terapeuta.'),
             (3, 5, 'En otros países lo dan, aquí en España yo tampoco encontré nada'),
             (4, 2, 'No soy ningún especialista, pero me parece practicamente imposible que eso funcione.'),
             (5, 1, 'Yo encontré un patrón cuando me daban ataques, y aprendí a controlarlo con ejercicios de relajación.')
             ";
             mysqli_query($conexion, $insert1) or die("Error insert respuestas");
         }

         $select = "SELECT * FROM opiniones";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO opiniones (id_autor, titulo, descripcion, estrellas) VALUES
             (1, 'El mejor servicio', 'Me encantó el servicio de todos los terapeutas.', 5),
             (2, 'No sirve el premium', 'No hay mucho más contenido aparte del gratuito, por lo que se queda corto el premium. Aún así le doy 4 estrellas', 4),
             (3, 'Best Web', 'I have never seen anything like this. Excellent.', 5),
             (4, 'Je n ai pas aimé les articles', 'Peu profond et pas très utile', 2),
             (5, 'Se lo regalé a mi primito', 'Me encanta que se puedan regalar sesiones. Ayudó mucho a mi primo de 6 años con mutismo.', 4)
             ";
             mysqli_query($conexion, $insert1) or die("Error insert opiniones");
         }

         $select = "SELECT * FROM recursos";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO recursos (id_usuario, titular, descripcion, img) VALUES
             (2, 'Cómo relajarse', '1. Inspirar \n 2. Expirar \n 3. Meditamos en silencio', 'relajacion.jpg'),
             (3, 'Cómo detectar un ataque', 'Si vemos que la persona empieza a sudar y tiritar, podríamos estar ante un ataque de pánico', 'sudores.jpg'),
             (4, 'Cómo ayudar a enfermos', 'Lo mejor sería llamar a un médico especializado, pero si no podemos, tumbamos al paciente de lado, y le abrazamos para que se calme.', 'tumbar.jpg'),
             (2, 'Cuándo actuar', 'Sobre todo ante ataques de pánico hay que ayudar a la persona a relajarse. Pueden ser ejercicios de respiración, o simplemente un abrazo o algo suave para que se relaje.', 'panico.jpg'),
             (1, 'Tabla de síntomas', 'Tabla de síntomas', 'tabla.jpg')";
             mysqli_query($conexion, $insert1) or die("Error insert recursos");
         }

         $select = "SELECT * FROM GruposApoyo";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO GruposApoyo (organizador, idioma, tema, fecha) VALUES
             (2, 'Español', 'Ansiedad general', '2024-01-23'),
             (3, 'Fraçais', 'Trastorno del pánico', '2024-01-24'),
             (4, 'English', 'Mutismo Selectivo', '2024-01-27'),
             (2, 'Deutsch', 'Cómo ayudamos a los familiares', '2024-01-30'),
             (1, 'Español', 'Ayuda en el uso de la web', '2024-01-23')";
             mysqli_query($conexion, $insert1) or die("Error insert recursos");
         }

         $select = "SELECT * FROM contacto";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO contacto (nombre, email, asunto, descripcion) VALUES
             ('Ismael Moreno', 'ismaelmormor@gmail.com', 'Ansiedad general', '2024-01-23'),";
             mysqli_query($conexion, $insert1) or die("Error insert recursos");
         }


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
        //crearTablas($conexion);
    }