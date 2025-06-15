<script>
$(document).ready(function(){
    $("#myTable").on("click", ".del", function(event){
        event.preventDefault();

        if (!confirm("Czy na pewno chcesz usunąć tego użytkownika?")) return;

        var button = $(this);
        var userId = button.data("id");

        $.ajax({
            url: "user_del.php",
            type: "POST",
            data: { id: userId },
            success: function (response) {
                button.closest("tr").remove();
            },
            error: function () {
                alert("Wystąpił błąd podczas usuwania użytkownika.");
            }
        });
    });
});
</script>

<div class="center">
    <h1>Użytkownicy</h1>
    <table id="myTable">
        <?php
        include 'dbconfig.php';
        session_start();
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT users.id, users.login, users.email, users.ranga, rangi.nazwa AS ranga_nazwa FROM users INNER JOIN rangi ON users.ranga = rangi.id ORDER BY users.ranga DESC;";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
            echo
            "<thead>
                <tr>
                    <th>Lp.</th>
                    <th>Login</th>
                    <th>Ranga</th>"; if(isset($_SESSION['login']) && $_SESSION['ranga']>2){echo "
                    <th>Akcja</th>"; }; echo
                "</tr>
            </thead>
            <tbody>";
            $licznik = 1;
            while ($row = $result->fetch_assoc()) {
                $ranga = $row["ranga_nazwa"];
                echo "<tr><td>" . $licznik++ . "</td><td>" . $row["login"] . "</td><td class='$ranga'>" . $row["ranga_nazwa"] . "</td>";

                if(isset($_SESSION['login']) && $_SESSION['ranga']>2 && $row["ranga"]<$_SESSION['ranga']){
                    echo "<td class='center'><a href='#' class='del' data-id='".$row["id"]."'>Usuń</a></td>";
                }
                else if(isset($_SESSION['login']) && $_SESSION['ranga']==3) echo "<td class='center gray'>Brak uprawnień</td>";
                else if(isset($_SESSION['login']) && $_SESSION['ranga']==4) echo "<td></td>";

                echo "</tr>\n";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </tbody>
</table>
</div>