<?PHP
    include 'dbconfig.php';

    $email = $_POST['email'];
    $login = $_POST['login'];
    $haslo = SHA1($_POST['haslo']);

    $conn = new mysqli($server, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    $zapytanie = "INSERT INTO `users` (`email`, `login`, `haslo`) VALUES ('$email', '$login', '$haslo');";


    $result = $conn->query($zapytanie);

    $conn->close();
    echo "<tr><td></td><td>$email</td><td>$login</td><td>$haslo</td></tr>";
?>