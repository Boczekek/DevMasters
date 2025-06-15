<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="shortcut icon" href="images/icon.png">
        <script type="text/javascript" src="./js/app.js" defer></script>
        <script src="./js/jquery.slim.min.js"></script>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/jquery.js"></script>
        <script src="./js/popper.min.js"></script>
        <title>DevMasters</title>
    </head>
    <body>
        <div id="header" class="section">
            <h1 id="name">&lt;&#47;Dev<b>Masters</b>&gt;</h1>
            <?PHP
            session_start();
            if(isset($_SESSION['login'])){
                echo "<span id='username'>".$_SESSION['login']."</span><br>";
            ?>
            
            <button class="link" link="logout.php" class="login" type="button">Wyloguj się</button>
            
            <?PHP
            } 
            else{
            ?>

            <button onclick="location.href='login.html'" class="login" type="button">Zaloguj się</button>

            <?PHP };
            ?>
        </div>
        <div id="nav" class="section">
                <button type="button" link="home.php" class="link">Home</button>
                <button type="button" link="chat.php" class="link">Chat</button>
                <button type="button" link="prosby.php" class="link">Prośby</button>
                <?PHP
                    if(isset($_SESSION['login']) && $_SESSION['ranga']>1){
                ?>

                <button type="button" link="zlecenia.php" class="link">Zlecenia</button>

                <?PHP };
                    if(isset($_SESSION['login']) && $_SESSION['ranga']>2){
                 ?>
                <button type="button" link="aplikacje.php" class="link">Zgłoszenia</button>
                <button type="button" link="users.php" class="link">Użytkownicy</button>
                <?PHP };
                ?>
        </div>
        <div id="main" class="section">
            <p>Witamy</p>
        </div>
        <div id="footer">
            <p>Krystian Zając</p><p>Projekt na zaliczenie BD</p><p>Wszelkie prawa zastrzeżone</p>

        </div>
    </body>
</html>