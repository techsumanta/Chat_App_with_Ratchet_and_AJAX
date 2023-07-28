<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: index.php");
}

include_once "php/config.php";
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = '".$user_id."'";
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
                    <a class="edit-image" href="update_profile_image.php">Edit Image</a>
                    
                    <div class="update-form">
                        <form action="#">

                            <div class="error-text">This is an error message</div>                

                            <label>Name</label>
                            <input type="text" name="userName" id="userName" value="<?php echo $row['user_name']; ?>" />

                            <label>Email</label>
                            <input type="text" name="userMail" id="userMail" value="<?php echo $row['email']; ?>" />

                            <label>New Password</label>
                            <input type="text" name="userPass" id="userPass" value="" />

                            <label>Confirm Password</label>
                            <input type="text" name="conPass" id="conPass" value="" />

                            <!-- <label>Image</label>
                            <input class="user-img" type="file" name="userImage" id="userImage" /> -->
                            
                            <input class="update" type="submit" value="Update">
                        </form>                        
                    </div>                
                    
                </div>
            </div>            
        </section>
    </div>

    <script src="js/profile_update.js"></script>

<?php include_once("footer.php"); ?>