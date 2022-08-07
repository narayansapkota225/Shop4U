<?php 

require_once "config.php";

$id = $_GET['update'];
$sql = "SELECT * FROM category WHERE id=$id";
$res = mysqli_query($conn, $sql);

 if($res == true){
     $count=mysqli_num_rows($res);

     if ($count > 0 ){
        $n = mysqli_fetch_assoc($res);
        $title = $n['title'];
        $image = $n['image'];
        $feature = $n['feature'];
        $active = $n['active'];
     }
 }

