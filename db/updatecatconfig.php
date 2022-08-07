<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include "config.php";

    //get post value
    $id = $_POST['id'];
    $title=$_POST['title'];
    $img_name = $_FILES['image']['name'];

    // check the feature is selected
    if(isset($_POST['feature'])){

        $feature=$_POST['feature'];
    }else{
        $feature ="no";
    }

    // check the active is selected
    if(isset($_POST['active'])){
        $active=$_POST['active'];
    }else{
        $active = "no";
    }

    if($img_name){

        $srcpath = $_FILES['image']['tmp_name'];
        $img_type = $_FILES['image']['type'];
        $namecap = explode(".", $img_name);
        $ext = strtolower(end($namecap));
        $allowedfileExtensions = array('jpg', 'png', 'jpeg');

    //     //check for extention
        if (in_array($ext, $allowedfileExtensions))
        {
        // directory in which the uploaded file will be moved
        $despath = '../images/category/'.$img_name;

            //upload image
            if(move_uploaded_file($srcpath, $despath)) 
            {
                // update db
                $sql="UPDATE category SET title=?, image=?, feature=?, active=? WHERE id=$id";
                $stmt = mysqli_stmt_init($conn);
    
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:../admin/updatecategory.php? update=$id&error=Something wrong");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssss", $title, $img_name, $feature, $active);
                    mysqli_stmt_execute($stmt);
                    header("Location:../admin/category.php? result=Category has been Successfully Updated");
                }
            } else  {
                header("Location:../admin/updatecategory.php? update=$id&error=Failed to Upload Image");
                die();
            }
        }
    }else {
        //update db without the image
        $sql="UPDATE category SET title=?, feature=?, active=? WHERE id=$id";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../admin/updatecategory.php? update=$id&error=Something wrong");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $title, $feature, $active);
            mysqli_stmt_execute($stmt);
            header("Location:../admin/category.php? result=Category has been Successfully Updated");
        }
    }
}