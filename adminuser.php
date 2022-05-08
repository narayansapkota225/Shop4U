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
    <br></br>
</div>
<div class="container">
    <a href="../adduser.php"><button class="btn btn-lg btn-outline-primary" type="button" >Add User</button></a>
    <table class="table table-striped">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Role</th>
      <th scope="col">User Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php include('db/adminuserconfig.php') ?> 
  </tbody>
</table>
</div>

</main>
<!-- content end-->
<?php include('partial/footer.php')?>
