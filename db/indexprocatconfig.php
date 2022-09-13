<?php

require "config.php";

$sql = "SELECT * FROM category WHERE active=1";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

if($count > 0){
    //get all the data from database
    while($rows = mysqli_fetch_assoc($res)){
        $title = $rows['title'];

        //display the value
        ?>
            <button class="btn btn-lg nav-link <?php if (isset($_GET[$title])){ echo "show active";}?>"  data-bs-toggle="pill" data-bs-target="#<?php echo $title;?>" type="button" role="tab"><?php echo $title;?></button> 

        <?php
    } 

}
?>
