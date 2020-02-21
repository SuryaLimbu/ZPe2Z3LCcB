$(document).ready(function() {
    $(".button").click(function() {
        $("#nav-container").toggleClass("collapse");
        $(".nav_div").toggleClass("collapse");
    });
    // $(".list").click(function() {
    //     $(".list").removeClass("active");
    //     $(this).addClass("active");
    // });
    $(".nav-item").click(function() {
        $(".nav-item").removeClass("active");
        $(this).addClass("active");
    });
});