<?php $Title = "Product Categories - Shop4U"?>
<?php include('partial/regis.php')?> 
<!-- content start here -->
 <main class="flex-shrink-0">
    <div class="container text-center">
        <h1 class="mt-5">Category</h1>
        <p class="lead">Explore type of grocery</p>
    </div>
    <br></br>
    <div class="container text-center">
        <div class="row justify-content-center">
            <?php include('db/showcategoryconfig.php')?>
        </div>
    </div>
</main>
<!-- content end here-->
<?php include('partial/footer.php')?>