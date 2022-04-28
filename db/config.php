<?php
$sname= "localhost";
$uname= "phpadmin";
$password = "FedMates2022@";
$db_name = "Shop4U";

$conn = mysqli_connect($sname, $uname, $password, $db_name);
if (!$conn) {
    echo "Connection failed!";
}
