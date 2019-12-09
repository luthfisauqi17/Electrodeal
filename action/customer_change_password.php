<?php
    if(isset($_GET["new_password"])) {
        include("../config/db_connect.php");
        $username = $_GET["username"];
        $new_password = $_GET["new_password"];

        $sql = "UPDATE ed_customers SET customer_password='$new_password' WHERE customer_username='$username'";
        
        if (mysqli_query($conn, $sql)) echo "New record created successfully";
        else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
        header("Location: ../admin_inv_view.php");
    }
?>