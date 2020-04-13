<?php
include 'db_connect.php';

if (isset($_SESSION['Blog_ID'])) {
    $Blog_ID = $_SESSION['Blog_ID'];
} else {
    $Blog_ID = 0;
}
$sql = "select titel, text from blog where Blog_ID = $Blog_ID";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$titel = str_replace('contenteditable="false"', 'contenteditable="true"', $row['titel']);
$text = str_replace('contenteditable="false"', 'contenteditable="true"', $row['text']);
include 'db_disconnect.php';
?>