<?PHP
    include 'dbconfig.php';

    session_start();

    $tytul = $_POST['tytul'];
    $opis = $_POST['opis'];
    $tagi = $_POST['jezyki'];
    $user_id = $_SESSION['id'];

    $conn = new mysqli($server, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    $zapytanie = "INSERT INTO `zgloszenia` (`id`, `user_id`, `tytul`, `opis`, `tagi`) VALUES (NULL, '$user_id', '$tytul', '$opis', '$tagi');";
    $zapytanie2 = "UPDATE `users` SET `status_zgloszenia` = '1' WHERE `id` = $user_id;";


    $result = $conn->query($zapytanie);
    $result = $conn->query($zapytanie2);

    $zapytanie3 = "SELECT * FROM users WHERE id='$user_id'";

    $result = $conn->query($zapytanie3);

    if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $_SESSION['login'] = $row['login'];
        $_SESSION['haslo'] = $row['haslo'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['ranga'] = $row['ranga'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['status_zgloszenia'] = $row['status_zgloszenia'];
    }
};

    $conn->close();

    echo "<p>Przesłano zgłoszenie!</p>";
?>