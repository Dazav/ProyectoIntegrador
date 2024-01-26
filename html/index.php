<?php
    include "../db/crear_tablas.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/app.js"></script>
    <title>Página Principal</title>
</head>
<body>
    <!-- barra navegación -->
    <nav>
        <div class="usuario">
            <img src="../img/logo.png" alt="" srcset="">
            <a href="index.html">Brain Hub</a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="recurso.html">Recursos</a></li>
                <li>
                    Apoyo
                    <ul>
                        <li>
                            <a href="grupo_apoyo.html">Grupo Apoyo</a>
                        </li>
                        <li>
                            <a href="ejercicios_apoyo.html">Ejercicios de Apoyo</a>
                        </li>
                    </ul>   
                </li>
                <li><a href="terapeutas.html">Terapeutas</a></li>
                <li><a href="social.html">Social</a></li>
            </ul>
        </div>
        <div class="iniciarUser">
            <input type="button" value="Iniciar Sesión" onclick="window.location.href='logIn.html'" />
            <input type="button" value="Comenzar" onclick="window.location.href='comenzar.html'" />
        </div>
    </nav>
    <!-- introducción principal -->
    <div class="introduccion1">
        <div>
            <pre id="titulo">La mejor web psicológica
en el mercado</pre>
            <ul>
                <li>Recursos para tratar la ansiedad</li>
                <li>Herramientas de apoyo y seguimiento</li>
                <li>+1000 terapeutas especializado a tu alcance</li>
            </ul>
            <button>Comenzar ahora</button>
        </div>
        <div>
            <img src="../img/img1.png" alt="">
            <div class="bg-verde"></div>
        </div>
    </div>
    <!-- introducción de ventaje -->
    <div class="introduccion2">
        <div class="foto">
            <div></div>
            <div></div>
        </div>
        <div class="contenido">
            <h1>Psicólogos online experimentados, listos para ayudarte a construir una vida con mayor bienestar</h1>
            <p>En nuestro equipo de psicólogos en línea, encontrarás psicólogos altamente capacitados y experimentados, con una sólida formación académica en psicología y maestría en psicoterapia.</p>
            <p>Todos nuestros psicólogos online cuentan con la documentación necesaria para ejercer su profesión y tienen más de 5 años de experiencia profesional comprobable.</p>
            <p>Con horarios flexibles y una amplia variedad de días disponibles, podrás comenzar tu terapia psicológica en línea en el momento que lo necesites.</p> 
        </div>
    </div>
    <!-- linea horizontal -->
    <hr>
    <!-- recursos -->
    <div class="recursos">
        <h1>Variedad de <b>recursos</b></h1>
        <div class="cartas">
            <div class="carta1 responsiveCarta carta">
                <center>
                    <div></div>
                </center>
                <h1>Ejercicios de exposición gradual</h1>
                <p>La técnica de exposición es un tipo de procedimiento terapéutico empleado en psicología clínica para tratar los trastornos de ansiedad. Esta técnica implica enfrentar al paciente con el objeto, el contexto o el pensamiento temido para ayudarle a superar los síntomas de ansiedad.</p>
                <a href="">Ver Detalle<i class='bx bxs-right-arrow-circle'></i></a>
            </div>
            <div class="carta2 responsiveCarta carta">
                <center>
                    <div></div>
                </center>
                <h1>Técnicas de relajación</h1>
                <p>Las técnicas de relajación son métodos que se utilizan para reducir el estrés, la ansiedad y la tensión muscular, promoviendo un estado de calma y bienestar.</p>
                <a href="" >Ver Detalle<i class='bx bxs-right-arrow-circle'></i></a>
            </div>
            <div class="carta3 responsiveCarta carta">
                <center>
                    <div></div>
                </center>
                <h1>Ejercicios de apoyo</h1>
                <p>
                    Los ejercicios de apoyo psicológico son técnicas y actividades diseñadas para mejorar la salud mental y el bienestar emocional de una persona. </p>
                <a href="">Ver Detalle<i class='bx bxs-right-arrow-circle'></i></a>
            </div>
        </div>
    </div>
    <!-- opiniones -->
    <div class="opiniones">
        <div class="tituloComentarios">
            <h1><b>Opiniones de</b> clientes</h1>
            <div class="comentarios">
                <button class="flecha" id="flecha1" disabled>
                    <i class='bx bxs-left-arrow' ></i>
                </button>
                <div class="outer">
                    <div class="cartaList">
                        <!-- 1º lista -->
                        <div class="comentario">
                            <div>
                                <img src="../img/img6.png" alt="">
                            </div>
                            <div>
                                <h4>Selena Brish</h4>
                                <p>Profesionalidad y muy buena atención al paciente.</p>
                                <p>⭐⭐⭐⭐⭐</p>
                            </div>
                        </div>
                        <div class="comentario">
                            <div><img src="../img/img7.png" alt=""></div>
                            <div>
                                <h4>Elizabeth Rex </h4>
                                <p>Servicio deficiente y atención al paciente poco satisfactoria.</p>
                                <p>⭐⭐⭐😒😒</p>
                            </div>
                        </div>
                        <div class="comentario">
                            <div><img src="../img/img8.png" alt=""></div>
                            <div>
                                <h4>Oliver Jacob</h4>
                                <p>Destaca por su profesionalidad y atención al paciente de alta calidad.</p>
                                <p>⭐⭐⭐⭐⭐</p>
                            </div>
                        </div>
                        <div class="comentario">
                            <div><img src="../img/img9.png" alt=""></div>
                            <div>
                                <h4>Evan Gelia</h4>
                                <p>Unas problemas de profesionalidad y atención al paciente insatisfactoria.</p>
                                <p>⭐⭐😒😒😒</p>
                            </div>
                        </div>
                        <!-- 2º lista -->
                        <div class="comentario">
                            <div>
                                <img src="../img/img10.png" alt="">
                            </div>
                            <div>
                                <h4>Sakura Hash</h4>
                                <p>Profesionalidad y muy buena atención al paciente.</p>
                                <p>⭐⭐⭐⭐😒</p>
                            </div>
                        </div>
                        <div class="comentario">
                            <div><img src="../img/img11.png" alt=""></div>
                            <div>
                                <h4>Emi Misaki</h4>
                                <p>Servicio deficiente y atención al paciente poco satisfactoria.</p>
                                <p>😒😒😒😒😒</p>
                            </div>
                        </div>
                        <div class="comentario">
                            <div><img src="../img/img12.png" alt=""></div>
                            <div>
                                <h4>Fiona Weber</h4>
                                <p>Destaca por su profesionalidad y atención al paciente de alta calidad.</p>
                                <p>⭐⭐⭐😒😒</p>
                            </div>
                        </div>
                        <!--  -->
                        <div class="comentario verMas">
                            <div>
                                <h4>Ve más comentarios de cuentas</h4>
                                <h4><a href="">Ver Más</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="flecha" id="flecha2">
                    <i class='bx bxs-right-arrow' ></i>             
                </button>
            </div>
        </div>
    </div>
    <!-- contacto -->
    <div class="contacto">
        <h1>¿TIENES DUDAS?</h1>
        <p>Nuestro equipo de soporte está disponible 24/7</p>
        <input type="button" value="CONTACTO" onclick="window.location.href='contacto.html'" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M20 10C20 4.48 15.52 0 10 0C4.48 0 0 4.48 0 10C0 14.84 3.44 18.87 8 19.8V13H6V10H8V7.5C8 5.57 9.57 4 11.5 4H14V7H12C11.45 7 11 7.45 11 8V10H14V13H11V19.95C16.05 19.45 20 15.19 20 10Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                <path d="M8.29395 5.928L13.357 0H12.157L7.76195 5.147L4.24995 0H0.199951L5.50995 7.784L0.199951 14H1.39995L6.04195 8.564L9.75095 14H13.801L8.29395 5.928ZM6.65095 7.852L6.11295 7.077L1.83195 0.91H3.67495L7.12895 5.887L7.66695 6.662L12.158 13.132H10.315L6.65095 7.852Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 9.52C11.5095 9.52 11.03 9.66545 10.6222 9.93795C10.2144 10.2105 9.89648 10.5978 9.70878 11.0509C9.52107 11.5041 9.47196 12.0028 9.56765 12.4838C9.66334 12.9649 9.89954 13.4068 10.2464 13.7536C10.5932 14.1005 11.0351 14.3367 11.5162 14.4323C11.9972 14.528 12.4959 14.4789 12.9491 14.2912C13.4022 14.1035 13.7895 13.7856 14.062 13.3778C14.3346 12.97 14.48 12.4905 14.48 12C14.48 11.6743 14.4159 11.3518 14.2912 11.0509C14.1666 10.7501 13.9839 10.4767 13.7536 10.2464C13.5233 10.0161 13.2499 9.83341 12.9491 9.70878C12.6482 9.58415 12.3257 9.52 12 9.52ZM21.93 7.07C21.9247 6.29776 21.7825 5.53257 21.51 4.81C21.3093 4.28126 20.9987 3.80109 20.5988 3.40119C20.1989 3.00128 19.7187 2.69072 19.19 2.49C18.4674 2.21746 17.7022 2.07526 16.93 2.07C15.64 2 15.26 2 12 2C8.74 2 8.36 2 7.07 2.07C6.29776 2.07526 5.53257 2.21746 4.81 2.49C4.28126 2.69072 3.80109 3.00128 3.40119 3.40119C3.00128 3.80109 2.69072 4.28126 2.49 4.81C2.21746 5.53257 2.07526 6.29776 2.07 7.07C2 8.36 2 8.74 2 12C2 15.26 2 15.64 2.07 16.93C2.08076 17.705 2.22277 18.4725 2.49 19.2C2.68983 19.7263 3.00013 20.2037 3.4 20.6C3.79819 21.0023 4.27939 21.3129 4.81 21.51C5.53257 21.7825 6.29776 21.9247 7.07 21.93C8.36 22 8.74 22 12 22C15.26 22 15.64 22 16.93 21.93C17.7022 21.9247 18.4674 21.7825 19.19 21.51C19.7206 21.3129 20.2018 21.0023 20.6 20.6C20.9999 20.2037 21.3102 19.7263 21.51 19.2C21.7823 18.4739 21.9244 17.7055 21.93 16.93C22 15.64 22 15.26 22 12C22 8.74 22 8.36 21.93 7.07ZM19.39 15.07C19.3579 15.6871 19.2262 16.295 19 16.87C18.8059 17.3497 18.5173 17.7854 18.1514 18.1514C17.7854 18.5173 17.3497 18.8059 16.87 19C16.2895 19.2136 15.6783 19.3318 15.06 19.35H8.94C8.32173 19.3318 7.71049 19.2136 7.13 19C6.6341 18.8157 6.18628 18.5217 5.82 18.14C5.45767 17.7813 5.17784 17.3479 5 16.87C4.78556 16.2901 4.67061 15.6782 4.66 15.06V8.94C4.67061 8.32183 4.78556 7.70988 5 7.13C5.18428 6.6341 5.47827 6.18628 5.86 5.82C6.22033 5.45962 6.65326 5.18009 7.13 5C7.71049 4.78641 8.32173 4.66821 8.94 4.65H15.06C15.6783 4.66821 16.2895 4.78641 16.87 5C17.3659 5.18428 17.8137 5.47827 18.18 5.86C18.5423 6.21875 18.8222 6.65213 19 7.13C19.2136 7.71049 19.3318 8.32173 19.35 8.94V12C19.35 14.06 19.42 14.27 19.39 15.06V15.07ZM17.79 7.63C17.6709 7.30698 17.4832 7.01364 17.2398 6.77021C16.9964 6.52678 16.703 6.33906 16.38 6.22C15.9365 6.06626 15.4693 5.99179 15 6H9C8.52827 6.00461 8.06107 6.09263 7.62 6.26C7.30193 6.37366 7.01169 6.55371 6.76858 6.7882C6.52547 7.02269 6.33506 7.30624 6.21 7.62C6.06478 8.06537 5.99383 8.5316 6 9V15C6.00991 15.4712 6.09777 15.9375 6.26 16.38C6.37906 16.703 6.56678 16.9964 6.81021 17.2398C7.05364 17.4832 7.34698 17.6709 7.67 17.79C8.09667 17.9469 8.54565 18.0347 9 18.05H15C15.4717 18.0454 15.9389 17.9574 16.38 17.79C16.703 17.6709 16.9964 17.4832 17.2398 17.2398C17.4832 16.9964 17.6709 16.703 17.79 16.38C17.9574 15.9389 18.0454 15.4717 18.05 15V9C18.0503 8.5278 17.9621 8.05972 17.79 7.62V7.63ZM12 15.82C11.4988 15.82 11.0026 15.7211 10.5397 15.529C10.0768 15.3369 9.6563 15.0554 9.30238 14.7005C8.94846 14.3457 8.66803 13.9245 8.47714 13.4611C8.28626 12.9977 8.18868 12.5012 8.19 12C8.19 11.2441 8.4143 10.5051 8.83449 9.87669C9.25468 9.24828 9.85187 8.75866 10.5505 8.46983C11.2491 8.181 12.0177 8.10594 12.7589 8.25415C13.5002 8.40236 14.1808 8.76717 14.7147 9.30241C15.2485 9.83764 15.6116 10.5192 15.7578 11.2609C15.9041 12.0026 15.827 12.771 15.5363 13.4688C15.2457 14.1666 14.7545 14.7625 14.125 15.1811C13.4955 15.5996 12.7559 15.822 12 15.82ZM16 8.93C15.7789 8.9066 15.5744 8.80222 15.4257 8.63697C15.277 8.47172 15.1947 8.25729 15.1947 8.035C15.1947 7.81271 15.277 7.59828 15.4257 7.43303C15.5744 7.26778 15.7789 7.1634 16 7.14C16.2211 7.1634 16.4256 7.26778 16.5743 7.43303C16.723 7.59828 16.8053 7.81271 16.8053 8.035C16.8053 8.25729 16.723 8.47172 16.5743 8.63697C16.4256 8.80222 16.2211 8.9066 16 8.93Z" fill="white"/>
                            </svg>
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