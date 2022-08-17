<?php $Title = "Sign Up - Shop4U"?>
<?php include('./partial/menu.php')?>
<!-- sign up container start-->

<div class="container-fluid vh-10">
    <div class="" style="margin-top:40px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-6 col-sm-21 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Sign Up</h3>
                    <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger alert-dismissible fade show"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                </div>
                <!-- form tab -->
                    <ul class="nav bg-white nav-pills rounded-pill nav-fill mb-3">
                        <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET['shopper'])){ echo "active";}?> rounded-pill " data-bs-toggle="pill" href="#shopper" role="tab" >Shopper</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET['picker'])){ echo "active";}?> rounded-pill" data-bs-toggle="pill" href="#picker" role="tab" >Picker</a>
                        </li>
                    </ul>
                <!-- form tab -->

                <!-- form content -->
                <div class="tab-content">

                <!-- shopper form content -->
                <div id="shopper" class="tab-pane fade <?php if (isset($_GET['shopper'])){ echo "show active";}?>">
                <form class="row g-3 needs-validation" action="../db/signupconfig.php" method="POST">
                    <div class="col-md-6">
                        <label class="form-label fa-1x">First name</label>
                        <input type="text" placeholder="John" class="form-control" name="fname"
                            required="required">
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label">Last name</label>
                        <input type="text" placeholder="Smith" class="form-control" name="lname"
                            required="required">
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label"><span class="fa-solid fa-phone"></span> Phone Number</label>
                        <input type="tel" class="form-control" name="phno" placeholder="0448751365"
                        pattern="[0]{1}[0-5]{1}[0-9]{8}" 
                        oninvalid="setCustomValidity('Please enter Valid Phone Number')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label"><span class="fa-solid fa-envelope"></span> Email</label>
                        <input type="email" placeholder="exampler@mail.com" name="email" class="form-control" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                        oninvalid="setCustomValidity('Please enter Valid Email Address')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="adds" required="required">
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" required="required">
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label">State</label>
                        <select class="form-select" name="state" required="required">
                            <option selected disabled value="">Choose...</option>
                            <option>NSW</option>
                            <option>VIC</option>
                            <option>SA</option>
                            <option>QLD</option>
                            <option>NT</option>
                            <option>WA</option>
                            <option>TAS</option>
                            <option>ACT</option>
                        </select>
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label">Post Code</label>
                        <input type="text" class="form-control" pattern="[0-9]{4}" name="pocode" 
                        oninvalid="setCustomValidity('Please enter Valid Post Code')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label"><span class="fa-solid fa-key"></span> Password</label>
                        <input type="password" class="form-control" name="pswd" 
                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                        oninvalid="setCustomValidity('Password must contain UpperCase, LowerCase, Number/SpecialCharacter and Min 8 Characters. Example password: J1Smith1&3')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label"><span class="fa-solid fa-key"></span> Confirm Password</label>
                        <input type="password" class="form-control" name="cpswd" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required">
                    </div>
                    <div class="col-12 fa-1x">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                required="required">
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                        </div>
                    </div>
                    <p class="col-12 text-center fa-1x">
                        <button class="btn btn-primary " type="submit"><span class="fa-solid fa-paper-plane"></span>
                            Submit</button>
                    </p>
                </form>
                </div>
                <!-- shopper form end -->

                <!-- picker form content -->
                <div id="picker" class="tab-pane fade <?php if (isset($_GET['picker'])){ echo "show active";}?> ">
                <form class="row g-3 needs-validation" action="../db/pickersignupconfig.php" method="POST">
                    <div class="col-md-6">
                        <label class="form-label">First name</label>
                        <input type="text" placeholder="John" class="form-control" name="fname"
                            required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last name</label>
                        <input type="text" placeholder="Smith" class="form-control" name="lname"
                            required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span class="fa-solid fa-phone"></span> Phone Number</label>
                        <input type="tel" class="form-control" name="phno" id="pho" placeholder="0448751365"
                        pattern="[0]{1}[0-5]{1}[0-9]{8}" 
                        oninvalid="setCustomValidity('Please enter Valid Phone Number')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span class="fa-solid fa-envelope"></span> Email</label>
                        <input type="email" placeholder="exampler@mail.com" name="email" class="form-control" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                        oninvalid="setCustomValidity('Please enter Valid Email Address')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="adds" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">State</label>
                        <select class="form-select" name="state" required="required">
                            <option selected disabled value="">Choose...</option>
                            <option>NSW</option>
                            <option>VIC</option>
                            <option>SA</option>
                            <option>QLD</option>
                            <option>NT</option>
                            <option>WA</option>
                            <option>TAS</option>
                            <option>ACT</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Post Code</label>
                        <input type="text" class="form-control" pattern="[0-9]{4}" name="pocode" 
                        oninvalid="setCustomValidity('Please enter Valid Post Code')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Transportation</label>
                        <select class="form-select" name="trans" required="required">
                            <option selected disabled value="">Choose...</option>
                            <option>Bicycle</option>
                            <option>Car</option>
                            <option>Motor Cycle</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Driving License (optional)</label>
                        <input type="text" class="form-control" name="lic">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span class="fa-solid fa-key"></span> Password</label>
                        <input type="password" class="form-control" name="pswd" 
                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                        oninvalid="setCustomValidity('Password must contain UpperCase, LowerCase, Number/SpecialCharacter and Min 8 Characters. Example password: J1Smith1&3')"
                        onchange="try{setCustomValidity('')}catch(e){}" required="required">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span class="fa-solid fa-key"></span> Confirm Password</label>
                        <input type="password" class="form-control" name="cpswd" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                required="required">
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                        </div>
                    </div>
                    <p class="col-12 text-center fa-1x">
                        <button class="btn btn-primary " type="submit"><span class="fa-solid fa-paper-plane"></span>
                            Submit</button>
                    </p>
                </form>
                </div>
                <!-- picker content end -->

                <p class="text-center mt-1">Have Account?
                    <a href="../login.php"><span class="text-primary">Login</span></a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- sign up container end-->
<?php include('partial/footer.php')?>