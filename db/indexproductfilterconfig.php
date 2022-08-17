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

                    $ssql = "SELECT P.*, C.title FROM product AS P JOIN category as C on P.category_id = C.id WHERE C.title = '$cat_title' AND P.active = 'yes'";
                    
                    $ress = mysqli_query($conn, $ssql);

                    $countt = mysqli_num_rows($ress);

                    if($countt > 0){

                        while($rowss = mysqli_fetch_assoc($ress)){
                            $id = $rowss['id'];
                            $img = $rowss['image'];
                            $title = $rowss['title'];
                            $price = $rowss['price'];
                            
                    
                            ?>
                                    <div class="col-xl-3 col-lg-4 col-6">
                                        <div class="product mb-4">
                                        <img class="img-fluid" src="../images/product/<?php echo $img;?>" style="width: auto; height: 300px; object-fit: fill;" >
                                            <div class="cta shadow d-inline-block">
                                                <a class="product-btn" data-bs-toggle="modal" data-bs-target="#p<?php echo $id;?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-expand" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                                                    </svg>
                                                </a>
                                                <a class="product-btn" href="login.php">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                    </svg>
                                                </a>
                                            </div> 
                                        </img>
                                        <h6 class="text-center"><?php echo $title;?></h6>
                                        <p class="text-center text-muted font-weight-bold mb-4">$<?php echo $price;?></p>
                                        </div>
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