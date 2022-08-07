<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../adminlogin.php");
        exit;
}
?>
<?php $Title = "Category | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content here -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Category Page</h1>
        <?php if (isset($_GET['result'])) { ?>
        <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
        <?php } ?>
        <?php if (isset($_GET['error'])) { ?>
        <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
        <?php } ?>
    </div>
    <div class="container ">
        <nav class="navbar navbar-light">
          <span class="justify-content-start">
          <a class="fs-4 text-dark text-decoration-none" href="addcategory.php"><button class="btn btn-lg btn-primary" >Add a category</button></a>
        </span>
        </nav>
        <div class="table-responsive mt-2">
            <table id="user" class="table table-striped caption-top">
                <caption>
                    <h3>List of Category</h3>
                </caption>
                <thead class="bg-secondary text-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Feature</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include('../db/admincatconfig.php') ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<!-- content end-->
<?php include('../partial/footer.php')?>