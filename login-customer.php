<?php
    session_start();
    if(isset($_POST["submit"])) {
        include("config/db_connect.php");
        $customer_username = $_POST["customer_username"];
        $customer_password = $_POST["customer_password"];
        $sql_login = "SELECT * FROM ed_customers WHERE customer_username='$customer_username' AND customer_password='$customer_password'";
        $result_login = mysqli_query($conn, $sql_login);
        if(mysqli_num_rows($result_login) > 0) {
            $_SESSION["username"] = $customer_username;
            header("Location: index.php");
        }
        else {
            echo "No such username found or password is incorrect";
            header("Location: login-customer.php?login_failed");
        }
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Customer</title>
    <link rel="shortcut icon" href="static/icon/electrodeal.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 
        if(isset($_GET["signup_success"])) {
            echo "<div style='color: green'><p>Register Succeeded</p></div>";
        }
        if(isset($_GET["login_failed"])) {
            echo "<div style='color: red'><p>Login Failed</p></div>";
        }
    ?>
    <form action="login-customer.php" method="POST">
        <div class="container">
            <h1 class="title">Welcome Back!</h1>
            <img class="img" src="static/icon/electrodeal.png">
            <input name="customer_username" class="text" type="text" placeholder="Username">
            <input name="customer_password" class="password" type="password" placeholder="Password">
            <div style="text-align: center; margin: 1rem;">
                <p>Dont have an account yet?, You can sign up <a href="register-customer.php">here</a></p>
            </div>
            <button name="submit" class="btn" type="submit">LOGIN</button>
        </div>
    </form>
</body>
</html>