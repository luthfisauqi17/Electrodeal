<?php
    if(isset($_GET["customer_username"])) {
        include("../config/db_connect.php");
        $customer_username = $_GET["customer_username"];
        $customer_email = $_GET["customer_email"];
        $customer_phone = $_GET["customer_phone"];
        $customer_password = $_GET["customer_password"];

        $sql = "INSERT INTO ed_customers(customer_username, customer_email, customer_phone, customer_password)
        VALUES('$customer_username', '$customer_email', '$customer_phone', '$customer_password')";
        
        if (mysqli_query($conn, $sql)) echo "New record created successfully";
        else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
        header("Location: ../admin_inv_view.php");
    }
?>