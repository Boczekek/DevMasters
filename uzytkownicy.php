<script>
$(document).ready(function(){
    $("#myForm").submit(function(event){
        event.preventDefault();

        $.ajax({
            url: "dodaj_klienta.php",
            type: "POST",
            data: $("#myForm").serialize(),
            cache: false,
            success: function (response) {
                $("#myTable").append(response);
                console.log(response);
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
                    echo "<td><a class='del' href='user_del.php?id=".$row["id"]."'> Usuń </a>";
                    echo "|";
                    echo "<a class='edit' href='editklient.php?id=".$row["id"]."'> Edytuj </a></td>";
                }
                else if(isset($_SESSION['login']) && $_SESSION['ranga']==3) echo "<td>Brak uprawnień</td>";

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