<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role']==2 )) {
?>
<?php $Title = "User Home - Shop4U"?>
<?php include('../partial/pickermenu.php')?>

<!-- content here-->
<div class="container-fluid vh-10" style="margin-top:10px">
            <div class="" style="margin-top:40px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-3 bg-light">
                        <div class="text-center">
                            <h3 class="text-danger"><strong>Warning !!!</strong></h3>
                        </div>
                        <form action="../db/updatepickerconfig.php" method="POST">
                            <div class="p-4">
                                <div class="container">
                                    <p class="text-center"><strong>Are you sure you want to update your profile </strong></p>
                                    <input type="hidden" value="<?php echo $_SESSION["uid"]; ?>" name="uid">
                                    <input type="hidden" value="<?php echo $_SESSION["phno"]; ?>" name="phno">
                                    <input type="hidden" value="<?php echo $_SESSION["email"]; ?>" name="email">
                                    <input type="hidden" value="<?php echo $_SESSION["adds"]; ?>" name="adds">
                                    <input type="hidden" value="<?php echo $_SESSION["city"]; ?>" name="city">
                                    <input type="hidden" value="<?php echo $_SESSION["state"]; ?>" name="state">
                                    <input type="hidden" value="<?php echo $_SESSION["pocode"]; ?>" name="pocode">
                                    <input type="hidden" value="<?php echo $_SESSION["trans"]; ?>" name="trans">
                                    <input type="hidden" value="<?php echo $_SESSION["lic"]; ?>" name="lic">
                                    
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <button class="btn btn-danger text-start mt-2 " type="submit">Yes</button>
                                    <a href="profile.php"><button class="btn btn-dark text-end mt-2" type="button">Cancel</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- content end -->
<?php include('../partial/footer.php')?>
<?php 
}else{
     header("Location: ../login.php");
     exit();
}
 ?>