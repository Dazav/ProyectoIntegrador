// animación de título
$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b){
        time +=0.5;
        b.style.setProperty("--delayTitulo", time+'s');
    });
});
//comprobar
$(document).ready(function () {
    //comprobar login
  //conseguir dom de formulario,nombre,contraseña y mensaje de error
  var nombre= $("input:text");
  var email= $("input[type='email']");
  var msg= $("textarea");
  var errorNombre= $(".error-nombre");
  var errorMail= $(".error-email");
  var errormsg= $(".error-msg");
  //función para estabelecer estilo CSS inicial de mensaje error
  function estadoInicial(error) { 
      $(error).css({
      margin:"0",
      opacity: 0,
      position:"relative",
      bottom: "5px",
      color:"red"});
   }
   //función para comprobar la forma de contenido introducido si es permite
   function comprobar(input,error,condicion,boolean) {
    //input de introducir,msg de error,regular expresión para nombre,contraseña,correo etc 
    if (condicion.test(input.val())==boolean) {
      //valiación de contenido consegido de input introducido
      //se cambia estilo css en caso fallo
      $(input).css({borderColor:"red",color:"red"});
      $(error).animate({
        bottom: "0px",
        opacity: 1,
    },300);
    //evitar subir la formulario
      $("form").submit(function (e) {
        e.preventDefault();
      });
    } else{
      //si corregir la informaci'on introducido, cancelará advertencia
      $(error).animate({bottom: "5px",opacity: 0,},300);
      $(input).css({borderColor:"#6545A1",color:"black"});
    }
   }
   //establece estilo css al principal
   estadoInicial(errorNombre); 
   estadoInicial(errorMail);
   estadoInicial(errormsg);
   //comprobación automática de nombre
  $(nombre).on("input", function () {
    comprobar(nombre,errorNombre,/^[a-zA-Z][a-z]*$/,false);
  });
  //valiación de contraseña
  $(email).on("input", function () {
    comprobar(email,errorMail,/^\w+@+[a-z]+\.[a-z]{2,3}$/,false);
  });
  //valicación de mensaje sin palabras racisma
  $(msg).on("input", function () {
    comprobar(msg,errormsg,/(\bnigga\b|\bchink\b)/,true);
  });
});