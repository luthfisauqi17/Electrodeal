<?php
    if(isset($_GET["item_name"])) {
        include("../config/db_connect.php");
        $item_name = $_GET["item_name"];
        $item_desc = $_GET["item_desc"];
        $item_price = $_GET["item_price"];
        $item_in_hand = $_GET["item_in_hand"];
        $item_brand_id = $_GET["item_brand_id"];
        $item_type_id = $_GET["item_type_id"];
        $item_pic = "-";
        $item_trend = $_GET["item_trend"];
        $item_capt = $_GET["item_capt"];
        $item_bg_color = $_GET["item_bg_color"];
        $item_sold = 0;

        $sql = "INSERT INTO ed_items(item_name, item_desc, item_price, item_in_hand, item_sold, item_pic, item_trend, item_capt, item_bg_color, item_brand_id, item_type_id)
        VALUES('$item_name', '$item_desc', '$item_price', '$item_in_hand', '$item_sold', '$item_pic', '$item_trend', '$item_capt', '$item_bg_color', '$item_brand_id', '$item_type_id')";
        
        if (mysqli_query($conn, $sql)) echo "New record created successfully";
        else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
        header("Location: ../admin_inv_view.php");
    }
?>