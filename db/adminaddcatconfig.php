<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include file which makes the
    // Database Connection.
    include "config.php";

    //get post value
    $title = $_POST['title'];
    $img_name = $_FILES['image']['name'];

    // check the feature is selected
    if (isset($_POST['feature'])) {

        $feature = $_POST['feature'];
    }

    // check the active is selected
    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    }

    //check if image is selected
    // print_r($_FILES['image']);
    if ($img_name) {

        $srcpath = $_FILES['image']['tmp_name'];
        $img_type = $_FILES['image']['type'];
        $namecap = explode(".", $img_name);
        $ext = strtolower(end($namecap));
        $newname = round(microtime(true)) . '.' . $ext;
        $allowedfileExtensions = array('jpg', 'png', 'jpeg');

        //     //check for extention
        if (in_array($ext, $allowedfileExtensions)) {
            // directory in which the uploaded file will be moved
            $despath = '../images/category/' . $newname;

            //upload image
            if (move_uploaded_file($srcpath, $despath)) {
                // insert into db
                $sql = "INSERT INTO category (title , image, feature, active) VALUES (?, ?, ?, ?) ";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:../admin/addcategory.php? error=Something wrong");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssss", $title, $newname, $feature, $active);
                    mysqli_stmt_execute($stmt);
                    header("Location:../admin/category.php? result=Category has been Successfully added");
                }
            } else {
                header("Location:../admin/addcategory.php? error=Failed to Upload Image");
                die();
            }
        }

    } else {
        // set the name to no-image.png
        $img_name = "no-image.png";

        // insert into db
        $sql = "INSERT INTO category (title , image, feature, active) VALUES (?, ?, ?, ?) ";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../admin/addcategory.php? error=Something wrong");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $title, $img_name, $feature, $active);
            mysqli_stmt_execute($stmt);
            header("Location:../admin/category.php? result=Category has been Successfully added");
        }
    }
}
