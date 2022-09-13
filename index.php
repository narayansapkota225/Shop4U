<?php $Title = "Home Page - Shop4U"?>
<?php include('./partial/regis.php')?>
<!-- content start here -->
<!-- modal -->
<!-- Modal -->
<?php include('db/showpromodalconfig.php')?>
<!-- modal -->
 <main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Welcome Shoppers</h1>
        <p class="lead">Shopping Grocery are now as close as your hand to computer</p>
    </div>
    <br></br>
    <div class="container">
        <form class="d-flex" action="searchproduct.php" method="POST">
            <input title="Please fill this field to search." class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <br></br>
    <div class="container text-center">
        <header class="mb-3 text-center">
          <h2 class="mb-0">Featured Category</h2>
          <p class="text-muted">Browse Category featuring this week</p>
        </header>
        <div class="row">
            <?php include('db/showfeaturecatconfig.php')?>
        </div>
        <div class="d-flex justify-content-center">
            <p><a class="btn btn-secondary" href="categories.php">More..</a></p>
        </div>
    </div>
    <section class="py-5 bg-center bg-cover" style="background-image: url(images/divider-bg.0d7f8f0b.jpg); background-attachment: fixed; background-size: cover; background-repeat: no-repeat; background-position: right center;">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-6 ms-auto">
            <h2 class="hero-heading">Need grocery now?</h2>
            <p class="text-muted">Shop4U will deliver to you under 1 hour time GUARANTEE..</p>
            <a class="btn btn-primary" href="login.php"> <i class="fas fa-shopping-bag-mr-2"></i>Shop now</a>
          </div>
        </div>
      </div>
    </section>
    <br></br>
    <div class="container">
        <header class="mb-3 text-center">
          <h2 class="mb-0">Featured Product</h2>
          <p class="text-muted">Browse Products featuring this week</p>
        </header>
        <div class="mySwiper swiper ">
            <div class="swiper-wrapper" style="transform: translate3d(-2220px, 0px, 0px); transition-duration: 0ms;">
                <?php include('./db/showfeatureproconfig.php')?>
            </div>
            <div class="swiper-button-next" ></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <br></br>
    <div class="container pb-5 bg-light text-center">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-4 w-100">
            <i class="bi bi-truck"></i>
              <div class="ms-3">
                <h6 class="mb-1 text-uppercase">Free shipping </h6>
                <p class="small text-muted mb-0">For all orders over $99</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-4 w-100">
            <i class="bi bi-cash-coin"></i>
              <div class="ms-3">
                <h6 class="mb-1 text-uppercase">30 days return </h6>
                <p class="small text-muted mb-0">If goods have problems</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-4 w-100">
            <i class="bi bi-credit-card"></i>
              <div class="ms-3">
                <h6 class="mb-1 text-uppercase">Secure payment </h6>
                <p class="small text-muted mb-0">100% secure payment</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-4 w-100">
            <i class="bi bi-telephone-fill"></i>
              <div class="ms-3">
                <h6 class="mb-1 text-uppercase">24/7 support </h6>
                <p class="small text-muted mb-0">Dedicated support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br></br>
    <div class="container">
    <section class="pb-5">
      <div class="container p-5 bg-light">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0">           
            <h3>Wanna earn extra <span class="text-primary"> MONEY..?? </span>Be our Picker</h3>
            <p class="text-small text-muted mb-0">Earn extra income by picking for Shop4U. You can work anywhere and anytime whenever you like</p>
          </div>
          <div class="col-lg-6 ">
                <a href="signup.php?picker" ><button class="btn btn-primary" id="button-addon2" type="button">Sign Up here</button><a>
          </div>
        </div>
      </div>
    </section>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 50,
          },
        }
      });
    </script>
<!-- content end here-->
<?php include('./partial/footer.php')?>
