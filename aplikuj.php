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

    $zapytanie = "INSERT INTO `zgloszenia` (`id`, `user_id`, `tytul`, `opis`, `tagi`) VALUES (NULL, '$user_id', '$tytul', '$opis', '$tagi');
    UPDATE `users` SET `status_zgloszenia` = '1' WHERE `id` = $user_id;";


    $result = $conn->query($zapytanie);

    $conn->close();

    echo "<p>Przesłano zgłoszenie!</p>";
?>