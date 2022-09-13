<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role'] == 1)) {
    ?>
<?php $Title = "User Home - Shop4U"?>
<?php include ('../db/removeitem.php');?>
<?php include '../partial/usermenu.php'?>

<!-- content here-->

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
<!-- toast -->
<?php if (isset($_GET['add'])) {?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast align-items-center text-white bg-primary border-0 " role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            Item has been added!! 
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<?php }?>
<!-- toast -->
<!-- Modal -->
<?php include '../db/showpromodalconfig.php'?>
<!-- modal -->


<main class="flex-shrink-0">
    <div class="container">
        <?php if (isset($_GET['result'])) {?>
        <p class="alert alert-success alert-dismissible fade show m-2"><strong><?php echo $_GET['result']; ?></strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
        <?php }?>
        <?php if (isset($_GET['error'])) { ?>
        <p class="alert alert-danger alert-dismissible fade show m-2"><strong><?php echo $_GET['error']; ?></strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
        <?php } ?>
        <h3 class="mt-5">Hello <?php echo $_SESSION['firstname']; ?>, </h3>
    </div>
    <section class="py-2">
        <div class="container py-5">
            <div class="row">
                <!-- category selection -->
                <div class="col-xl-2 col-lg-3 order-1 order-lg-1">
                    <h5 class="mb-4 d-flex justify-content-center">Shop by Category</h5>
                    <div class="d-flex justify-content-center">
                        <div class="nav flex-column nav-pills me-3" role="tablist" aria-orientation="vertical">
                            <button class="btn btn-lg nav-link show active"  data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab" aria-selected="true">All</button>
                            <?php include '../db/indexprocatconfig.php'?>
                        </div>
                    </div>
                </div>
            <!-- category selection -->
                <div class="col-xl-10 col-lg-9 order-2 order-lg-2 mb-5 mb-lg-0">
                    <div class="tab-content" >
                        <!-- all product -->
                        <div class="tab-pane fade show active" id="all" role="tabpanel" >
                            <div class="row">
                                <?php include '../db/indexproductconfig.php'?>
                            </div>
                        </div>
                        <!-- all product -->

                        <!-- product by category -->
                        <?php include '../db/indexproductfilterconfig.php'?>
                        <!-- product by category -->
                    </div>
                </div>
        </div>
    </section>
</main>
<script>
onload = function() {
  var toastElList = [].slice.call(document.querySelectorAll('.toast'))
  var toastList = toastElList.map(function(toastEl) {
    return new bootstrap.Toast(toastEl)
  })
  toastList.forEach(toast => toast.show()) 
}

</script>




<!-- content end -->
<?php include '../partial/footer.php'?>
<?php
} else {
    header("Location: ../login.php");
    exit();
}
?>