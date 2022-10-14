<?php

require_once "config.php";
session_start();
$userId = $_SESSION['id'];
$link = "$_SERVER[REQUEST_URI]";
if ($link == "/picker/index.php" || $link == "/picker/" || $link == "/picker/index.php?result=picked" || $link == "/picker/index.php?result=orderpicked" || $link == "/picker/index.php?result=delivered" || $link == "/picker/index.php?result=ordernotpicked" || $link == "/picker/index.php?result=toomanyorders") {
    $sql1 = "SELECT * FROM custOrder WHERE orderStatus=0 LIMIT 5";
    $res1 = mysqli_query($conn, $sql1);
    if ($res1) {
        $count1 = mysqli_num_rows($res1);
        if ($count1 > 0) {
            //get all the data from database
            while ($rows1 = mysqli_fetch_assoc($res1)) {
                $shopperId1 = $rows1['shopperId'];
                $grandTotal1 = $rows1['total'];
                $orderId1 = $rows1['id'];
                //display the value
                ?>
<tr>
    <?php
$sql2 = "SELECT CONCAT(firstname,' ', lastname) AS fullname FROM user WHERE id=$shopperId1";
                $resus2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($resus2);
                $fullname1 = $row2['fullname'];?>
    <td class="border-0">
        <div class="p-2">
            <div class="ml-3 d-flex justify-content-center">
                <a class="text-dark text-decoration-none" href="viewshopper.php?id=<?php echo $shopperId1 ?>">
                <h5 class="mb-0"><?php echo $fullname1; ?></a></h5>
                </a>
            </div>
        </div>
    </td>
    <form action="../db/updateorder.php" method="post">
        <td scope="row" class="border-0 align-middle fst-italic fw-bold ">#SHOP4U<?php echo $orderId1; ?></td>
        <input type="hidden" name="id" value="<?php echo $orderId1; ?>">
        <input type="hidden" name="orderStatusPost" value="<?php $orderStatusPost = 1;
                echo $orderStatusPost;?>">
        <td scope="row" class="border-0 align-middle"><strong>$<?php echo $grandTotal1; ?></strong></td>
        <td scope="row" class="border-0 align-middle">
            <input class="btn btn-success rounded-pill py-2" type="submit" name="acceptOrder" value="Accept">
        </td>
    </form>
    <td scope="row" class="border-0 align-middle">
        <a href="../picker/vieworder.php?orderid=<?php echo $orderId1; ?>" id="button-addon3" type="button"
            class="btn btn-secondary  px-4 rounded-pill text-white"><i class="bi bi-info-lg"></i> View</a>
    </td>
</tr>
<?php
}
    } else {
        ?>
<div class="container py-5 text-center">
    <h1 class="display-9">No New Orders</h1>
</div>
<?php
}
    }
} elseif ($link == "/picker/orderhistory.php") {
    $sql = "SELECT * FROM custOrder WHERE orderStatus!=0 AND orderStatus !=1 AND orderStatus !=2 AND pickerId=$userId ";
    $res = mysqli_query($conn, $sql);
    $sn = 1;
    if ($res == true) {
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            //get all the data from database
            while ($rows = mysqli_fetch_assoc($res)) {
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
    <td scope="row" class="d-none" >#SHOP4U<?php echo $orderid; ?></td>
    <td scope="row"><?php echo $orderDate; ?></td>
    <?php
$sql = "SELECT CONCAT(firstname,' ', lastname) AS fullname FROM user WHERE id=$shopperId";
                $resus = mysqli_query($conn, $sql);
                $row1 = mysqli_fetch_assoc($resus);
                $fullname = $row1['fullname'];?>
    <th scope="row"><a class="text-dark text-decoration-none" href="viewshopper.php?id=<?php echo $shopperId ?>"><?php echo $fullname; ?></a></th>
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
                } elseif ($status == 3) {
                    echo "Order Getting Ready";
                } elseif ($status == 4) {
                    echo "Order enroute";
                } elseif ($status == 5) {
                    echo "Order Delivered";
                }?></td>
    <td scope="row">
        <a href="../picker/vieworder.php?orderid=<?php echo $orderid; ?>"><span style="padding:10px;"
                class="text-dark fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="right"
                title="View Order"></span></a>
    </td>
</tr>
<?php
}
        }
    }
} else {?>
<div class="container py-5 text-center">
    <h1 class="display-9 text-danger">Please revalidate your request!</h1>
</div>
<?php }
?>