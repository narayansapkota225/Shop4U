<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include "config.php";

    //get post value
    $title=$_POST['title'];

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

    //check if image is selected
    // print_r($_FILES['image']);
    if(isset($_FILES['image']['name'])){

        $img_name = $_FILES['image']['name'];
        $srcpath = $_FILES['image']['tmp_name'];
        $despath = "../images/category/".$img_name;

    //     //upload image
        $upload = move_uploaded_file($srcpath, $despath);

        if($upload==false){
            header("Location:../admin/addcategory.php? error=Failed to Upload Image");
            die();
        }

    }else{
        $img_name="";
    }


    // insert into db
    $sql="INSERT INTO category SET title='$title', feature='$feature', active='$active'";
    $res = mysqli_query($conn, $sql);

    if($res){
        header("Location:../admin/category.php? result=Category has been Successfully added");
    }


}