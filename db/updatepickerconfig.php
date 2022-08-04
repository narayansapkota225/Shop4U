<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include "config.php";
	
    // get data 
    $id = $_POST["uid"];
    $phno= $_POST["phno"];
    $email= $_POST["email"];
    $adds= $_POST["adds"];
    $city= $_POST["city"];
    $state= $_POST["state"];
    $pocode= $_POST["pocode"];
	$trans= $_POST["trans"];
	$lic= $_POST["lic"];
	
    $sql="SELECT * FROM user Where email='$email'";
    $res = mysqli_query($conn,$sql);
    $count= mysqli_num_rows($res);

    if(($count == 1)){
        $sql="SELECT * FROM user WHERE id='$id' AND email='$email'";
        $res = mysqli_query($conn,$sql);
        $count= mysqli_num_rows($res);
   
           if(($count == 1)){
               
               $sql="UPDATE user SET phone='$phno',
               address='$adds', city='$city', state='$state', postCode='$pocode', transportation='$trans',
               license='$lic'  WHERE id='$id'";
   
               $result = mysqli_query($conn,$sql);
                   if($result){
                       header("Location: ../picker/index.php? result=Profile has been Successfully Updated");
                   }
               } 
           }else{
            header("Location: ../picker/profile.php? error=Something is wrong please try again");
           }
        }