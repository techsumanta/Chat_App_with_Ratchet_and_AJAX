<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: index.php");
}

include_once "php/config.php";
$user_id = $_SESSION['user_id'];
$sql = "SELECT user_image FROM users WHERE user_id = '".$user_id."'";
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
                    
                    <div class="update-form">
                        <form action="#" enctype="multipart/form-data">                            
                            <div class="error-text">This is an error message</div>                
                            <input class="user-img" type="file" name="profile_image" id="profile_image" />                            
                            <input class="update" type="submit" value="Update">
                        </form>                        
                    </div>                
                    
                </div>
            </div>            
        </section>
    </div>

    <script src="js/update_profile_image.js"></script>

<?php include_once("footer.php"); ?>