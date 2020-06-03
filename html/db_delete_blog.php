<?php 
    require('db_connect.php');
    echo print_r($_POST);

    $conn->query("DELETE FROM blog WHERE Blog_ID = " . $_POST['id']);

    require('db_disconnect.php');
?>