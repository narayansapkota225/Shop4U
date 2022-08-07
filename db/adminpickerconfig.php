<?php

require_once "config.php";

$sql = "SELECT * FROM user Where suspended ='0' AND erase='0' AND role=2";

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
                <td scope="row">
                    <a href="../admin/updateuser.php?update=<?php echo $id; ?>"><span style="padding:10px;" class="text-dark fa-solid fa-pen-to-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update user"></span></a>
                    <a href="../admin/blockuser.php?update=<?php echo $id; ?>"><span style="padding:10px;" class="text-dark fa-solid fa-eye" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Block user"></span></a>
                    <a href="../admin/resetuser.php?update=<?php echo $id; ?>"><span style="padding:10px;" class="text-dark fa-solid fa-key" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Reset password"></span></a>
                    <a href="../admin/deleteuser.php?update=<?php echo $id; ?>"><span style="padding:10px;" class="text-danger fa-solid fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete user"></span></a>
                </td>
            </tr>                
    
            <?php
        } 

    } else{

    }

}

?>