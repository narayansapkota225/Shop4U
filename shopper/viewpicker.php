<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role'] == 1)) {
    ?>
<?php $Title = "View Picker Profile | Shopper - Shop4U"?>
<?php include '../partial/usermenu.php'?>
<!-- content start here-->
<!-- offcanva -->
<div class="offcanvas offcanvas-end <?php if (isset($_GET['delete'])) {echo "show";}?>" style="width: 450px;" tabindex="-1"  data-bs-backdrop="false" data-bs-scroll="true" id="offcanvasRight" aria-hidden="true">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Shopping Cart</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <?php if (empty($_SESSION[$pro])) {?>
                    <div style="text-align: center;">
                      <h5>Your cart is empty.</h5>
                    </div>
                    <?php } else {?>
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
if (!empty($_SESSION[$pro])) {
        $total = 0;
        foreach ($_SESSION[$pro] as $keys => $values) {
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
                        <input type="hidden" value="<?php echo $keys; ?>" name="key"/>
                        <input type="hidden" value="<?php echo $values["id"]; ?>" name="id"/>
                    </form>
                </td>
                <td class="border-0 align-middle"><strong>$<?php echo number_format($values["quantity"] * $values["price"], 2); ?></strong></td>
                <td class="border-0 align-middle"><a href="index.php?delete=<?php echo $keys; ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
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
    <?php }?>
</div>

<!-- offcanva -->
<?php
$pickerId = $_GET['id'];

    require_once "../db/config.php";
    $sql = "SELECT * FROM user WHERE id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $pickerId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_array($result)) {
            echo "You need to resubmit your reset request.";
            exit();
        } else {

            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $phone = $row['phone'];
            $transportation = $row['transportation'];
            $fullname = $firstname . "+" . $lastname;
            $size = 100;
            $url = "https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=" . $fullname . "&size=" . $size;

            $previous = "javascript:history.go(-1)";
            if (isset($_SERVER['HTTP_REFERER'])) {
                $previous = $_SERVER['HTTP_REFERER'];
            }
            ?>
<section class=" gradient-custom-2 mx-auto">
    <div class="container" style="margin-top: 40px;">
        <a href="<?= $previous ?>"><button class="btn btn-primary " type="submit"><span class="fa-solid fa-arrow-left"></span>
                Back</button></a>
    </div>
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="rounded-top text-white d-flex bg-dark"  height="180">
                <div class="ms-5 mt-5 d-flex">
                    <img src="<?php echo $url; ?>" alt="Profile picture" class="img-fluid img-thumbnail mt-4 mb-2">
                </div>
                <div class="ms-3" style="margin-top: 80px;">
                    <h5><?php echo $firstname ?> <?php echo $lastname ?></h5>
                    <p><a href="mailto:<?php echo $email ?>" target="_blank" rel="noopener noreferrer"
                            class="text-decoration-none text-white"><?php echo $email ?></a></p>
                    <p><a href="tel:<?php echo $phone ?>" target="_blank" rel="noopener noreferrer"
                            class="text-decoration-none text-white"><?php echo $phone ?></a></p>
                </div>
            </div>
            <div class="card-body p-4 text-black">
                <div class="mb-5">
                    <p class="lead fw-normal mb-1">Transportation</p>
                    <div class="p-4 bg-light rounded shadow-lg" >
                        <div class="col-md-6">
                            <h5><?php echo $transportation ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- content end here -->
<script src="../js/bootstrap-input-spinner.js"></script>
<script>
$("input[type='number']").inputSpinner()
</script>
<?php
}
    }
    include '../partial/footer.php';
    ?>
<?php
} else {
    header("Location: ../login.php");
    exit();
}
?>