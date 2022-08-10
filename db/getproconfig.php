<?php 

require_once "config.php";

$id = $_GET['update'];
$sql = "SELECT * FROM product WHERE id=$id";
$res = mysqli_query($conn, $sql);

 if($res == true){
     $count=mysqli_num_rows($res);

     if ($count > 0 ){
        $n = mysqli_fetch_assoc($res);
        $title = $n['title'];
        $desc =$n['description'];
        $price = $n['price'];
        $image = $n['image'];
        $cat = $n['category_id'];
        $feature = $n['feature'];
        $active = $n['active'];
     }
 }