<?php $Title = "Forgot Password - Shop4U"?>
<?php include('partial/regis.php')?>
<!-- reset password start here -->
<div class="container">
    <div>
        <div class="rounded d-flex justify-content-center">
            <div class="shadow-lg p-5 bg-light" style="margin-top:50px margin-bottom:50px;">
                <div class="text-center">
                    <h3 class="text-primary">Recover Your Password</h3>
                </div>
                <?php
            if (isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") {
                    echo '<p class="alert alert-success alert-dismissible fade show">A password reset request has been successfully sent to your email. Please check you email to proceed ahead.</p>';
                } elseif ($_GET['reset'] == "noaccount") {
                    $message = '<p class="alert alert-danger alert-dismissible fade show m-2"><i class="bi bi-exclamation-triangle-fill"></i> An account with this email address doesn&apos;t exist. Please create an account first! <a href="signup.php">Sign Up for an Account</a><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>';
                    echo $message;

                }
            }
            ?>
                <form class="row g-3 needs-validation" action="reset-request.php" method="post">
                    <div class="col-md-10 center">
                        <h5 class="form-label text-lg">Username or Email</h5>
                        <input type="text" name="email" class="form-control" placeholder="Enter your email address.." required>
                        <div class="invalid-feedback">
                            Please provide a valid Email.
                        </div>
                    </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Send Email</button>
                </div>
            </form>
            </div>
        </div>  
    </div>
</div>
<?php include('partial/footer.php')?>
