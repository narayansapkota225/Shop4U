<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../adminlogin.php");
        exit;
}
?>
<?php $Title = "Deleted Users | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content here -->
<main class="flex-shrink-0">
<div class="container">
    <h1 class="mt-5">Deleted User Page</h1>
    <?php if (isset($_GET['result'])) { ?>
    <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
    <?php } ?>
</div>
<div class="container ">
  <div class="container-fluid justify-content-center">
      <a href="adminuser.php"><button class="btn btn-lg btn-outline-primary" type="button" ><span class="fa-solid fa-arrow-left"></span> Back</button></a>
  </div>
  <div class="table-responsive mt-2" >
    <table class="table table-striped caption-top">
    <caption><h3>List of Deleted Users</h3></caption>
      <thead class="table-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Role</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php include('../db/admindeleteconfig.php') ?> 
      </tbody>
    </table>
  </div>
</div>

</main>
<!-- content end-->
<?php include('../partial/footer.php')?>
