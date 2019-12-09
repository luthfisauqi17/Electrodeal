<?php
    if(isset($_POST["submit"])) {
        include("config/db_connect.php");
        $customer_username = $_POST["customer_username"];
        $customer_password = $_POST["customer_password"];
        $confirm_password = $_POST["confirm_password"];
        if($customer_password == $confirm_password) {
            $sql_register = "INSERT INTO ed_customers VALUES('$customer_username', '$customer_password')";
            mysqli_query($conn, $sql_register);
            header("Location: login-customer.php?signup_success");
        }
        else header("Location: register-customer.php?signup_failed");
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Customer</title>
    <link rel="shortcut icon" href="static/icon/electrodeal.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 
        if(isset($_GET["signup_failed"])) {
            echo "<div><p style='color: red'>Register Failed</p></div>";
        }
    ?>
    <form action="register-customer.php" method="POST">
        <div class="container">
            <h1 class="title">Register Yourself</h1>
            <img class="img" src="static/icon/electrodeal.png">
            Your Username<input name="customer_username" class="text" type="text" placeholder="Username">
            Your Password<input name="customer_password" class="password" type="password" placeholder="Password">
            Confirm Password<input name="confirm_password" class="password" type="password" placeholder="Password">
            <button name="submit" class="btn-register" type="submit">SIGN UP</button>
            <div style="text-align: center; margin: 1rem;">
                <p>Already have an account?, click <a href="login-customer.php">here</a> to login</p>
            </div>
        </div>
    </form>
</body>
</html>