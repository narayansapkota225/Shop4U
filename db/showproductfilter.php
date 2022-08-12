<?php

require "config.php";

$sql = "SELECT * FROM category";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

if($count > 0){
    //get all the data from database
    while($rows = mysqli_fetch_assoc($res)){
        $cat_title = $rows['title'];

        //display the value
        ?>
            <div id="<?php echo $cat_title; ?>" class="tab-pane fade "> 
                <div class="table-responsive mt-2">
                    <table id="user" class="table table-striped caption-top">
                        <caption>
                            <h3>List of Product</h3>
                        </caption>
                        <thead class="bg-secondary text-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Feature</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php


                            $ssql = "SELECT P.*, C.title FROM product AS P JOIN category as C on P.category_id = C.id WHERE C.title = '$cat_title'";

                            $result = mysqli_query($conn, $ssql);
                            $sn = 1;
                            if($result == TRUE){
                                $countt = mysqli_num_rows($result);

                                if($countt > 0){
                                    //get all the data from database
                                    while($rowss = mysqli_fetch_array($result)){
                                        $id = $rowss['id'];
                                        $title = $rowss['1'];
                                        $desc = $rowss['description'];
                                        $price = $rowss['price'];
                                        $image = $rowss['image'];
                                        $cat = $rowss['category_id'];
                                        $feature = $rowss['feature'];
                                        $active = $rowss['active'];
                                        $cate_title = $rowss['title']

                                        
                                        //display the value
                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $sn++; ?></th>
                                            <td scope="row"><?php echo $title; ?></td>
                                            <td scope="row">$<?php echo $price; ?></td>
                                            <td scope="row"><img src="../images/product/<?php echo $image; ?>" width="100px"> </td>
                                            <td scope="row"><?php echo $cate_title; ?></td>
                                            <td scope="row"><?php echo $feature; ?></td>
                                            <td scope="row"><?php echo $active; ?></td>
                                            <td scope="row">
                                                <a href="updateproduct.php? update=<?php echo $id ?>"><span style="padding:10px;" class="text-dark fa-solid fa-pen-to-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Product"></span></a>
                                                <a href="deleteproduct.php? update=<?php echo $id ?>"><span style="padding:10px;" class="text-danger fa-solid fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Prodcut"></span></a>
                                            </td>
                                        </tr>                
                                
                                        <?php
                                    } 

                                } else{
                                    ?>
                                    <!-- show no result -->
                                    <tr>
                                        <th></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="7"><strong>No result</strong></td>
                                    </tr>
                                    <?php
                                }

                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php
    } 

}
?>