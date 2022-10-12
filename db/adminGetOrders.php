<?php
// <?php$Date = "2010-09-17";
// echo date('Y-m-d', strtotime($Date. ' + 1 days'));
// echo date('Y-m-d', strtotime($Date. ' + 2 days'));
// 

require_once "config.php";

if(isset($_GET['from_date']) && isset($_GET['to_date'])){
    $from_date = $_GET['from_date'];
    $to_date = date('Y-m-d',strtotime($_GET['to_date']. ' + 1 days'));

    $sqll = "SELECT * FROM custOrder WHERE orderDate BETWEEN '$from_date' AND '$to_date' ";
    $ress = mysqli_query($conn, $sqll);
    $sn = 1;
    if($ress){
        $countt = mysqli_num_rows($ress);

        if($countt > 0){
            //get all the data from database
            while($rows = mysqli_fetch_assoc($ress)){
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
                    <td scope="row"><?php if ($pickerId) {
                        $sql2 = "SELECT CONCAT(firstname,' ', lastname) AS fullname FROM user WHERE id=$pickerId";
                        $resuss = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($resuss);
                        $pfullname = $row2['fullname'];
                        echo $pfullname;
                    } else {
                        echo "Picker not assigned.";
                    }?>
                    </td>
                    <td scope="row">
                        <a href="../admin/vieworder.php?orderid=<?php echo $orderid; ?>"><span style="padding:10px;" class="text-dark fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Order"></span></a>
                    </td>
                </tr>                
        
                <?php
            } 
        }else{
            ?>
                <tr>
                    <th scope="row" colspan="9" class="text-center">No Orders Found...</th>
                </tr>
            <?php
        }
    }
} else {

$sql = "SELECT * FROM custOrder ORDER BY orderDate DESC";

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
                <td scope="row" class="d-none">#SHOP4U<?php echo $orderid; ?></td>
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
                <td scope="row"><?php if ($pickerId) {
                    $sql2 = "SELECT CONCAT(firstname,' ', lastname) AS fullname FROM user WHERE id=$pickerId";
                    $resuss = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($resuss);
                    $pfullname = $row2['fullname'];
                    echo $pfullname;
                } else {
                    echo "Picker not assigned.";
                }?>
                </td>
                <td scope="row">
                    <a href="../admin/vieworder.php?orderid=<?php echo $orderid; ?>"><span style="padding:10px;" class="text-dark fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Order"></span></a>
                </td>
            </tr>                
    
            <?php
        } 

    } else{

    }

}
}

?>