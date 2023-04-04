<?php include_once("header.php"); ?>

    <div class="wrapper">
        <section class="form signup">
            <header>OTP Verification</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-text">This is an error message</div>                
                <div class="field input">                    
                    <label for="otp">We send an OTP to your email. Please Enter the OTP</label>
                    <input type="text" name="otp" required>                    
                </div>                
                <div class="field button">
                    <input type="submit" value="Verify">
                </div>                
            </form>            
        </section>
    </div>

<?php include_once("footer.php") ?>