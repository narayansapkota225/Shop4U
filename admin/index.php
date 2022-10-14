<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:adminlogin.php");
        exit;
}
?>
<?php $Title = "Home | Admin - Shop4U"?>
<?php include('../partial/adminmenu.php')?>
<?php require_once '../db/config.php'?>
<!-- content here -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Dashboard</h1>
    </div>
</main>
    <div class="content-wrapper">
        <div class="container py-5">
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                            <i class="bi bi-people-fill"></i>
                            </div>
                            <?php $sql = "SELECT COUNT(*) as totalusers FROM user";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_array($result)) {?>
            <div class="mr-5 text-danger">No users found!</div>
        <?php } else { 
            $totalusers = $row['totalusers'];
            ?>
                            <div class="mr-5"><?php echo $totalusers; ?> Users</div>
                        </div>
                        <?php }
    }
    ?>
                        <a class="card-footer text-white clearfix small z-1" href="adminuser.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card  bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                            <i class="bi bi-cash-coin"></i>
                            </div>
                            <?php $sql = "SELECT SUM(total) as revenue FROM custOrder";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_array($result)) {?>
            <div class="mr-5 text-danger">No orders yet!</div>
        <?php } else { 
            $totalrevenue = $row['revenue'];
            ?>
                            <div class="mr-5 text-dark">$ <?php echo $totalrevenue;?> Revenue</div>
                            <?php }
    }
    ?>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="orders.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <?php $sql = "SELECT COUNT(*) as totalNewOrders FROM custOrder WHERE orderStatus=0";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_array($result)) {?>
            <div class="mr-5 text-danger">No new orders!</div>
        <?php } else { 
            $totalorders = $row['totalNewOrders'];
            ?>
                            <div class="mr-5"><?php echo $totalorders;?> New Orders!</div>
                            <?php }
    }
    ?>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="orders.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <?php

$sql= "SELECT DATE_FORMAT(orderDate,'%Y-%m') as month, SUM(total) as total FROM custOrder GROUP BY month ORDER BY month";
//$sql= "SELECT DATE_FORMAT(orderDate,'%Y-%m') as month, SUM(total) as total FROM custOrder GROUP BY month";
$res = mysqli_query($conn, $sql);

$dataPoints = array();

while ($rows = mysqli_fetch_assoc($res)){
    $phpDate = $rows['month'];
    $phpTimestamp = strtotime($phpDate);
    $javaScriptTimestamp = $phpTimestamp * 1000;
    $d = array ("x" => $javaScriptTimestamp, "y" => $rows['total']);

    array_push($dataPoints, $d);
}


//  $dataPoints = array(
// 	array("x" => 946665000000, "y" => 3289),
// 	array("x" => 978287400000, "y" => 3830),
// 	array("x" => 1009823400000, "y" => 2009),
// 	array("x" => 1041359400000, "y" => 2840),
// 	array("x" => 1072895400000, "y" => 2396),
// 	array("x" => 1104517800000, "y" => 1613),
// 	array("x" => 1136053800000, "y" => 1821),
// 	array("x" => 1167589800000, "y" => 2000),
// 	array("x" => 1199125800000, "y" => 1397),
// 	array("x" => 1230748200000, "y" => 2506),
// 	array("x" => 1262284200000, "y" => 6704),
// 	array("x" => 1293820200000, "y" => 5704),
// 	array("x" => 1325356200000, "y" => 4009),
// 	array("x" => 1356978600000, "y" => 3026),
// 	array("x" => 1388514600000, "y" => 2394),
// 	array("x" => 1420050600000, "y" => 1872),
// 	array("x" => 1451586600000, "y" => 2140),
//  );
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Monthly Revenue"
	},
    axisX: [{
      margin: -5,
      valueFormatString: "MMM-YYYY",
      interval: 1,
      intervalType: "month"
    },
    {
      margin: -5,
      lineThickness: 0,
      tickThickness: 0,
      labelFormatter: function(e) {
        return "";
      }
    },
    {
      margin: -5,
      lineThickness: 0,
      tickThickness: 0,
      labelFormatter: function(e) {
        return "";
      }
    }
  ],
	axisY: {
        includeZero: true,
		title: "Revenue in AUD",
		suffix: "",
		prefix: "$"
	}, toolTip:{
   content:"<?php echo $phpDate; ?>" ,
 },
	data: [{
		type: "spline",
        indexLabelPlacement: "inside",
        indexLabel: "${y}",
        xValueType: "dateTime",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart.render();
 
}
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>        
        
    </div>
<!-- content end-->
<!-- <script type="text/javascript">  function preventBack() {window.history.forward();}  setTimeout("preventBack()", 0);  window.onunload = function () {null};</script>
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
  </script> -->
<?php include('../partial/footer.php')?>