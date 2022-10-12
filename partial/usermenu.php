<!-- nav bar menu -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $Title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
    html,
    body {
        position: relative;
        height: 100%;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: flex;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product {
        position: relative
    }

    .product:hover img {
        opacity: 0.6
    }

    .product-btn {
        width: 50px;
        height: 50px;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: center;
        justify-content: center;
        text-transform: uppercase;
        font-size: 0.85rem;
        font-weight: 400;
        background: #fff;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s;
        z-index: 99;
        opacity: 0
    }

    .product-btn:hover {
        background: #4650dd;
        color: #fff
    }

    .product:hover .product-btn {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }

    .product:hover .cta {
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }

    .product .cta {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        -webkit-transform: translateX(0.5rem);
        transform: translateX(0.5rem);
        opacity: 0;
        transition: all 0.3s
    }

    .modal-close {
        position: absolute;
        top: -1px;
        right: 0;
        width: 40px;
        height: 40px;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: center;
        justify-content: center;
        background: #4650dd !important;
        color: #fff;
        padding: 0;
        opacity: 1 !important;
        transition: all 0.3s
    }

    .modal-close:hover {
        background: #303cd9 !important;
        color: #fff
    }

    .col1 {
        
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center; 
    }

    /* Image to Text on hover */

    .hovtxt {
        background:#00000050;
        opacity:0;
        transition-duration:0.3s;
        transition-timing-function:ease-in-out;
    }


    .hovtxt:hover {
        opacity:1;
    }
    </style>
</head>

<body>
    <!-- menu start here  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fs-4" href="../shopper/">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link fs-4" href="orders.php">Orders</a>
                    <a class="nav-link fs-4" href="../shopper/profile.php">Profile</a>
                    <a class="nav-link fs-4" href="../shopper/resetpwd.php">Reset Password</a>
                </div>
            </div>
            <div class="d-flex">
                <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <button class="btn btn-primary btn-lg bi bi-cart3 position-relative">
                        <span class="badge bg-danger">
                            <?php 
                            if(isset($_SESSION[$pro])){
                                $count = count($_SESSION[$pro]);
                                echo $count;
                            }else if (isset($_GET['delete']) && isset($_SESSION[$pro])) { 
                                $count = count($_SESSION[$pro]);
                                echo $count;
                            } else {
                                echo "0";
                            }
                            ?>
                        </span>
                    </button>
                </a>
            </div>
        </div>
        <div class="d-flex">
            <form class="d-flex justify-content-start">
                <a href="../db/logoutconfig.php"><button class="btn btn-outline-success me-2" type="button">Log
                        Out</button></a>
            </form>
        </div>
    </nav>
    <!-- menu end here -->