<div class="center">
        <h2>Twoje prośby</h3>
    <div class="okno">
        <?PHP
            session_start();
            if(isset($_SESSION['login'])){
        ?>
        <div class="center">
            <h3>Poproś o napisanie kodu</h3><br>
            <button type="button" id="utworz" class="baton gradient" >Utwórz prośbę</button>
        </div>
        <?PHP
        } 
        else{
        ?>
        <div class="center">
            <h3>Aby utworzyć prośbę o napisanie kodu musisz się zalogować</h3><br>
            <button type="button" onclick="location.href='login.html'" class="baton gradient" >Zaloguj się</button>
        </div>
        <?PHP };
        ?>
    </div>
    <?php
        include 'dbconfig.php';
        if(isset($_SESSION['login'])){
            $conn = new mysqli($server, $user, $password, $dbname);
            if ($conn->connect_error) {
                die("Błąd połączenia z BD: " . $conn->connect_error);
            }
            $user_id = $_SESSION['id'];
            $zapytanie = "SELECT * FROM zlecenia WHERE user_id = '$user_id';";

            $result = $conn->query($zapytanie);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        $opis = $row["opis"];
                        if (strlen($opis) > 500)
                            $opis = substr($opis, 0, 500) . '...';

                        echo "<div class='okno'>";
                        echo "<h3>".$row["tytul"]."</h3>";
                        echo "<p>".nl2br(htmlspecialchars($opis))."</p>";
                        echo "<p class='smol'>Tagi: ".$row["tagi"]."</p><br>";
                        echo "<button type='button' class='baton outline edit' data-id='".$row["id"]."'>Edytuj</button>";
                        echo "<button type='button' class='baton outline del' data-id='".$row["id"]."'>Usuń</button>";
                        echo "</div>";
                }
            }
            $conn->close();
        };
        ?>
</div>

<script>
    $(document).ready(function () {
    
        $(".edit").click(function () {
            const id = $(this).data("id");
            $("#main").load("prosba_edit.php?id=" + id);
        });        

        $("#utworz").click(function () {
            $("#main").load("prosba.html");
        });

    }); 
</script>
<script>
$(document).ready(function(){
    $(".del").click(function (event) {
        event.preventDefault();

        if (!confirm("Czy na pewno chcesz usunąć tą prośbę?")) return;

        var button = $(this);
        var userId = button.data("id");

        $.ajax({
            url: "prosba_del.php",
            type: "POST",
            data: { id: userId },
            success: function (response) {
                button.closest("div").remove();
            },
            error: function () {
                alert("Wystąpił błąd podczas usuwania prośby.");
            }
        });
    });
});
</script>