<?php
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB", "Chat_with_Ratchet");

    $connect = mysqli_connect(HOST, USER, PASSWORD, DB);
    if($connect == false){
       die("Server Not Found.......");
    }    
?>