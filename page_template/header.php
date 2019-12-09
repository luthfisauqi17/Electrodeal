<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Electrodeal</title>
    <link rel="shortcut icon" href="static/icon/electrodeal.png" type="image/x-icon">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Leaflet CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>


    <style>
        #map {
            width: 100%;
            height: 30rem;
        }

        .list-group-item:hover {
            background-color: #b6ffff;
            text-decoration: none;
        }

        .card:hover {
            -webkit-box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.75);
            box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.75);
        }

        .card-title a {
            text-decoration: none;
        }
    </style>

</head>
<body>
    <nav style="background-color: #4ba3c7 !important;" class="navbar navbar-expand-md bg-light navbar-light">
        <a style="display: flex; color: #333;" class="navbar-brand" href="index.php"><img style="width: 3rem;" class="main-icon" src="static/icon/electrodeal.png" alt="icon"><h1>ElectroDeal</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

            </ul>
        </div> 
    </nav>
    <div class="container">


