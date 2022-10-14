<?php session_start(); /* Starts the session */

if (!isset($_SESSION['UserData']['Username'])) {
    header("location:adminlogin.php");
    exit;
}
?>
<?php $Title = "Active Users | Admin - Shop4U"?>
<?php include '../partial/adminmenu.php'?>
<!-- content here -->
<?php $search = $_POST['search'];?>
<main class="flex-shrink-0">
    <div class="container">
        <div class="d-flex flex-wrap mt-3">
            <h1 >Orders</h1>
        </div>
    </div>
    <div class="container ">
        <!-- form content -->
        <div class="container-fluid justify-content-center mt-3">
        <a href="orders.php"><button class="btn btn-lg btn-outline-primary"><span class="fa-solid fa-arrow-left"></span> Back</button></a> 
        </div>
        <div class="container">
        <p class="text-center fs-4"><strong> Search Result of "#SHOP4U<?php echo $search;?>"</strong></p>
        </div>
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
                            <th scope="col">No.</th>
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
                        <?php include '../db/adminsearchorder.php'?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<!-- content end-->
<?php include '../partial/footer.php'?>