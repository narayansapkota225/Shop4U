<?php

require "config.php";

$sql = "SELECT * FROM category";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

if($count > 0){
    //get all the data from database
    while($rows = mysqli_fetch_assoc($res)){
        $cat_title = $rows['title'];
        
        ?>

            <div class="tab-pane fade <?php if (isset($_GET[$cat_title])){ echo "show active";}?>" id="<?php echo $cat_title;?>" role="tabpanel" >
                <div class="row">
                    <?php

                    $ssql = "SELECT P.*, C.title FROM product AS P JOIN category as C on P.category_id = C.id WHERE C.title = '$cat_title' AND P.active = 1";
                    
                    $ress = mysqli_query($conn, $ssql);

                    $countt = mysqli_num_rows($ress);

                    if($countt > 0){

                        while($rowss = mysqli_fetch_array($ress)){
                            $id = $rowss['id'];
                            $image = $rowss['image'];
                            $title = $rowss[1];
                            $price = $rowss['price'];
                            
                    
                            ?>
                                    <div class="col-xl-3 col-lg-4 col-6">
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
                    
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>        

        <?php
    }

}
?>