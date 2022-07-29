<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include "config.php";
	
    $id = $_POST["uid"];
	
    $sql="SELECT * FROM user Where id='$id'";
    $res = mysqli_query($conn,$sql);
    $count= mysqli_num_rows($res);

    if(($count == 1)){
        $sql="UPDATE user SET suspended='0' WHERE id='$id'";
        $result = mysqli_query ($conn,$sql);

        if($result){
            header("Location: ../admin/adminuser.php? result=Account has been Unblocked");
        }
    }
}
?>