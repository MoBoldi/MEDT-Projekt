<?php 
    $sql = "SELECT Status FROM blog WHERE Titel = '$_Titel'";
    $result = mysqli_query($conn, $sql);  
    $_SESSION['Status'] = $result->fetch_all()[0][0];
?>