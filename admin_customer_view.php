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
    $sql = "SELECT * FROM ed_customers";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>

<?php include("admin_template/header.php"); ?>

    <h2 class="title">Customer Information</h2>

    <div class="table">
        <table>
            <tr>
                <td><h4>index</h4></td>
                <td><h4>Username</h4></td>
                <td><h4>Password</h4></td>
                <td><h4>Picture Location</h4></td>
            </tr>
            <?php 
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row_count % 2 == 1) echo "<tr style='background-color: lightgray;'>";
                    else echo "<tr>";
                    echo "<td>" . $row_count++ . "</td>";
                    echo "<td>" . $row["customer_username"] . "</td>";
                    echo "<td>" . $row["customer_password"] . "</td>";
                    echo "<td>" . $row["customer_pic"] . "</td>";
                    ?>
                    <td><a onclick="return confirm('Do you want to delete this record?')" href="admin_inv_view.php?delete=<?= $row['item_id'] ?>"><img class='icon' src='static/icon/eraser.png'></a></td>
                    </tr>
                <?php 
                }
                } else {
                    echo "0 results";
                }
            ?>
        </table>
    </div>

<?php include("admin_template/footer.php"); ?>