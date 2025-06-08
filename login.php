<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/login.css">
        <link rel="shortcut icon" href="images/icon.png">
        <title>DevMasters</title>
    </head>
    <body>
        <div id="header" class="section">
            <a href="index.php"><h1 id="name">&lt;&#47;Dev<b>Masters</b>&gt;</h1></a>
        </div>
        <div id="main" class="section">
            <h1>Zaloguj się</h1>
            <div id="oknologowania">
                <form method="POST" action="login.php">
                    <label for="login">Login:</label>
                    <input type="text" id="login" name="login" placeholder="Wpisz login" autocomplete="off">
                    <label for="haslo">Hasło:</label>
                    <input type="password" id="haslo" name="haslo" placeholder="Wpisz hasło" autocomplete="off">
                    <button type="submit" id="zaloguj" >Zaloguj</button>
                    <button type="button" id="zarejestruj" >Załóż konto</button>
                </form>
            </div>
        </div>
        <div id="footer">
            <p>Krystian Zając</p><p>Projekt na zaliczenie BD</p><p>Wszelkie prawa zastrzeżone</p>
        </div>
    </body>
</html>