<?php
    include 'db_connect.php';

    $token = $_GET['token'];
    //Token aus der Datenbank holen
    $conn->query("UPDATE `login_user` SET `status` = '0' WHERE Token = '$token'");    
    $conn->query("UPDATE `login_user` SET `Token` = NULL WHERE Token = '$token'");
    include 'db_disconnect.php';
    
    header("Location: login.php");
?>