$(document).ready(function () {
    $(".btn>button").hover(function () {
            // over
            $(".bg-img>img").addClass("active");
        }, function () {
            // out
            $(".bg-img>img").removeClass("active");
        }
    );
});