<?php

session_start();
include "config.php";

if (isset($_POST["placeOrder"])) {
    $instructions = $_POST['instructions'];
    $subTotal = $_POST['subTotal'];
    $tax = $_POST['tax'];
    $deliveryFee = $_POST['deliveryFee'];
    $grandTotal = $_POST['grandTotal'];
    $date = date('Y-m-d H:i:s');
    $userId = $_SESSION['id'];
    $orderStatus = 0;
    $sql = "INSERT INTO `custOrder`(`instruction`, `shopperId`, `subTotal`, `total`, `handlingFee`, `tax`, `orderDate`, `orderStatus`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../shopper/checkout.php? error=Something wrong");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "siddddsi", $instructions, $userId, $subTotal, $grandTotal, $deliveryFee, $tax, $date, $orderStatus);
        mysqli_stmt_execute($stmt);
        $last_id = mysqli_insert_id($conn);
        echo $last_id;
        if (!empty($_SESSION[$pro])) {
            foreach ($_SESSION[$pro] as $keys => $values) {
                $prodId = $values['id'];
                $qty = $values['quantity'];
                $price = $values['price'];
                $prodTotal = $qty * $price;
                $sql = "INSERT INTO `custOrder_product`(`custOrderId`, `productId`, `quantity`, `prodSubTotal`) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:../shopper/checkout.php? error=Something wrong");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "iiid", $last_id, $prodId, $qty, $prodTotal);
                    mysqli_stmt_execute($stmt);
                    unset($_SESSION[$pro]);
                    header("Location:../shopper/orders.php?result=orderprocessed");
                }
            }
            
        }
    }
}
