<?php session_start(); /* Starts the session */

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role'] == 1)) {
    ?>
<?php $Title = "Orders - Shop4U"?>
<?php include '../partial/usermenu.php'?>
<!-- content here -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Orders</h1>
    </div>
    <div class="container ">
    <?php if ($_GET['result'] == "deleted") {?>
        <p class="alert alert-success alert-dismissible fade show m-2"><i class="bi bi-check-circle-fill"></i> Your order has been successfully deleted!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
        <?php } elseif ($_GET['result'] == "productprocessed") {?>
        <p class="alert alert-danger alert-dismissible fade show m-2"><i class="bi bi-exclamation-triangle-fill"></i> Order cannot be deleted! It has been processed by the picker!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
        <?php } elseif($_GET["result"] === "orderprocessed") { ?>
            <p class="alert alert-success alert-dismissible fade show m-2"><i class="bi bi-check-circle-fill"></i> Your order has been successfully processed!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
        <?php } ?>
        <!-- form content -->
        <div class="tab-content">
        <!-- all user form content -->
        <div id="all" class="tab-pane fade show active">
            <div class="table-responsive mt-2">
                <table id="user" class="table table-striped caption-top">
                    <caption>
                        <h3>List of Orders</h3>
                    </caption>
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">View Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../db/getOrders.php'?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<?php include '../partial/footer.php';?>
<?php }else {
    header("Location: ../login.php");
    exit();
} ?>

<!-- content end-->
