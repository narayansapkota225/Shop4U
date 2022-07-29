<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //db connection
    include "config.php";

    //start session to get data
    session_start();

    $id = $_SESSION['id'];
    $sql="SELECT * FROM user WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    $count=mysqli_num_rows($res);

    if ($count > 0 ){
        //get the post par
        $opwd = $_POST["opwd"];
        $npwd = $_POST["npwd"];
        $cnpwd = $_POST["cnpwd"];

        //get the password from db
        $n = mysqli_fetch_assoc($res);

        //verify old password
        if (password_verify($opwd, $n['password'])) {
            
             //confirm new password
             if ($npwd == $cnpwd){
                // hash the password
                $hash =password_hash($npwd,PASSWORD_DEFAULT);

                // update password
                $sql="UPDATE user SET password='$hash' WHERE id='$id' ";
                $res = mysqli_query($conn, $sql);
                
                if($res){
                    header("location: ../picker/index.php? result=Password successfully change");
                }

             }else{
                header("location: ../picker/resetpwd.php? error=Password does not match");
             }

        }else{
            header("location: ../picker/resetpwd.php? error=Old Password does not match");
        }
        
    }
}
