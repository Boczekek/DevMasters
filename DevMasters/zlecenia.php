<h1>Zlecenia na oprogramowanie</h1>
<div class="grid">
    <?php
        include 'dbconfig.php';
        session_start();
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }
        $user_id = $_SESSION['id'];
        $zapytanie = "SELECT zlecenia.tytul, zlecenia.opis, zlecenia.tagi, users.login, users.email FROM zlecenia INNER JOIN users ON zlecenia.user_id = users.id WHERE zlecenia.user_id != '$user_id';";

        $result = $conn->query($zapytanie);

        if(isset($_SESSION['login'])){
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        $opis = $row["opis"];
                        echo "<div class='okno big'>";
                        echo "<p class='smol'>Zlecenie użytkownika: <b>".$row["login"]."</b><br>Email: <b>".$row["email"]."</b></p>";
                        echo "<h3>".$row["tytul"]."</h3>";
                        echo "<p>".nl2br(htmlspecialchars($opis))."</p>";
                        echo "<p class='smol'>Tagi: ".$row["tagi"]."</p>";
                        echo "</div>";
                }
            }
            else{
                echo "<div class='okno'><p>Brak zleceń</p></div>";
            }
        };

        $conn->close();
        ?>
</div>