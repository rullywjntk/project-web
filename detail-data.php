<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("Error");
}

include 'koneksi.php';
$query = mysqli_query($connect, "SELECT * FROM place WHERE id_place='$id'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/all.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<body>

    <!-- Navbar -->

    <div class="container-fluid shadow-sm mb-4">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <img class="mw-25 mh-25 mt-3" src="assets/img/logo.svg" style="height: 50px; width: 50px;" alt="" srcset="">
                <a class="navbar-brand ms-3 fw-bold mt-3" href="index.php" style="font-family: 'Montserrat', sans-serif;">Dolen Suroboyo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item mt-2">
                            <a class="nav-link text-black mt-3 me-3" href="#">About Us</a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link text-black mt-3 me-3" href="login.php">Login</a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="btn mt-3 text-light" style="background-color: #7F67BE;" href="register.php">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- End Navbar -->

    <!-- Content -->

    <div class="container mb-5">

        <?php
        $result = mysqli_fetch_array($query);

        ?>

        <p class="fs-2 fw-bold pt-3 "><?= $result['name_category'] ?></p>
        <p class="mb-5 ">Not sure where's to go, Here popular destinations for you!</p>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">


            <?php

            $dataPlaces = mysqli_query($connect, "SELECT * FROM place WHERE id_place=$id");
            while ($result = mysqli_fetch_array($dataPlaces)) {

            ?>

                <div class="col">
                    <div class="card shadow-sm ">
                        <img src="<?= $result['place_image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-truncate"><?= $result['name_place'] ?></h5>
                            <p class="text-secondary text-truncate" style="font-size: 12px;"><?= $result['location_place'] ?></p>
                            <p class="card-text"><?= $result['desc_place'] ?></p>
                            <a href="<?= $result['map'] ?>" class="btn text-light" style="background-color: #7F67BE;">Show Map</a>
                        </div>
                    </div>

                </div>

            <?php } ?>

        </div>
    </div>

    </div>

    <!-- End Content -->

    <!-- Scroll Button -->

    <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn"><i class="fas fa-chevron-up"></i></button>


    <!-- End Scroll Button -->

    <!-- Footer -->

    <div class="container-fluid p-5 " style="background-color: #F4EFF4;">
        <p class="text-center">Made with <i class="far fa-kiss-wink-heart bg-warning text-danger fa-lg" style="border-radius: 50%;"></i> by dulur Suroboyo.</p>
    </div>

    <!-- End Footer -->
</body>

<script src="assets/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>