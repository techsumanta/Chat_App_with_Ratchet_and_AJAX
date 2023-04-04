<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: index.php");
}

include_once "php/config.php";
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM users WHERE user_id = '".$user_id."'";
$query = mysqli_query($connect, $sql);
if(mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}

?>

<?php include_once("header.php"); ?>

<div class="wrapper-chat">
        <section class="chat-area">            
            <header>               
                <a href="users.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
                <img src="upload_image/<?php echo $row['user_image']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['user_name']; ?></span>                    
                </div>                
            </header>
            
            <div class="chat-box">                                

                <div class="chat-date">22-03-2023</div>               
                
            </div>
            <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php $_SESSION['user_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php $user_id; ?>" hidden>
                <input type="text" class="input-msg" name="msg" id="msg" placeholder="Type your message here..." value="" />                
                <button><i class="fa fa-telegram" id="btn"></i></button>                                
            </form>
        </section>
    </div>

    <script src="js/chat.js"></script>

<?php include_once("footer.php"); ?>