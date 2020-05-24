<?php 
require('db_connect.php');

$result = $conn->query("select status from login_user where email = '". $_SESSION['user'] ."'");  
if ($result->fetch_row()[0] == 3 || $result->fetch_row()[0] == 2){
    
}
require('db_disconnect.php');
?>