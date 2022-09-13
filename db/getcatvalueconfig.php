<?php

include "config.php";

// get all active category
$sql = "SELECT * FROM category WHERE active=1";
$res = mysqli_query($conn,$sql);

// count the row of category 
$count = mysqli_num_rows($res);


if($count > 0){

    // if we have category
    while($row = mysqli_fetch_assoc($res)){
        $id = $row['id'];
        $title = $row['title'];
        ?>
        <option value="<?php echo $id;?>"><?php echo $title;?></option>
        <?php
    }
}else{

    // if we dont have category
    ?>
    <option value="0">No Category Available</option>
    <?php
}
?>