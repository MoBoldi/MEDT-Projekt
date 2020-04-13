<?php
include 'db_connect.php';

session_start();
// prepare and bind
if (!isset($_SESSION['Blog_ID']) || $_SESSION['Blog_ID']==0){
    
    $stmt = $conn->prepare("INSERT INTO `blog` (`Blog_ID`, `Titel`, `Text`, `Status`) VALUES (Null, ?, ?, ?)");
    $stmt->bind_param("sss", $_Titel, $_Text, $_Status);

    // set parameters and execute
    $_Titel = $_POST['titel'];
    $_Text = $_POST['text'];
    $_Status = $_POST['status'];
    
    
} else {
    $stmt = $conn->prepare("UPDATE `blog` SET `Titel` = ?, `Text` = ?, `Status` = ? WHERE `blog`.`Blog_ID` = ?;");
    $stmt->bind_param("ssii", $_Titel, $_Text, $_Status, $_Blog_ID);

    $_Titel = $_POST['titel'];
    $_Text = $_POST['text'];
    $_Status = $_POST['status'];
    $_Blog_ID = $_SESSION['Blog_ID'];
}


$stmt->execute();

$stmt->close();

include 'db_select_blog_id.php';
include 'db_select_status.php';

include "db_disconnect.php";

?>