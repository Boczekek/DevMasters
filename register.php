<?PHP
    include 'dbconfig.php';

    $email = $_POST['email'];
    $login = $_POST['login'];
    $haslo = SHA1($_POST['haslo']);

    $conn = new mysqli($server, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    $zapytanie = "INSERT INTO `users` (`id`, `login`, `haslo`, `email`, `ranga`) VALUES (NULL, '$login', '$haslo', '$email', '1');";


    $result = $conn->query($zapytanie);

    $conn->close();
    echo "<p>Rejsetracja udana!</p>";

    header('Location: login.html');
?>