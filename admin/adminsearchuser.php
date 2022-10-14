<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:adminlogin.php");
        exit;
}
?>
<?php $Title = "Search Users | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content here -->
<?php $search = $_POST['search'];?>
<main class="flex-shrink-0">
<div class="container">
    <h1 class="mt-5">User Page</h1>
    <?php if (isset($_GET['result'])) { ?>
    <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
    <?php } ?>
    <?php if (isset($_GET['error'])) { ?>
    <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
    <?php } ?>
</div>
<div class="container ">
    <div class="container-fluid justify-content-center">
        <a href="adminuser.php"><button class="btn btn-lg btn-outline-primary"><span class="fa-solid fa-arrow-left"></span> Back</button></a> 
    </div>
    <div class="container">
    <p class="text-center fs-4"><strong> Search Result of "<?php echo $search;?>"</strong></p>
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
        <?php include('../db/adminsearchuserconfig.php') ?> 
      </tbody>
    </table>
  </div>
</div>

</main>
<!-- content end-->
<?php include('../partial/footer.php')?>
