<?php $Title = "Forgot Password - Shop4U"?>
<?php include('partial/menu.php')?>
<!-- reset password start here -->
<div class="container-fluid vh-100">
    <div class="" style="margin-top:200px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Recover Your Password</h3>
                </div>
                <p> An e-mail will be sent to you with instructions on how to reset your password.</p>
                <form class="row g-3 needs-validation" action="reset-request.php" method="post">
                    <div class="col-md-10 center">
                        <label class="form-label">Username or Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter your email address.." required>
                        <div class="invalid-feedback">
                            Please provide a valid Email.
                        </div>
                    </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Send Email</button>
                </div>
            </form>
            <?php
            if (isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") {
                    echo '<p class="alert alert-success alert-dismissible fade show">A password reset request has been successfully sent to your email. Please check you email to proceed ahead.</p>';
                }
            }
            ?>
            </div>
        </div>  
    </div>
</div>
<?php include('partial/footer.php')?>
