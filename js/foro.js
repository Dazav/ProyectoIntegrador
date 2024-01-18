$(document).ready(function () {
    var time=0;
    document.querySelectorAll("b").forEach(function (b) {  
        time += 0.2;
        b.style.setProperty("--delay", time+"s");
    });
});
// 
$(document).ready(function () {
    var agitar="bx-tada";
    $("input").focus(function () { 
        $("i").addClass(agitar);
    }).blur(function () { 
        $("i").removeClass(agitar);
    });
    $(selector).keypress(function (e) { 
        
    });
});