<?php $Title = "Product - Shop4U"?>
<?php include('partial/regis.php')?> 
<!-- content start here -->
<!-- Modal -->
<?php include('db/showpromodalconfig.php')?>
<!-- modal -->
 <main class="flex-shrink-0">
    <div class="container text-center">
        <h1 class="mt-5">Product</h1>
        <p class="lead">Explore all of our product</p>
    </div>
    <section class="py-2">
        <div class="container py-5">
            <div class="row">
                <!-- category selection -->
                <div class="col-xl-2 col-lg-3 order-1 order-lg-1">
                    <h5 class="mb-4">Shop by Category</h5>
                    <div class="d-flex justify-content-center">
                        <div class="nav flex-column nav-pills me-3" role="tablist" aria-orientation="vertical">
                            <button class="btn btn-lg nav-link <?php if (isset($_GET['all'])){ echo "show active";}?>"  data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab" aria-selected="true">All</button>
                            <?php include('db/indexprocatconfig.php')?>
                        </div>
                    </div>
                </div>
            <!-- category selection -->
                <div class="col-xl-10 col-lg-9 order-2 order-lg-2 mb-5 mb-lg-0">
                    <div class="tab-content" >
                        <!-- all product -->
                        <div class="tab-pane fade <?php if (isset($_GET['all'])){ echo "show active";}?>" id="all" role="tabpanel" >
                            <div class="row">
                                <?php include('db/indexproductconfig.php')?>            
                            </div>
                        </div>
                        <!-- all product -->
                        
                        <!-- product by category -->
                        <?php include('db/indexproductfilterconfig.php')?>
                        <!-- product by category -->
                    </div>
                </div>
        </div>
    </section>
</main>
<!-- content end here-->
<?php include('partial/footer.php')?>