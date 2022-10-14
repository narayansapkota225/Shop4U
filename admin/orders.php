<?php session_start(); /* Starts the session */

if (!isset($_SESSION['UserData']['Username'])) {
    header("location:adminlogin.php");
    exit;
}
?>
<?php $Title = "Active Users | Admin - Shop4U"?>
<?php include '../partial/adminmenu.php'?>
<!-- content here -->
<main class="flex-shrink-0">
    <div class="container">
        <div class="col-sm-21 shadow-lg p-2 mt-5 bg-light rounded">
            <nav class="navbar navbar-light bg-light">
                <div class="d-flex flex-wrap">
                    <h1 >Orders</h1>
                </div>
                <!-- <div class="justify-content-end">
                    <form class="form input-group" action="searchorder.php" method="POST">
                        <span class="input-group-text fw-bold" id="basic-addon3">#SHOP4U</span>
                        <input class="form-control" type="text" placeholder="XXX" name="search" pattern="[0-9]{1,10}" 
                        oninvalid="setCustomValidity('Please enter Numbers Only')"
                        onchange="try{setCustomValidity('')}catch(e){}" required>
                        <span>&nbsp;&nbsp;</span>
                        <button class="btn btn-lg btn-outline-success" type="submit"><span class="fa-solid fa-magnifying-glass"></span>
                            Search</button>
                    </form>
                </div> -->
            </nav>
        </div>
        <div class=" col-sm-21 shadow-lg p-5 bg-light rounded">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-end mt-2">
                        <button type="submit" class="btn btn-primary bi bi-funnel"> Filter</button>
                    </div>
                    <div class="col-md-2 d-flex align-items-end mt-2">
                        <a href="orders.php" class="btn btn-success bi bi-arrow-counterclockwise"> Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container ">
        <!-- form content -->
        <div class="tab-content">
        <!-- all user form content -->
        <div id="all" class="tab-pane fade show active">
            <div class="table-responsive mt-2">
                <table id="order" class="table table-striped caption-top">
                    <caption>
                        <h3>List of Orders</h3>
                    </caption>
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col" class="d-none">ID</th>
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
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $('#order').DataTable();
});
</script>
<!-- content end-->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<?php include '../partial/footer.php'?>