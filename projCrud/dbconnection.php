<?php
    $conn = mysqli_connect("localhost", "root", "", "lost_n_found");
    if(mysqli_connect_errno()){
        echo "Connection Failed.".mysqli_connect_errno();
    }
?>