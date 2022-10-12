<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && ($_SESSION['role'] == 2)) {
    ?>
<?php $Title = "View Shopper Profile | Picker - Shop4U"?>
<?php include '../partial/pickermenu.php'?>
<!-- content start here-->
<?php
$shopperId = $_GET['id'];
    $pickerId = $_SESSION['id'];

    require_once "../db/config.php";
    $sqlorder = "SELECT * FROM custOrder WHERE shopperId=? AND pickerId=?";
    $stmtorder = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmtorder, $sqlorder)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmtorder, "ii", $shopperId, $pickerId);
        mysqli_stmt_execute($stmtorder);

        $resultorder = mysqli_stmt_get_result($stmtorder);
        if (!$roworder = mysqli_fetch_array($resultorder)) {?>
            <div class="container py-5">
            <h3 class="text-danger">You do not have the access to view this shopper's information.</h3>
        </div>
        <?php } else {
            $sql = "SELECT * FROM user WHERE id=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "There was an error!";
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "i", $shopperId);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                if (!$row = mysqli_fetch_array($result)) {
                    echo "You need to resubmit your reset request.";
                    exit();
                } else {

                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $address = $row['address'];
                    $city = $row['city'];
                    $postCode = $row['postCode'];
                    $state = $row['state'];
                    $fullname = $firstname . "+" . $lastname;
                    $size = 100;
                    $url = "https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=" . $fullname . "&size=" . $size;

                    $previous = "javascript:history.go(-1)";
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $previous = $_SERVER['HTTP_REFERER'];
                    }
                    ?>
<section class=" gradient-custom-2 mx-auto">
    <div class="container" style="margin-top: 40px;">
        <a href="<?= $previous ?>"><button class="btn btn-primary " type="submit"><span class="fa-solid fa-arrow-left"></span>
                Back</button></a>
    </div>
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="rounded-top text-white d-flex bg-dark" height="180">
                <div class="ms-5 mt-5 d-flex">
                    <img src="<?php echo $url; ?>" alt="Profile picture" class="img-fluid img-thumbnail mt-4 mb-2">
                </div>
                <div class="ms-3" style="margin-top: 80px;">
                    <h5><?php echo $firstname ?> <?php echo $lastname ?></h5>
                    <p><a href="mailto:<?php echo $email ?>" target="_blank" rel="noopener noreferrer"
                            class="text-decoration-none text-white"><?php echo $email ?></a></p>
                    <p><a href="tel:<?php echo $phone ?>" target="_blank" rel="noopener noreferrer"
                            class="text-decoration-none text-white"><?php echo $phone ?></a></p>
                </div>
            </div>
            <div class="card-body p-4 text-black">
                <div class="mb-5">
                    <p class="lead fw-bold mb-1">Address</p>
                    <div class="p-4 bg-light rounded shadow-lg" >
                        <div class="col-md-6">
                            <h5><?php echo $address ?>, <?php echo $city ?></h5>
                            <h5><?php echo $state ?> <?php echo $postCode ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- content end here -->
<?php
}
            }
        }
    }
    include '../partial/footer.php';
    ?>
<?php
} else {
    header("Location: ../login.php");
    exit();
}
?>