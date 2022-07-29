<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // create session to save the data that has been post
    session_start();
    $_SESSION["uid"] = $_POST["uid"];
	$_SESSION["fname"] = $_POST["fname"];
    $_SESSION["lname"]= $_POST["lname"];
    $_SESSION["phno"]= $_POST["phno"];
    $_SESSION["email"]= $_POST["email"];
    $_SESSION["adds"]= $_POST["adds"];
    $_SESSION["city"]= $_POST["city"];
    $_SESSION["state"]= $_POST["state"];
    $_SESSION["pocode"]= $_POST["pocode"];
	$_SESSION["trans"]= $_POST["trans"];
	$_SESSION["lic"]= $_POST["lic"];
    
    header("Location: ../picker/warning.php");


}