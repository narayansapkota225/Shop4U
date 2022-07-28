<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:adminlogin.php");
        exit;
}
?>
<?php $Title = "Add User | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content here -->
<div class="container">
    <div class="container" style="margin-top: 40px">
        <a href="adminuser.php"><button class="btn btn-lg btn-outline-primary" type="submit"><span class="fa-solid fa-arrow-left"></span> Back</button></a>
    </div>
    <div class="col-md-6 col-sm-21 shadow-lg p-5 rounded" style="margin-top: 40px">
        <h3 >Add User</h3>
        <?php if (isset($_GET['error'])) { ?>
        <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
        <?php } ?>
        <div class="">
            <form class="row g-3 needs-validation" action="../db/adminadduserconfig.php" method="POST">
                    <div class="col-md-6">
                        <label class="form-label">First name</label>
                        <input type="text" placeholder="John" class="form-control" name="fname"
                            required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last name</label>
                        <input type="text" placeholder="Smith" class="form-control" name="lname"
                            required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span class="fa fa-phone"></span> Phone Number</label>
                        <input type="tel" class="form-control" name="phno" id="pho" placeholder="0448751365"
                        pattern="[0]{1}[0-5]{1}[0-9]{8}" 
                        oninvalid="setCustomValidity('Please enter Valid Phone Number')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span class="fa fa-envelope"></span> Email</label>
                        <input type="email" placeholder="exampler@mail.com" name="email" class="form-control" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                        oninvalid="setCustomValidity('Please enter Valid Email Address')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="adds" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">State</label>
                        <select class="form-select" name="state" required="required">
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
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Post Code</label>
                        <input type="text" class="form-control" pattern="[0-9]{4}" name="pocode" 
                        oninvalid="setCustomValidity('Please enter Valid Post Code')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Transportation</label>
                        <select class="form-select" name="trans">
                            <option selected disabled value="">Choose...</option>
                            <option>Bicycle</option>
                            <option>Car</option>
                            <option>Motor Cycle</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Driving License (optional)</label>
                        <input type="text" class="form-control" name="lic">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" required="required">
                            <option selected disabled value="">Choose...</option>
                            <option>Shopper</option>
                            <option>Picker</option>
                        </select>
                    </div>
                    <div></div>
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="pswd" 
                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                        oninvalid="setCustomValidity('Password must contain UpperCase, LowerCase, Number/SpecialCharacter and Min 8 Characters')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="cpswd" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required">
                    </div>
                    <p class="col-12 text-center">
                        <button class="btn btn-info " type="submit"><span class="fa fa-paper-plane"></span>
                            Submit</button>
                    </p>
                </form>
            </div>
    </div>
</div>
<!-- content end-->
<?php include('../partial/footer.php')?>