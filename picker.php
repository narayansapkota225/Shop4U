<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {      
?>
<?php include('./partial/pickermenu.php') ?>
<!-- content start here -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Hello, </h1>
        <p class="lead">Ready to pick Picker</p>
    </div>
</main>
<!-- content end here -->
<?php include('./partial/footer.php') ?>
<?php 
}else{
     header("Location: ../login.php");
     exit();
}
 ?>