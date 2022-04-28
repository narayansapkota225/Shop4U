<?php
$sname= "localhost";
$unmae= "phpadmin";
$password = "FedMates2022@";
$db_name = "Shop4U";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$conn) {

    echo "Connection failed!";

}
