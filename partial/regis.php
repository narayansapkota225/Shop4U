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


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="../index.php"><img src="./images/Shop4U-logo.png"
                    class="img-thumbnail-responsive" width="151" height="94"></img></a>
            <button class="navbar-toggler justify-content-center" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link fs-4" href="../categories.php">Categories</a>
                    <a class="nav-link fs-4" href="#">Product</a>
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
                    <a href="../signup.php"><button class="btn btn-lg btn-outline-secondary" type="button">Sign
                            Up</button></a>
                    <a class="navbar-brand" href="#"></a>
                    <a href="../login.php"><button class="btn btn-lg btn-outline-success me-2"
                            type="button">Login</button></a>
                </form>
            </div>
        </div>
    </nav>