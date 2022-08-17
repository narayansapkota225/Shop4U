<?php $Title = "Forgot Password - Shop4U"?>
<?php include('partial/menu.php')?>
<!-- reset password start here -->
<div class="container-fluid vh-100">
    <div class="" style="margin-top:200px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                <?php
                    $selector = $_GET["selector"];
                    $validator = $_GET["validator"];

                    if (empty($selector) || empty($validator)) {
                        echo "Your request could not be validated!";
                    } else {
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                            
                            ?>

                <form class="row g-3 needs-validation" action="reset-password.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                    <label class="form-label">New Password</label>
                    <input type="password" name="pwd" placeholder="Enter a new password..">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="pwd-repeat" placeholder="Enter the password again..">
                    <button type="submit" name="reset-password-submit">Reset Password</button>
                </form>
                <?php
                }
                        
                    }
                    
                ?>
            </div>
        </div>
    </div>
</div>
<!-- reset password end here -->
<script src="js/pass.js"></script>
<?php include('partial/footer.php')?>