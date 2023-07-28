<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("location: users.php");
}
?>

<?php include_once("header.php"); ?>

    <div class="wrapper">
        <section class="form login">
            <header>CHAT APP LOG IN</header>
            <form action="#" method="post">
                <div class="error-text">This is an error message</div>
                <div class="field input">                    
                    <input type="text" name="email" placeholder="Username" required>
                </div>
                <div class="field input">                    
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field">
                    <p>Forgot Password</p>                    
                </div>
                <div class="field button">
                    <input type="submit" value="Log In">
                </div>
            </form>
            <div class="link">Don’t have an account? Please <a href="signup.php">Sign Up</a> now</div>
        </section>
    </div>

    <script src="js/pass_show_hide.js"></script>
    <script src="js/login.js"></script>

<?php include_once("footer.php") ?>