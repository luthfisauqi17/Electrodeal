<?php
    $row_count = 1;
    include("config/db_connect.php");
    $sql = "SELECT * FROM ed_trans, ed_items WHERE trans_order_item_id = item_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>

<?php include("admin_template/header.php"); ?>

<div style="margin:1rem;"><h1>Orders History </h1><small>(<?php echo mysqli_num_rows($result) ?> history found)</small></div>

<?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='order_body'>";
            echo "<div class='order_content'>";
            echo "<h3>Order Id: " . $row["trans_order_id"] . "#</h3>";
            echo "<p><strong>Order Item Id: " . $row["trans_order_item_id"] . "</strong></p>";
            echo "<p><strong>Order Item Name: " . $row["item_name"] . "</strong></p>";
            echo "<p><strong>Order Amount: " . $row["trans_order_amount"] . " Item/s</strong></p>";
            echo "<p>Order Username: " . $row["trans_order_username"] . "</p>";
            echo "<p>Order Email: " . $row["trans_order_email"] . "</p>";
            echo "<p>Order Phone Number: " . $row["trans_order_phone_number"] . "</p>";
            echo "<p>Order Date: " . $row["trans_order_date"] . "</p>";
            echo "<p>Order Total Price: " . $row["trans_total_price"] . "</p>";
            echo "<p>Order Address: " . $row["trans_order_address"] . "</p>";
            echo "<p>Order Geo Lat: " . $row["trans_geo_lat"] . "</p>";
            echo "<p>Order Geo Lon: " . $row["trans_geo_lon"] . "</p>";
            echo "<p>Order Message: " . $row["trans_order_message"] . "</p>";
            echo "<br/>";
            echo "<strong>Available item quantity: " . $row["item_in_hand"] . " Item/s</strong>"; 
            echo "</div>";
            echo "<div class='order_confirmation'>";
            echo "<p>Confirmation date: <strong>" . $row["trans_date"] . "</strong></p>";
            echo "</div>";
            echo "</div>";
            echo "</br>";
        }
    }
?>

<?php include("admin_template/footer.php"); ?>