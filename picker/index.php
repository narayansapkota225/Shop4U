<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role']==2)) {  
    $Title = "Dashboard - Picker | Shop4U";
?>
<?php include('../partial/pickermenu.php') ?>

<!-- content start here -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Hello <?php echo $_SESSION['firstname']; ?>,</h1>
        <p> Welcome to your dahsboard!</p>
    </div>
</main>
<!-- content end here -->
<div class="container ">
    <?php if (isset($_GET['result'])) {
    if ($_GET["result"] === "picked") {
        echo '<div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle-fill"></i> You have successfully picked the order!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } elseif ($_GET["result"] === "orderpicked") {
        echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> You have already been picked by another picker!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } elseif ($_GET["result"] === "delivered") {
        echo '<div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle-fill"></i> The order has been successfully delivered!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } elseif ($_GET["result"] === "ordernotpicked") {
        echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> This order needs to be picked before it can be delivered!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }elseif ($_GET["result"] === "toomanyorders") {
        echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> Sorry but you are only allowed to pick a maximum of 3 orders at a time. Please deliver the existing orders and then pick new ones.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}?>
    <?php if (isset($_GET['error'])) { ?>
        <p class="alert alert-danger alert-dismissible fade show m-2"><strong><?php echo $_GET['error']; ?></strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
    <?php } ?><?php if (isset($_GET['res'])) { ?>
        <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['res']; ?></strong></p>
    <?php } ?>
<!-- new order -->
<div class="p-2 bg-white rounded shadow-lg row">
    <div class="table-responsive">
        <div class="bg-success bg-gradient rounded-pill px-4 py-2 text-uppercase fw-bold text-center text-white">New Order Requests</div>
        <table class="table table-hover text-center">
            <tbody>
                <?php include '../db/pickerGetOrders.php'?>
            </tbody>
        </table>
    </div>
</div>
<div><br>
</div>
<!-- new order -->
<div class="p-2 bg-white rounded shadow-lg row">
    <!-- picked order -->
        <div class="table-responsive">
            <div class="bg-primary bg-gradient rounded-pill px-4 py-3 text-uppercase fw-bold text-center text-white">Current Orders</div>
            <table class="table table-hover text-center">
                <tbody>
                <?php include '../db/pickerCurrentOrders.php'?>
                </tbody>
            </table>
    </div>
    <!-- picked order -->
</div>
</div>

<?php include('../partial/footer.php') ?>
<?php 
}else{
     header("Location: ../login.php");
     exit();
}
 ?>