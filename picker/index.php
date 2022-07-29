<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role']==2)) {  
?>
<?php include('../partial/pickermenu.php') ?>
<!-- content start here -->
<main class="flex-shrink-0">
    <div class="container">
    <?php if (isset($_GET['result'])) { ?>
        <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
        <?php } ?>
        <h1 class="mt-5">Hello,<?php echo $_SESSION['firstname']; ?> </h1>
        <p class="lead">Ready to pick Picker</p>
    </div>
</main>
<!-- content end here -->
<?php include('../partial/footer.php') ?>
<?php 
}else{
     header("Location: ../login.php");
     exit();
}
 ?>