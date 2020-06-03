<?php 
    session_start();
    require('db_connect.php');
    $result = $conn->query("select id from login_user where email = '" . $_SESSION['user'] . "'");
    $result = $result->fetch_all();
    $text = '<h2 contenteditable="false">Überschrift</h2><p contenteditable="false">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,justo.</p>';
    $conn->query("INSERT INTO blog (Blog_ID, Titel, Text, Vorschau, Status, Autor) VALUES (null, 'Überschrift', '". $text . "', null, 2, ". $result[0][0] . ")");
    require('db_disconnect.php');
?>