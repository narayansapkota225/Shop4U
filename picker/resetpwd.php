<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role']==2)) {  
?>
<?php include('../partial/pickermenu.php') ?>
<!-- content start here -->
<div class="container-fluid vh-100">
    <div class="" style="margin-top:100px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Reset Your Password</h3>
                    <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
                    <?php } ?>
                </div>
                <form class="row g-3 needs-validation" action="../db/resetpickerpwdconfig.php" method="post">
                    <div class="col-md-10 center">
                        <label class="form-label">Old Password</label>
                        <input type="password" name="opwd" class="form-control" placeholder="Enter your Old Password.." required>
                    </div>
                    <div class="col-md-10 center">
                        <label class="form-label">New Password</label>
                        <input type="password" name="npwd" class="form-control" placeholder="Enter your New Password.." 
                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                        oninvalid="setCustomValidity('Password must contain UpperCase, LowerCase, Number/SpecialCharacter and Min 8 Characters. Example password: J1Smith1&3')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-10 center">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="cnpwd" class="form-control" placeholder="Please confirm your New Password.." 
                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                        oninvalid="setCustomValidity('Password must contain UpperCase, LowerCase, Number/SpecialCharacter and Min 8 Characters. Example password: J1Smith1&3')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Reset Password</button>
                </div>
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