<?php
    if(isset($_GET["order_item_id"])) {
        include("../config/db_connect.php");
        $order_item_id = $_GET["order_item_id"];
        $item_price = $_GET["item_price"];
        $order_username = $_GET["order_username"];
        $order_email = $_GET["order_email"];
        $order_phone_number = $_GET["order_phone_number"];
        $order_amount = $_GET["order_amount"];
        $order_address = $_GET["order_address"];
        $order_message = $_GET["order_message"];
        $order_geo_lat = $_GET["order_geo_lat"];
        $order_geo_lon = $_GET["order_geo_lon"];
        $order_total_price = $order_amount * $item_price;
        $order_date = date("Y-m-d");

        $sql = "INSERT INTO ed_orders(order_item_id, order_username, order_email, order_phone_number, order_amount, order_address, order_message, order_geo_lat, order_geo_lon, order_total_price, order_date)
        VALUES('$order_item_id', '$order_username', '$order_email', '$order_phone_number', '$order_amount', '$order_address', '$order_message', '$order_geo_lat', '$order_geo_lon', '$order_total_price', '$order_date')";
        
        if (mysqli_query($conn, $sql)) echo "New record created successfully";
        else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
    }
?>