<?php $Title = "Admin Page - Shop4U"?>
<?php include('partial/adminmenu.php')?>
<!-- content here -->
<main class="flex-shrink-0">
<div class="container">
    <h1 class="mt-5">Admin Page</h1>
</div>
</main>
<!-- content end-->
<script type="text/javascript">  function preventBack() {window.history.forward();}  setTimeout("preventBack()", 0);  window.onunload = function () {null};</script>
<script language="JavaScript">
    window.onload = passCheck();
    
    function passCheck(){
      if(prompt("Please enter your password","") == "admin"){
        return;
      }else{
        window.location = "../index.php";
        return;
      }
    }
  </script>
<?php include('partial/footer.php')?>
