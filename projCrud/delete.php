<?php
    include ('dbconnection.php');

    $id = $_GET['id'];
    
    mysqli_query($conn, "delete from items where id='$id'");
    header("Location: index.php");
?>