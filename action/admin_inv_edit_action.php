<?php
    if(isset($_GET["item_id"])) {
        include("../config/db_connect.php");
        $item_id = $_GET["item_id"];
        $item_name = $_GET["item_name"];
        $item_desc = $_GET["item_desc"];
        $item_price = $_GET["item_price"];
        $item_in_hand = $_GET["item_in_hand"];
        $item_trend = $_GET["item_trend"];
        $item_capt = $_GET["item_capt"];
        $sql_update =  
                    "UPDATE ed_items 
                    SET item_name='$item_name', item_desc='$item_desc', item_price='$item_price', item_in_hand='$item_in_hand', item_trend='$item_trend', item_capt='$item_capt'
                    WHERE item_id='$item_id'";
        
        if (mysqli_query($conn, $sql_update)) echo "New record updated successfully";
        else echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
        header("Location: ../admin_inv_view.php");
    }
?>