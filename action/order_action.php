<?php

    $order_item_id = '';
    $item_price = '';
    $order_username = '';
    $order_email = '';
    $order_phone_number = '';
    $order_amount = '';
    $order_address = '';
    $order_message = '';
    $order_geo_lat = '';
    $order_geo_lon = '';
    $order_total_price = '';
    $order_date = '';



    if(isset($_GET["order_item_id"])) {
        include("../config/db_connect.php");
        $order_item_id = $_GET["order_item_id"];
        $item_price = $_GET["item_price"];
        $order_username = $_GET["order_username"];
        $order_email = $_GET["order_email"];
        $order_phone_number = $_GET["order_phone_number"];
        $order_amount = $_GET["order_amount"];
        $order_address = $_GET["order_address"];
        $order_message = $_GET["order_message"];
        $order_geo_lat = $_GET["order_geo_lat"];
        $order_geo_lon = $_GET["order_geo_lon"];
        $order_total_price = $order_amount * $item_price;
        $order_date = date("Y-m-d");

        $sql = "INSERT INTO ed_orders(order_item_id, order_username, order_email, order_phone_number, order_amount, order_address, order_message, order_geo_lat, order_geo_lon, order_total_price, order_date)
        VALUES('$order_item_id', '$order_username', '$order_email', '$order_phone_number', '$order_amount', '$order_address', '$order_message', '$order_geo_lat', '$order_geo_lon', '$order_total_price', '$order_date')";
        
        if (mysqli_query($conn, $sql)) echo "New record created successfully";
        else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
    }
?>

<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // Load Composer's autoloader
    require '../../vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
        $mail->isSMTP();    // Send using SMTP
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'electrodeal17@gmail.com';    // SMTP username
        $mail->Password = 'electrodeal12062019';    // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587;  // TCP port to connect to

        // Recipients
        $mail->setFrom('electrodeal17@gmail.com', 'Electrodeal');
        $mail->addAddress('sauqiluthfi877@gmail.com');  // Add a recipient
        $mail->addReplyTo('sauqiluthfi877@gmail.com');
        
        // Content
        $mail->isHTML(true);    // Set email format to HTML
        $mail->Subject = "Order By:" . $order_email;
        $mail->Body = 
        "
        <h3>New Order</h3>
        <p>Order Item Id: " . $order_item_id . "</p>
        <p>Order Amount: " . $order_amount . " Item/s</p>
        <p>Order Username: " . $order_username . "</p>
        <p>Order Email: " . $order_email . "</p>
        <p>Order Phone Number: " . $order_phone_number . "</p>
        <p>Order Date: " . $order_date . "</p>
        <p>Order Total Price: Rp." . $order_total_price. "</p>
        <p>Order Address: " . $order_address . "</p>
        <p>Order Geo Lat: " . $order_geo_lat . "</p>
        <p>Order Geo Lon: " . $order_geo_lon . "</p>
        <p>Order Message: " . $order_message . "</p>
        ";

        $mail->send();
        echo "Message has been sent!";
    } catch(Exception $e) {
        echo "Message could not be sent. Error", $mail->ErrorInfo;
    }
?>

<?php
function sendMessage($telegram_id, $message_text, $secret_token) {
    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message_text);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

$telegram_id = "785797048";
$message_text = 
"
New Order
Order Item Id: " . $order_item_id . "
Order Amount: " . $order_amount . " Item/s
Order Username: " . $order_username . "
Order Email: " . $order_email . "
Order Phone Number: " . $order_phone_number . "
Order Date: " . $order_date . "
Order Total Price: Rp." . $order_total_price. "
Order Address: " . $order_address . "
Order Geo Lat: " . $order_geo_lat . "
Order Geo Lon: " . $order_geo_lon . "
Order Message: " . $order_message . "
";

$secret_token = "921195620:AAFMfV7ptO2iI_NKf2CG0o45yrqDnFsQpFU";
sendMessage($telegram_id, $message_text, $secret_token);
echo "<script>alert('Pesan berhasil terkirim!'); window.location.href = './';</script>";
?>