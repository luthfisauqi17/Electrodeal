<?php

    $order_id = '';
    $order_item_id = '';
    $item_price = '';
    $order_username = '';
    $order_email = '';
    $order_phone_number = '';
    $order_amount = '';
    $order_address = '';
    $order_message = '';
    $order_geo_lat = '';
    $order_geo_lon = '';
    $order_total_price = '';
    $order_date = '';

    $available_amount = '';
    $item_sold = '';

    if(isset($_GET["confirm"])) {
        include("../config/db_connect.php");
        $order_id = $_GET["confirm"];
        $sql = "SELECT * FROM ed_orders, ed_items WHERE order_item_id = item_id AND order_id = $order_id";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        
        $order_username = $row["order_username"];
        $order_email = $row["order_email"];
        $order_phone_number = $row["order_phone_number"];
        $order_item_id = $row["order_item_id"];
        $order_date = $row["order_date"];
        $order_amount = $row["order_amount"];
        $order_total_price = $row["order_total_price"];
        $order_address = $row["order_address"];
        $order_geo_lat = $row["order_geo_lat"];
        $order_geo_lon = $row["order_geo_lon"];
        $order_message = $row["order_message"];

        $available_amount = $row["item_in_hand"];
        $item_sold = $row["item_sold"];

        $updated_available_amount  = $available_amount - $order_amount;
        $updated_item_sold = $item_sold + $order_amount;

        $trans_date = date("Y-m-d");
        $sql_trans_add = 
        "INSERT INTO ed_trans(trans_order_id, trans_order_username, trans_order_email, trans_order_phone_number, trans_order_item_id, trans_order_date, trans_order_amount, trans_total_price , trans_order_address, trans_geo_lat, trans_geo_lon, trans_order_message, trans_date)
        VALUES('$order_id', '$order_username', '$order_email', '$order_phone_number', '$order_item_id' , '$order_date', '$order_amount', '$order_total_price' ,'$order_address' ,'$order_geo_lat', '$order_geo_lon', '$order_message' ,'$trans_date');";
        
        if (mysqli_query($conn, $sql_trans_add)) echo "New record created successfully";
        else echo "Error: " . $sql_trans_add . "<br>" . mysqli_error($conn);

        $sql_order_remove = "DELETE FROM ed_orders WHERE order_id='$order_id'";
        if (mysqli_query($conn, $sql_order_remove)) echo "Order List Updated";
        else echo "Error: " . $sql_order_remove . "<br>" . mysqli_error($conn);

        $sql_update_item = "UPDATE ed_items SET item_in_hand='$updated_available_amount', item_sold='$updated_item_sold' WHERE item_id='$order_item_id'";
        if (mysqli_query($conn, $sql_update_item)) echo "Order List Updated";
        else echo "Error: " . $sql_update_item . "<br>" . mysqli_error($conn);
        
        header("Location: ../admin_orders_view.php?success");
        mysqli_close($conn);
    }
?>