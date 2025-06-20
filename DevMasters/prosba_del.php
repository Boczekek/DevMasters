<?PHP
include 'dbconfig.php';
$id = $_POST['id'];
$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia z BD: " . $conn->connect_error);
}

$zapytanie = "DELETE FROM zlecenia WHERE `id` = $id";
            
$result = $conn->query($zapytanie);

$conn->close();
?>