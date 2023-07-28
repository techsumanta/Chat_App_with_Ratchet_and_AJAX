<?php include_once("header.php"); ?>

    <div class="wrapper">
        <section class="form signup">
            <header>Chat App Sign Up</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-text">This is an error message</div>                
                <div class="field input">                    
                    <input type="text" name="userName" placeholder="Your Full Name" required>
                </div>
                <div class="field input">                    
                    <input type="text" name="email" placeholder="Email ID" required>
                </div>
                <div class="field input">                    
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fa fa-eye"></i>
                </div>
                
                <div class="field button">
                    <input type="submit" value="Sign Up">
                </div>                
            </form>
            <div class="link">Already signed up? <a href="index.php">Login</a> now</div>
        </section>
    </div>

    <script src="js/pass_show_hide.js"></script>
    <script src="js/signup.js"></script>

<?php include_once("footer.php") ?>