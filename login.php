<?php $Title = "Login - Shop4U"?>
<?php include('partial/menu.php')?>

 <!-- login container start-->
 <div class="container-fluid vh-100" style="margin-top:10px">
            <div class="" style="margin-top:40px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Log in</h3>
                            <?php if (isset($_GET['error'])) { ?>
                            <p class="alert alert-danger alert-dismissible fade show"><strong><?php echo $_GET['error']; ?></strong></p>
                            <?php } ?>
                            <?php if (isset($_GET['result'])) { ?>
                            <p class="alert alert-success alert-dismissible fade show"><strong><?php echo $_GET['result']; ?></strong></p>
                            <?php } ?>
                            <?php
                            if (isset($_GET["newpwd"])) {
                                if ($_GET["newpwd"] == "passwordupdated") {
                                    echo '<p class="alert alert-success alert-dismissible fade show">Your password has been reset!</p>';
                                }
                            }
                            ?>
                        </div>
                        <form action="../db/loginconfig.php" method="POST">
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"><span class="fa-solid fa-envelope"></span></i></span>
                                    <input type="text" class="form-control" name="uname" placeholder="Email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"><span class="fa-solid fa-key"></span></i></span>
                                    <input type="password" class="form-control" name="passwd" placeholder="password">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <div class="text-center">
                                <button class="btn btn-primary text-center mt-2" type="submit"><span class="fa-solid fa-right-to-bracket"></span>
                                    Login
                                </button>
                            </div>
                                <p class="text-center mt-5">Don't have an account?
                                    <a href="../signup.php?shopper"><span class="text-primary">Sign Up</span></a>
                                </p>
                                <a href="../forgot-password.php"><p class="text-center text-primary">Forgot your password?</p></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 <!-- login container end-->
 <?php include('partial/footer.php')?>