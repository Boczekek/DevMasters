$("#main").load('home.php');
$(document).ready(function () {
    
    $(".link").click(function () {
        $("#main").load($(this).attr("link"));
    });

}); 