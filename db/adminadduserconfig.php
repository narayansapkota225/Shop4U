<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include "config.php";
	
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
	$pswd = $_POST["pswd"];
	$cpswd = $_POST["cpswd"];
			
	
	$sql = "Select * from user where email='$email'";
	
	$result = mysqli_query($conn, $sql);
	
	$num = mysqli_num_rows($result);
	
	// This sql query is use to check if
	// the username is already present
	// or not in our Database
	if($num == 0) {
		if(($pswd == $cpswd)) {
            
            // Password Hashing is used here.
			$hash = password_hash($pswd,
								PASSWORD_DEFAULT);
				
			if(($role == "Shopper")){
			$sql = "INSERT INTO `user` ( `role`,`rolename`,`suspended`,`email`,
				`password`, `firstname`,`lastname`,`phone`,`address`,`city`,`state`,`postCode`,`transportation`,`license`,`erase`) VALUES ('1','$role',
				'0', '$email','$hash','$fname','$lname','$phno','$adds','$city','$state','$pocode','','','0')";
	
			$result = mysqli_query($conn, $sql);
	
			if ($result) {
				header("Location: ../adminuser.php? result=Account has been Successfully Created");
			}
		} else if(($role == "Picker")){
            $sql = "INSERT INTO `user` ( `role`,`rolename`,`suspended`,`email`,
            `password`, `firstname`,`lastname`,`phone`,`address`,`city`,`state`,`postCode`,`transportation`,`license`,`erase`) VALUES ('2','$role',
            '0', '$email','$hash','$fname','$lname','$phno','$adds','$city','$state','$pocode','$trans','$lic','0')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../adminuser.php? result= Account has been Successfully Created");
        }
    }
        }
		else {
			header("Location: ../adduser.php? error=Password does not Match");
		}	
    
	}// end if
	
if($num>0)
{
	header("Location: ../adduser.php? error=Email is already Exist");
}
	
}//end if
	

