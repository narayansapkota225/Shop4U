<?php

require_once "config.php";

$sql = "SELECT P.*, C.title FROM product AS P JOIN category as C on P.category_id = C.id ";

$res = mysqli_query($conn, $sql);
$sn = 1;
if ($res == true) {
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        //get all the data from database
        while ($rows = mysqli_fetch_array($res)) {
            $id = $rows['id'];
            $title = $rows['1'];
            $desc = $rows['description'];
            $price = $rows['price'];
            $image = $rows['image'];
            $cat = $rows['category_id'];
            $feature = $rows['feature'];
            $active = $rows['active'];
            $cat_title = $rows['title']

            //display the value
            ?>

            <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td scope="row"><?php echo $title; ?></td>
                <td scope="row">$<?php echo $price; ?></td>
                <td scope="row"><img src="../images/product/<?php echo $image; ?>" width="100px"> </td>
                <td scope="row"><?php echo $cat_title; ?></td>
                <td scope="row"><?php if ($feature == 0) {
                echo "No";
            } else {
                echo "Yes";
            }?></td>
                <td scope="row"><?php if ($active == 0) {
                echo "No";
            } else {
                echo "Yes";
            }?></td>
                <td scope="row">
                    <a href="updateproduct.php? update=<?php echo $id ?>"><span style="padding:10px;" class="text-dark fa-solid fa-pen-to-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Product"></span></a>
                    <a href="deleteproduct.php? update=<?php echo $id ?>"><span style="padding:10px;" class="text-danger fa-solid fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Prodcut"></span></a>
                </td>
            </tr>

            <?php
}

    } else {

    }

}

?>