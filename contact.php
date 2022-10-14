<?php $Title = "Contact Us - Shop4U"?>
<?php include('./partial/regis.php')?>
<!-- sign up container start-->

<div class="container-fluid vh-10">
    <div class="" style="margin-top:40px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-6 col-sm-21 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Contact Us</h3>
                    <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger alert-dismissible fade show"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                </div>

                <!-- form content -->
                <div class="tab-content">

                <!-- shopper form content -->
                <form class="row g-3 needs-validation" action="../db/contactconfig.php" method="POST">
                    <div class="col-md-6">
                        <label class="form-label fa-1x "><span class="bi bi-person-fill"></span> First name</label>
                        <input type="text" placeholder="John" class="form-control" name="fname"
                            required="required">
                    </div>
                    <div class="col-md-6 fa-1x">
                        <label class="form-label"><span class="bi bi-person-fill"></span> Last name</label>
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
                    <div class="col-md-12 fa-1x">
                        <label class="form-label"><span class="fa-solid fa-envelope"></span> Message:</label>
                        <textarea name="message" cols="30" rows="5" class="form-control" required></textarea>
                    </div>
                    <p class="col-12 text-center fa-1x">
                        <button class="btn btn-primary " type="submit" name="contactus"><span class="fa-solid fa-paper-plane"></span>
                            Submit</button>
                    </p>
                </form>
                </div>
                <!-- shopper form end -->
            </div>
        </div>
    </div>
</div>
<!-- sign up container end-->
<?php include('partial/footer.php')?>