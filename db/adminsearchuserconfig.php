<?php

require_once "config.php";

$search = $_POST['search'];

$sql = "SELECT * FROM user Where (firstname LIKE '%$search%' OR lastname LIKE '%$search%') AND (suspended ='0' AND erase='0')";

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
                <a href="../updateuser.php?update=<?php echo $id; ?>"><span style="padding:10px;" class="text-dark fa-solid fa-pen-to-square" title="Update user"></span></a>
                    <a href="../blockuser.php?update=<?php echo $id; ?>"><span style="padding:10px;" class="text-dark fa-solid fa-eye" title="Block user"></span></a>
                    <span style="padding:10px;" class="text-dark fa-solid fa-key" title="Reset password"></span>
                    <a href="../deleteuser.php?update=<?php echo $id; ?>"><span style="padding:10px;" class="text-danger fa-solid fa-trash" title="Delete user"></span></a>
                </td>
            </tr>                

            <?php
        } 

    } else{
        header("Location: ../adminuser.php? error= User Not Found or Not Exist");
    }

}

?>