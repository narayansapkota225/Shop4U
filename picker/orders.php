<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role']==2)) {  
?>
<?php $Title = "Orders to Pick | Picker - Shop4U"?>
<?php include('../partial/pickermenu.php') ?>

<!-- content here -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Orders Ready to Pick</h1>
    </div>
    <div class="container ">
    <?php if (isset($_GET['result'])) {
    if ($_GET["result"] === "picked") {
        echo '<div class="alert alert-success alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> You have successfully picked the order!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } elseif ($_GET["result"] === "orderpicked") {
        echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> This order has already been picked by another picker!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}?>
        <!-- form content -->
        <div class="tab-content">
        <!-- all user form content -->
        <div id="all" class="tab-pane fade show active">
            <div class="table-responsive mt-2">
                <table id="user" class="table table-striped caption-top">
                    <caption class="text-center">
                        <h3>View and pick orders</h3>
                    </caption>
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Shopper</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delivery Instructions</th>
                            <th scope="col">Status</th>
                            <th scope="col">View Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../db/pickerGetOrders.php'?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<?php include '../partial/footer.php';
} else {
    header ("Location:../login.php");
}
//<!-- content end-->
?>