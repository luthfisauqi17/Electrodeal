<?php
    if(isset($_GET['delete'])) {
        include("config/db_connect.php");
        $itm_id = $_GET['delete'];
        $sql_delete = "DELETE FROM ed_items WHERE item_id='$itm_id'";
        mysqli_query($conn, $sql_delete);
        mysqli_close($conn);
    }
    $row_count = 1;
    include("config/db_connect.php");
    $sql = "SELECT * FROM ed_items, ed_brands, ed_types WHERE ed_items.item_brand_id = ed_brands.brand_id AND ed_items.item_type_id = ed_types.type_id";
    $result = mysqli_query($conn, $sql);
    $sql_worth = "SELECT * FROM ed_items";
    $result_worth = mysqli_query($conn, $sql_worth);
    mysqli_close($conn);
?>

<?php include("admin_template/header.php"); ?>

    <h2 class="title">Inventory Information</h2>

    <div class="items-info-box">
        <div class="inv_worth">
            <?php 
                $worth_value = 0;
                $worth_total_item = 0;
                while($row_worth = mysqli_fetch_assoc($result_worth)) {
                    $worth_value += $row_worth["item_price"] * $row_worth["item_in_hand"];
                    $worth_total_item += $row_worth["item_in_hand"];
                }
                echo "<h3>Total Inventory Value:</h3>";
                echo "<h3 class='inv_value'>Rp." . $worth_value . "</h3>";
            ?>
        </div>

        <div class="inv_worth">
            <?php
                echo "<h3>Total Inventory Items:</h3>";
                echo "<h3 class='inv_value'>" . $worth_total_item . " Item/s</h3>";
            ?>
        </div>
    </div>

    <div class="table">
        <table>
            <tr>
                <td><h4>index</h4></td>
                <td><h4>Id</h4></td>
                <td><h4>Name</h4></td>
                <td><h4>Price</h4></td>
                <td><h4>Quantity</h4></td>
                <td><h4>Sold</h4></td>
                <td><h4>Brand</h4></td>
                <td><h4>Type</h4></td>
                <td><h4>Trend</h4></td>
                <td><h4>Actions</h4></td>
            </tr>
            <?php 
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row_count % 2 == 1) echo "<tr style='background-color: lightgray;'>";
                    else echo "<tr>";
                    echo "<td>" . $row_count++ . "</td>";
                    echo "<td>" . $row["item_id"] . "</td>";
                    echo "<td>" . $row["item_name"] . "</td>";
                    echo "<td>Rp." . $row["item_price"] . "</td>";
                    echo "<td>" . $row["item_in_hand"] . "</td>";
                    echo "<td>" . $row["item_sold"] . "</td>";
                    echo "<td>" . $row["brand_name"] . "</td>";
                    echo "<td>" . $row["type_name"] . "</td>";
                    echo "<td>" . $row["item_trend"] . "</td>";
                    ?>
                    <td><a href="admin_inv_edit.php?edit=<?= $row['item_id'] ?>"><img class='icon' src='static/icon/edit.png'></a> 
                        <a onclick="return confirm('Do you want to delete this record?')" href="admin_inv_view.php?delete=<?= $row['item_id'] ?>"><img class='icon' src='static/icon/eraser.png'></a></td>
                    </tr>
                <?php 
                }
                } else {
                    echo "0 results";
                }
            ?>
        </table>
        <a href="admin_inv_add.php"><img class="icon" src="static/icon/plus.png" alt="">Add New Item</a>
    </div>

<?php include("admin_template/footer.php"); ?>