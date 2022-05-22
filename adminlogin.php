<?php $Title = "Admin Login Page - Shop4U"?>
<?php include('partial/menu.php')?>
<!-- Content start here -->
<form action="../db/adminconfig.php" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($_GET['error'])){?>
    <tr>
      <td colspan="2" align="center" valign="top"><p class="alert alert-danger alert-dismissible fade show"><?php echo $_GET['error'];?></p></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Admin Login</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Username</td>
      <td><input name="Username" type="text" class="form-control"></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" type="password" class="form-control"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login" class="btn btn-primary text-center mt-2"></td>
    </tr>
  </table>
</form>
<!-- Content End here-->
<?php include('partial/footer.php')?>