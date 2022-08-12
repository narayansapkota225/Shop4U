<?php

require "config.php";

$sql = "SELECT * FROM category";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

if($count > 0){
    //get all the data from database
    while($rows = mysqli_fetch_assoc($res)){
        $title = $rows['title'];

        //display the value
        ?>
            <li class="nav-item">
            <a class="nav-link rounded-pill" data-bs-toggle="pill" data-bs-target="#<?php echo $title; ?>" role="tab" ><?php echo $title; ?></a>
            </li>  

        <?php
    } 

}
?>
