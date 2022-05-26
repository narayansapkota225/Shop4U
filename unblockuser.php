<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../adminlogin.php");
        exit;
}
?>
<?php $Title = "Unblock User | Admin - Shop4U"?>
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
                        <form action="../db/unblockuserconfig.php" method="POST">
                            <div class="p-4">
                                <div class="container">
                                    <p class="text-center"><strong>Are you sure you want to unblocked <?php echo ("$fname $lname");?></strong></p>
                                    <input type="hidden" value="<?php echo $id; ?>" name="uid">
                                    <input type="hidden" value="<?php echo $suspended; ?>" name="sus">
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <button class="btn btn-danger text-start mt-2 " type="submit">Yes</button>
                                    <a href="../adminblock.php"><button class="btn btn-dark text-end mt-2" type="button">Cancel</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- content end-->
<?php include('partial/footer.php')?>
