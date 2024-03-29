<?php
    include "conecta.php";
    // FUNCION PARA CREAR LAS TABLAS
    function crearTablas($conexion){
        $tabla_usuario = "CREATE TABLE IF NOT EXISTS usuario(
            id int auto_increment primary key,
            nombre varchar(20),
            apellidos varchar(50),
            pssword varchar(100),
            email varchar(50),
            nombreUser varchar(20),
            imagen varchar(50) DEFAULT '../img/defecto.png',
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
            disponibilidad TEXT,
            telefono VARCHAR(15)
        );";

        mysqli_query($conexion, $tabla_terapeuta) or die("Error en tabla terapeuta");

        $tabla_cita="CREATE TABLE IF NOT EXISTS cita(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_terapeuta INT,
            id_usuario INT,
            fecha_cita datetime,
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
            descripcion TEXT,
            img_portada VARCHAR(50),
            img_banner VARCHAR(50),
            premium INT(1) DEFAULT 0,
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
            img_idioma VARCHAR(255),
            FOREIGN KEY (organizador) REFERENCES usuario(id)
        );";

        mysqli_query($conexion, $tabla_gruposApoyo) or die("Error en tabla usuario");

        $tabla_grupoInscripcion = "CREATE TABLE IF NOT EXISTS inscripcion_grupo (
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            id_grupo INT,
            FOREIGN KEY (id_usuario) REFERENCES usuario(id),
            FOREIGN KEY (id_grupo) REFERENCES GruposApoyo(id)
        );";

        mysqli_query($conexion,  $tabla_grupoInscripcion) or die("Error en tabla inscripcion");

        // tabla de ejercicio apoyo
        $tabla_ejercicio_apoyo="CREATE TABLE IF NOT EXISTS ejercicio (
            id INT AUTO_INCREMENT PRIMARY KEY,
            eje VARCHAR(255)
        );";
        mysqli_query($conexion, $tabla_ejercicio_apoyo) or die("Error en tabla ejercicio apoyo");

        // tabla de preguntas de ejercicios
        $tabla_pregunta="CREATE TABLE IF NOT EXISTS pregunta(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_ejercicio INT,
            n_pregunta INT,
            pregunta VARCHAR(255),
            seleccionA VARCHAR(255),
            seleccionB VARCHAR(255),
            seleccionC VARCHAR(255),
            FOREIGN KEY (id_ejercicio) REFERENCES ejercicio (id)
        );";
        mysqli_query($conexion, $tabla_pregunta) or die("Error en tabla ejercicio apoyo");

        // tabla de repsuestas de ejercicios
        $tabla_respuesta_ejercicio="CREATE TABLE IF NOT EXISTS respuestaEjercicio(
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            id_pregunta INT,
            respuesta VARCHAR(255),
            FOREIGN KEY (id_usuario) REFERENCES usuario (id),
            FOREIGN KEY (id_pregunta) REFERENCES pregunta (id)
        );";
        mysqli_query($conexion, $tabla_respuesta_ejercicio) or die("Error en tabla ejercicio apoyo");

        // INSERTAR DATOS

         $select = "SELECT * FROM usuario";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO usuario (nombre, apellidos, pssword, email, nombreUser, imagen,premium) VALUES
             ('Ismael', 'Moreno', '$2y$10$0Jo4dTvk5XjyYNIXWiFt.uO3mpo5qjJfuHVYt6R3VG8Z1ETdDU7F', 'ismaelmormor@gmail.com', 'ismaelmormor', '../img/ismaelmormor.png',0),
             ('Gabriel', 'Rodríguez', '3343', 'gabir@gmail.com', 'gabigol', '../img/gabigol.png',1),
             ('Ibai', 'Llanos', 'llan0s', 'ibaillanos@gmail.com', 'ibaillanos', '../img/ibaillanos.png',1),
             ('Wei', 'Xu', 'we1', 'weixu@gmail.com', 'xuwei', '../img/xuwei.png',1),
             ('Santiago', 'Daza', 'd4z4', 'santiagodaza@gmail.com', 'santiagodaza', '../img/santiagodaza.png',0)";
             mysqli_query($conexion, $insert1) or die("Error insert usuario");
         }

         $select = "SELECT * FROM terapeuta";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO terapeuta (nombre, apellidos, n_identificacion, especializacion, nacionalidad, idiomas,sexo,img_perfil,img_nac, disponibilidad, telefono) VALUES
             ('María', 'Paveda Martínez', '247334', 'Fobia Social', 'Española', 'Español, English','mujer','../img/tera1.jpg','../img/es.png', '14:00,15:00,18:00,19:00,20:00', '123456789'),
             ('Nikolas', 'Müller Weber', '099834', 'Mutismo Selectivo', 'Alemana', 'Español, Deutsch','hombre','../img/tera2.jpg','../img/ger.png', '12:00,13:00,17:00,19:00,20:00', '987654321'),
             ('John', 'Krsinski', '541634', 'Trastorno del Pánico', 'Estadounidense', 'English, Русский','hombre','../img/tera3.jpg','../img/us.png', '00:00,12:00,19:00,22:00,23:00', '213547698'),
             ('Xin', 'Zhao', '707234', 'Ansiedad', 'Chino', '中文, English,Español','hombre','../img/tera4.jpg','../img/cn.png', '14:00,15:00,18:00,19:00,20:00', '4231456789'),
             ('Asan', 'Diop', '000634', 'Fobia Social', 'Francesa', 'Français, English','mujer','../img/tera5.jpg','../img/fr.png', '14:00,15:00,18:00,19:00,20:00', '425312789')
             ";
             mysqli_query($conexion, $insert1) or die("Error insert terapeuta");
         }
        //  inserta datos de cita
        $select="SELECT * FROM cita";
        $result=mysqli_query($conexion, $select);       
        if($result->num_rows==0){
            $insert1="INSERT INTO cita(id_terapeuta,id_usuario,fecha_cita) VALUES
            (2,1,'2024-05-05 12:00'),
            (3,2,'2024-07-05 19:00'),
            (1,3,'2024-03-04 15:00'),
            (5,4,'2024-03-03 14:00'),
            (4,5,'2024-03-03 14:00')";
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
             $insert1 = "INSERT INTO recursos (id_usuario, titular, descripcion, img_banner, img_portada, premium) VALUES
             (2, 'Cómo relajarse', 'Para relajarse antes de una situación de ansiedad, es útil practicar técnicas de respiración profunda, como la respiración diafragmática. Inhala lentamente por la nariz, contando hasta cuatro, siente cómo se expande tu abdomen, mantén la respiración durante un momento y luego exhala lentamente por la boca, contando hasta cuatro. Repite este proceso varias veces. También, intenta enfocarte en el presente a través de la atención plena, observando tus pensamientos y sensaciones sin juzgarlos. Realizar ejercicios suaves de estiramiento o caminar un poco puede ayudar a liberar la tensión física. Recuerda que tomarte un momento para ti, en un lugar tranquilo, puede ser muy beneficioso para calmar la ansiedad.', '../img/recursos-contenido1.png', 'tema-an1.png', 1),
             (3, 'Cómo detectar un ataque', 'Detectar un ataque de ansiedad implica estar atento a una combinación de síntomas físicos y emocionales. Los síntomas físicos pueden incluir palpitaciones o aceleración del corazón, sudoración, temblores o sacudidas, sensaciones de ahogo o falta de aire, dolor o molestias en el pecho, náuseas o molestias abdominales, mareos, inestabilidad, aturdimiento o sensación de desmayo, y escalofríos o sensaciones de calor. En el aspecto emocional, se puede experimentar sensaciones intensas de miedo o terror, sensación de pérdida de control o de muerte inminente, y un deseo urgente de escapar de la situación. También pueden presentarse dificultades para concentrarse, pensamientos catastróficos, y un estado de hipervigilancia hacia los propios síntomas o el entorno. Identificar estos signos tempranamente puede ayudar a manejar el ataque de ansiedad de manera más efectiva.', '../img/recursos-contenido1.png', 'tema-an2.png', 0),
             (4, 'Cómo ayudar a enfermos', 'Para ayudar a los enfermos de ansiedad, es fundamental ofrecer apoyo emocional, escuchar sin juzgar, y fomentar la búsqueda de ayuda profesional. Anima a la persona a practicar técnicas de relajación y mindfulness, a mantener una rutina saludable con ejercicio regular y sueño adecuado, y a evitar sustancias que puedan agravar la ansiedad, como la cafeína. Educar sobre la ansiedad puede también reducir el estigma y promover la comprensión.', '../img/recursos-contenido1.png', 'tema-an3.png', 1),
             (2, 'Cuándo actuar', 'Actúa cuando observes cambios persistentes o intensificación en los síntomas de ansiedad, dificultad para realizar tareas diarias, o si la persona expresa pensamientos de daño hacia sí misma o hacia otros. La búsqueda de ayuda profesional es crucial en estos casos.', '../img/recursos-contenido1.png', 'tema-an4.png', 0),
             (1, 'Tabla de síntomas', 'Los síntomas de los ataques de ansiedad incluyen palpitaciones, sudoración, temblores, sensación de ahogo, dolor en el pecho, náuseas, mareos, escalofríos o calor, miedo intenso, sensación de descontrol, y urgencia de escapar.', '../img/recursos-contenido1.png', 'tema-an5.png', 0)";
             mysqli_query($conexion, $insert1) or die("Error insert recursos");
         }

         $select = "SELECT * FROM GruposApoyo";
         $result = $conexion->query($select);
         if ($result->num_rows == 0) {
             $insert1 = "INSERT INTO GruposApoyo (organizador, idioma, tema, fecha,img_idioma) VALUES
             (2, 'Español', 'Ansiedad general', '2024-03-23','../img/es.png'),
             (3, 'Fraçais', 'Trastorno del pánico', '2024-03-24','../img/fr.png'),
             (4, 'English', 'Mutismo Selectivo', '2024-03-27','../img/us.png'),
             (2, 'Deutsch', 'Cómo ayudamos a los familiares', '2024-03-30','../img/ger.png'),
             (1, 'Español', 'Ayuda en el uso de la web', '2024-03-23','../img/es.png')";
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

        //  ejercicio apoyo
        $select = "SELECT * FROM ejercicio";
        $result = $conexion->query($select);
        if ($result->num_rows == 0) {
            $insert1 = "INSERT INTO ejercicio (eje) VALUES
            ('Ejercicios de exposición'),
            ('Escala de ansiedad'),
            ('Evalución de estrés'),
            ('Reflexión sobre la autoestima')";
            mysqli_query($conexion, $insert1) or die("Error insert contacto");
        }
        //pregunta de ejercicio
        $select = "SELECT * FROM pregunta";
        $result = $conexion->query($select);
        if ($result->num_rows == 0) {
            $insert1 = "INSERT INTO pregunta (id_ejercicio,n_pregunta,pregunta,seleccionA,seleccionB,seleccionC) VALUES
            (1,1,'¿Qué emociones has sentido con más frecuencia esta semana?','Alegría','Tristeza','Otro'),
            (1,2,'¿Cuáles son las opciones de tratamiento que se discutieron para su condición?', 'Medicamentos', 'Terapia física', 'Cambios en el estilo de vida'),
            (1,3, '¿Se discutieron posibles efectos secundarios de su tratamiento durante la exposición?', 'Sí', 'No', 'No estoy seguro/a'),
            (2,1, '¿Has sentido que tu corazón late rápidamente o con fuerza sin motivo aparente?', 'Nunca', 'En algunas ocasiones', 'A menudo'),
            (2,2, '¿Has sentido tensión o nerviosismo la mayor parte del tiempo?', 'Nunca', 'En algunas ocasiones', 'A menudo'),
            (2,3, '¿Has experimentado temblores o sacudidas en tu cuerpo sin razón evidente?', 'Nunca', 'En algunas ocasiones', 'A menudo'),
            (3,1, '¿Con qué frecuencia te has sentido abrumado/a por las demandas de tu vida cotidiana en la última semana?', 'Nunca', 'A veces', 'Frecuentemente'),
            (3,2,'¿Cómo calificarías tu nivel de irritabilidad o impaciencia debido al estrés en los últimos días?', 'No he estado irritable o impaciente', 'He estado ligeramente irritable o impaciente', 'He estado muy irritable o impaciente'),
            (3,3, '¿En qué medida el estrés ha afectado tu capacidad para concentrarte en el trabajo o en otras tareas importantes recientemente?', 'No ha tenido efecto', 'Ha tenido un efecto moderado', 'Ha tenido un efecto significativo'),
            (4,1, '¿Con qué frecuencia te sientes satisfecho/a con tus logros personales?', 'Nunca me siento satisfecho/a', 'A veces me siento satisfecho/a', 'A menudo me siento satisfecho/a'),
            (4,2, '¿Cómo te afecta la crítica de los demás?', 'Me siento profundamente herido/a y dudo de mi valía', 'Me afecta temporalmente pero luego lo supero', 'La considero constructiva y no afecta mi autoestima'),
            (4,3, '¿Te sientes cómodo/a expresando tus necesidades y deseos a los demás?', 'Nunca me siento cómodo/a', 'Solo en situaciones con personas de confianza', 'Siempre me siento cómodo/a y lo hago abiertamente')";
            mysqli_query($conexion, $insert1) or die("Error insert contacto");
        }
        //respuestas que usuario ha elegido
        $select="SELECT * FROM respuestaEjercicio";
        $result=$conexion->query($select);
        if ($result->num_rows ==0) {
            $insert1="INSERT INTO respuestaEjercicio(id_usuario,id_pregunta,respuesta) VALUES
            -- usuario 1 que termina todos 4 ejercicios
            (1,1,'Alegría'),(1, 2, 'Terapia física'),(1, 3, 'No'),
            (1, 4, 'En algunas ocasiones'),(1, 5, 'En algunas ocasiones'),(1, 6, 'En algunas ocasiones'),
            (1, 7, 'A veces'),(1, 8, 'He estado muy irritable o impaciente'),(1,9, 'No ha tenido efecto'),
            (1,10, 'A veces me siento satisfecho/a'),(1,11, 'Me afecta temporalmente pero luego lo supero'),(1,12, 'Siempre me siento cómodo/a y lo hago abiertamente'),
            -- usuario 2 que termina todos 4 ejercicios
            (2,1,'Tristeza'),(2, 2, 'Medicamentos'),(2, 3, 'No estoy seguro/a'),
            (2,4, 'A menudo'),(2,5, 'En algunas ocasiones'),(2, 6, 'Nunca'),
            (2,  7, 'Nunca'),(2,  8, 'He estado muy irritable o impaciente'),(2, 9, 'Ha tenido un efecto significativo'),
            (2, 10, 'A menudo me siento satisfecho/a'),(2, 11, 'Me afecta temporalmente pero luego lo supero'),(2,12, 'Siempre me siento cómodo/a y lo hago abiertamente')
            ";
            mysqli_query($conexion, $insert1) or die("Error insert respuestas elegida de usuario ");
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