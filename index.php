<?php $Title = "Home Page - Shop4U"?>
<?php include('./partial/regis.php')?>
<!-- content start here -->
 <main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Welcome Shoppers</h1>
        <p class="lead">Shopping Grocery are now as close as your hand to computer</p>
    </div>
    <br></br>
    <div class="container">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required>
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
            <div class="col-lg-4">
                <img src="images/burger.jpg" width="300" height="300"></img>
                <h2>hello</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                <p><a class="btn btn-secondary" href="#">More..</a></p>
            </div>
            <div class="col-lg-4">
                <img src="images/burger.jpg" width="300" height="300"></img>
                <h2>hello</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                <p><a class="btn btn-secondary" href="#">More..</a></p>
            </div>
            <div class="col-lg-4">
                <img src="images/burger.jpg" width="300" height="300"></img>
                <h2>hello</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                <p><a class="btn btn-secondary" href="#">More..</a></p>
            </div>
        </div>
    </div>
    <section class="py-5 bg-center bg-cover" style="background-image: url(images/divider-bg.0d7f8f0b.jpg); background-attachment: fixed; background-size: contain;">
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
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/burger.jpg" width="300" ></img></div>
                <div class="swiper-slide"><img src="images/burger.jpg" width="300" ></img></div>
                <div class="swiper-slide"><img src="images/burger.jpg" width="300" ></img></div>
                <div class="swiper-slide"><img src="images/burger.jpg" width="300" ></img></div>
                <div class="swiper-slide"><img src="images/burger.jpg" width="300" ></img></div>
                <div class="swiper-slide"><img src="images/burger.jpg" width="300" ></img></div>
                <div class="swiper-slide"><img src="images/burger.jpg" width="300" ></img></div>
                <div class="swiper-slide"><img src="images/burger.jpg" width="300" ></img></div>
                <div class="swiper-slide"><img src="images/burger.jpg" width="300" ></img></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <br></br>
    <div class="container pb-5 bg-light text-center">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-4 w-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg>
              <div class="ms-3">
                <h6 class="mb-1 text-uppercase">Free shipping </h6>
                <p class="small text-muted mb-0">For all orders over $99</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-4 w-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
            </svg>
              <div class="ms-3">
                <h6 class="mb-1 text-uppercase">30 days return </h6>
                <p class="small text-muted mb-0">If goods have problems</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-4 w-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
            </svg>
              <div class="ms-3">
                <h6 class="mb-1 text-uppercase">Secure payment </h6>
                <p class="small text-muted mb-0">100% secure payment</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-4 w-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg>
              <div class="ms-3">
                <h6 class="mb-1 text-uppercase">24/7 support </h6>
                <p class="small text-muted mb-0">Dedicated support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 5,
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
      });
    </script>
<!-- content end here-->
<?php include('./partial/footer.php')?>
