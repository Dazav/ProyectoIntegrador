<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/terapeuta.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../js/teuapeuta.js"></script>
    <title>terapeuta</title>
</head>
<body>
    <!-- barra navegación -->
    <nav>
        <div class="usuario">
            <img src="../img/logo.png" alt="" srcset="">
            <a href="index.php">Brain Hub</a>
        </div>
        <div class="menu">
            <button onclick="window.location.href='recursos.php'">Recursos</button>
            <div class="dropdown">
                Apoyo
                <div class="dropdown-menu">
                    <button onclick="window.location.href='grupo_apoyo.php'">Grupo Apoyo</button>
                    <button onclick="window.location.href='ejercicios_apoyo.php'">Ejercicios de Apoyo</button>
                </div>
            </div>
            <button onclick="window.location.href='terapeutas.php'">Terapeutas</button>
            <button onclick="window.location.href='foros.php'">Social</button>
        </div>
        <div class="iniciarUser">
            <input type="button" value="Iniciar Sesión" onclick="window.location.href='registrar.php'" />
            <input type="button" value="Comenzar" onclick="window.location.href='registrar.php?mostrar=registro'" />
        </div>
    </nav>
    <!-- main -->
    <main>
        <div class="titulo">
            <h1>Brain Hub</h1>
            <p>organiza hoy tu primera cita con un psicólogo en línea de forma fácil, segura y privada</p>
        </div>
        <div class="califica">
            <i class='bx bx-menu'></i>
            <i class='bx bx-search'></i>
            <input class="buscador" type="text">
            <div class="selecciones">
                <select name="" id="">
                    <option value="defecto">Duración</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <select name="" id="">
                    <option value="defecto">Especialidad</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <select name="" id="">
                    <option value="defecto">Selecciona día</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="contenido">
            <aside>
                <i class='bx bx-x'></i>
                <p>País de tu psicólogo</p>
                <div>
                    <label for=""><input type="checkbox" name="" id="">España</label>
                    <label for=""><input type="checkbox" name="" id="">Inglaterra</label>
                    <label for=""><input type="checkbox" name="" id="">Alemania</label>
                    <label for=""><input type="checkbox" name="" id="">China</label>
                </div>
                <hr>
                <div>
                    <label for=""><input type="checkbox" name="" id="">Hombre</label>
                    <label for=""><input type="checkbox" name="" id="">Mujer</label>
                </div>
                <hr>
                <div>
                    <label for=""><input type="checkbox" name="" id="">Chino</label>
                    <label for=""><input type="checkbox" name="" id="">Inglés</label>
                    <label for=""><input type="checkbox" name="" id="">Español</label>
                    <label for=""><input type="checkbox" name="" id="">Alemán</label>
                </div>
                <hr>
                <img src="../img/logo.png" alt="" srcset="">
            </aside>
            <section>
                <div class="scrollbar">
                    <div class="tarjeta-tera">
                        <div class="infor1">
                            <div class="img-des">
                                <div class="img-tera">
                                    <img src="../img/autor1.png" alt="" srcset="">
                                    <img src="../img/es.png" alt="">
                                </div>
                                <div>
                                    <h3>Santiago Daza Villamar</h3>
                                    <p>Nº Identificación: 999999</p>
                                    <p>Especialización: Transtorno del Pánico, Mutismo Selectivo</p>
                                </div>
                            </div>
                            <div class="idiomas">
                                <p><i class='bx bx-world'></i>Idiomas: Español, Inglés</p>
                                <p><i class='bx bx-map'></i>Nacionalidad: Española</p>
                            </div>
                            <hr>
                            <div class="precio">
                                <p>Cita - 50 minutos</p>
                                <button>50.00€</button>
                            </div>
                        </div>
                        <div class="infor2">
                            <h3>Disponibilidad</h3>
                            <table>
                                <tr>
                                    <td>Hoy</td>
                                    <td>Mañana</td>
                                    <td>Pasado Mañana</td>
                                </tr>
                            </table>
                            <div>
                                <table>
                                    <tr>
                                        <td>8:00</td>
                                        <td>8:00</td>
                                        <td>8:00</td>
                                    </tr>
                                    <tr>
                                        <td>9:00</td>
                                        <td>9:00</td>
                                        <td>9:00</td>
                                    </tr>
                                    <tr>
                                        <td>10:00</td>
                                        <td>10:00</td>
                                        <td>10:00</td>
                                    </tr>
                                    <tr>
                                        <td>11:00</td>
                                        <td>11:00</td>
                                        <td>11:00</td>
                                    </tr>
                                    <tr>
                                        <td>12:00</td>
                                        <td>12:00</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>13:00</td>
                                        <td>13:00</td>
                                        <td>13:00</td>
                                    </tr>
                                    <tr>
                                        <td>14:00</td>
                                        <td>14:00</td>
                                        <td>14:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tarjeta-tera">
                        <div class="infor1">
                            <div class="img-des">
                                <div class="img-tera">
                                    <img src="../img/autor2.png" alt="" srcset="">
                                    <img src="../img/ger.png" alt="">
                                </div>
                                <div>
                                    <h3>Ismael Moreno Mor</h3>
                                    <p>Nº Identificación: 999999</p>
                                    <p>Especialización: Transtorno del Pánico, Mutismo Selectivo</p>
                                </div>
                            </div>
                            <div class="idiomas">
                                <p><i class='bx bx-world'></i>Idiomas: Español, Inglés</p>
                                <p><i class='bx bx-map'></i>Nacionalidad: Española</p>
                            </div>
                            <hr>
                            <div class="precio">
                                <p>Cita - 50 minutos</p>
                                <button>50.00€</button>
                            </div>
                        </div>
                        <div class="infor2">
                            <h3>Disponibilidad</h3>
                            <table>
                                <tr>
                                    <td>Hoy</td>
                                    <td>Mañana</td>
                                    <td>Pasado Mañana</td>
                                </tr>
                            </table>
                            <div>
                                <table>
                                    <tr>
                                        <td>8:00</td>
                                        <td>8:00</td>
                                        <td>8:00</td>
                                    </tr>
                                    <tr>
                                        <td>9:00</td>
                                        <td>9:00</td>
                                        <td>9:00</td>
                                    </tr>
                                    <tr>
                                        <td>10:00</td>
                                        <td>10:00</td>
                                        <td>10:00</td>
                                    </tr>
                                    <tr>
                                        <td>11:00</td>
                                        <td>11:00</td>
                                        <td>11:00</td>
                                    </tr>
                                    <tr>
                                        <td>12:00</td>
                                        <td>12:00</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>13:00</td>
                                        <td>13:00</td>
                                        <td>13:00</td>
                                    </tr>
                                    <tr>
                                        <td>14:00</td>
                                        <td>14:00</td>
                                        <td>14:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tarjeta-tera">
                        <div class="infor1">
                            <div class="img-des">
                                <div class="img-tera">
                                    <img src="../img/autor3.png" alt="" srcset="">
                                    <img src="../img/cn.png" alt="">
                                </div>
                                <div>
                                    <h3>Wei Xu</h3>
                                    <p>Nº Identificación: 999999</p>
                                    <p>Especialización: Transtorno del Pánico, Mutismo Selectivo</p>
                                </div>
                            </div>
                            <div class="idiomas">
                                <p><i class='bx bx-world'></i>Idiomas: Español, Inglés</p>
                                <p><i class='bx bx-map'></i>Nacionalidad: Española</p>
                            </div>
                            <hr>
                            <div class="precio">
                                <p>Cita - 50 minutos</p>
                                <button>50.00€</button>
                            </div>
                        </div>
                        <div class="infor2">
                            <h3>Disponibilidad</h3>
                            <table>
                                <tr>
                                    <td>Hoy</td>
                                    <td>Mañana</td>
                                    <td>Pasado Mañana</td>
                                </tr>
                            </table>
                            <div>
                                <table>
                                    <tr>
                                        <td>8:00</td>
                                        <td>8:00</td>
                                        <td>8:00</td>
                                    </tr>
                                    <tr>
                                        <td>9:00</td>
                                        <td>9:00</td>
                                        <td>9:00</td>
                                    </tr>
                                    <tr>
                                        <td>10:00</td>
                                        <td>10:00</td>
                                        <td>10:00</td>
                                    </tr>
                                    <tr>
                                        <td>11:00</td>
                                        <td>11:00</td>
                                        <td>11:00</td>
                                    </tr>
                                    <tr>
                                        <td>12:00</td>
                                        <td>12:00</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>13:00</td>
                                        <td>13:00</td>
                                        <td>13:00</td>
                                    </tr>
                                    <tr>
                                        <td>14:00</td>
                                        <td>14:00</td>
                                        <td>14:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>
        </div>
    </main>
    <!-- contacto -->
    <div class="contacto">
        <h1>¿TIENES DUDAS?</h1>
        <p>Nuestro equipo de soporte está disponible 24/7</p>
        <input type="button" value="CONTACTO" onclick="window.location.href='contacto.php'" />
    </div>
    <!-- footer -->
    <footer>
        <div class="elementos">
            <div>
                <img src="../img/logo.png" alt="">
                <h2>Brain Hub</h2>
            </div>
            <div>
                <h2>Recursos</h2>
                <ul>
                    <li>Recursos de Ansiedad</li>
                    <li>Técnicas Relajación</li>
                </ul>
            </div>
            <div>
                <h2>Apoyo</h2>
                <ul>
                    <li>Herramientas</li>
                    <li>Seguimiento y Progreso</li>
                </ul>
            </div>
            <div class="social">
                <h2>Social</h2>
                <ul>
                    <li>Grupos de Apoyo</li>
                    <li>Foros de Comunidad</li>
                    <li>
                        <a href="">
                            <i class='bx bxl-facebook-circle' style='color:#fffcfc' ></i>
                        </a>
                        <a href="">
                            <i class='bx bxl-twitter' style='color:#fffcfc'  ></i>
                        </a>
                        <a href="">
                            <i class='bx bxl-instagram' style='color:#fffcfc' ></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="avisos">
            <pre>● Política de Privacidad   Términos de Uso   Configuración de Cookies</pre>
            <pre>Contacto   Centro de Ayuda   Preferencias</pre>
        </div>
    </footer>
</body>
</html>