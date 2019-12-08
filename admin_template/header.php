<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-Panel</title>
    <link rel="shortcut icon" href="static/icon/electrodeal.png" type="image/x-icon">
    <link rel="stylesheet" href="admin_template/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <style>
        #map {
            margin: 2rem auto;
            width: 80%;
            height: 30rem;
        }
    </style>
</head>
<body onload="draw();">
    <div class="navbar">
        <div class="navbar-left">
            <a href="admin_inv_view.php"><img class="main-icon" src="static/icon/electrodeal.png" alt="icon"><h1>ElectroDeal</h1><p>admin</p></a>
        </div>
        <div class="navbar-right">
            <ul>
                <li><a href="login-admin.php"><img class="icon" src="static/icon/logout.png" alt=""><p>Logout</p></a></li>
            </ul>
        </div>
    </div>
    <div class="display">
        <div class="sidebar">
            <ul>
                <li><a href="admin_orders_view.php"><div><img class="icon" src="static/icon/order.png" alt="">Orders</div></a></li>
                <li><a href="admin_inv_view.php"><div><img class="icon" src="static/icon/packing-list.png">Inventory</div></a></li>
                <li><a href="admin_trans_view.php"><div><img class="icon" src="static/icon/order_history.png">Transaction History</div></a></li>
                <li><a href="admin_statistic_view.php"><div><img class="icon" src="static/icon/order_statistic.png">Statistics</div></a></li>
            </ul>
        </div>
        <div class="content">