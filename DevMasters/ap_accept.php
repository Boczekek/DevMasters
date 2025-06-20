<?PHP
include 'dbconfig.php';
$id = $_POST['id'];
$userid = $_POST['userid'];
$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia z BD: " . $conn->connect_error);
}

$zapytanie = "DELETE FROM zgloszenia WHERE `id` = $id;";
$zapytanie2 = "UPDATE `users` SET `status_zgloszenia` = '2', `ranga` = '2' WHERE `id` = $userid;";
            
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
?>