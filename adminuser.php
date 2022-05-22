<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../adminlogin.php");
        exit;
}
?>
<?php $Title = "User Page - Shop4U"?>
<?php include('partial/adminmenu.php')?>
<!-- content here -->
<main class="flex-shrink-0">
<div class="container">
    <h1 class="mt-5">User Page</h1>
    <?php if (isset($_GET['result'])) { ?>
    <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
    <?php } ?>
</div>
<div class="container ">
  <div class="container-fluid justify-content-center">
      <a href="../adduser.php"><button class="btn btn-lg btn-outline-primary" type="button" >Add User</button></a>
      <a href="#"><button class="btn btn-lg btn-outline-secondary" type="button" >Blocked User</button></a>
      <a href="#"><button class="btn btn-lg btn-outline-danger" type="button" >Deleted User</button></a>
  </div>
  <div class="table-responsive mt-2" >
    <table class="table table-striped caption-top">
    <caption><h3>List of Active Users</h3></caption>
      <thead class="table-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Role</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php include('db/adminuserconfig.php') ?> 
      </tbody>
    </table>
  </div>
</div>

</main>
<!-- content end-->
<?php include('partial/footer.php')?>
