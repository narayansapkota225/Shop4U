<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include "config.php";
	
    $id = $_POST["uid"];
	$fname = $_POST["fname"];
    $lname= $_POST["lname"];
    $phno= $_POST["phno"];
    $email= $_POST["email"];
    $adds= $_POST["adds"];
    $city= $_POST["city"];
    $state= $_POST["state"];
    $pocode= $_POST["pocode"];
	
	
    $sql="SELECT * FROM user Where email='$email'";
    $res = mysqli_query($conn,$sql);
    $count= mysqli_num_rows($res);

    if(($count == 1)){
     $sql="SELECT * FROM user WHERE id='$id' AND email='$email'";
     $res = mysqli_query($conn,$sql);
     $count= mysqli_num_rows($res);

        if(($count == 1)){
            
            $sql="UPDATE user SET firstname='$fname', lastname='$lname', phone='$phno', email='$email',
            address='$adds', city='$city', state='$state', postCode='$pocode'  WHERE id='$id' ";

            $result = mysqli_query($conn,$sql);
                if($result){
                    header("Location: ../shopper/index.php? result=Profile has been Successfully Updated");
                }
            } 
        }
    }