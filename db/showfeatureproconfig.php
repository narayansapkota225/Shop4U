<?php

require "config.php";
$boolTrue = 1;

$sql = "SELECT * FROM product WHERE feature=? AND active=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "ii", $boolTrue, $boolTrue);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        echo "You need to resubmit your reset request.";
        exit();
    } else {
        while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $img = $row['image'];
            $title = $row['title'];
            $price = $row['price'];
            ?>
<div class="swiper-slide pb-5 d-flex" style="width: 419px; margin-right: 25px;">
    <div class="product ">
        <form action="../db/addtocart.php" method="POST">
            <div class="product mb-4">
                <img class="img-fluid" src="../images/product/<?php echo $img;?>" style="width: auto; height: 300px; object-fit: contain;" >
                    <div class="cta shadow d-inline-block">
                        <a class="product-btn" data-bs-toggle="modal" data-bs-target="#p<?php echo $id;?>">
                        <i class="bi bi-arrows-angle-expand"></i>
                        </a>
                        <button class="product-btn" type="submit" name="addcart">
                        <i class="bi bi-cart-plus-fill"></i>
                        </button>
                    </div> 
                </img>
                <h6 class="text-center"><?php echo $title;?><input type="hidden" name="hidden_title" value="<?php echo $title; ?>" /></h6>
                <p class="text-center text-muted font-weight-bold mb-4">$<?php echo $price;?><input type="hidden" name="hidden_price" value="<?php echo $price; ?>" /></p>
                <input type="hidden" name="quantity" value="1" />
                <input type="hidden" name="hidden_img" value="<?php echo $img; ?>" />
                <input type="hidden" name="hidden_id" value="<?php echo $id; ?>" />
            </div>
        </form>
    </div>
</div>

<?php
}
    }
}
?>