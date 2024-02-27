<?php
    include "conecta.php";
    // FUNCION PARA CREAR LAS TABLAS
    function crearTablas($conexion){
        $tabla_usuario = "CREATE TABLE IF NOT EXISTS usuario(
            id int auto_increment primary key,
            nombre varchar(20),
            apellidos varchar(50),
            pssword varchar(20),
            email varchar(50),
            nombreUser varchar(20),
            imagen varchar(50),
            premium int(1) DEFAULT 0
        );";

        mysqli_query($conexion, $tabla_usuario) or die("Error en tabla usuario");

        $tabla_terapeuta = "CREATE TABLE IF NOT EXISTS terapeuta(
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(20),
            apellidos VARCHAR(50),
            n_identificacion INT(6),
            especializacion VARCHAR(50),
            nacionalidad VARCHAR(20),
            idiomas VARCHAR(50),
            sexo VARCHAR(50),
            img_perfil VARCHAR(100),
            img_nac VARCHAR(100),
            disponibilidad TEXT
        );";

        mysqli_query($conexion, $tabla_terapeuta) or die("Error en tabla terapeuta");

        $tabla_cita="CREATE TABLE IF NOT EXISTS cita(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_terapeuta INT,
            id_usuario INT,
            fecha_disponible datetime,
            FOREIGN KEY (id_terapeuta) REFERENCES terapeuta(id),
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)           
        );";
        mysqli_query($conexion,$tabla_cita) or die("error en la tabla cita");

        $tabla_foro = "CREATE TABLE IF NOT EXISTS foro(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            titular VARCHAR(250),
            descripcion TEXT,
            img VARCHAR(50),
            fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            fecha_modificacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        );";

        mysqli_query($conexion, $tabla_foro) or die("Error en tabla usuario");

        // tabla de pago
        $tabla_pago = "CREATE TABLE IF NOT EXISTS pago(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            metodo VARCHAR(50),
            num_tarjeta VARCHAR(19),
            fecha_valida DATE,
            cvv INT(3),
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        );";
        mysqli_query($conexion,$tabla_pago) or die("Error en tabla pago");

        $tabla_respuestas = "CREATE TABLE IF NOT EXISTS respuestas(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            id_foro INT,
            respuesta VARCHAR(250),
            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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
            nombre VARCHAR(20),
            email VARCHAR(50),
            asunto VARCHAR(80),
            descripcion VARCHAR(250)
        );";

        mysqli_query($conexion, $tabla_contacto) or die("Error en tabla usuario");

        $tabla_recursos = "CREATE TABLE IF NOT EXISTS recursos(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            titular VARCHAR(250),
            descripcion VARCHAR(250),
            img VARCHAR(50),
            fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            fecha_modificacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        )";

        mysqli_query($conexion, $tabla_recursos) or die("Error en tabla usuario");

        $tabla_gruposApoyo = "CREATE TABLE IF NOT EXISTS GruposApoyo(
            id INT AUTO_INCREMENT PRIMARY KEY,
            organizador INT,
            idioma VARCHAR(20),
            tema VARCHAR(100),
            fecha DATETIME,
            FOREIGN KEY (organizador) REFERENCES usuario(id)
        );";

        mysqli_query($conexion, $tabla_gruposApoyo) or die("Error en tabla usuario");

        // INSERTAR DATOS

         $select = "SELECT * FROM usuario";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO usuario (nombre, apellidos, pssword, email, nombreUser, imagen,premium) VALUES
             ('Ismael', 'Moreno', '1234', 'ismaelmormor@gmail.com', 'ismaelmormor', '../img/ismaelmormor.png',0),
             ('Gabriel', 'Rodríguez', '3343', 'gabir@gmail.com', 'gabigol', '../img/gabigol.png',1),
             ('Ibai', 'Llanos', 'llan0s', 'ibaillanos@gmail.com', 'ibaillanos', '../img/ibaillanos.png',1),
             ('Wei', 'Xu', 'we1', 'weixu@gmail.com', 'xuwei', '../img/xuwei.png',1),
             ('Santiago', 'Daza', 'd4z4', 'santiagodaza@gmail.com', 'santiagodaza', '../img/santiagodaza.png',0)";
             mysqli_query($conexion, $insert1) or die("Error insert usuario");
         }

         $select = "SELECT * FROM terapeuta";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO terapeuta (nombre, apellidos, n_identificacion, especializacion, nacionalidad, idiomas,sexo,img_perfil,img_nac, disponibilidad) VALUES
             ('María', 'Paveda Martínez', '247334', 'Fobia Social', 'Española', 'Español, English','mujer','../img/tera1.png','../img/es.png', '14:00,15:00,18:00,19:00,20:00'),
             ('Nikolas', 'Müller Weber', '099834', 'Mutismo Selectivo', 'Alemana', 'Español, Deutsch','hombre','../img/tera2.png','../img/ger.png', '12:00,13:00,17:00,19:00,20:00'),
             ('John', 'Krsinski', '541634', 'Trastorno del Pánico', 'Estadounidense', 'English, Русский','hombre','../img/tera3.png','../img/us.png', '00:00,12:00,19:00,22:00,23:00'),
             ('Xin', 'Zhao', '707234', 'Ansiedad', 'Chino', '中文, English,Español','hombre','../img/tera3.png','../img/cn.png', '14:00,15:00,18:00,19:00,20:00'),
             ('Asan', 'Diop', '000634', 'Fobia Social', 'Francesa', 'Français, English','mujer','../img/tera4.png','../img/fr.png', '14:00,15:00,18:00,19:00,20:00')
             ";
             mysqli_query($conexion, $insert1) or die("Error insert terapeuta");
         }
        //  inserta datos de cita
        $select="SELECT * FROM cita";
        $result=mysqli_query($conexion, $select);       
        if($result->num_rows==0){
            $insert1="INSERT INTO cita(id_terapeuta,id_usuario,fecha_disponible) VALUES
            (2,1,'2024-02-27 8:00'),
            (3,2,'2024-02-28 9:00'),
            (1,3,'2024-02-27 13:00'),
            (5,4,'2024-02-26 14:00'),
            (4,5,'2024-02-26 8:00')";
            mysqli_query($conexion, $insert1)  or die("Error insert pago");
        }
         //inserta datos
         $select="SELECT * FROM pago";
         $result=mysqli_query($conexion, $select);
         if ($result->num_rows== 0) {
            $insert1="INSERT INTO pago(id_usuario, metodo,num_tarjeta,fecha_valida,cvv) VALUES
            (1,'tarjeta credito','5790-2428-9091-4585','2026-03-04',123),
            (2,'tarjeta credito','5790-2428-9091-4585','2026-03-04',892),
            (3,'paypal','5340-2678-3821-4325','2024-11-12',229),
            (4,'tarjeta credito','5790-2428-9091-4585','2024-10-10',781),
            (5,'paypal','2320-2428-9091-4585','2040-06-07',123)";
            mysqli_query($conexion, $insert1)  or die("Error insert pago");
         }

         $select = "SELECT * FROM foro";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO foro (id_usuario, titular, descripcion, img) VALUES
             (1,
              '¿Cómo podemos saber cuando tendremos un ataque de pánico?', 'Buenas, me llamo Ismael y me gustaría saber cuando podría darme un ataque de pánico. Desafortunadamente sufro de Trastorno del Pánico y eso me provoca que en ocasiones me quede parado en un lugar público.',
              '../img/tema1.png'),
              (2,
              '¿Alguien sabe si la terapia con masajes ayuda al mutismo?', 'He escuchado entre gente conocida que han ido a un fisio que les daba masajes en la zona del cuello y el pecho. Después de los masajes, se les curaba el mutismo!',
              '../img/masajes.jpg'),
              (3,
              '¿Merece la pena pagar BrainHub?', 'Eché un ojo a las ventajas, pero como no podemos ver los artículos de premium, ¿merece la pena?',
              '../img/premium.jpg'),
              (4,
              '¿Cómo se usan los ejercicios de apoyo?', 'He estado intentando hacer ejercicios interactivos, pero parece que no llego a acceder al contenido. Alguien me ayuda?',
              '../img/ayuda_ej_apoyo.jpg'),
              (5,
              '¿Por qué los gobiernos no dan ayudas?', 'Alguien sabe si dan alguna ayuda? Es que mirando por internet no encontré nada.',
              '../img/ayudas_gobiernos.jpg')
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
             ('Ismael Moreno', 'ismaelmormor@gmail.com', 'Ansiedad general', 'Estoy con los exámenes y tengo ansiedad. Ayuda'),
             ('Gabriel Rodríguez', 'gabigoleador@gmail.com', 'Trastorno de Ansiedad por separación', 'Mis padres se separaron y tengo secuelas. Noto que tengo ansiedad en muchas situaciones y me gustaría corregirlo.'),
             ('Marta Díaz Gonzalez', 'martadiaz@gmail.com', 'Quiero ser terapeuta en vuestra web', 'He echado un vistazo a vuestra web y me gusta mucho vuestro sistema. Me encantaría poder ofrecer mis servicios ahí. Espero vuestra respuesta.'),
             ('David Martínez', 'davidm@gmail.com', 'Reembolso', 'Pagué el premium por un mes y no me gustó. Me gustaría obtener un reembolso.'),
             ('Xavi Hernández', 'xavihernandez@gmail.com', 'Ansiedad general', 'Soy entrenador de fútbol y últimamente vamos muy flojos. Ya no sienten motivación y eso me afecta y me da ansiedad. ¿Podrían ponerme con vuestro mejor especialista?')";
             mysqli_query($conexion, $insert1) or die("Error insert contacto");
         }


    }   




    // Conexion sin tener la base de datos
    $conexion = getConexionsindb();
    // Miramos is existe la base de datos
    $result = mysqli_query($conexion, "SHOW DATABASES LIKE 'brainhub'");
    // Si no existe, la creamos y creamos las tablas
    if (!$result->num_rows > 0){
        $db = "CREATE DATABASE brainhub";
        mysqli_query($conexion, $db)or die("Error al crear la database");
        $conexion=getConexion();//fix, agregar la funión conexión
        mysqli_select_db($conexion, "brainhub")or die("Error al conectar con la db");
        crearTablas($conexion);
    }else{
        // Si ya existe, pasamos tambien el crear tablas por si acaso ya existiese pero sin contenido
        mysqli_select_db($conexion, "brainhub")or die("Error al conectar con la db");
        // crearTablas($conexion);
    }