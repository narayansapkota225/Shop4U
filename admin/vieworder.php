<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../adminlogin.php");
        exit;
}
?>
<?php $Title = "Update User | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content start here-->

        <?php
$orderid = $_GET['orderid'];
    require_once "../db/config.php";
    $sql = "SELECT * FROM custOrder WHERE id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        $userId = $_SESSION['id'];
        mysqli_stmt_bind_param($stmt, "i", $orderid);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_array($result)) {
            echo "You need to resubmit your reset request.noresult";
            exit();
        } else {
            $date = $row['orderDate'];
            $subTotal = $row['subTotal'];
            $grandTotal = $row['total'];
            $instructions = $row['instruction'];
            $status = $row['orderStatus'];
            $deliveryFee = $row['handlingFee'];
            $tax = $row['tax'];
            $shopperid = $row['shopperId'];
            $pickerid = $row['pickerId'];

            ?>
        <div class="container">
        
        <div class="container" style="margin-top: 40px">
        <a href="orders.php"><button class="btn btn-primary " type="submit"><span class="fa-solid fa-arrow-left"></span> Back</button></a>
    </div>
    <div class="container py-3 text-center">
            <h3>Order Details</h3>
        </div>
        <div class="container py-3">
            <h6>Order Date: <?php echo $date;?></h6>
            <h6>Order Status: <?php if($status == 0){
                    echo "Waiting for Picker";
                 } elseif ($status == 1) {
                    echo "Picker Assigned";
                } elseif ($status == 2) {
                    echo "Order Processing";
                } elseif ($status == 3 ) {
                    echo "Order Getting Ready";
                } elseif ($status == 4) {
                    echo "Order enroute";
                } elseif ($status == 5) {
                    echo "Order Delivered";
                } ?></h6>
                <?php $sqlshopper = "SELECT * FROM user WHERE id=?";
                                    $stmtshopper = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmtshopper, $sqlshopper)) {
                                        echo "There was an error!";
                                        exit();
                                    } else {
                                        mysqli_stmt_bind_param($stmtshopper, "i", $shopperid);
                                        mysqli_stmt_execute($stmtshopper);
                                        $resultshopper = mysqli_stmt_get_result($stmtshopper);
                                        if (!$row = mysqli_fetch_array($resultshopper)) {
                                            echo "You need to resubmit your reset request.product";
                                            exit();
                                        } else {
                                            $shopperfirst = $row['firstname'];
                                            $shopperlast = $row['lastname']; ?>
                <h6>Shopper: <?php echo $shopperfirst;?> <?php echo $shopperlast;}}?></h6>
                <?php $sqlpicker = "SELECT * FROM user WHERE id=?";
                                    $stmtpicker = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmtpicker, $sqlpicker)) {
                                        echo "There was an error!";
                                        exit();
                                    } else {
                                        mysqli_stmt_bind_param($stmtpicker, "i", $pickerid);
                                        mysqli_stmt_execute($stmtpicker);
                                        $resultpicker = mysqli_stmt_get_result($stmtpicker);
                                        if (!$row = mysqli_fetch_array($resultpicker)) {
                                            $pickerfirst = "No picker";
                                            $pickerlast = "assigned yet";
                                        } else {
                                            $pickerfirst = $row['firstname'];
                                            $pickerlast = $row['lastname']; }?>
                                <h6>Picker: <?php echo $pickerfirst;?> <?php echo $pickerlast;}?></h6>
        </div>
            <div class="col-lg-12 p-3 bg-white rounded shadow-lg mb-5">
                <div class="table-responsive">
                    <!-- Shopping cart table -->
                    <table id="user" class="table table-striped caption-top">
                        <caption>
                            <h3>Order No.<?php echo $orderid;?></h3>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 text-uppercase">Product</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Price</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Quantity</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Product subtotal</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM custOrder_product WHERE custOrderId=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error!";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "i", $orderid);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                if (!$result) {
                                    echo "You need to resubmit your reset request.order";
                                    exit();
                                } else {
                                    while($row = mysqli_fetch_array($result)) {
                                    $id = $row['custOrder_product_id'];
                                    $productid = $row['productId'];
                                    $qty = $row['quantity'];
                                    $prodSubtotal = $row['prodSubTotal'];
                                    
                                    $sql1 = "SELECT * FROM product WHERE id=?";
                                    $stmt1 = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                                        echo "There was an error!";
                                        exit();
                                    } else {
                                        mysqli_stmt_bind_param($stmt1, "i", $productid);
                                        mysqli_stmt_execute($stmt1);
                                        $result1 = mysqli_stmt_get_result($stmt1);
                                        if (!$row = mysqli_fetch_array($result1)) {
                                            echo "You need to resubmit your reset request.product";
                                            exit();
                                        } else {
                                            $prodname = $row['title'];
                                            $image = $row['image']; 
                                            $price = $row['price'];?>
                            <tr>
                                <th scope="row"><img class="img-fluid " src="../images/product/<?php echo $image; ?>"
                                        style="width:100px;"> <?php echo $prodname; ?></th>
                                <td scope="row">$<?php echo $price; ?></td>
                                <td scope="row"><?php echo $qty; ?></td>
                                <td scope="row">$<?php echo $prodSubtotal; ?></td>
                            </tr>
                            <?php }
                                    }
                        }
                                    
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase fw-bolder">Order summary </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Order
                                    Subtotal
                                </strong><strong>$<?php echo $subTotal; ?></strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Delivery
                                    and
                                    Handling Fee</strong><strong>$<?php echo $deliveryFee;?></strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Tax</strong><strong>$<?php echo $tax;?></strong>
                            </li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">$<?php  echo $grandTotal;?>
                                </h5>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase fw-bolder">Instructions</div>
                    <div class="p-4">
                        <p><?php  if ($instructions == null) {
                        echo "There is no instructions sent by the user.";
                    } else {
                        echo $instructions;
                    } ?></p>
                    </div>
                    <?php
}
    }
    ?>
                    <!-- End -->
            </div>
        <!-- content end -->
        <?php include '../partial/footer.php'?>