<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../adminlogin.php");
        exit;
}
?>
<?php $Title = "User Page - Shop4U"?>
<?php include('partial/adminmenu.php')?>
<!-- content here -->
<div class="container">
    <br></br>
    <div class="col-md-4 col-sm-12">
        <a href="../adminuser.php"><button class="btn btn-primary " type="submit" ><-- Back</button></a>
        <h3 >Add User</h3>
        <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Required
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Required
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend"></span>
                            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Phone No.</label>
                        <input type="text" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please provide a valid Phone Number.
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
                        <label for="validationCustom03" class="form-label">Address</label>
                        <input type="text" class="form-control" id="validationCustom05" required>
                        <div class="invalid-feedback">
                            Please provide a valid Address.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">City</label>
                        <input type="text" class="form-control" id="validationCustom06" required>
                        <div class="invalid-feedback">
                            Please provide a valid City.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">State</label>
                        <select class="form-select" id="validationCustom07" required>
                            <option selected disabled value="">Choose...</option>
                            <option>NSW</option>
                            <option>VIC</option>
                            <option>SA</option>
                            <option>QLD</option>
                            <option>NT</option>
                            <option>WA</option>
                            <option>TAS</option>
                            <option>ACT</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select state.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Post Code</label>
                        <input type="text" class="form-control" id="validationCustom08" required>
                        <div class="invalid-feedback">
                            Please provide a valid Post Code.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom09" class="form-label">Password</label>
                        <input type="password" class="form-control" id="validationCustom09" required>
                        <div class="invalid-feedback">
                            Please enter a password.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Role</label>
                        <select class="form-select" id="validationCustom07" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Shopper</option>
                            <option>Picker</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select Role.
                        </div>
                    </div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary " type="submit" >Submit</button>
                </div>
            </form>
    </div>
</div>
<!-- content end-->
<script src="js/validation.js"></script>
<?php include('partial/footer.php')?>