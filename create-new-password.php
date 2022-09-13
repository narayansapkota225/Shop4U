<?php $Title = "Update Password - Shop4U"?>
<?php include('partial/menu.php')?>
<!-- reset password start here -->
<div class="container-fluid">
    <div class="" style="margin-top:30px; margin-bottom:30px;">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                <h3 class="text-primary" style="text-align: center;">Set a new Password</h3>
                <?php if (isset($_GET['newpwd'])) { 
                        if ($_GET["newpwd"] == "empty") {
                            echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> Password cannot be empty!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        } elseif ($_GET["newpwd"] === "pwdnotsame") {
                            echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> Passwords do not match!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            }
                        }?>
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
                    <div class="p-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary">
                                <i class="bi bi-key-fill text-white">
                                </i>
                            </span>
                            <input type="password" class="form-control" name="pwd" placeholder="Enter a new password..">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary">
                                <i class="bi bi-key-fill text-white">
                                </i>
                            </span>
                            <input type="password" class="form-control" name="pwd-repeat"
                                placeholder="Enter the password again..">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary text-center mt-2" type="submit" name="reset-password-submit">
                                <span class="fa-solid fa-arrow-rotate-left"></span> Reset Password
                            </button>
                        </div>
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