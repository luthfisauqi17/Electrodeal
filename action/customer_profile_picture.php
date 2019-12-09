<?php
    $customer_username = '';
    $file_name = '';

    if(isset($_POST["submit"])) {
        $file = $_FILES['file'];
        $customer_username = $_POST["customer_username"];

        $fileName = $_FILES["file"]["name"];
        $fileTmpName = $_FILES["file"]["tmp_name"];
        $fileSize = $_FILES["file"]["size"];
        $fileError = $_FILES["file"]["error"];
        $fileType = $_FILES["file"]["type"];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array("jpg", "jpeg", "png", "pdf");

        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 1000000) {
                    $fileNameNew = uniqid("", true).".".$fileActualExt;
                    $file_name = $fileNameNew;
                    $fileDestination = "../profilePic/".$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    echo "Your file is too big";
                }
            } else {
                echo "There was an error uploading this picture!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
    }

    include("../config/db_connect.php");
    $customer_username = $customer_username;
    $customer_pic = "profilePic/".$file_name;
    $sql_pic_update = "UPDATE ed_customers SET customer_pic='$customer_pic' WHERE customer_username='$customer_username'";
    if (mysqli_query($conn, $sql_pic_update)) echo "New record updated successfully";
    else echo "Error: " . $sql_pic_update . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
    header("Location: ../customer_profile.php?edit=".$file_item_id);
?>