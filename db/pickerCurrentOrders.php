<?php
session_start();
require_once "config.php";

$userId = $_SESSION['id'];

$sql = "SELECT * FROM custOrder WHERE orderStatus=1 AND pickerId=$userId OR orderStatus=2 AND pickerId=$userId OR orderStatus=3 AND pickerId=$userId OR orderStatus=4 AND pickerId=$userId";

$res = mysqli_query($conn, $sql);
if ($res) {
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
    <?php
$sql = "SELECT CONCAT(firstname,' ', lastname) AS fullname FROM user WHERE id=$shopperId";
            $resus = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($resus);
            $fullname = $row1['fullname'];?>
    <td class="border-0">
        <div class="p-2">
            <div class="ml-3 d-flex justify-content-center">
            <a class="text-dark text-decoration-none"  href="viewshopper.php?id=<?php echo $shopperId ?>">
                <h5 class="mb-0"><?php echo $fullname; ?></h5>
            </a>
            </div>
        </div>
    </td>
    <form action="../db/updateorder.php" method="post">
        <td scope="row" class="border-0 align-middle fst-italic fw-bold ">#SHOP4U<?php echo $orderid; ?></td>
        <td scope="row" class="border-0 align-middle ">#Instruction: <strong>
                <?php if ($instructions) {echo $instructions;} else {echo "No Instruction";}?></strong></td>
        <input type="hidden" name="id" value="<?php echo $orderid; ?>">
        <input type="hidden" name="orderStatusPost" value="<?php $orderStatusPost = 5 ;
            echo $orderStatusPost; ?>">
        <td scope="row" class="border-0 align-middle">
            <strong>$<?php echo $grandTotal; ?></strong>
        </td>
        <td scope="row" class="border-0 align-middle">
            <input class="btn btn-primary rounded-pill py-2" type="submit" name="deliverOrder" value="Deliver">
        </td>
    </form>
    <td scope="row" class="border-0 align-middle">
        <a href="../picker/vieworder.php?orderid=<?php echo $orderid; ?>" type="button"
            class="btn btn-secondary px-4 rounded-pill"><i class="bi bi-info-lg"></i> View</a>
    </td>
</tr>

<?php
}

    } else {
        ?>
        <div class="container py-5 text-center">
            <h1 class="display-9">No Current Orders</h1>
        </div>
        <?php  
    }

}

?>