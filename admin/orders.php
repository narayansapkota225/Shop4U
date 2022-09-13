<?php session_start(); /* Starts the session */

if (!isset($_SESSION['UserData']['Username'])) {
    header("location:../adminlogin.php");
    exit;
}
?>
<?php $Title = "Active Users | Admin - Shop4U"?>
<?php include '../partial/adminmenu.php'?>
<!-- content here -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Orders</h1>
    </div>
    <div class="container ">
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
                            <th scope="col">Order Date</th>
                            <th scope="col">Shopper</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delivery Instructions</th>
                            <th scope="col">Status</th>
                            <th scope="col">Picker</th>
                            <th scope="col">View Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../db/adminGetOrders.php'?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<!-- content end-->
<?php include '../partial/footer.php'?>