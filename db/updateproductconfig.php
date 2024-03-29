<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include "config.php";
    
    // get data
    $id = $_POST['id'];
    $title =$_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $img_name = $_FILES['image']['name'];
    $cat = $_POST['cat'];

    //check description empty
    if($desc){
        $desc = $_POST['desc'];
    }else {
        $desc = "No Description Found";
    }

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
        $newname = round(microtime(true)) . '.' .$ext;
        $allowedfileExtensions = array('jpg', 'png', 'jpeg');

    //     //check for extention
        if (in_array($ext, $allowedfileExtensions))
        {
        // directory in which the uploaded file will be moved
        $despath = '../images/product/'.$newname; 

            //upload image
            if(move_uploaded_file($srcpath, $despath)) 
            {
                // insert into db
                $sql="UPDATE product SET title=?, description=?, price=?, image=?, category_id=?, feature=?, active=? WHERE id=$id";
                $stmt = mysqli_stmt_init($conn);
    
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:../admin/updateproduct.php? update=$id&error=Something wrong");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssdsiss", $title, $desc, $price, $newname, $cat, $feature, $active);
                    mysqli_stmt_execute($stmt);
                    header("Location:../admin/product.php? result=Product has been Successfully updated");
                }
            } else  {
                header("Location:../admin/updateproduct.php? update=$id&error=Failed to Upload Image");
                die();
            }
        }

    }else {
        // update without the image
        // insert into db
        $sql="UPDATE product SET title=?, description=?, price=?, category_id=?, feature=?, active=? WHERE id=$id";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../admin/updateproduct.php? update=$id&error=Something wrong");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssdiss", $title, $desc, $price, $cat, $feature, $active);
            mysqli_stmt_execute($stmt);
            header("Location:../admin/product.php? result=Product has been Successfully updated");
        }
    }

}