<?PHP

$login = $_POST['login'];
$haslo = SHA1($_POST['haslo']);


include 'dbconfig.php';

session_start();

$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia z BD: " . $conn->connect_error);
}

$zapytanie = "SELECT users.id, users.login, users.haslo, users.ranga, users.email, users.status_zgloszenia, rangi.nazwa AS 'nazwa_rangi' FROM users INNER JOIN rangi ON users.ranga = rangi.id WHERE login='$login' AND haslo='$haslo'";

$result = $conn->query($zapytanie);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $_SESSION['login'] = $row['login'];
        $_SESSION['haslo'] = $row['haslo'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['ranga'] = $row['ranga'];
        $_SESSION['nazwa_rangi'] = $row['nazwa_rangi'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['status_zgloszenia'] = $row['status_zgloszenia'];
    }
} else {
    echo "0 results";
}



$conn->close();

if(isset($_SESSION['login'])){
    echo "Witaj ".$_SESSION['login']."<br>";
    echo "<a href='index.php'>Powrót do strony głównej</a><br>";
};

if($_SESSION['ranga']==0){
    echo "Konto nie jest w pełni aktywne<br>";
}

header('Location: index.php');
?>