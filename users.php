<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: index.php");
}

include_once "php/config.php";

$sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['user_id']."'";
$query = mysqli_query($connect, $sql);
if(mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}

?>

<?php include_once("header.php"); ?>

<div class="wrapper">
    <section class="users">
        <div class="user-account">
            <div class="content">
                <img src="upload_image/<?php echo $row['user_image']; ?>" alt="">
                
                <div class="details">
                    <p><?php echo $row['user_name']; ?><br>Joined on: <?php echo $row['join_date']; ?><br><?php echo $row['email']; ?></br></p>
                </div>
            
                <div class="buttons">
                    <a href="profile.php" class="btn1">Profile</a>
                    <a href="php/logout.php?logout_id=<?php echo $row['user_id']; ?>" class="btn2">Logout</a>
                    
                </div>
            </div>
        </div>

        <div class="users-list">               
        </div>
        
    </section>
</div>

    <script src="js/users.js"></script>

<?php include_once("footer.php"); ?>