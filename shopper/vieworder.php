<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role'] == 1)) {
    ?>
<?php $Title = "View Order | Shopper - Shop4U"?>
<?php include '../partial/usermenu.php'?>

<!-- content start here-->
<!-- offcanva -->
<div class="offcanvas offcanvas-end <?php if (isset($_GET['delete'])) { echo "show";}?>" style="width: 450px;" tabindex="-1"  data-bs-backdrop="false" data-bs-scroll="true" id="offcanvasRight" aria-hidden="true">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Shopping Cart</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <?php if (empty($_SESSION[$pro])) {?>
                    <div style="text-align: center;">
                      <h5>Your cart is empty.</h5>
                    </div>
                    <?php } else { ?>
      <table class="table mt-2 align-middle text-center">
          <thead>
            <tr>
                <th scope="col" class="border-0 bg-light">
                <div class="p-2 px-3 text-uppercase">Product</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Quantity</div>
                </th>
                <th scope="col" class="border-0 bg-light ">
                <div class="py-2 text-uppercase">Price</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Remove</div>
                </th>
            </tr>
          </thead>
          <tbody>
            <?php   
            if(!empty($_SESSION[$pro]))  
            {  
                 $total = 0;  
                 foreach($_SESSION[$pro] as $keys => $values)  
                 {  
            ?>
              <tr>
                
                <th scope="row" class="border-0">
                <div class="p-2">
                    <img src="../images/product/<?php echo $values["image"]; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                </div>
                </th>
                <td class="border-0 align-middle">
                    <form action="../db/addtocart.php" method="POST">
                        <input type="number" step="1" max="10" value="<?php echo $values["quantity"]; ?>" min="1" name="quantity" class="quantity-field text-center form-control-sm">
                        <button type="submit" class="btn btn-primary btn-sm" name="uq">Update</button>
                        <input type="hidden" value="<?php echo $keys;?>" name="key"/>
                        <input type="hidden" value="<?php echo $values["id"];?>" name="id"/>
                    </form> 
                </td>
                <td class="border-0 align-middle"><strong>$<?php echo number_format($values["quantity"] * $values["price"], 2); ?></strong></td>
                <td class="border-0 align-middle"><a href="index.php?delete=<?php echo $keys;?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
            </tr> 
            <?php  
                      $total = $total + ($values["quantity"] * $values["price"]);  
                 }  
            ?>  
            <tr>  
                 <td colspan="3" align="right"><strong>Total</strong></td>  
                 <td align="right"><strong>$ <?php echo number_format($total, 2); ?></strong></td>  
                 <td></td>  
            </tr>
             
            <?php  
            }  
            ?>
          </tbody>
      </table>
      <?php }
    //    foreach($_SESSION[$pro] as $keys)  
    //    {
    //     print_r($keys);
    //    }
      ?>
  </div>
  <?php if (!empty($_SESSION[$pro])) {?>
  <div style="max-height: 60px; min-height: 60px" class=" justify-content-center order-2 w-100">
        <div class="d-grid gap-2 p-3 ">
            <a  href="checkout.php" role="button" class="btn btn-success" >Checkout</a>
        </div>
    </div>
    <?php } ?>
</div>

<!-- offcanva -->
        <?php
$orderid = $_GET['orderid'];
    require_once "../db/config.php";
    $sql = "SELECT * FROM custOrder WHERE shopperId=? AND id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        $userId = $_SESSION['id'];
        mysqli_stmt_bind_param($stmt, "ii", $userId, $orderid);
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
                    echo "Waiting for Picker";} 
                    elseif ($status == 1) {
                        echo "Picker Assigned";
                    } elseif ($status == 2) {
                        echo "Order Processing";
                    } elseif ($status == 3 ) {
                        echo "Order Getting Ready";
                    } elseif ($status == 4) {
                        echo "Order enroute";
                    } elseif ($status == 5) {
                        echo "Order Delivered";
                    }
                ?></h6>
        </div>
            <div class="col-lg-12 p-3 bg-white rounded shadow-lg mb-5">
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
                                    while($row = mysqli_fetch_array($result)){
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
                                        if (!$row1 = mysqli_fetch_array($result1)) {
                                            echo "You need to resubmit your reset request.product";
                                            exit();
                                        } else {
                                            $prodname = $row1['title'];
                                            $image = $row1['image'];
                                            $price = $row1['price'] ?>
                            <tr>
                                <th scope="row"><img class="img-fluid " src="../images/product/<?php echo $image; ?>"
                                        style="width:100px;"> <?php echo $prodname; ?></th>
                                <td scope="row">$<?php echo $price; ?></td>
                                <td scope="row"><?php echo $qty; ?></td>
                                <td scope="row">$<?php echo $prodSubtotal; ?></td>
                            </tr>
                            <?php 
                            }
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
                    <div class="d-grid gap-2 p-3 ">
                    <?php if ($status == 0){?>
                    <button type="button" class="btn btn-danger rounded-pill position-relative" data-bs-toggle="modal" data-bs-target="#cancelModal"><strong>Cancel Order</strong>
                    </button>
                    <?php } ?>
                    </div>
                    <!-- Modal content here -->
</div>
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger text-center" id="cancelModalLabel">Confirmation of Order Cancellation!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../db/cancelorder.php" method="post">
      <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $orderid; ?>">
            Are you sure you want to cancel your order?                    
      </div>
      <div class="modal-footer">
          <input class="btn btn-danger rounded-pill py-2 " type="submit" name="placeOrder" value="Cancel Order">
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
        <script src="../js/bootstrap-input-spinner.js"></script>
<script>
$("input[type='number']").inputSpinner()
</script>
        <?php include '../partial/footer.php'?>
        <?php
} else {
    header("Location: ../login.php");
    exit();
}
?>