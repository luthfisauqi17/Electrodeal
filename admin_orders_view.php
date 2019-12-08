<?php
    if(isset($_GET['delete'])) {
        include("config/db_connect.php");
        $ord_id = $_GET['delete'];
        $sql_delete = "DELETE FROM ed_orders WHERE order_id='$ord_id'";
        mysqli_query($conn, $sql_delete);
        mysqli_close($conn);
    }

    $row_count = 1;
    include("config/db_connect.php");
    $sql = "SELECT * FROM ed_orders, ed_items WHERE order_item_id = item_id";
    $result = mysqli_query($conn, $sql);
    $sql_map = "SELECT * FROM ed_orders";
    $result_map = mysqli_query($conn, $sql_map);
    mysqli_close($conn);
?>

<?php include("admin_template/header.php"); ?>

<?php if(isset($_GET["success"])) {
    echo "<div style='background-color: lightgreen;'><p style='color: white;'>Confirmation Success!</p></div>";
} ?>

<?php if(isset($_GET["delete"])) {
    echo "<div style='background-color: red;'><p style='color: white;'>Order " . $_GET["delete"] . "# Canceled</p></div>";
} ?>

<div id="map"></div>

<div style="margin:1rem;"><h1>Orders List </h1>
<?php
    if(mysqli_num_rows($result) > 1) echo "<small>" . mysqli_num_rows($result) . " Orders found </small>";
    else echo "<small>" . mysqli_num_rows($result) . " Order found </small>";
?>
</div>

<?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='order_body'>";
            echo "<div class='order_content'>";
            echo "<h3>Order Id: " . $row["order_id"] . "#</h3>";
            echo "<p><strong>Order Item Id: " . $row["order_item_id"] . "</strong></p>";
            echo "<p><strong>Order Item Name: " . $row["item_name"] . "</strong></p>";
            echo "<p><strong>Order Amount: " . $row["order_amount"] . " Item/s</strong></p>";
            echo "<p>Order Username: " . $row["order_username"] . "</p>";
            echo "<p>Order Email: " . $row["order_email"] . "</p>";
            echo "<p>Order Phone Number: " . $row["order_phone_number"] . "</p>";
            echo "<p>Order Date: " . $row["order_date"] . "</p>";
            echo "<p>Order Total Price: " . $row["order_total_price"] . "</p>";
            echo "<p>Order Address: " . $row["order_address"] . "</p>";
            echo "<p>Order Geo Lat: " . $row["order_geo_lat"] . "</p>";
            echo "<p>Order Geo Lon: " . $row["order_geo_lon"] . "</p>";
            echo "<p>Order Message: " . $row["order_message"] . "</p>";
            echo "<br/>";
            echo "<strong>Available item quantity: " . $row["item_in_hand"] . " Item/s</strong>"; 
            echo "</div>";
            echo "<div class='order_confirmation'>";
            ?>
            <a href="action/admin_orders_confirm.php?confirm=<?= $row['order_id'] ?>">
                <?php
                    if($row["item_in_hand"] < $row["order_amount"])echo "<button style='display:none'; class='confirm_btn' disabled>Confirm Order</button>";
                    else echo "<button class='confirm_btn'>Confirm Order</button>";
                ?>
            </a>
            <a href="admin_orders_view.php?delete=<?= $row['order_id'] ?>"><button onclick="return confirm('Do you want to delete this record?')" class='cancel_btn'>Cancel Order</button></a>
            <?php
            echo "</div>";
            echo "</div>";
            echo "</br>";
        }
    }
?>

    

<?php include("admin_template/footer.php"); ?>

<script>
    var map = L.map("map").setView([0,0],1);
    L.tileLayer("https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=RzhYQ9UVhFJxlxPkeoxP", {
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }).addTo(map);
    <?php
        if (mysqli_num_rows($result_map) > 0) {
            while($row = mysqli_fetch_assoc($result_map)) {
                echo "var marker = L.marker([". $row["order_geo_lat"] .", ". $row["order_geo_lon"] ."]).addTo(map);";
                echo "marker.bindPopup('<h3>Order " . $row["order_id"] . "#</br>Address: " . $row["order_address"] . "');";
            }
        }
    ?>
</script>