<?php

require_once "config.php";

$sql = "SELECT * FROM custOrder WHERE shopperId=? ORDER BY orderDate DESC";
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
    if (!$result) {
        ?>
            <tr>
                <th scope="row" colspan="9" class="text-center">No Orders Found...</th>
            </tr>
        <?php
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $date = $row['orderDate'];
            $subTotal = $row['subTotal'];
            $grandTotal = $row['total'];
            $instructions = $row['instruction'];
            $status = $row['orderStatus'];
            $pickerId = $row['pickerId'];
            ?>
<tr>
    <th scope="row"><?php echo $sn++; ?></th>
    <td scope="row">#SHOP4U<?php echo $id; ?></td>
    <td scope="row"><?php
if ($pickerId) {
                $sql1 = "SELECT CONCAT(firstname,' ', lastname) AS fullname FROM user WHERE id=?";
                $stmt1 = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                    echo "There was an error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt1, "i", $pickerId);
                    mysqli_stmt_execute($stmt1);
                    $result1 = mysqli_stmt_get_result($stmt1);
                    if (!$row1 = mysqli_fetch_array($result1)) {
                        echo "You need to resubmit your reset request.";
                        exit();
                    } else {
                        $pickerFullname = $row1['fullname']; ?>
                        <a href="viewpicker.php?id=<?php echo $pickerId; ?>" class="text-dark"><?php echo $pickerFullname; ?> </a> <?php
                    }
                }
            } else {
                echo "Picker Not Assigned Yet";
            }?></td>
    <td scope="row"><?php echo $date; ?></td>

    <td scope="row"><?php if ($status == 0) {
                echo "Waiting for Picker";
            } elseif ($status == 1) {
                echo "Picker Assigned";
            } elseif ($status == 2) {
                echo "Order Processing";
            } elseif ($status == 3) {
                echo "Order Getting Ready";
            } elseif ($status == 4) {
                echo "Order enroute";
            } elseif ($status == 5) {
                echo "Order Delivered";
            }?></td>
    <td scope="row">
        <a href="../shopper/vieworder.php?orderid=<?php echo $id; ?>"><span style="padding:10px;"
                class="text-dark bi bi-info-circle-fill" data-bs-toggle="tooltip" data-bs-placement="right"
                title="View Order Info"></span></a>
    </td>
</tr>
<?php
}
    }
}
?>