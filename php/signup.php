<?php
session_start();
    include_once("config.php");

    $name = mysqli_real_escape_string($connect, strip_tags($_POST['userName']));    
    $email = mysqli_real_escape_string($connect, strip_tags($_POST['email']));
    $password = mysqli_real_escape_string($connect, strip_tags($_POST['password']));    

    if(!empty($name) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_check_sql = mysqli_query($connect, "SELECT email FROM users WHERE email = '".$email."'");            
            if(mysqli_num_rows($email_check_sql) > 0) {
                echo "This email already exist";
            } else {                
                $date = date("d-m-Y");
                $status = 1;
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $insert_sql = "INSERT INTO users (user_name, email, pass, join_date, user_status)
                                    VALUES ('".$name."', '".$email."', '".$pass."', '".$date."', '".$status."')";
                // echo $insert_sql;
                $insert_query = mysqli_query($connect, $insert_sql);                            
                if($insert_query) {
                    $fetch_sql = "SELECT * FROM users WHERE email = '".$email."'";
                    $fetch_query = mysqli_query($connect, $fetch_sql);
                    if(mysqli_num_rows($fetch_query) > 0) {
                        $row = mysqli_fetch_assoc($fetch_query);
                        $_SESSION['user_id'] = $row['user_id'];
                        echo "success";
                    }
                } else {
                    echo "Something went wrong!";
                }                
            }            
        } else {
            echo "Enter a valid e-mail";
        }
    }else{
        echo "All fields required";
    }
    
?>