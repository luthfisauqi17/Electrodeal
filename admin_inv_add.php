<?php 
    include("config/db_connect.php");
    $sql_brands = "SELECT * FROM ed_brands";
    $result_brands = mysqli_query($conn, $sql_brands);
    $sql_types = "SELECT * FROM ed_types";
    $result_types = mysqli_query($conn, $sql_types);
    mysqli_close($conn);
?>

 <?php include("admin_template/header.php"); ?> 

    <h2><img class='icon' src='static/icon/plus.png'>New Item: </h2>
    <div class="container">
        <!-- Item Name -->
        <div class="row">
            <div class="col-25">
                <label for="item_name">Item Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="item_name" name="item_name" placeholder="Item Name">
            </div>
        </div>

        <!-- Item Description -->
        <div class="row">
            <div class="col-25">
                <label for="item_desc">Description</label>
            </div>
            <div class="col-75">
                <textarea id="item_desc" name="item_desc" placeholder="Item Description" style="height:200px"></textarea>
            </div>
        </div>
        
        <!-- Item Price -->
        <div class="row">
            <div class="col-25">
                <label for="item_price">Price</label>
            </div>
            <div class="col-75">
                <input type="text" id="item_price" name="item_price" placeholder="Item Price">
            </div>
        </div>

        <!-- Item Qty -->
        <div class="row">
            <div class="col-25">
                <label for="item_in_hand">Quantity</label>
            </div>
            <div class="col-75">
                <input type="text" id="item_in_hand" name="item_in_hand" placeholder="Item Quantity">
            </div>
        </div>

        <!-- Item Brand -->
        <div class="row">
            <div class="col-25">
                <label for="item_brand_id">Brand</label>
            </div>
            <div class="col-75">
                <select id="item_brand_id" name="item_brand_id">
                <?php
                    while($row = mysqli_fetch_assoc($result_brands)) {
                        echo "<option value=" . $row["brand_id"] . ">" . $row["brand_name"] . "</option>";
                    }
                ?>
                </select>
            </div>
        </div>

        <!-- Item Type -->
        <div class="row">
            <div class="col-25">
                <label for="item_type_id">Type</label>
            </div>
            <div class="col-75">
                <select id="item_type_id" name="item_type_id">
                <?php
                    while($row = mysqli_fetch_assoc($result_types)) {
                        echo "<option value=" . $row["type_id"] . ">" . $row["type_name"] . "</option>";
                    }
                ?>
                </select>
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
                <textarea id="item_capt" name="item_capt" placeholder="Item Caption" style="height:200px"></textarea>
            </div>
        </div>

        <!-- Item Background Color -->
        <div class="row">
            <div class="col-25">
                <label for="item_bg_color">Background Color</label>
            </div>
            <div class="col-75">
                <select id="item_bg_color" name="item_bg_color">
                <option value="light blue">Light Blue</option>
                <option value="light orange">Light Orange</option>
                <option value="light red">Light Red</option>
                <option value="light green">Light Green</option>
                <option value="light pink">Light Pink</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <input onclick="addInvAjax();" type="submit" value="Submit">
        </div>
        
        <div id="res"></div>
    </div>

    

<?php include("admin_template/footer.php"); ?>

<script>
    function addInvAjax() {
        item_name = document.getElementById("item_name").value;
        item_desc = document.getElementById("item_desc").value;
        item_price = document.getElementById("item_price").value;
        item_in_hand = document.getElementById("item_in_hand").value;
        item_brand_id = document.getElementById("item_brand_id").value;
        item_type_id = document.getElementById("item_type_id").value;
        if(document.getElementById("active_rb").checked) item_trend = document.getElementById("active_rb").value;
        else if(document.getElementById("not_active_rb").checked) item_trend = document.getElementById("not_active_rb").value;
        item_capt = document.getElementById("item_capt").value;
        item_bg_color = document.getElementById("item_bg_color").value;

        x = new XMLHttpRequest();
        x.open("GET","action/admin_inv_add_action.php?item_name="+item_name+
        "&item_desc="+item_desc+
        "&item_price="+item_price+
        "&item_in_hand="+item_in_hand+
        "&item_brand_id="+item_brand_id+
        "&item_type_id="+item_type_id+
        "&item_trend="+item_trend+
        "&item_capt="+item_capt+
        "&item_bg_color="+item_bg_color
        , true) 
        x.send();
        x.onreadystatechange=stateChanged;
    }
    function stateChanged() { 
        if (x.readyState==4) { 
            document.getElementById("res").innerHTML = "Data inserted successfully";
        }
    }
</script>