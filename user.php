<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<?php $Title = "User Home - Shop4U"?>
<?php include('partial/usermenu.php')?>

<!-- content here-->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Hello, </h1>
    </div>
</main>
<!-- content end -->
<?php include('partial/footer.php')?>
<?php 
}else{
     header("Location: ../login.php");
     exit();
}
 ?>