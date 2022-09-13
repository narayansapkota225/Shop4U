<?php

session_start();
include "config.php";

if (isset($_POST["addcart"])) {

    if (isset($_SESSION[$pro])) {
        $item_array_id = array_column($_SESSION[$pro], 'id');

        if (in_array($_POST['hidden_id'], $item_array_id)) {

            $itemIds = array_column($_SESSION[$pro], "id");
            $key = array_search($_POST["hidden_id"], $itemIds);
            $_SESSION[$pro][$key]["quantity"] += $_POST["quantity"];
            header("Location:../shopper/index.php? add=Item has been added");

        } else {

            $product = array(
                'id' => $_POST['hidden_id'],
                'title' => $_POST['hidden_title'],
                'image' => $_POST['hidden_img'],
                'price' => $_POST['hidden_price'],
                'quantity' => $_POST['quantity'],
            );
            array_push($_SESSION[$pro], $product);
            header("Location:../shopper/index.php? add=Item has been added");
        }

    } else {
        $product = array(
            'id' => $_POST['hidden_id'],
            'title' => $_POST['hidden_title'],
            'image' => $_POST['hidden_img'],
            'price' => $_POST['hidden_price'],
            'quantity' => $_POST['quantity'],
        );
        $_SESSION[$pro][0] = $product;
        header("Location:../shopper/index.php? add=Item has been added");
    }

}

if(isset($_POST["quantity"]) && isset($_POST["key"]) && isset($_POST["id"])) { 

    if (isset($_SESSION[$pro])) {
        $item_array_id = array_column($_SESSION[$pro], 'id');

        if (in_array($_POST['id'], $item_array_id)) {

            $itemIds = array_column($_SESSION[$pro], "id");
            $key = array_search($_POST["id"], $itemIds);

            $_SESSION[$pro][$key]["quantity"] = $_POST["quantity"];
            header("Location:../shopper/index.php?delete");

        }
    // foreach($_SESSION[$pro] as $keys => $values)  
    // {  
    //     if( $_POST["key"] == $keys) {
    //         $itemIds = array_column($_SESSION[$pro], "id");
    //         $key = array_search($_POST["id"], $itemIds);
    //         $_SESSION[$pro][$key]["quantity"] = $_POST["quantity"];
    //         header("Location:../shopper/index.php? add=Item has been updated");

    //     }  
    // }  
}
}
