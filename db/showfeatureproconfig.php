<?php

require "config.php";
$boolTrue = 1;

$sql = "SELECT * FROM product WHERE feature=? AND active=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "ss", $boolTrue, $boolTrue);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
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
        <div class="container " style="height: 300px; object-fit: contain; ">
            <img class="img-fluid " src="../images/product/<?php echo $img; ?>"
                style="width: auto; object-fit: contain; ">
            <div class="cta shadow d-inline-block">
                <a class="product-btn" data-bs-toggle="modal" data-bs-target="#p<?php echo $id; ?>">
                    <i class="bi bi-arrows-angle-expand"></i>
                </a>
                <a class="product-btn" href="login.php">
                    <i class="bi bi-cart-plus-fill"></i>
                </a>
            </div>
            </img>
            <h6 class="text-center"><?php echo $title; ?></h6>
            <p class="text-center text-muted font-weight-bold mb-4">$<?php echo $price; ?></p>
        </div>
    </div>
</div>

<?php
}
    }
}
?>