<?php $Title = "Login - Shop4U"?>
<?php include('partial/menu.php')?>

 <!-- login container start-->
 <div class="container-fluid vh-100" style="margin-top:100px">
            <div class="" style="margin-top:200px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Log in</h3>
                            <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                        </div>
                        <form action="./db/loginconfig.php" method="POST">
                            <div class="p-4 text-center">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" class="form-control" name="uname" placeholder="Username">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="password">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label text-start" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <button class="btn btn-primary text-center mt-2" type="submit">
                                    Login
                                </button>
                                <p class="text-center mt-5">Don't have an account?
                                    <a href="../signup.php"><span class="text-primary">Sign Up</span></a>
                                </p>
                                <a href="../resetpass.php"><p class="text-center text-primary">Forgot your password?</p></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 <!-- login container end-->
 <?php include('partial/footer.php')?>