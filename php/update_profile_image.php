<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: index.php");
}

include_once "config.php";
$user_id = $_SESSION['user_id'];

if(isset($_FILES['profile_image'])) {
    $img_name = $_FILES['profile_image']['name'];
    $img_type = $_FILES['profile_image']['type'];                    
    $img_tmp_name = $_FILES['profile_image']['tmp_name'];
    // echo $img_type." and ".$img_tmp_name;

    $img_explode = explode('.', $img_name);
    $img_ext = end($img_explode);
    $extensions = ['jpeg', 'jpg', 'png'];

    if(in_array($img_ext, $extensions) === true) {
        $time = time();
        $img_new_name = $time.$img_name;

        if(move_uploaded_file($img_tmp_name, "../upload_image/".$img_new_name)) {
            $update_sql = "UPDATE users SET `user_image` = '".$img_new_name."' WHERE `user_id` = '".$user_id."'";
            $update_query = mysqli_query($connect, $update_sql);
            if($update_query) {
                echo "success";
            } else {
                echo "Something went Wrong";
            }
        } else {
            echo "File not Uploaded";
        }
    } else {
        echo "Please select an image file - jpeg, jpg or png";
    }
} else {
    echo "Select an Image";
}

?>