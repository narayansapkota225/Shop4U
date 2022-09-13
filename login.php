<?php $Title = "Login - Shop4U"?>
<?php
include 'partial/menu.php';
?>

<!-- login container start-->
<div class="container-fluid">
    <div class="" style="margin-top:30px; margin-bottom:30px;">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-5 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Log in</h3>
                    <?php if (isset($_GET['error'])) {
    if ($_GET["error"] === "pwdreq") {
        echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> Password is required!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } elseif ($_GET["error"] === "emailreq") {
        echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> Email is required!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

    } elseif ($_GET["error"] === "restricted") {
        echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> Your account has been banned from signing in! Please contact the Site Administrator.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } elseif ($_GET["error"] === "wrongdetails") {
        echo '<div class="alert alert-danger alert-dismissible fade show"><i class="fa-solid fa-triangle-exclamation"></i> Invalid email or password!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    ?>

                    <?php }?>
                    <?php if (isset($_GET['result'])) {?>
                    <div class="alert alert-success alert-dismissible">
                        <i class="fa-solid fa-circle-check"></i>
                        <?php echo $_GET['result']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php }?>
                    <?php
if (isset($_GET["newpwd"])) {
    if ($_GET["newpwd"] == "passwordupdated") {
        echo '<div class="alert alert-success alert-dismissible fade show"><i class="fa-solid fa-circle-check"></i> Your password has been reset!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
?>
                </div>
                <form action="../db/loginconfig.php" method="POST">
                    <div class="p-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                            <input type="text" class="form-control" name="uname" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                            <input type="password" class="form-control" name="passwd" placeholder="password">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember Me
                            </label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary text-center mt-2" type="submit"><span
                                    class="fa-solid fa-right-to-bracket"></span>
                                Login
                            </button>
                        </div>
                        <p class="text-center mt-5">Don't have an account?
                            <a href="../signup.php?shopper"><span class="text-primary">Sign Up</span></a>
                        </p>
                        <a href="../forgot-password.php">
                            <p class="text-center text-primary">Forgot your password?</p>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- login container end-->
<?php include 'partial/footer.php'?>