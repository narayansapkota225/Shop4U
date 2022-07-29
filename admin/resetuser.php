<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:adminlogin.php");
        exit;
}
?>
<?php $Title = "Home | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content here -->
<?php include ('../db/getuserconfig.php')?>
<div class="container">
    <div class="container" style="margin-top: 40px">
        <a href="../admin/adminuser.php"><button class="btn btn-primary " type="submit"><span class="fa-solid fa-arrow-left"></span> Back</button></a>
    </div>
    <div class="col-md-6 col-sm-21 shadow-lg p-5 rounded" style="margin-top: 40px">
        <h3 >Reset "<span class="fw-bolder"><?php echo ("$fname $lname"); ?></span>" Password</h3>
        <?php if (isset($_GET['error'])) { ?>
        <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
        <?php } ?>
        <div class="container">
            <form class="row g-3 needs-validation" action="../db/adminresetuserconfig.php" method="POST">
                    <div class="col-md-10 center">
                        <label class="form-label">New Password</label>
                        <input type="password" name="npwd" class="form-control" placeholder="Enter your New Password.." 
                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                        oninvalid="setCustomValidity('Password must contain UpperCase, LowerCase, Number/SpecialCharacter and Min 8 Characters. Example password: J1Smith1&3')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                        <input type="hidden" value="<?php echo $id; ?>" name="uid">
                    </div>
                    <div class="col-md-10 center">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="cnpwd" class="form-control" placeholder="Please confirm your New Password.." 
                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                        oninvalid="setCustomValidity('Password must contain UpperCase, LowerCase, Number/SpecialCharacter and Min 8 Characters. Example password: J1Smith1&3')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <p class="col-12 text-center">
                        <button class="btn btn-info " type="submit"><span class="fa fa-paper-plane"></span>
                            Reset Password</button>
                    </p>
                </form>
            </div>
    </div>
</div>
<!-- content end-->

<?php include('../partial/footer.php')?>