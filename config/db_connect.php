<?php
    $conn = mysqli_connect("localhost", "root", "", "electrodeal");
    if(!$conn) {
        echo "Connection error " . mysqli_connect_error($conn); 
    }
?>