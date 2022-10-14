<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role']==1 )) {
?>
<?php $Title = "User Home - Shop4U"?>
<?php include('../partial/usermenu.php')?>

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
<div class="container-fluid vh-100">
    <div class="" style="margin-top:100px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Reset Your Password</h3>
                    <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
                    <?php } ?>
                </div>
                <form class="row g-3 needs-validation" action="../db/resetpwdconfig.php" method="post">
                    <div class="col-md-10 center">
                        <label class="form-label">Old Password</label>
                        <input type="password" name="opwd" class="form-control" placeholder="Enter your Old Password.." required>
                    </div>
                    <div class="col-md-10 center">
                        <label class="form-label">New Password</label>
                        <input type="password" name="npwd" class="form-control" placeholder="Enter your New Password.." 
                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                        oninvalid="setCustomValidity('Password must contain UpperCase, LowerCase, Number/SpecialCharacter and Min 8 Characters. Example password: J1Smith1&3')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-10 center">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="cnpwd" class="form-control" placeholder="Please confirm your New Password.." 
                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                        oninvalid="setCustomValidity('Password must contain UpperCase, LowerCase, Number/SpecialCharacter and Min 8 Characters. Example password: J1Smith1&3')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Reset Password</button>
                </div>
            </form>
            </div>
        </div>  
    </div>
</div>
<script src="../js/bootstrap-input-spinner.js"></script>
<script>
$("input[type='number']").inputSpinner()
</script>
<!-- content end -->
<?php include('../partial/footer.php')?>
<?php 
}else{
     header("Location: ../login.php");
     exit();
}
 ?>