<?php
    $temp_item_id = '';
    $temp_item_name = '';
    $temp_item_desc = '';
    $temp_item_price = 0;
    $temp_item_in_hand = 0;
    $temp_item_pic = '';
    $temp_item_capt = '';
    $temp_item_brand = '';
    $temp_item_type = '';

    if(isset($_GET['details'])) {
        include("config/db_connect.php");
        $itm_details_id = $_GET['details'];
        $sql_details = "SELECT * FROM ed_items, ed_brands, ed_types WHERE ed_items.item_brand_id = ed_brands.brand_id AND ed_items.item_type_id = ed_types.type_id AND item_id='$itm_details_id'";
        $result_details = mysqli_query($conn, $sql_details);
        $row_details = $result_details->fetch_assoc();

        $temp_item_id = $itm_details_id;
        $temp_item_name = $row_details["item_name"];
        $temp_item_desc = $row_details["item_desc"];
        $temp_item_price = $row_details["item_price"];
        $temp_item_in_hand = $row_details["item_in_hand"];
        $temp_item_pic = $row_details["item_pic"];
        $temp_item_capt = $row_details["item_capt"];
        $temp_item_brand = $row_details["brand_name"];
        $temp_item_type = $row_details["type_name"];
        mysqli_close($conn);
    }
?>

<?php include("page_template/header.php") ?>

    <h1 class="my-4"><?= $temp_item_name ?>
    <small><?= $temp_item_brand ?></small>
    </h1>

    <div class="row">
        <div class="col-md-8">
            <img width="420px" height="420px" class="img-fluid rounded mx-auto d-block" src="<?= $temp_item_pic ?>" alt="">
        </div>
        <div class="col-md-4">
            <h3 class="my-3">Item Description</h3>
            <p><?= $temp_item_desc ?></p>
            <hr>
            <h4>Rp.<?= $temp_item_price ?></h4>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-shopping-cart"></i> Order item
            </button>



            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Modal header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Order item</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <h5>Please fill the form below</h5>
                                <input id="order_item_id" type="hidden" name="order_item_id" value="<?= $temp_item_id ?>">
                                <input type="hidden" id="item_price" name="item_price" value="<?= $temp_item_price ?>">

                                <!--  Username -->
                                <div class="form-group">
                                    <label for="order_username">Your Name: </label>
                                    <input class="form-control" name="order_username" type="text" id="order_username">
                                </div>

                                <!--  Email -->
                                <div class="form-group">
                                    <label for="order_email">Your Email: </label>
                                    <input class="form-control" name="order_email" type="text" id="order_email">
                                </div>

                                <!--  Phone number -->
                                <div class="form-group">
                                    <label for="order_phone_number">Your Phone Number: </label>
                                    <input class="form-control" name="order_phone_number" type="text" id="order_phone_number">
                                </div>

                                <!--  Amount -->
                                <div class="form-group">
                                    <label for="order_amount">Amount of item: </label>
                                    <input class="form-control" name="order_amount" type="number" id="order_amount">
                                </div>

                                <!--  Address -->
                                <div class="form-group">
                                    <label for="order_address">Your Address: </label>
                                    <textarea class="form-control" name="order_address" cols="30" rows="5" placeholder="Your Address: " id="order_address"></textarea>
                                </div>

                                <!--  Geo -->
                                <div class="form-group">
                                    <label for="adrs">Geolocation: </label>
                                    <div id="map"></div>
                                </div>

                                <!--  Message -->
                                <div class="form-group">
                                    <label for="order_message">Additional Message: </label>
                                    <textarea class="form-control" name="order_message" cols="30" rows="5" placeholder="Your Message" id="order_message"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button onclick="processOrderAjax();" id="submit" name="submit" type="submit" class="btn btn-danger">Proceed</button>
                                    <div id="res"></div>
                                </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var map = L.map("map").setView([0,0],1);
        
        L.tileLayer("https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=RzhYQ9UVhFJxlxPkeoxP", {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
        }).addTo(map);

        var theMarker = {};
        var lat = '';
        var lon = '';

        map.on('click',function(e){
            lat = e.latlng.lat;
            lon = e.latlng.lng;
            console.log("You clicked the map at LAT: "+ lat+" and LONG: "+lon );
                //Clear existing marker, 
                if (theMarker != undefined) {
                    map.removeLayer(theMarker);
                };
            //Add a marker to show where you clicked.
            theMarker = L.marker([lat,lon]).addTo(map);  
        });

        function processOrderAjax() {
            order_item_id = document.getElementById("order_item_id").value;
            item_price = document.getElementById("item_price").value;
            order_username = document.getElementById("order_username").value;
            order_email = document.getElementById("order_email").value;
            order_phone_number = document.getElementById("order_phone_number").value;
            order_amount = document.getElementById("order_amount").value;
            order_address = document.getElementById("order_address").value;
            order_message = document.getElementById("order_message").value;
            order_geo_lat = lat;
            order_geo_lon = lon;

            x = new XMLHttpRequest();
            x.open("GET","action/order_action.php?order_item_id="+order_item_id+
            "&item_price="+item_price+
            "&order_username="+order_username+
            "&order_email="+order_email+
            "&order_phone_number="+order_phone_number+
            "&order_amount="+order_amount+
            "&order_address="+order_address+
            "&order_message="+order_message+
            "&order_geo_lat="+order_geo_lat+
            "&order_geo_lon="+order_geo_lon
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
</body>
</html>