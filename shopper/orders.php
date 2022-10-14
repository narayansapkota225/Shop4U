<?php session_start(); /* Starts the session */

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role'] == 1)) {
    ?>
<?php $Title = "Orders - Shop4U"?>
<?php include '../partial/usermenu.php'?>
<!-- content here -->
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
            <div class="table-responsive mt-2">
                <table id="sorder" class="table table-striped caption-top">
                    <caption>
                        <h3>List of Orders</h3>
                    </caption>
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Picker</th>
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
</main>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../js/bootstrap-input-spinner.js"></script>
<script>
$("input[type='number']").inputSpinner()
</script>
<script>
$(document).ready(function () {
    $('#sorder').DataTable();
});
</script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<?php include '../partial/footer.php';?>
<?php }else {
    header("Location: ../login.php");
    exit();
} ?>

<!-- content end-->
