<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("Error");
}

include '../koneksi.php';




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolen Suroboyo</title>
</head>

<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/all.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<body>

    <!-- Navbar -->

    <div class="container-fluid shadow-sm mb-4 pb-3">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <img class="mw-25 mh-25 mt-3" src="../assets/img/logo.svg" style="height: 50px; width: 50px;" alt="" srcset="">
                <a class="navbar-brand ms-3 fw-bold mt-3" href="../index.php" style="font-family: 'Montserrat', sans-serif;">Dolen Suroboyo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item mt-2">
                            <a class="nav-link text-black mt-3 me-3" href="#">About Us</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['login'])) { ?>
                            <a class="nav-link text-black mt-4 me-3" href="view/login.php">Login</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="btn mt-3 text-light" style="background-color: #7F67BE;" href="view/register.php">Sign Up</a>
                            </li>
                        <?php  } else { ?>
                            <div class="dropdown mt-4">
                                <button class="btn btn-outline text-black dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle me-2"></i>
                                    <?php echo $_SESSION['name'] ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Saved Location</a></li>
                                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                </ul>
                            </div>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- End Navbar -->

    <!-- Content -->

    <div class="container mb-5">


        <?php

        $dataPlaces = mysqli_query($connect, "SELECT * FROM place WHERE id_place=$id");
        while ($result = mysqli_fetch_array($dataPlaces)) {

        ?>
            <p class="fs-1 fw-bold pt-3" style="font-family: 'Montserrat', sans-serif;"><?= $result['name_place'] ?></p>
            <p class="mb-3 text-decoration-underline text-secondary fw-bold " style="font-family: 'Montserrat', sans-serif;"><?= $result['location_place'] ?></p>


            <div class="row">
                <div class="col-md-7">
                    <div class="">
                        <img src="<?= $result['place_image'] ?>" class="rounded-slide mb-3" alt="..." style="width: 800px;">
                    </div>

                    <div class="list-inline float-end">
                        <li><i class="far fa-share-square fa-lg fs-5">
                                <p class="list-inline-item text-decoration-underline fw-bold" style="font-family: 'Montserrat', sans-serif;">Share</p>
                            </i>
                            <i class="far fa-heart fa-lg fs-5 ms-3">
                                <p class="list-inline-item text-decoration-underline fw-bold" style="font-family: 'Montserrat', sans-serif;">Save</p>
                            </i>
                        </li>
                    </div>

                    <p class="card-text mt-5 fs-5 fw-bold" style="font-family: 'Montserrat', sans-serif;"><?= $result['desc_place'] ?></p>
                    <hr>
                    <p class="card-text mt-3 mb-5 fs-3 fw-bold" style="font-family: 'Montserrat', sans-serif;">Fasilitas</p>
                    <ul class="list-inline">
                        <li>
                            <i class="fas fa-parking fa-2x"></i>
                            <p class="list-inline-item fs-4 ms-3" style="font-family: 'Montserrat', sans-serif;">Parking Area</p>
                        </li>
                        <li>
                            <i class="fas fa-mosque fa-lg"></i>
                            <p class="list-inline-item fs-4 ms-3" style="font-family: 'Montserrat', sans-serif;">Mushola</p>
                        </li>
                    </ul>
                    <hr>
                    <p class="card-text mt-3 mb-3 fs-3 fw-bold" style="font-family: 'Montserrat', sans-serif;">Review</p>

                    <?php
                    $dataReview = mysqli_query($connect, "SELECT * FROM review WHERE id_place=$id");
                    while ($review = mysqli_fetch_array($dataReview)) {
                    ?>
                        <div>
                            <p class="fw-bold fs-5"><?= $review['user_review'] ?></p>
                            <p class="fs-5"><?= $review['review'] ?>.</p>
                        </div>
                    <?php } ?>
                    <hr>
                    <div class="mb-3">
                        <form action="../data_review.php" method="POST">
                            <input type="hidden" name="id" value="<?= $result['id_place'] ?>">
                            <label class="form-label">Tulis Review</label>
                            <textarea class="form-control" name="review" rows="3"></textarea>
                            <?php

                            if (!isset($_SESSION['login'])) { ?>
                                <label class="card-text mt-3 mb-3" style="font-family: 'Montserrat', sans-serif;">Anda harus <a href="login.php" class="text-decoration-none">login</a> terlebih dahulu.</label>
                            <?php } else { ?>
                                <button class="btn text-light mt-3 float-end" name="submit" type="submit" style="background-color: #7F67BE;">Post Review</button>
                            <?php
                            }
                            ?>
                        </form>

                    </div>


                </div>
                <div class="col-md-4 offset-md-1">
                    <div class="p-2 shadow rounded-slide position-relative fixed-top">
                        <div class="card-body sticky-top">
                            <h5 class="card-title mb-3 text-truncate">Information</h5>
                            <p class="text-secondary text-truncate">Waktu Operasional : <?php echo $result['open_place']; ?></p>
                            <p class="text-secondary text-truncate">Parkir Motor : Rp. 3.000,-</p>
                            <p class="text-secondary text-truncate">Parkir Mobil : Rp. 5.000,-</p>
                            <div class="d-grid gap-2">
                                <button href="<?= $result['map'] ?>" class="btn text-light mt-3" style="background-color: #7F67BE;">Show Map</button>
                                <button class="btn text-light" style="background-color: #7F67BE;">Check Availability</button>
                            </div>
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