<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include "config.php";
     //get post value
     $id = $_POST['id'];

    $sql="SELECT * FROM product WHERE category_id = $id";
    $res = mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count <= 0) {

            $sql="DELETE FROM category WHERE id=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location:../admin/category.php? error=Something wrong");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                header("Location:../admin/category.php? result=Category has been Successfully Deleted");
            }
        } else{
            header("Location:../admin/category.php? error=Category has product associated inside");
        }
    }