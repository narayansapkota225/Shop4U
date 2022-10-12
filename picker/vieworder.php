<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role'] == 2)) {
    ?>
<?php $Title = "View Order | Picker - Shop4U";?>
<?php include '../partial/pickermenu.php';?>

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
            echo "You need to resubmit your reset request.";
            exit();
        } else {
            $date = $row['orderDate'];
            $subTotal = $row['subTotal'];
            $grandTotal = $row['total'];
            $instructions = $row['instruction'];
            $status = $row['orderStatus'];
            $deliveryFee = $row['handlingFee'];
            $tax = $row['tax'];
            $shopperId = $row['shopperId'];
            $previous = "javascript:history.go(-1)";
            if(isset($_SERVER['HTTP_REFERER'])) {
                $previous = $_SERVER['HTTP_REFERER'];
            }
            ?>
        <div class="container">
        
        <div class="container" style="margin-top: 40px">
        <a href="<?= $previous ?>"><button class="btn btn-primary " type="submit"><span class="fa-solid fa-arrow-left"></span> Back</button></a>
    </div>
    <div class="container py-3 text-center">
            <h3>Order Details</h3>
        </div>
        <div class="container py-3">
            <h6>Order Date: <?php echo $date;?></h6>
            <h6>Order Status: <?php if($status == 0){
                    echo "Waiting for Picker";
                }elseif ($status == 1) {
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
        </div>
            <div class="col-lg-12 p-2 bg-white rounded shadow-lg mb-5">
                <div class="table-responsive">
                    <!-- Shopping cart table -->
                    <table id="user" class="table table-striped caption-top">
                        <caption>
                            <h3>#SHOP4U<?php echo $orderid;?></h3>
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
                                            $price = $row['price'];
                                            $image = $row['image']; ?>
                            <tr>
                                <th scope="row"><img class="img-fluid " src="../images/product/<?php echo $image; ?>"
                                        style="width:100px;"> <?php echo $prodname; ?></th>
                                <td scope="row"><?php echo $price; ?></td>
                                <td scope="row"><?php echo $qty; ?></td>
                                <td scope="row"><?php echo $prodSubtotal; ?></td>
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
                    <?php

    $sql = "SELECT * FROM user WHERE id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $shopperId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_array($result)) {
            echo "You need to resubmit your reset request.";
            exit();
        } else {

            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['address'];
            $city = $row['city'];
            $postCode = $row['postCode'];
            $state = $row['state'];
            $fullname = $firstname . " " . $lastname;
            ?>
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase fw-bolder">Instructions</div>
                    <div class="p-4">
                        <p><?php  if ($instructions == null) {
                        echo "There is no instructions sent by the user.";
                    } else {
                        echo $instructions;
                    } ?></p>
                    </div>
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase fw-bolder">Customer Details</div>
                    <div class="p-4">
                        <p>Name: <a href="viewshopper.php?id=<?php echo $shopperId ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-black"><?php echo $fullname; ?></a></p>
                        <p><a href="tel:+61<?php echo $phone; ?>" class="text-decoration-none text-black"><i class="bi bi-telephone-fill"></i> <?php echo $phone; ?></a></p>
                        <p><a href="mailto:<?php echo $email; ?>" class="text-decoration-none text-black"><i class="bi bi-envelope-fill"></i> <?php echo $email; ?></a></p>
                        <p><?php echo $address; ?>, <?php echo $city; ?></p>
                        <p><?php echo $postCode; ?> <?php echo $state; ?></p>
                    </div>
                    <?php 
                    }
                }if ($status == 0){
                        $orderConfirmation = "Confrimation of Order Pick!";
                        $orderMessage = "Are you sure you want to pick this order?";
                        $orderButton = "Accept Order";
                        $orderStatusPost = 1;?>
                    <div class="d-grid gap-2 p-3 ">
                    <button type="button" class="btn btn-success rounded-pill position-relative" data-bs-toggle="modal" data-bs-target="#pickModal"> Accept Order
                    </button>
                    </div>
                    <?php } elseif($status == 1){
                        $orderConfirmation = "Confrimation of Order Delivery!";
                        $orderMessage = "Are you sure you want to deliver this order?";
                        $orderButton = "Deliver Order";
                        $orderStatusPost = 5;?>
                    <div class="d-grid gap-2 p-3 ">
                    <button type="button" class="btn btn-primary rounded-pill position-relative" data-bs-toggle="modal" data-bs-target="#pickModal"> Deliver Order
                    </button>
                    </div>
                    <?php } ?>
                    <!-- Modal content here -->
</div>
<div class="modal fade" id="pickModal" tabindex="-1" aria-labelledby="pickModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title <?php if ($status == 0){ ?> text-success <?php }else{ ?> text-primary <?php } ?> text-center fw-bold" id="pickModalLabel"><?php echo $orderConfirmation; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../db/updateorder.php" method="post">
      <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $orderid; ?>">
            <input type="hidden" name="orderStatusPost" value="<?php echo $orderStatusPost; ?>">
            <?php echo $orderMessage; ?>                    
      </div>
      <div class="modal-footer">
          <?php if ($status == 0){ ?>
          <input class="btn btn-success rounded-pill py-2 " type="submit" name="acceptOrder" value="<?php echo $orderButton; ?>">
          <?php } elseif ($status == 1){ ?>
          <input class="btn btn-primary rounded-pill py-2 " type="submit" name="deliverOrder" value="<?php echo $orderButton; ?>">
            <?php } ?>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal content end -->
                    
                    <?php
}
    }
    ?>
                    <!-- End -->
            </div>
        <!-- content end -->
        <?php include '../partial/footer.php';?>
        <?php
} else {
    header("Location: ../login.php");
    exit();
}
?>