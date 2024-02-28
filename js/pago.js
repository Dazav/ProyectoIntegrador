$(document).ready(function () {
    // si ha elegido premium
    $("#elegir").on("change",function () { 
        if ($(this).prop( "checked" )) {
            $("#cantidad").text(1);
        } else {
            $("#cantidad").text(0);
        }
        
    });  
});