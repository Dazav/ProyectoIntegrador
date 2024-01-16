// segurar el titulo sin caer en el caso que ha introducida correo o contraseña
$(document).ready(function () {
    $("#inputC").blur(function () { 
        if ($(this).val()!=='') {
            $(".email").addClass("active");
        } else {
            $(".email").removeClass("active");
        }
    });
    $("#inputC").focus(function (e) { 
        $(".email").addClass("active");        
    });
    $("#inputP").blur(function () { 
        if ($(this).val()!=='') {
            $(".pwd").addClass("active2");
        } else {
            $(".pwd").removeClass("active2");
        }
    });
    $("#inputP").focus(function (e) { 
        $(".pwd").addClass("active2");        
    });
});