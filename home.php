<h1>Home</h1>
<div class="grid">
    <?PHP
    include 'dbconfig.php';
    session_start();

    $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

    if(!isset($_SESSION['login'])){
    ?>
    <div class="okno witaj">
        <div class="content">
            <h1>Witaj!</h1>
            <h3>Dołącz do unikalnej społeczności dla pasjonatów oprogramowania!</h3>
            <p>Zarejestruj się aby dołączyć do dyskusji, składać prośby o napisanie kodu lub aby aplikować jako developer.</p>
            <button onclick="location.href='register.html'" class="baton register" type="button">Zarejestruj się</button>
        </div>
        <img src="images/icon.png" alt="logo" class="logo">
    </div>
    <?PHP }
    else{
        $user_id = $_SESSION['id'];

        $zapytanie = "SELECT users.id, users.login, users.haslo, users.ranga, users.email, users.status_zgloszenia, rangi.nazwa AS 'nazwa_rangi' FROM users INNER JOIN rangi ON users.ranga = rangi.id WHERE users.id='$user_id'";

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
        };
    };
    if(isset($_SESSION['login'])){
    ?>
    <div class="okno">
        <h1>Witaj ponownie <?PHP echo "<span class='" . $_SESSION['nazwa_rangi']. "'>" . $_SESSION['login'] . "</span>";?></h1>
        <h3>Miło cię znowu widzieć!</h3>
    </div>
    <?PHP };
    if(isset($_SESSION['login']) && $_SESSION['ranga']<2 && $_SESSION['status_zgloszenia']==0){
    ?>
    <div class="okno developer">
        <h1>Dołącz do grona developerów!</h1>
        <p>Jako zweryfikowany developer możesz wykonywać zlecenia na napisanie kodu i zbierać za to punkty. Przekonaj nas w formularzu, że jesteś dobrym developerem i pomagaj innym.</p>
        <button id="aplikuj" class="baton gradient aplikuj" type="button">Zostań developerem</button>
    </div>
    <?PHP
    }
    else if(!isset($_SESSION['login'])){
    ?>
    <div class="okno developer">
        <h1>Dołącz do grona developerów!</h1>
        <p>Jako zweryfikowany developer możesz wykonywać zlecenia na napisanie kodu i zbierać za to punkty. Przekonaj nas w formularzu, że jesteś dobrym developerem i pomagaj innym.</p>
        <button onclick="location.href='login.html'" class="baton gradient aplikuj" type="button">Zostań developerem</button>
    </div>
    <?PHP };
    ?>
    <div class="okno center">
        <h1>Tylu mamy developerów:</h1>
        <p class="large Developer"><?PHP
        $zapytanie3 = "SELECT COUNT(id) AS 'liczbaD' FROM users WHERE ranga = '2'";
        $result = $conn->query($zapytanie3);
        while ($row = $result->fetch_assoc()) {
        $liczbaD = $row['liczbaD'];
        echo $liczbaD;
        }?></p>
    </div>
    <div class="okno center">
        <h1>Tylu nas jest łącznie:</h1>
        <p class="large Użytkownik"><?PHP
        $zapytanie2 = "SELECT COUNT(id) AS 'liczbaU' FROM users";
        $result = $conn->query($zapytanie2);
        while ($row = $result->fetch_assoc()) {
        $liczbaU = $row['liczbaU'];
        echo $liczbaU;
        }?></p>
    </div>
    <div class="okno center">
        <h1>Tyle mamy zleceń:</h1>
        <p class="large Moderator"><?PHP
        $zapytanie4 = "SELECT COUNT(id) AS 'liczbaZ' FROM zlecenia";
        $result = $conn->query($zapytanie4);
        while ($row = $result->fetch_assoc()) {
        $liczbaZ = $row['liczbaZ'];
        echo $liczbaZ;
        }?></p>
    </div>

<script>
    $(document).ready(function () {
    
    $("#aplikuj").click(function () {
        $("#main").load("aplikuj.html");
    });

}); 
</script>
