<?php $Title = "Password Reset - Shop4U"?>
<?php include('partial/menu.php')?>
<!-- reset password start here -->
<div class="container-fluid vh-100">
    <div class="" style="margin-top:200px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Reset Password</h3>
                </div>
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please insert username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="text" class="form-control" id="validationCustom04" required>
                        <div class="invalid-feedback">
                            Please provide a valid Email.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="txtPassword" required>
                        <div class="invalid-feedback">
                            Required
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Repeat New Password</label>
                        <input type="password" class="form-control" id="txtConfirmPassword" required>
                        <div class="invalid-feedback">
                            Password did not match.
                        </div>
                    </div>
                    
                    
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" onclick="return Validate()">Submit form</button>
                </div>
            </form>
            </div>
        </div>  
    </div>
</div>
<!-- reset password end here -->
<script src="js/pass.js"></script>
<?php include('partial/footer.php')?>