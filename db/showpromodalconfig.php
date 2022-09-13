<?php

require "config.php";

$sql = "SELECT * FROM product WHERE active=1";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

if ($count > 0) {

    while ($n = mysqli_fetch_assoc($res)) {
        $id = $n['id'];
        $title = $n['title'];
        $desc = $n['description'];
        $price = $n['price'];
        $image = $n['image'];

        ?>

<div class="modal fade" id="p<?php echo $id; ?>" tabindex="-1" aria-labelledby="<?php echo $id; ?>" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content rounded-0 border-0">
            <div class="modal-body p-0 overflow-hidden shadow">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 p-lg-0 modal-product-img">
                        <img class="rounded mx-auto d-block " src="../images/product/<?php echo $image; ?>"
                            style=" height: 500px; width: 500px; object-fit: contain; ">
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="close modal-close p-4 border-0" data-bs-dismiss="modal"
                            aria-label="Close">

                            <i class="bi bi-x-lg"></i>
                        </button>
                        <div class="p-5 my-md-4">
                            <form action="../db/addtocart.php" method="POST">
                                <h2 class="h5 text-uppercase"><?php echo $title; ?><input type="hidden"
                                        name="hidden_title" value="<?php echo $title; ?>" /></h2>
                                <p class="text-muted">$<?php echo $price; ?><input type="hidden" name="hidden_price"
                                        value="<?php echo $price; ?>" /></p>
                                <p class="text-small mb-4"><?php echo $desc; ?><input type="hidden" name="hidden_id"
                                        value="<?php echo $id; ?>" /></p>
                                <input type="hidden" name="hidden_img" value="<?php echo $image; ?>" />
                                <div class=" d-inline-flex ">
                                    <input type="number" step="1" max="10" value="1" min="0" name="quantity"
                                        class="quantity-field border-0 text-center w-25">
                                </div>
                                <br></br>
                                <button type="submit" class="btn btn-dark bi bi-cart3" name="addcart"> Add to
                                    Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/bootstrap-input-spinner.js"></script>
<script>
$("input[type='number']").inputSpinner()
</script>
<?php

    }
}