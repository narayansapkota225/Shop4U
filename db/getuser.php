<?php 
session_start();
 require_once "config.php";

 $id = $_SESSION['id'];
 $sql="SELECT * FROM user WHERE id=$id";
 $res = mysqli_query($conn, $sql);

 if($res == true){
     $count=mysqli_num_rows($res);

     if ($count > 0 ){
        $n = mysqli_fetch_assoc($res);
        $fname = $n['firstname'];
        $lname= $n['lastname'];
        $phno= $n['phone'];
        $email= $n['email'];
        $adds= $n['address'];
        $city= $n['city'];
        $state= $n['state'];
        $pocode= $n['postCode'];
        $trans= $n['transportation'];
        $lic= $n['license'];
        $role= $n['rolename'];
        $suspended=$n['suspended'];
        $erase=$n['erase'];
     }
 }