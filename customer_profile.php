<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if(isset($_GET['delete_cart'])) {
        include("config/db_connect.php");
        $delete_cart = $_GET['delete_cart'];
        $sql_delete = "DELETE FROM ed_carts WHERE cart_id='$delete_cart'";
        mysqli_query($conn, $sql_delete);
        mysqli_close($conn);
    }

    include "config/db_connect.php";
    $customer_username = $_SESSION["username"];
    $query_profile = "SELECT * FROM ed_customers WHERE customer_username='$customer_username'";
    $result_query_profile = mysqli_query($conn, $query_profile);
    $row_profile = $result_query_profile->fetch_assoc();

    $sql = "SELECT * FROM ed_carts, ed_items, ed_brands, ed_types 
    WHERE item_brand_id = brand_id AND item_type_id = type_id AND item_id = cart_item_id AND cart_customer_username='$customer_username'";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

?>

<?php include("page_template/header.php") ?>

<div class="row">
    
    <div class="col-lg-12 mb-3">
        <h2>Profile:</h2>
        <div class="row mb-3">
            <div class="col-lg-6">
                <?php 
                    echo "<h5>Name: " . $row_profile["customer_username"] . "</h5>"; 
                    echo "<div style='width: fit-content;'><img width='120px' src='" . $row_profile["customer_pic"] . "' alt='customer profile picture'></div>";
                ?>
            </div>
            <div class="col-lg-6">
            <h5>Change Profile Picture:</h5>
            <p>Current Picture Location: <?php echo $row_profile["customer_pic"];?></p>
            <form action="action/customer_profile_picture.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="customer_username" value="<?php echo $row_profile["customer_username"];?>">
                <input type="file" name="file">
                <button type="submit" name="submit">Upload Picture</button>
            </form>
        </div>
        </div>
        

        <div class="row">
            <div class="col-lg-6">  
                <h5>Change Password:</h5>
                <input id="username" type="hidden" name="" value="<?php echo $row_profile["customer_username"];?>">
                <input id="new_password" type="password" name="" id="">
                <button onclick="updatePasswordAjax();" type="button" class="btn btn-warning">Update</button>
                <div id="res"></div>
            </div>
        </div>
        
    </div>

    <div class="col-lg-12">
        <h2>Cart:</h2>

<?php 
  if(mysqli_num_rows($result) > 1) echo mysqli_num_rows($result) . " Items found";
  else echo mysqli_num_rows($result) . " Item found";
?>

        <div style="margin-top: 1rem;" class="row">
            <?php 
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) { 
                        echo "<div class='col-lg-4 col-md-6 mb-4'>";
                        echo "<div class='card h-100'>";
                        echo "<a href='#'><img style='background-color:". $row["item_bg_color"] .";' class='card-img-top' src='" . $row['item_pic'] . "' alt=''></a>";
                        echo "<div class='card-body'>";
                        echo "<h4 class='card-title'>";
                        echo "<a href='item_detail.php?details=" . $row['item_id'] . "' class='stretched-link'>" . $row['item_name'] . "</a>";
                        echo "</h4>";
                        echo "<p class='card-text'>". $row['brand_name'] . "</p>";
                        echo "<p class='card-text'>Type: ". $row['type_name'] . "</p>";
                        echo "<h5>Rp." . $row['item_price'] . "</h5>";
                        echo "</div>";
                        echo "</div>";
                        echo "<a href='customer_profile.php?delete_cart=" . $row['cart_id'] . "'><button type='button' class='btn btn-danger mb-2'>Remove from cart</button></a>";
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>
</div>
</div>
<script>
    function updatePasswordAjax() {
        username = document.getElementById("username").value;
        new_password = document.getElementById("new_password").value;

        x = new XMLHttpRequest();
        x.open("GET","action/customer_change_password.php?username="+username+
        "&new_password="+new_password
        , true) 
        x.send();
        x.onreadystatechange=stateChanged;
    }
    function stateChanged() { 
        if (x.readyState==4) { 
            document.getElementById("res").innerHTML = "Password Updated Successfully";
        }
    }

</script>
</body>
</html>