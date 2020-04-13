<?php 
if (!isset($_SESSION['Blog_ID']) || $_SESSION['Blog_ID']==0) {
    $sql = "SELECT Blog_ID FROM blog WHERE Titel = '$_Titel'";
    $result = mysqli_query($conn, $sql);  
    $_SESSION['Blog_ID'] = $result->fetch_all()[0][0];
}
?>