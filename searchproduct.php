<?php $Title = "Product - Shop4U"?>
<?php include('partial/regis.php')?> 
<!-- content start here -->
<!-- modal -->
<?php include('db/showpromodalconfig.php')?>
<!-- modal -->
<?php $search = $_POST['search'];?>
<div class="container py-5">
    <div class="container">
    <p class="text-center fs-4 py-4"><strong> Search Result of "<?php echo $search;?>"</strong></p>
    </div>
    <div class="row justify-content-sm-center d-flex ">
        <?php include('db/searchproductconfig.php')?>
    </div>
    <div class="d-flex justify-content-center">
        <p><a class="btn btn-secondary" href="product.php?all">More..</a></p>
    </div>
</div>

<!-- content end here-->
<?php include('partial/footer.php')?>