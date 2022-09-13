<?php

require_once "config.php";

$sql = "SELECT * FROM custOrder WHERE id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!Select";
    exit();
} else {
    $id = $_POST['id'];
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_array($result)) {
        echo "You need to resubmit your reset request.";
        exit();
    } else {
        $status = $row['orderStatus'];
        $picked = 1;
        if ($status == 0) {
                $sql = "UPDATE custOrder SET orderStatus=? WHERE id=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error while deleting the product! Please try again!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ii", $picked, $id);
                    mysqli_stmt_execute($stmt);
                    header("Location:../picker/orders.php?result=picked");
                }
            } else {
            header("Location:../picker/orders.php?result=orderpicked");
            }
        }
    }
    ?>
