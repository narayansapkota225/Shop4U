<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:adminlogin.php");
        exit;
}
?>
<?php $Title = "Product | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content here -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Product Page</h1>
        <?php if (isset($_GET['result'])) { ?>
        <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
        <?php } ?>
        <?php if (isset($_GET['error'])) { ?>
        <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
        <?php } ?>
    </div>
    <div class="container ">
        <div class="col-sm-21 shadow-lg p-2 bg-light rounded">
            <nav class="navbar navbar-light bg-light">
                <div class="d-flex flex-wrap">
                    <div class="p-2 ">
                        <a class="fs-4 text-dark text-decoration-none " href="addproduct.php"><button class="btn btn-lg btn-primary" >Add a product</button></a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- form tab -->
        <div class=" col-sm-21 shadow-lg p-2 bg-light rounded">
        <ul class="nav bg-white nav-pills rounded-pill nav-fill ">
            <li class="nav-item">
            <a class="nav-link active rounded-pill " data-bs-toggle="pill" data-bs-target="#all" role="tab" >All</a>
            </li>
            <?php include('../db/procatfilterconfig.php')?>
        </ul>
        </div>
        <!-- form tab -->
        <!-- form content -->
        <div class="tab-content">
        <!-- all product form content -->
        <div id="all" class="tab-pane fade show active"> 
            <div class="table-responsive mt-2">
                <table id="product" class="table table-striped caption-top">
                    <caption>
                        <h3>List of Product</h3>
                    </caption>
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category</th>
                            <th scope="col">Feature</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include('../db/adminproductconfig.php') ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- all product form content -->

        <!-- korean product form content -->
        <?php include('../db/showproductfilter.php')?>
        <!-- all product form content -->
    </div>

</main>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $('#product').DataTable();
});
</script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<!-- content end-->
<?php include('../partial/footer.php')?>