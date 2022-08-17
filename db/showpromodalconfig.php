<?php

require "config.php";

$sql="SELECT * FROM product WHERE active='yes'";
$res=mysqli_query($conn,$sql);

$count = mysqli_num_rows($res);

if($count > 0){

    while($n = mysqli_fetch_assoc($res)){
        $id = $n['id'];
        $title = $n['title'];
        $desc =$n['description'];
        $price = $n['price'];
        $image = $n['image'];
        
        ?>

        <div class="modal fade" id="p<?php echo $id;?>" tabindex="-1" aria-labelledby="<?php echo $id;?>" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content rounded-0 border-0">
            <div class="modal-body p-0 overflow-hidden shadow">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 p-lg-0 modal-product-img">
                        <img  class="rounded mx-auto d-block" src="../images/product/<?php echo $image;?>"  >
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="close modal-close p-4 border-0" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                            </svg>
                            </span>
                        </button>
                        <div class="p-5 my-md-4">
                            <h2 class="h5 text-uppercase"><?php echo $title;?></h2>
                            <p class="text-muted">$<?php echo $price;?></p>
                            <p class="text-small mb-4"><?php echo $desc;?></p>
                            <a class="btn btn-dark" href="login.php"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg> Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <?php

    }
}