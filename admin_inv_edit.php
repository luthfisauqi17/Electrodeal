<?php 
    $temp_item_id = '';
    $temp_item_name = '';
    $temp_item_desc = '';
    $temp_item_price = 0;
    $temp_item_in_hand = 0;
    $temp_item_pic = '';
    $temp_item_capt = '';

    if(isset($_GET['edit'])) {
        include("config/db_connect.php");
        $itm_edit_id = $_GET['edit'];
        $sql_edit = "SELECT * FROM ed_items WHERE item_id='$itm_edit_id'";
        $result_edit = mysqli_query($conn, $sql_edit);
        $row_edit = $result_edit->fetch_assoc();

        $temp_item_id = $itm_edit_id;
        $temp_item_name = $row_edit["item_name"];
        $temp_item_desc = $row_edit["item_desc"];
        $temp_item_price = $row_edit["item_price"];
        $temp_item_in_hand = $row_edit["item_in_hand"];
        $temp_item_pic = $row_edit["item_pic"];
        $temp_item_capt = $row_edit["item_capt"];
        mysqli_close($conn);
    }
?>

<?php include("admin_template/header.php"); ?>
    <h2><img class='icon' src='static/icon/edit.png'>Edit Item: </h2>
    <input id="item_id" type="hidden" name="item_id" value="<?= $temp_item_id ?>">
    <div class="container">
        <!-- Item Name -->
        <div class="row">
            <div class="col-25">
                <label for="item_name">Item Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="item_name" name="item_name" placeholder="Item Name" value=<?= $temp_item_name ?>>
            </div>
        </div>

        <!-- Item Description -->
        <div class="row">
            <div class="col-25">
                <label for="item_desc">Description</label>
            </div>
            <div class="col-75">
                <textarea id="item_desc" name="item_desc" placeholder="Item Description" style="height:200px"><?= $temp_item_desc ?></textarea>
            </div>
        </div>

        <!-- Upload Picture -->
        <div class="row">
            <div class="col-25">
                <label for="item_price">Picture</label>
            </div>
            <div class="col-75">
                <p>Current Picture Location: <?= $temp_item_pic ?></p>
                <form action="action/upload_picture.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="file_item_id" value="<?= $temp_item_id ?>">
                    <input type="file" name="file">
                    <button type="submit" name="submit">Upload Picture</button>
                </form>
            </div>
        </div>
        
        <!-- Item Price -->
        <div class="row">
            <div class="col-25">
                <label for="item_price">Price</label>
            </div>
            <div class="col-75">
                <input type="text" id="item_price" name="item_price" placeholder="Item Price" value=<?= $temp_item_price ?>>
            </div>
        </div>

        <!-- Item Qty -->
        <div class="row">
            <div class="col-25">
                <label for="item_in_hand">Quantity</label>
            </div>
            <div class="col-75">
                <input type="text" id="item_in_hand" name="item_in_hand" placeholder="Item Quantity" value=<?= $temp_item_in_hand ?>>
            </div>
        </div>

        <!-- Item Trend -->
        <div class="row">
            <div class="col-25">
                <label for="item_trend">Trend</label>
            </div>
            <div class="col-75">
                <input id="active_rb" type="radio" name="item_trend" value="ACTIVE" checked>ACTIVE
                <input id="not_active_rb" type="radio" name="item_trend" value="NOT ACTIVE">NOT ACTIVE
            </div>
        </div>

        <!-- Item Caption -->
        <div class="row">
            <div class="col-25">
                <label for="item_capt">Caption</label>
            </div>
            <div class="col-75">
                <textarea id="item_capt" name="item_capt" placeholder="Item Caption" style="height:200px"><?= $temp_item_capt ?></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <input onclick="editInvAjax();" type="submit" value="Update">
        </div>
        
        <div id="res"></div>
    </div>

<?php include("admin_template/footer.php"); ?>

<script>
    function editInvAjax() {
        item_id = document.getElementById("item_id").value;
        item_name = document.getElementById("item_name").value;
        item_desc = document.getElementById("item_desc").value;
        item_price = document.getElementById("item_price").value;
        item_in_hand = document.getElementById("item_in_hand").value;
        if(document.getElementById("active_rb").checked) item_trend = document.getElementById("active_rb").value;
        else if(document.getElementById("not_active_rb").checked) item_trend = document.getElementById("not_active_rb").value;
        item_capt = document.getElementById("item_capt").value;

        x = new XMLHttpRequest();
        x.open("GET","action/admin_inv_edit_action.php?item_id="+item_id+
        "&item_name="+item_name+
        "&item_desc="+item_desc+
        "&item_price="+item_price+
        "&item_in_hand="+item_in_hand+
        "&item_trend="+item_trend+
        "&item_capt="+item_capt
        , true) 
        x.send();
        x.onreadystatechange=stateChanged;
    }
    function stateChanged() { 
        if (x.readyState==4) { 
            document.getElementById("res").innerHTML = "Data updated successfully";
        }
    }
</script>