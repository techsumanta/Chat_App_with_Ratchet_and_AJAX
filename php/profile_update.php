<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: index.php");
}

include_once "config.php";
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = '".$user_id."'";
$query = mysqli_query($connect, $sql);
if(mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}    

$name = mysqli_real_escape_string($connect, strip_tags($_POST['userName']));    
$email = mysqli_real_escape_string($connect, strip_tags($_POST['userMail']));
$password = mysqli_real_escape_string($connect, strip_tags($_POST['userPass']));    
$conPass = mysqli_real_escape_string($connect, strip_tags($_POST['conPass']));    


if(!empty($name) && !empty($email)) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        if(!empty($password) && !empty($conPass)){
            if($password != $conPass){
                echo "Password not match";
            } else {
                $pass = password_hash($conPass, PASSWORD_DEFAULT);
                $update_sql = "UPDATE users SET `user_name` = '".$name."', `email` = '".$email."', `pass` = '".$pass."'
                                WHERE `user_id` = '".$user_id."'";
                $update_query = mysqli_query($connect, $update_sql);
                if($update_query) {
                    echo "success";
                } else {
                    echo "Something went Wrong";
                }                    
            }
        } else {
            $update_sql = "UPDATE users SET `user_name` = '".$name."', `email` = '".$email."' WHERE `user_id` = '".$user_id."'";
            $update_query = mysqli_query($connect, $update_sql);
            if($update_query) {
                echo "success";
            } else {
                echo "Something went Wrong";
            } 
        }
    } else {
        echo "Enter a Valid email";
    }
} else {
    echo "Name & Email Required";
}    
?>