<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:admin/ adminlogin.php");
        exit;
}
?>
<?php $Title = "Add Category | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content here -->
<div class="container">
    <div class="container" style="margin-top: 40px">
        <a href="category.php"><button class="btn btn-lg btn-outline-primary" type="submit"><span class="fa-solid fa-arrow-left"></span> Back</button></a>
    </div>
    <div class="col-md-6 col-sm-21 shadow-lg p-5 rounded" style="margin-top: 40px">
        <h3 >Update Category</h3>
        <?php if (isset($_GET['error'])) { ?>
        <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
        <?php } ?>
        <?php if (isset($_GET['result'])) { ?>
        <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
        <?php } ?>
        <?php include ('../db/getcatconfig.php')?>
        <div class="container">
            <form class="row g-3 needs-validation" action="../db/updatecatconfig.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-10">
                        <label class="form-label">Title</label>
                        <input type="text" placeholder="Korea" class="form-control" name="title" value="<?php echo $title;?>"
                            required="required">
                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                    </div>
                    <div class="col-md-10">
                        <label class="form-label">Current Image</label>
                        <div class="container">
                            <img src="../images/category/<?php echo $image;?>" width="100px">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <label class="form-label">Upload New Image</label>
                        <input type="file" class="form-control" name="image" >
                    </div>
                    <div class="col-md-10">
                        <label class="form-label">Feature: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="feature" value="yes" <?php if($feature == "yes") echo "checked";?> >
                            <label class="form-check-label" for="feature">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="feature" value="no" <?php if($feature == "no") echo "checked";?>>
                            <label class="form-check-label" for="feature">No</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <label class="form-label">Active: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="active" value="yes" <?php if($active == "yes") echo "checked";?> >
                            <label class="form-check-label" for="feature">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="active" value="no" <?php if($active == "no") echo "checked";?> >
                            <label class="form-check-label" for="feature">No</label>
                        </div>
                    </div>
                    <p class="col-12 text-center">
                        <button class="btn btn-info " type="submit"><span class="fa fa-paper-plane"></span>
                            Submit</button>
                    </p>
                </form>
            </div>
    </div>
</div>
<br></br>
<!-- content end-->
<?php include('../partial/footer.php')?>