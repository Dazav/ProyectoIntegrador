document.addEventListener("DOMContentLoaded", function() {
    const h1 = document.getElementById('titulo');
    h1.innerHTML = h1.textContent.replace(/./g,"<span>$&</span>");
    let delay =0;
    document.querySelectorAll('span').forEach(function(span,index){
        if (index<7){
            delay+=0.05;
        } else if (index>6 && index<18){
            delay+=0.1;
            span.style.setProperty('color', '#48A45A');
        } else{
            delay+=0.05;
        }
        span.style.setProperty('--delay', delay+'s');
        console.log(delay);
    });
});

