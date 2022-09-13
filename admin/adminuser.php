<?php session_start(); /* Starts the session */

if (!isset($_SESSION['UserData']['Username'])) {
    header("location:../adminlogin.php");
    exit;
}
?>
<?php $Title = "Active Users | Admin - Shop4U"?>
<?php include '../partial/adminmenu.php'?>
<!-- content here -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">User Page</h1>
        <?php if (isset($_GET['adduser'])) {
    if ($_GET["adduser"] === "prepare") {
        echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> There was an error processing your request!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } elseif ($_GET["adduser"] === "useradded") {
        echo '<div class="alert alert-success alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> User account has been successfully created!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}?>
    </div>
    <div class="container ">
        <div class="col-sm-21 shadow-lg p-3 bg-light rounded">
        <nav class="navbar navbar-light bg-light">
        <div class="d-flex flex-wrap">
            <div class="p-2 ">
                <a class="fs-4 text-dark text-decoration-none " href="adduser.php"><button class="btn btn-lg btn-secondary" >Add an user</button></a>
            </div>
            <div class="p-2">
                <a class="fs-4 text-dark text-decoration-none " href="adminblock.php"><button class="btn btn-lg btn-secondary">Blocked users</button></a>
            </div>
            <div class="p-2 ">
                <a class="fs-4 text-dark text-decoration-none " href="admindelete.php"><button class="btn btn-lg btn-secondary">Deleted users</button></a>
            </div>
        </div>
        <div class="justify-content-end">
            <form class="form input-group" action="adminsearchuser.php" method="POST">
                <input class="form-control" type="text" placeholder="Search" name="search"  required>
                <span>&nbsp;&nbsp;</span>
                <button class="btn btn-lg btn-outline-success" type="submit"><span class="fa-solid fa-magnifying-glass"></span>
                    Search</button>
            </form>
        </div>
        </nav>
        </div>
        <!-- form tab -->
        <div class=" col-sm-21 shadow-lg p-5 bg-light rounded">
        <ul class="nav bg-white nav-pills rounded-pill nav-fill mb-3">
            <li class="nav-item">
            <a class="nav-link active rounded-pill " data-bs-toggle="pill" data-bs-target="#all" role="tab" >All</a>
            </li>
            <li class="nav-item">
            <a class="nav-link rounded-pill" data-bs-toggle="pill" data-bs-target="#shopper" role="tab" >Shopper</a>
            </li>
            <li class="nav-item">
            <a class="nav-link rounded-pill" data-bs-toggle="pill" data-bs-target="#picker" role="tab" >Picker</a>
            </li>
        </ul>
        </div>
        <!-- form tab -->

        <!-- form content -->
        <div class="tab-content">
        <!-- all user form content -->
        <div id="all" class="tab-pane fade show active">
            <div class="table-responsive mt-2">
                <table id="user" class="table table-striped caption-top">
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
                        <?php include '../db/adminuserconfig.php'?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- shopper content -->
        <div id="shopper" class="tab-pane fade ">
            <div class="table-responsive mt-2">
                <table id="user" class="table table-striped caption-top">
                    <caption>
                        <h3>List of Active Shopper</h3>
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
                        <?php include '../db/adminshopperconfig.php'?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- picker content -->
        <div id="picker" class="tab-pane fade ">
            <div class="table-responsive mt-2">
                <table id="user" class="table table-striped caption-top">
                    <caption>
                        <h3>List of Active Picker</h3>
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
                        <?php include '../db/adminpickerconfig.php'?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

</main>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<!-- content end-->
<?php include '../partial/footer.php'?>