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
                    <a href="../updateuser.php?update=<?php echo $id; ?>"><button type="button" class="btn btn-warning">Update</button></a>
                    <button type="button" class="btn btn-dark">Blocked</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-info">Reset Password</button>
                </td>
            </tr>                

            <?php
        } 

    } else{

    }

}

?>