<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role'] == 1)) {
    ?>
<?php $Title = "User Home - Shop4U"?>
<?php include '../partial/usermenu.php'?>

<!-- content here-->
<div class="px-2 px-lg-0">
    <!-- For demo purpose -->
    <div class="container py-3 text-center">
        <h1 class="display-4">Order Summary</h1>
    </div>
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-2 bg-white rounded shadow-sm mb-5">
                    <?php if (empty($_SESSION[$pro])) {?>
                    <div style="text-align: center;">
                        <h1>Your cart is empty.</h1>
                        <br>
                        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
                    </div>

                    <?php } else {?>
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 text-uppercase">Product</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 text-uppercase">Price</div>
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
if (!empty($_SESSION[$pro])) {
        $total = 0;
        foreach ($_SESSION[$pro] as $keys => $values) {
            ?>
                                <tr>

                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="../images/product/<?php echo $values["image"]; ?>" alt=""
                                                width="70" class="img-fluid rounded shadow-sm">
                                            <strong><?php echo $values["title"]; ?></strong>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle">
                                        <strong>$<?php echo $values["price"]; ?></strong>
                                    </td>
                                    <td class="border-0 align-middle">
                                        <strong><?php echo $values["quantity"]; ?></strong>
                                        <input type="hidden" value="<?php echo $keys; ?>" name="key" />
                                        <input type="hidden" value="<?php echo $values["id"]; ?>" name="id" />
                                    </td>
                                    <td class="border-0 align-middle">
                                        <strong>$<?php echo number_format($values["quantity"] * $values["price"], 2); ?></strong>
                                    </td>
                                </tr>
                                <?php
$total = $total + ($values["quantity"] * $values["price"]);
        }
        ?>
                                <!-- <tr>
                        <td></td>
                        <td  align="right"><strong>Total</strong></td>
                        <td align="left"><strong>$ <?php echo number_format($total, 2); ?></strong></td>
                </tr> -->

                                <?php
}
        ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>
            <form action="../db/orderconfig.php" method="post">
                <div class="row py-5 p-4 bg-white rounded shadow-lg">
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase fw-bolder">Instructions for picker
                        </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">If you have some information for the seller you can leave them
                                in
                                the box below</p>
                            <textarea name="instructions" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase fw-bolder">Order summary </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you
                                have entered.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Order Subtotal
                                    </strong><strong>$<?php
                                    $subTotal = number_format($total,2);
                                    echo $subTotal; ?></strong></li>
                                    <input type="hidden" name="subTotal" value="<?php echo $subTotal ?>">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Delivery and Handling Fee</strong><strong>$<?php
                                        $deliveryFee = number_format(15,2);
                                        echo $deliveryFee; ?></strong></li>
                                        <input type="hidden" name="deliveryFee" value="<?php echo $deliveryFee ?>">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Tax</strong><strong>$<?php
                                        $tax = number_format($total * 0.11,2);
                                        echo $tax; ?></strong>
                                        <input type="hidden" name="tax" value="<?php echo $tax ?>">
                                </li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold">$<?php
                                    $grandTotal = number_format($subTotal + $deliveryFee + $tax,2);
                                    echo $grandTotal; ?>
                                    </h5>
                                </li>
                                <input type="hidden" name="grandTotal" value="<?php echo $grandTotal ?>">
                            </ul>
                            <input class="btn btn-primary rounded-pill py-2 btn-block" type="submit" name="placeOrder" value="Place Order">
                        </div>
                        <?php }?>
                    </div>
                </div>
            </form>
        </div>
        <!-- content end -->
        <?php include '../partial/footer.php'?>
        <?php
} else {
    header("Location: ../login.php");
    exit();
}
?>