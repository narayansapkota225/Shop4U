<?php
/* conect to DB*/
define('DB_SERVER', '20.53.237.147');
define('DB_USERNAME', 'phpadmin');
define('DB_PASSWORD', 'FedMates2022@');
define('DB_NAME', 'Shop4U');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "Connection Was Successful From Remote Server"
?>
