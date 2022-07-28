<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../adminlogin.php");
        exit;
}
?>
<?php $Title = "Active Users | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<!-- content here -->
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
        <nav class="navbar navbar-light bg-light">
          <span class="justify-content-start">
          <a class="fs-4 text-dark text-decoration-none" href="adduser.php"><button class="btn btn-lg btn-secondary">Add an user</button></a>
          <a class="fs-4 text-dark text-decoration-none" href="adminblock.php"><button class="btn btn-lg btn-secondary">Blocked users</button></a>
          <a class="fs-4 text-dark text-decoration-none" href="admindelete.php"><button class="btn btn-lg btn-secondary">Deleted users</button></a>
        </span>
        <span class="justify-content-end">
            <form class="form input-group" action="adminsearchuser.php" method="POST">
                <input class="form-control" type="text" placeholder="Search" name="search"  required>
                <span>&nbsp;&nbsp;</span>
                <button class="btn btn-lg btn-outline-success" type="submit"><span class="fa-solid fa-magnifying-glass"></span>
                    Search</button>
            </form>
        </span>
        </nav>
        <div class="table-responsive mt-2">
            <table class="table table-striped caption-top">
                <caption>
                    <h3>List of Active Users</h3>
                </caption>
                <thead class="bg-secondary text-light">
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
                    <?php include('../db/adminuserconfig.php') ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
<!-- content end-->
<?php include('../partial/footer.php')?>