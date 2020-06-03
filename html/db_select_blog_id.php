<?php 
if (!isset($_GET['id']) || $_GET['id']==0) {
    $sql = "SELECT Blog_ID FROM blog WHERE Titel = '$_Titel'";
    $result = mysqli_query($conn, $sql);
    $_GET['id'] = $result->fetch_all()[0][0];
}
?>