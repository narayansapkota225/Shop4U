<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // add config file
    include "config.php";

    //get data from post
    $id = $_POST['uid'];

    $sql="SELECT * FROM user Where id='$id'";
    $res = mysqli_query($conn,$sql);
    $count= mysqli_num_rows($res);

    if($count > 0) {

        //get the new password
        $npwd = $_POST['npwd'];
        $cnpwd = $_POST['cnpwd'];

        //check if password is same
        if($npwd == $cnpwd){

            //hash the password
            $hash = password_hash($npwd,PASSWORD_DEFAULT);
            //update into the database
            $sql="UPDATE user SET password='$hash' WHERE id='$id' ";
            $res = mysqli_query($conn, $sql);
            
            if($res){
                header("location: ../admin/adminuser.php? result=Password has been reset");
            }
        }else{
            //password does not match
            header("Location:../admin/resetuser.php?update=$id&error=Password does not match");
        }
        
    }
}