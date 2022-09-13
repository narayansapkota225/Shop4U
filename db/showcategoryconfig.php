<?php

require "config.php";

$sql="SELECT * FROM category WHERE active=1 ";
$res=mysqli_query($conn,$sql);

$count = mysqli_num_rows($res);

if($count > 0){

    while($rows = mysqli_fetch_assoc($res)){
        $title = $rows['title'];
        $img = $rows['image'];

        ?>
                <div class="col-lg-4">
                    <a href="../product.php?<?php echo $title?>"><img src="../images/category/<?php echo $img;?>" class="rounded bd-placeholder-img" width="300" height="300"></img>
                    <p><h2 class="btn btn-primary" ><?php echo $title;?></h2></p>
                    </a>
                </div>

        <?php

    }

}
?>