<?php
    include("config/db_connect.php");
    $sql = "SELECT * FROM ed_trans, ed_items WHERE trans_order_item_id = item_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    shell_exec("cd C:\\xampp\\htdocs\\electrodeal");
    shell_exec("echo Order Report >> transaction_report.txt");
    shell_exec("echo. >> transaction_report.txt");

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            shell_exec("echo Transaction Id: " . $row["trans_id"] . ">> transaction_report.txt");
            // shell_exec("echo. >> transaction_report.txt");
            shell_exec("echo Confirmation date: " . $row["trans_date"] . " >> transaction_report.txt");
            shell_exec("echo Order Id: " . $row["trans_order_id"] . " >> transaction_report.txt");
            shell_exec("echo Order Username: " . $row["trans_order_username"] . " >> transaction_report.txt");
            shell_exec("echo Order Email: " . $row["trans_order_email"] . " >> transaction_report.txt");
            shell_exec("echo Order Phone Number: " . $row["trans_order_phone_number"] . " >> transaction_report.txt");
            shell_exec("echo Order Item Id: " . $row["trans_order_item_id"] . " >> transaction_report.txt");
            shell_exec("echo Order date: " . $row["trans_order_date"] . " >> transaction_report.txt");
            shell_exec("echo Order Amount: " . $row["trans_order_amount"] . " >> transaction_report.txt");
            shell_exec("echo Order Total Price: " . $row["trans_total_price"] . " >> transaction_report.txt");
            shell_exec("echo Order Address: " . $row["trans_order_address"] . " >> transaction_report.txt");
            shell_exec("echo Order date: " . $row["trans_geo_lat"] . " >> transaction_report.txt");
            shell_exec("echo Order date: " . $row["trans_geo_lon"] . " >> transaction_report.txt");
            shell_exec("echo Order Message: " . $row["trans_order_message"] . " >> transaction_report.txt");
            shell_exec("echo. >> transaction_report.txt");
        }
    }
?>