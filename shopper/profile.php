<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role']==1)) {  
?>
<?php include('../partial/usermenu.php') ?>
<!-- content start here-->

<div class="container-fluid vh-10">
    <div class="" style="margin-top:40px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-6 col-sm-21 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Profile</h3>
                    <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger alert-dismissible fade show"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['result'])) { ?>
                    <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
                    <?php } ?>
                    <!-- get user config -->
                    <?php include ('../db/getuser.php')?> 
                </div>
                <form class="row g-3 needs-validation" action="../db/postshopperconfig.php" method="POST">
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
                        <label class="form-label">Role: </label>
                        <label class="form-label"><?php echo $role; ?></label>
                    </div>
                    <p class="col-12 text-center">
                        <button class="btn btn-info " type="submit"><span class="fa fa-paper-plane"></span>
                            Update</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- content end here -->
<?php include('../partial/footer.php') ?>
<?php 
}else{
     header("Location: ../login.php");
     exit();
}
 ?>