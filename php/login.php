<?php
session_start();
include_once("config.php");

$email = mysqli_real_escape_string($connect, strip_tags($_POST['email']));
$password = mysqli_real_escape_string($connect, strip_tags($_POST['password']));

if(!empty($email) && !empty($password)) {
    $sql = "SELECT * FROM users WHERE email = '".$email."'";
    $query = mysqli_query($connect, $sql);
    if(mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);        
        if(password_verify($password, $row['pass'])){
            $sql2 = "UPDATE users SET user_status = '1' WHERE user_id = '{$row['user_id']}'";
            $query2 = mysqli_query($connect, $sql2);
            if($query2) {
                $_SESSION['user_id'] = $row['user_id'];
                echo "success";
            }
        } else {
            echo "passsword incorrect";
        }                        
    } else {
        echo "Enter a Valid Email and Password";
    }
} else {
    echo "All fields required";
}

?>