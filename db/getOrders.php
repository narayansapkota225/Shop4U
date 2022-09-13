<?php

require_once "config.php";

$sql = "SELECT * FROM custOrder WHERE shopperId=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
} else {
    session_start();
    $userId = $_SESSION['id'];
    $sn = 1;
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_array($result)) {
        echo "You need to resubmit your reset request.";
        exit();
    } else {
        while($row = mysqli_fetch_array($result)) { 
            $id = $row['id'];
            $date = $row['orderDate'];
            $subTotal = $row['subTotal'];
            $grandTotal = $row['total'];
            $instructions = $row['instruction'];
            $status = $row ['orderStatus'];
            
            ?>
            <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td scope="row"><?php echo $id; ?></td>
                <td scope="row"><?php echo $date; ?></td>

                <td scope="row"><?php if($status == 0){
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
                    <a href="../shopper/vieworder.php?orderid=<?php echo $id; ?>"><span style="padding:10px;" class="text-dark fa-solid fa-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Order Info"></span></a>
                </td>
            </tr>
            <?php   
        }
    }
}
?>