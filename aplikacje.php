<h1>Zgłoszenia na developera</h1>
<div class="grid1">
    <?php
        include 'dbconfig.php';
        session_start();
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }
        $user_id = $_SESSION['id'];
        $zapytanie = "SELECT zgloszenia.id, zgloszenia.tytul, zgloszenia.opis, zgloszenia.tagi, users.login, users.email FROM zgloszenia INNER JOIN users ON zgloszenia.user_id = users.id WHERE zgloszenia.user_id != '$user_id';";

        $result = $conn->query($zapytanie);

        if(isset($_SESSION['login'])){
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        $opis = $row["opis"];
                        echo "<div class='okno big'>";
                        echo "<h1 class='Użytkownik'><b>".$row["login"]."</b></h1>";
                        echo "<h3>".$row["tytul"]."</h3>";
                        echo "<p>".nl2br(htmlspecialchars($opis))."</p>";
                        echo "<p class='smol'>Opanowane języki: ".$row["tagi"]."</p><br>";
                        echo "<button type='button' class='baton gradient' data-id='".$row["id"]."'>Akceptuj</button>";
                        echo "<button type='button' class='baton outline' data-id='".$row["id"]."'>Odrzuć</button>";
                        echo "</div>";
                }
            }
        };

        $conn->close();
        ?>
</div>