<?php
    if(isset($_GET["username"])) {
        include("../config/db_connect.php");
        $username = $_GET["username"];
        $item_id = $_GET["item_id"];

        $sql = "INSERT INTO ed_carts(cart_item_id, cart_customer_username) VALUES('$item_id', '$username')";

        if (mysqli_query($conn, $sql)) echo "New record created successfully";
        else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
        header("Location: ../item_detail.php?details=" . $item_id);
    }
?>