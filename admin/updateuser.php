<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../adminlogin.php");
        exit;
}
?>
<?php $Title = "Update User | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content start here -->
<div class="container">
    <div class="container" style="margin-top: 40px">
        <a href="../admin/adminuser.php"><button class="btn btn-primary " type="submit"><span class="fa-solid fa-arrow-left"></span> Back</button></a>
    </div>
    <div class="col-md-6 col-sm-21 shadow-lg p-5 rounded" style="margin-top: 40px">
        <h3 >Update User</h3>
        <?php if (isset($_GET['error'])) { ?>
        <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
        <?php } ?>
        <?php include ('../db/getuserconfig.php')?>
        <div class="container">
            <form class="row g-3 needs-validation" action="../db/updateuserconfig.php" method="POST">
                    <div class="col-md-6">
                        <label class="form-label">First name</label>
                        <input type="text" value="<?php echo $fname; ?>" class="form-control" name="fname"
                            required="required">
                        <input type="hidden" value="<?php echo $id; ?>" name="uid">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last name</label>
                        <input type="text" value="<?php echo $lname; ?>" class="form-control" name="lname"
                            required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span class="fa fa-phone"></span> Phone Number</label>
                        <input type="tel" class="form-control" name="phno" id="pho" value="<?php echo $phno; ?>"
                        pattern="[0]{1}[0-5]{1}[0-9]{8}" 
                        oninvalid="setCustomValidity('Please enter Valid Phone Number')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span class="fa fa-envelope"></span> Email</label>
                        <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                        oninvalid="setCustomValidity('Please enter Valid Email Address')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="adds" value="<?php echo $adds; ?>" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">State</label>
                        <select class="form-select" name="state" value="<?php echo $state; ?>" required="required">
                            <option <?php if($state=="NSW") echo 'selected="selected"'; ?>>NSW</option>
                            <option <?php if($state=="VIC") echo 'selected="selected"'; ?>>VIC</option>
                            <option <?php if($state=="SA") echo 'selected="selected"'; ?>>SA</option>
                            <option <?php if($state=="QLD") echo 'selected="selected"'; ?>>QLD</option>
                            <option <?php if($state=="NT") echo 'selected="selected"'; ?>>NT</option>
                            <option <?php if($state=="WA") echo 'selected="selected"'; ?>>WA</option>
                            <option <?php if($state=="TAS") echo 'selected="selected"'; ?>>TAS</option>
                            <option <?php if($state=="ACT") echo 'selected="selected"'; ?>>ACT</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Post Code</label>
                        <input type="text" class="form-control" value="<?php echo $pocode; ?>" pattern="[0-9]{4}" name="pocode" 
                        oninvalid="setCustomValidity('Please enter Valid Post Code')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Transportation</label>
                        <select class="form-select" value="" name="trans">
                            <option selected disabled value="<?php echo $trans; ?>">Choose...</option>
                            <option <?php if($trans=="Bicycle") echo 'selected="selected"'; ?>>Bicycle</option>
                            <option <?php if($trans=="Car") echo 'selected="selected"'; ?>>Car</option>
                            <option <?php if($trans=="Motor Cycle") echo 'selected="selected"'; ?>>Motor Cycle</option>
                            <option <?php if($trans=="Others") echo 'selected="selected"'; ?>>Others</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Driving License (optional)</label>
                        <input type="text" value="<?php echo $lic; ?>" class="form-control" name="lic">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" value="<?php echo $role; ?>" required="required">
                            <option selected disabled value="">Choose...</option>
                            <option <?php if($role=="Shopper") echo 'selected="selected"'; ?>>Shopper</option>
                            <option <?php if($role=="Picker") echo 'selected="selected"'; ?>>Picker</option>
                        </select>
                    </div>
                    <p class="col-12 text-center">
                        <button class="btn btn-info " type="submit"><span class="fa fa-paper-plane"></span>
                            Update</button>
                    </p>
                </form>
            </div>
    </div>
</div>
<!-- content end here -->
<?php include('../partial/footer.php')?>