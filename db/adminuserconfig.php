<?php

require_once "config.php";

$sql = "SELECT * FROM user";

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
            $username = $rows['username'];
            $role = $rows['rolename'];

            //display the value
            ?>

            <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td><?php echo $firstname; ?></td>
                <td><?php echo $lastname; ?></td>
                <td><?php echo $role; ?></td>
                <td><?php echo $username; ?></td>
                <td>
                    <button type="button" class="btn btn-warning">Update</button>
                    <button type="button" class="btn btn-dark">Blocked</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>                

            <?php
        } 

    } else{

    }

}

?>