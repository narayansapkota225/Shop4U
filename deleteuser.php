<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../adminlogin.php");
        exit;
}
?>
<?php $Title = "Delete User | Admin - Shop4U"?>
<?php include('partial/adminmenu.php')?>
<!-- content here -->
<div class="container-fluid vh-10" style="margin-top:10px">
            <div class="" style="margin-top:40px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-3 bg-light">
                        <div class="text-center">
                            <h3 class="text-danger"><strong>Warning !!!</strong></h3>
                        </div>
                        <?php include ('db/getuserconfig.php')?>
                        <form action="../db/deleteuserconfig.php" method="POST">
                            <div class="p-4">
                                <div class="container">
                                    <p class="text-center fs-2"><strong>Are you sure you want to delete <u>"<?php echo ("$fname $lname");?>"</u></strong></p>
                                    <input type="hidden" value="<?php echo $id; ?>" name="uid">
                                    <input type="hidden" value="<?php echo $erase; ?>" name="erase">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                        required="required">
                                    <label class="form-check-label" for="invalidCheck">
                                        By ticking this box, I understand that my action will result in 
                                        <strong>DELETE</strong> this account <strong>PERMENANTLY</strong>.
                                        User will not be able to sign up using the email that has been deleted.
                                    </label>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <button class="btn btn-danger text-start mt-2 " type="submit">Yes</button>
                                    <a href="../adminuser.php"><button class="btn btn-dark text-end mt-2" type="button">Cancel</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- content end-->
<?php include('partial/footer.php')?>
