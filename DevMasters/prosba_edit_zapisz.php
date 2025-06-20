<?php
    include 'dbconfig.php';

    $tytul = $_POST['tytul'];
    $opis = $_POST['opis'];
    $tagi = $_POST['jezyki'];
    $id = $_POST['id'];

    $conn = new mysqli($server, $user, $password, $dbname); 
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    $zapytanie = "UPDATE `zlecenia` SET `tytul` = '$tytul', `opis` = '$opis', `tagi` = '$tagi' WHERE `zlecenia`.`id` = $id;";

   
    $result = $conn->query($zapytanie);

    $conn->close();

    ?>
