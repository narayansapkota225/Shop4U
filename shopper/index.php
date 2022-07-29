<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role']==1 )) {
?>
<?php $Title = "User Home - Shop4U"?>
<?php include('../partial/usermenu.php')?>

<!-- content here-->
<main class="flex-shrink-0">
    <div class="container">
        <?php if (isset($_GET['result'])) { ?>
        <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
        <?php } ?>
        <h1 class="mt-5">Hello,<?php echo $_SESSION['firstname']; ?> </h1>
    </div>
</main>
<!-- content end -->
<?php include('../partial/footer.php')?>
<?php 
}else{
     header("Location: ../login.php");
     exit();
}
 ?>