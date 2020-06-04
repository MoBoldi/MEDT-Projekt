<?php
    require('db_connect.php');
    session_start();
    $conn->query("delete from login_user where email = '" . $_SESSION['user'] ."'");
    require('db_disconnect.php');
    require('logoff.php');
?>