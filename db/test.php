<?php

require "config.php";
session_start();
if (session_status() == PHP_SESSION_ACTIVE) {
  $id = 15;
  require_once "config.php";
  $sql = "SELECT * FROM custOrder WHERE shopperId=? AND id=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error!";
      exit();
  } else {
      $userId = $_SESSION['id'];
      mysqli_stmt_bind_param($stmt, "ii", $userId, $id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (!$row = mysqli_fetch_array($result)) {
          echo "You need to resubmit your reset request.";
          exit();
      }
      else {
          $date = $row['orderDate'];
          $subTotal = $row['subTotal'];
          $grandTotal = $row['total'];
          $instructions = $row[1];
          $status = $row['orderStatus'];

          ?>
<div class="row py-5 p-4 bg-white rounded shadow-lg">
<div class="col-lg-6">
  <div class="bg-light rounded-pill px-4 py-3 text-uppercase fw-bolder">Instructions
  </div>
  <div class="p-4">
      <p cols="30" rows="5" class="form-control"><?php echo $instructions; ?></p>
  </div>
</div>
<div class="col-lg-6">
  <div class="bg-light rounded-pill px-4 py-3 text-uppercase fw-bolder">Order summary </div>
  <div class="p-4">
      <ul class="list-unstyled mb-4">
          <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal
              </strong><strong>$<?php echo $subTotal;?></strong></li>
          <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Delivery and
                  Handling Fee</strong><strong>$<?php
$deliveryFee = number_format(15, 2);
          echo $deliveryFee;?></strong></li>
          <input type="hidden" name="deliveryFee" value="<?php echo $deliveryFee ?>">
          <li class="d-flex justify-content-between py-3 border-bottom"><strong
                  class="text-muted">Tax</strong><strong>$<?php
$tax = number_format($total * 0.05, 2);
          echo $tax;?></strong>
              <input type="hidden" name="tax" value="<?php echo $tax ?>">
          </li>
          <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
              <h5 class="font-weight-bold">$<?php
$grandTotal = number_format($subTotal + $deliveryFee + $tax, 2);
          echo $grandTotal;?>
              </h5>
          </li>
          <input type="hidden" name="grandTotal" value="<?php echo $grandTotal ?>">
      </ul>
      <input class="btn btn-primary rounded-pill py-2 btn-block" type="submit" name="placeOrder"
          value="Place Order">
  </div>
</div>
</div>
<tr>
<th scope="row"><?php echo $sn++; ?></th>
<td scope="row"><?php echo $id; ?></td>
<td scope="row"><?php echo $date; ?></td>

<td scope="row"><?php if ($status == 0) {
              echo "Waiting for Picker";
          }?></td>
<td scope="row">
  <a href="vieworder.php?orderid=<?php echo $id; ?>"><span style="padding:10px;"
          class="text-dark fa-solid fa-info" data-bs-toggle="tooltip" data-bs-placement="bottom"
          title="View Order Info"></span></a>
</td>
</tr>
<?php
}
  }
}
?>