<?php

require "config.php";

$sql="SELECT * FROM product WHERE active=1";
$res=mysqli_query($conn,$sql);

$count = mysqli_num_rows($res);

if($count > 0){

    while($rows = mysqli_fetch_assoc($res)){
        $id = $rows['id'];
        $image = $rows['image'];
        $title = $rows['title'];
        $price = $rows['price'];
        

        ?>
<div class="col-xl-3 col-lg-4 col-6">
    <div class="product">
        <form action="../db/addtocart.php" method="POST">
            <div class="product mb-4">
                <img class="img-fluid" src="../images/product/<?php echo $image;?>" style="width: auto; height: 300px; object-fit: contain;" >
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
                <input type="hidden" name="hidden_img" value="<?php echo $image; ?>" />
                <input type="hidden" name="hidden_id" value="<?php echo $id; ?>" />
            </div>
        </form>
    </div>
</div>

<?php
    }
}
?>