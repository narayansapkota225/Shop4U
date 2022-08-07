<?php

require_once "config.php";

$sql = "SELECT * FROM category";

$res = mysqli_query($conn, $sql);
$sn = 1;
if($res == TRUE){
    $count = mysqli_num_rows($res);

    if($count > 0){
        //get all the data from database
        while($rows = mysqli_fetch_assoc($res)){
            $id = $rows['id'];
            $title = $rows['title'];
            $image = $rows['image'];
            $feature = $rows['feature'];
            $active = $rows['active'];

            //display the value
            ?>

            <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td scope="row"><?php echo $title; ?></td>
                <td scope="row"><img src="../images/category/<?php echo $image; ?>" width="100px"> </td>
                <td scope="row"><?php echo $feature; ?></td>
                <td scope="row"><?php echo $active; ?></td>
                <td scope="row">
                    <a href="updatecategory.php? update=<?php echo $id ?>"><span style="padding:10px;" class="text-dark fa-solid fa-pen-to-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update user"></span></a>
                    <a href="deletecategory.php? update=<?php echo $id ?>"><span style="padding:10px;" class="text-danger fa-solid fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete user"></span></a>
                </td>
            </tr>                
    
            <?php
        } 

    } else{

    }

}

?>