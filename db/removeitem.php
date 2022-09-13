<?php

session_start();
include "config.php";

if(isset($_GET["delete"]))  
{  
    foreach($_SESSION[$pro] as $keys => $values)  
    {  
        if( $_GET["delete"] == $keys)  
        {  
            unset($_SESSION[$pro][$keys]);
            $_SESSION[$pro] = array_values($_SESSION[$pro]);
            header("Location:../shopper/index.php?delete");

        }  
    }  
 
}
?>