<?php
session_start();
$userId = $_SESSION['id'];
require_once "config.php";

if ($_POST['deliverOrder']) {
    $sql = "SELECT * FROM custOrder WHERE id=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error!Select";
            exit();
        } else {
            $id = $_POST['id'];
            $orderStatusId = $_POST['orderStatusPost'];
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (!$row = mysqli_fetch_array($result)) {
                echo "You need to resubmit your reset request.";
                exit();
            } else {
                $status = $row['orderStatus'];
                if ($status == 1) {
                        $sql = "UPDATE custOrder SET orderStatus=?, pickerId=? WHERE id=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error while deleting the product! Please try again!";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "iii", $orderStatusId, $userId, $id);
                            mysqli_stmt_execute($stmt);
                            header("Location:../picker/index.php?result=delivered");
                        }
                    } elseif($status == 2){
                        $sql = "UPDATE custOrder SET orderStatus=?, pickerId=? WHERE id=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error while deleting the product! Please try again!";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "iii", $orderStatusId, $userId, $id);
                            mysqli_stmt_execute($stmt);
                            header("Location:../picker/index.php?result=delivered");
                        }
                    } elseif($status == 3) {
                        $sql = "UPDATE custOrder SET orderStatus=?, pickerId=? WHERE id=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error while deleting the product! Please try again!";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "iii", $orderStatusId, $userId, $id);
                            mysqli_stmt_execute($stmt);
                            header("Location:../picker/index.php?result=delivered");
                        }
                    } elseif($status == 4) {
                        $sql = "UPDATE custOrder SET orderStatus=?, pickerId=? WHERE id=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error while deleting the product! Please try again!";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "iii", $orderStatusId, $userId, $id);
                            mysqli_stmt_execute($stmt);
                            header("Location:../picker/index.php?result=delivered");
                        }
                    } elseif($status == 0) {
                    header("Location:../picker/index.php?result=ordernotpicked");
                    }
                }
            }
} elseif($_POST['acceptOrder']){


$sqll="SELECT * FROM custOrder WHERE orderStatus=1 AND pickerId=$userId";
$resus = mysqli_query($conn, $sqll);
$count = mysqli_num_rows($resus);

    if($count < 3){

        $sql = "SELECT * FROM custOrder WHERE id=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error!Select";
            exit();
        } else {
            $id = $_POST['id'];
            $orderStatusId = $_POST['orderStatusPost'];
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (!$row = mysqli_fetch_array($result)) {
                echo "You need to resubmit your reset request.";
                exit();
            } else {
                $status = $row['orderStatus'];
                if ($status == 0) {
                        $sql = "UPDATE custOrder SET orderStatus=?, pickerId=? WHERE id=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error while deleting the product! Please try again!";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "iii", $orderStatusId, $userId, $id);
                            mysqli_stmt_execute($stmt);
                            header("Location:../picker/index.php?result=picked");
                        }
                    } else {
                    header("Location:../picker/index.php?result=orderpicked");
                    }
                }
            }
    } else{
        header("Location:../picker/index.php?result=toomanyorders");
    }
}
    ?>
