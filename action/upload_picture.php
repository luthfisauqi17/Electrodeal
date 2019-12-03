<?php
    $file_item_id = '';
    $file_name = '';

    if(isset($_POST["submit"])) {
        $file = $_FILES['file'];
        $file_item_id = $_POST["file_item_id"];

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
                    $fileDestination = "../uploads/".$fileNameNew;
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
    $item_id = $file_item_id;
    $item_pic = "uploads/".$file_name;
    $sql_pic_update = "UPDATE ed_items SET item_pic='$item_pic' WHERE item_id='$item_id'";
    if (mysqli_query($conn, $sql_pic_update)) echo "New record updated successfully";
    else echo "Error: " . $sql_pic_update . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
    header("Location: ../admin_inv_edit.php?edit=".$file_item_id);
?>