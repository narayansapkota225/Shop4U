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
	$trans= $_POST["trans"];
	$lic= $_POST["lic"];
    $role= $_POST["role"];
	
    $sql="SELECT * FROM user Where email='$email'";
    $res = mysqli_query($conn,$sql);
    $count= mysqli_num_rows($res);

    if(($count == 1)){
     $sql="SELECT * FROM user WHERE id='$id' AND email='$email'";
     $res = mysqli_query($conn,$sql);
     $count= mysqli_num_rows($res);

        if(($count == 1)){
            
            if(($role == "Shopper")){
            $sql="UPDATE user SET firstname='$fname', lastname='$lname', phone='$phno', email='$email',
            address='$adds', city='$city', state='$state', postCode='$pocode',transportation='',
            license='', rolename='$role', role='1'  WHERE id='$id' ";

            $result = mysqli_query($conn,$sql);
                if($result){
                    header("Location: ../admin/adminuser.php? result=Account has been Successfully Updated");
                }
            } 
            else if(($role == "Picker")){
            $sql="UPDATE user SET firstname='$fname', lastname='$lname', phone='$phno', email='$email',
            address='$adds', city='$city', state='$state', postCode='$pocode', transportation='$trans',
            license='$lic', rolename='$role', role='2'  WHERE id='$id'";

            $result = mysqli_query($conn,$sql);
                if($result){
                    header("Location: ../admin/adminuser.php? result=Account has been Successfully Updated");
                }
            } 
        }else{
            header("Location: ../admin/updateuser.php?update=$id&error=Email already Exist");

        }
    }else{
    if(($role == "Shopper")){
        $sql="UPDATE user SET firstname='$fname', lastname='$lname', phone='$phno', email='$email',
        address='$adds', city='$city', state='$state', postCode='$pocode',transportation='',
            license='', rolename='$role', role='1'  WHERE id='$id' ";

        $result = mysqli_query($conn,$sql);
            if($result){
                header("Location: ../admin/adminuser.php? result=Account has been Successfully Updated");
            }
        } 
        else if(($role == "Picker")){
        $sql="UPDATE user SET firstname='$fname', lastname='$lname', phone='$phno', email='$email',
        address='$adds', city='$city', state='$state', postCode='$pocode', transportation='$trans',
        license='$lic', rolename='$role', role='2'  WHERE id='$id'";
        
        $result = mysqli_query($conn,$sql);
            if($result){
                header("Location: ../admin/adminuser.php? result=Account has been Successfully Updated");
            }
        }
}
}
