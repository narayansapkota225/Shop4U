<?php

if(isset($_POST['search'])){

    require "config.php";

    $search = $_POST['search'];

    $sql = "SELECT P.*, C.title FROM product as P JOIN category as C on P.category_id = C.id WHERE (P.title LIKE '%$search%' OR C.title LIKE '%$search%') AND P.active = 1 ";

    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);

    if($count > 0){
        while($rows = mysqli_fetch_array($res)){
            $id = $rows ['id'];
            $title = $rows['1'];
            $img = $rows['image'];
            $price = $rows['price'];

            ?>

            <div class=" col-lg-4 justify-content-center d-flex">
                <div class="product">
                    <div class="container">
                        <img class="img-fluid" src="../images/product/<?php echo $img;?>" style="width: auto; height: 300px; object-fit: fill;" >
                            <div class="cta shadow d-inline-block">
                                <a class="product-btn" data-bs-toggle="modal" data-bs-target="#p<?php echo $id;?>">
                                <i class="bi bi-arrows-angle-expand"></i>
                                </a>
                                <a class="product-btn" href="login.php">
                                <i class="bi bi-cart-plus-fill"></i>
                                </a>
                            </div> 
                        </img>
                    </div>
                <h6 class="text-center"><?php echo $title;?></h6>
                <p class="text-center text-muted font-weight-bold mb-4">$<?php echo $price;?></p>
                </div>
            </div>

            <?php
        }
    } else {
        ?>
        <div class="container">
        <p class="text-center fs-4 py-4"><strong> Product Not Found...</strong></p>
        </div>
        <?php
    }
}

?>