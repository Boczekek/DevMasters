$(document).ready(function () {
    $("#main").load('home.php');
    
    $(".link").click(function () {
        $("#main").load($(this).attr("link"));
    });

}); 