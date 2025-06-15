<?php
        include 'dbconfig.php';
        session_start();
        $id=$_GET['id'];
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT * FROM zlecenia WHERE `zlecenia`.`id` = $id LIMIT 1;";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
           
            while ($row = $result->fetch_assoc()) { 
               
          ?>

<div class="center">
    <h2>Edycja prośby</h2>
    <div class="okno big">
        <form method="POST" action="prosba_edit_zapisz.php" id="myForm">
            <input type="text" name="id" value="<?PHP echo $row['id'];?>" hidden><br>
            <label for="tytul">Tytuł:</label><br>
            <input type="text" id="tytul" name="tytul" placeholder="Ustaw tytuł" autocomplete="off" value="<?PHP echo $row['tytul'];?>"><br><br>
            <label for="opis">Opis:</label><br>
            <textarea id="opis" name="opis" rows="5" cols="100" oninput="auto_grow(this)" placeholder="Opisz dokładnie czego oczekujesz..." wrap="hard" required><?PHP echo $row['opis'];?></textarea><br><br>
            <p>Tagi:</p>
            <input type="checkbox" id="python" name="python" value="Python">
            <label for="python"> Python | </label>
            <input type="checkbox" id="java" name="java" value="Java">
            <label for="java"> Java | </label>
            <input type="checkbox" id="javascript" name="javascript" value="JavaScript">
            <label for="javascript"> JavaScript | </label>
            <input type="checkbox" id="csharp" name="csharp" value="C#">
            <label for="csharp"> C# | </label>
            <input type="checkbox" id="cplus" name="cplus" value="C++">
            <label for="csharp"> C++ | </label>
            <input type="checkbox" id="php" name="php" value="PHP">
            <label for="php"> PHP | </label>
            <input type="checkbox" id="sql" name="sql" value="SQL">
            <label for="sql"> SQL | </label>
            <input type="checkbox" id="swift" name="swift" value="Swift">
            <label for="swift"> Swift | </label>
            <input type="checkbox" id="html" name="html" value="HTML">
            <label for="html"> HTML | </label>
            <input type="checkbox" id="css" name="css" value="CSS">
            <label for="css"> CSS</label><br><br>
            <input type="hidden" name="jezyki" id="jezyki" value="<?PHP echo $row['tagi'];?>">
            <div>
                <button type="submit" class="baton gradient" >Zatwierdź</button>
                <button type="reset" id="reset" class="baton outline" >Resetuj</button>
                <button type="button" id="anuluj" class="baton outline" >Anuluj</button>
            </div>
        </form>
    </div>
</div>

<?PHP
            };
        } else {
            echo "0 results";
        }

        $conn->close();
?>

<script>
    $(document).ready(function () {
    
        $("#anuluj").click(function () {
            const confirmed = confirm("Czy na pewno chcesz anulować?\nWszystkie zmiany zostaną utracone.");
            if (confirmed) {
                $("#main").load("prosby.php");
            }
        });

        });

        $("#reset").click(function (e) {
            const confirmed = confirm("Czy na pewno chcesz zresetować formularz?");
            if (!confirmed) {
                e.preventDefault();
            }
        });

    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
    }

    document.getElementById("myForm").addEventListener("submit", function (e) {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        const selectedLanguages = Array.from(checkboxes).map(cb => cb.value);
        document.getElementById("jezyki").value = selectedLanguages.join(", ");
    });
</script>