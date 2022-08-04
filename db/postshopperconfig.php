<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // create session to save the data that has been post
    session_start();
    $_SESSION["uid"] = $_POST["uid"];
    $_SESSION["phno"]= $_POST["phno"];
    $_SESSION["email"]= $_POST["email"];
    $_SESSION["adds"]= $_POST["adds"];
    $_SESSION["city"]= $_POST["city"];
    $_SESSION["state"]= $_POST["state"];
    $_SESSION["pocode"]= $_POST["pocode"];
    
    header("Location: ../shopper/warning.php");


}
