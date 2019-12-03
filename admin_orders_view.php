<?php
    $row_count = 1;
    include("config/db_connect.php");
    $sql = "SELECT * FROM ed_orders";
    $result = mysqli_query($conn, $sql);
    $sql_map = "SELECT * FROM ed_orders";
    $result_map = mysqli_query($conn, $sql_map);
    mysqli_close($conn);
?>

<?php include("admin_template/header.php"); ?>

<div id="map"></div>

<?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p>Order Id: " . $row["order_id"] . "</p>";
            echo "<p>Order Username: " . $row["order_username"] . "</p>";
            echo "<p>Order Email: " . $row["order_email"] . "</p>";
            echo "<p>Order Phone Number: " . $row["order_phone_number"] . "</p>";
            echo "<p>Order Item Id: " . $row["order_item_id"] . "</p>";
            echo "<p>Order Date: " . $row["order_date"] . "</p>";
            echo "<p>Order Amount: " . $row["order_amount"] . "</p>";
            echo "<p>Order Total Price: " . $row["order_total_price"] . "</p>";
            echo "<p>Order Address: " . $row["order_address"] . "</p>";
            echo "<p>Order Geo Lat: " . $row["order_geo_lat"] . "</p>";
            echo "<p>Order Geo Lon: " . $row["order_geo_lon"] . "</p>";
            echo "<p>Order Message: " . $row["order_message"] . "</p>";
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
            }
        }
    ?>
</script>