<?php

require_once "config.php";

$sql = "SELECT * FROM user Where erase='1'";

$res = mysqli_query($conn, $sql);
$sn = 1;
if($res == TRUE){
    $count = mysqli_num_rows($res);

    if($count > 0){
        //get all the data from database
        while($rows = mysqli_fetch_assoc($res)){
            $id = $rows['id'];
            $firstname = $rows['firstname'];
            $lastname = $rows['lastname'];
            $email = $rows['email'];
            $role = $rows['rolename'];

            //display the value
            ?>

            <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td scope="row"><?php echo $firstname; ?></td>
                <td scope="row"><?php echo $lastname; ?></td>
                <td scope="row"><?php echo $role; ?></td>
                <td scope="row"><?php echo $email; ?></td>
            </tr>                

            <?php
        } 

    } else{

    }

}

?>