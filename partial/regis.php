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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style>
    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        background: transparent;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="../"><img src="./images/Shop4U-logo.png" class="img-thumbnail-responsive"
                    width="151" height="94"></img></a>
            <button class="navbar-toggler justify-content-center" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link fs-4" href="../categories.php">Categories</a>
                    <a class="nav-link fs-4" href="../product.php?all">Product</a>
                    <a class="nav-link fs-4" href="../shop.php">Shop</a>

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-4" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item fs-4 nav-link" href="../pickersignup.php">Picker Signup</a>
                            </li>
                        </ul> -->

                    <!--<a class="nav-link dropdown-toggle fs-4" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Picker
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="" href="#">Login for Picker</a></li>
            <li><a class="dropdown-item" href="#">Sign up for Picker</a></li>
          </ul>
        </li> -->
                </div>
            </div>
                <div class="container-fluid">
                <form class="d-flex justify-content-end">
                    <a href="../signup.php?shopper"><button class="btn btn-lg btn-outline-secondary" type="button">Sign
                            Up</button></a>
                    <a class="navbar-brand" href="#"></a>
                    <a href="../login.php"><button class="btn btn-lg btn-outline-success me-2"
                            type="button">Login</button></a>
                </form>
            </div>
        </div>
    </nav>