<?php
include 'db_connect.php';

session_start();
// prepare and bind
if (!isset($_GET['id']) || $_GET['id']==0){
    $stmt = $conn->prepare("INSERT INTO `blog` (`Blog_ID`, `Titel`, `Text`, `Vorschau`, `Status`) VALUES (Null, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_Titel, $_Text, $_Vorschau, $_Status);

    // set parameters and execute
    $_Titel = $_POST['titel'];
    $_Text = $_POST['text'];
    $_Status = $_POST['status'];
    $_Vorschau = $_POST['vorschau'];
    
} else {
    $stmt = $conn->prepare("UPDATE `blog` SET `Titel` = ?, `Text` = ?, `Vorschau` = ?, `Status` = ? WHERE `blog`.`Blog_ID` = ?;");
    $stmt->bind_param("sssii", $_Titel, $_Text, $_Vorschau, $_Status, $_Blog_ID);

    $_Titel = $_POST['titel'];
    $_Text = $_POST['text'];
    $_Status = $_POST['status'];
    $_Blog_ID = $_GET['id'];
    $_Vorschau = $_POST['vorschau'];
}


$stmt->execute();

$stmt->close();

include 'db_select_blog_id.php';
include 'db_select_status.php';
echo $conn->error;
include "db_disconnect.php";

?>