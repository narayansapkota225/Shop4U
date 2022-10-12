<?php
session_start();
require_once "config.php";

$userId = $_SESSION['id'];

$sql = "SELECT * FROM custOrder WHERE orderStatus!=0 AND pickerId=$userId";

$res = mysqli_query($conn, $sql);
$sn = 1;
if($res == TRUE){
    $count = mysqli_num_rows($res);

    if($count > 0){
        //get all the data from database
        while($rows = mysqli_fetch_assoc($res)){
            $orderDate = $rows['orderDate'];
            $subTotal = $rows['subTotal'];
            $grandTotal = $rows['total'];
            $instructions = $rows['instruction'];
            $status = $rows['orderStatus'];
            $shopperId = $rows['shopperId'];
            $pickerId = $rows['pickerId'];
            $orderid = $rows['id'];
            //display the value
            ?>

            <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td scope="row"><?php echo $orderDate; ?></td>
                <?php
                $sql = "SELECT CONCAT(firstname,' ', lastname) AS fullname FROM user WHERE id=$shopperId";
                $resus = mysqli_query($conn, $sql);
                $row1 = mysqli_fetch_assoc($resus);
                $fullname = $row1['fullname']; ?>
                <th scope="row"><?php echo $fullname; ?></th>
                <td scope="row"><?php echo $subTotal; ?></td>
                <td scope="row"><?php echo $grandTotal; ?></td>
                <td scope="row"><?php echo $instructions; ?></td>
                <td scope="row"><?php
                if ($status == 0) {
                    echo "Waiting for Picker";
                } elseif ($status == 1) {
                    echo "Picker Assigned";
                } elseif ($status == 2) {
                    echo "Order Processing";
                } elseif ($status == 3 ) {
                    echo "Order Getting Ready";
                } elseif ($status == 4) {
                    echo "Order enroute";
                } elseif ($status == 5) {
                    echo "Order Delivered";
                } ?></td>
                
                <td scope="row">
                    <a href="../picker/vieworder.php?orderid=<?php echo $orderid; ?>"><span style="padding:10px;" class="text-dark fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update user"></span></a>
                </td>
            </tr>                
    
            <?php
        } 

    } else{

    }

}

?>