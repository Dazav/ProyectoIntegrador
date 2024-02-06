const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach(inp =>{
   inp.addEventListener("focus", () => {
     inp.classList.add("active");
   });
   inp.addEventListener("blur", () => {
    if(inp.value != "") return;
    inp.classList.remove("active");
   });
});

toggle_btn.forEach((btn) => {
    btn.addEventListener("click", () => {
        main.classList.toggle("sign-up-mode");
    });
});

function moveSlider(){
  let index = this.dataset.value;
  
  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach(img => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  bullets.forEach(bull => bull.classList.remove("active"))
  this.classList.add("active")
}

bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});

function toggleMenu() {
  var navLinks = document.querySelector('.nav-links');
  navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
}
// comprobar
$(document).ready(function () {
  //comprobar login
  //conseguir dom de formulario,nombre,contraseña y mensaje de error
  var form = $(".sign-in-form");
  var nombre= $(form).find("input:text");
  var pwd= $(form).find("input:password");
  var errorNombre= $(form).find(".error-nombre");
  var errorPwd= $(form).find(".error-pwd");
  //función para estabelecer estilo CSS inicial de mensaje error
  function estadoInicial(error) { 
      $(error).css({
      margin:"0",
      opacity: 0,
      position:"relative",
      bottom: "20px",
      color:"red"});
   }
   //función para comprobar la forma de contenido introducido si es permite
   function comprobar(input,error,condicion,form) {
    //input de introducir,msg de error,regular expresión para nombre,contraseña,correo etc 
    if (!(condicion.test(input.val()))) {
      //valiación de contenido consegido de input introducido
      //se cambia estilo css en caso fallo
      $(input).css({borderColor:"red",color:"red"});
      $(error).animate({
        bottom: "30px",
        opacity: 1,
    },300);
    //evitar subir la formulario
      $(form).submit(function (e) {
        e.preventDefault();
      });
    } else{
      //si corregir la informaci'on introducido, cancelará advertencia
      $(error).animate({bottom: "5px",opacity: 0,},100);
      $(input).css({borderColor:"black",color:"black"});
    }
   }
   //establece estilo css al principal
   estadoInicial(errorNombre); 
   //comprobación automática de nombre
  $(nombre).on("input", function () {
    comprobar(nombre,errorNombre,/^[a-zA-Z][a-z]*$/,form);
  });


  //comprobar registro
  var form2 = $(".sign-up-form");
  var nombre2= $(form2).find("input:text");
  var correo2=$(form2).find("input[type='email']");
  var pwd2= $(form2).find("input:password");
  var errorNombre2= $(form2).find(".error-nombre");
  var errorPwd2= $(form2).find(".error-pwd");
  var errorCorreo2=$(form2).find(".error-email");
  estadoInicial(errorNombre2); 
  estadoInicial(errorPwd2);
  estadoInicial(errorCorreo2);
   //comprobación automática de nombre
  $(nombre2).on("input", function () {
    comprobar(nombre2,errorNombre2,/^[a-zA-Z][a-z]*$/,form2);
  });
  //valiación de contraseña
  $(pwd2).on("input", function () {
    comprobar(pwd2,errorPwd2,/^\S{8,14}$/,form2);
  });
  //valiación de correo
  $(correo2).on("input", function () {
    comprobar(correo2,errorCorreo2,/^\w+@+[a-z]+\.[a-z]{2,3}$/,form2);
  });
});