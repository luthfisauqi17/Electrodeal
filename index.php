<?php
  include "config/db_connect.php";

  if(isset($_GET["type_id"])) {
    function make_query($conn) {
        $type_id = $_GET["type_id"];
        $query = "SELECT * FROM ed_items WHERE item_trend='ACTIVE' AND item_type_id = '$type_id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
  }

  else {
    function make_query($conn) {
        $query = "SELECT * FROM ed_items WHERE item_trend='ACTIVE'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
  }

  function make_slide_indicators($conn) {
    $output = '';
    $count = 0;
    $result = make_query($conn);
    while($row = mysqli_fetch_array($result)) {
      if($count == 0) {
        $output .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'" class="active"></li>';
      }
      else {
        $output .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'"></li>';
      }
      $count = $count + 1;
    }
    return $output;
  }

  function make_slides($conn) {
    $output = '';
    $count = 0;
    $result = make_query($conn);
    while($row = mysqli_fetch_array($result))
    {
      if ($count == 0) {
        $output .= '<div class="carousel-item active">';
      }
      else {
        $output .= '<div class="carousel-item">';
      }
      $output .= '
      <img style="filter: opacity(100%); width: 50%; height:50%; margin: auto; !important;" class="d-block img-fluid" src="'.$row['item_pic'].'" alt="'.$row['item_name'].'">
        <div class="carousel-caption">
          <h3 style="color: black; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;" class="display-4">'.$row['item_name'].'</h3>
          <p style="color: black; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">'. $row['item_capt'] .'</p>
        </div>
      </div>
      ';
      $count = $count + 1;
    }
    return $output;
  }
?>

<?php include("page_template/header.php") ?>

<?php 
    $query_types = "SELECT * FROM ed_types";
    $result_types = mysqli_query($conn, $query_types);
?>

<div class="row">
    <div class="col-lg-3">
        <h1 class="my-4">ElectroDeal</h1>
        <div class="list-group">
        <h4>Categories</h4>
        <a href='index.php' class='list-group-item'>All Categories</a>
        <?php 
            if(mysqli_num_rows($result_types)) {
                while($row = mysqli_fetch_assoc($result_types)) {
                    echo "<a href='index.php?type_id=". $row["type_id"] ."' class='list-group-item'>". $row["type_name"] ."</a>";
                }
            }
        ?>
        </div>
    </div>

    <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php echo make_slide_indicators($conn); ?>
        </ol>
        <div class="carousel-inner" style="width: 100%; height: 420px; !important" role="listbox">
        <?php echo make_slides($conn); ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>

<?php
    if(isset($_GET["type_id"])) {
        $type_id = $_GET["type_id"];
        $query = "SELECT * FROM ed_items, ed_brands, ed_types WHERE ed_items.item_brand_id = ed_brands.brand_id AND ed_items.item_type_id = ed_types.type_id AND item_type_id='$type_id'";
        $result = mysqli_query($conn, $query);
    }
    else {
        $query = "SELECT * FROM ed_items, ed_brands, ed_types WHERE ed_items.item_brand_id = ed_brands.brand_id AND ed_items.item_type_id = ed_types.type_id";
        $result = mysqli_query($conn, $query);
    }
?>

        <div class="row">
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
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>
</div>
</div>
</body>
</html>