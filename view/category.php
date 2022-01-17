<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("Error");
}

include '../koneksi.php';
$query = mysqli_query($connect, "SELECT * FROM place WHERE id_category='$id'");

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
                                <button class="btn btn-outline text-black dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION['name'] ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Saved Location</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- End Navbar -->

    <?php
    $result = mysqli_fetch_array($query);

    ?>
    <div class="text-center pt-3">

        <div class="container pb-5 mb-5 mt-5 d-none d-lg-block ">
            <div class="rounded-slide-search d-inline-flex start-50 p-2 pe-4 shadow-sm bg-body w-50">
                <form class="d-flex position-relative w-100 m-2">
                    <input class="ps-3 pe-3 rounded-slide-search w-100 search-no-focus" style="border: none;" type="text" onkeyup="getStates(this.value)" id="search" placeholder="Search <?= $result['name_category'] ?>" aria-label="Search">
                    <button class="btn p-3 d-sm-inline-flex start-50" style="background-color: #7F67BE;">
                        <i class="fas fa-search-location text-light fa-lg"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Mobile Search -->

        <div class="container d-lg-none mt-4 mb-3">
            <form class="d-flex position-relative w-100 m-2">
                <input class="ps-3 pe-3 p-3 rounded-slide-search w-100 d-inline-flex search-no-focus" style="border: none; background-color: #F4EFF4;" type="text" name="search" placeholder="Search <?= $result['name_category'] ?>" aria-label="Search" type="text" onkeyup="getStates(this.value)">
                <button class="btn ms-2 me-2 d-sm-inline-flex p-3" type="submit" style="background-color: #7F67BE;">
                    <i class="fas fa-search-location text-light fa-lg"></i>
                </button>
            </form>
        </div>

    </div>

    <!-- Content -->

    <div class="mb-3 container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4" id="tampil">

            <?php

            $maxContent = 8;
            $pages = $_GET['page'];
            if (empty($pages)) {
                $position = 0;
                $pages = 1;
            } else {
                $position = ($pages - 1) * $maxContent;
            }

            $no = $position + 1;
            $sql = mysqli_query($connect, "SELECT * FROM place WHERE id_category=$id limit $position, $maxContent");
            while ($result = mysqli_fetch_array($sql)) {

            ?>
                <div class="col">
                    <div class="p-2 shadow rounded-slide position-relative" style="height: 30rem;">
                        <img src="<?= $result['place_image'] ?>" class="card-img-top p-2 rounded-slide " alt="..." style="border-top-right-radius:20px; border-top-left-radius:20px">
                        <div class="card-body">
                            <a href="detail-data.php?id=<?= $result['id_place'] ?>" class="text-decoration-none text-black mb-3 fs-5 card-title text-truncate pb-2"><?= $result['name_place'] ?></a>
                            <p class="text-secondary text-truncate" style="font-size: 12px;"><?= $result['location_place'] ?></p>
                            <p class="body-text"><?= $result['desc_place'] ?></p>
                            <a href="<?= $result['map'] ?>" class="text-decoration-none text-secondary text-end fa-md bottom-0 position-absolute mb-4 hover-item"><i class="fas fa-map-marker text-primary me-2"></i>Show Map</a>
                            <i class="far fa-heart  position-absolute fa-2x mb-4 me-3 text-secondary bottom-0 end-0"></i>

                        </div>
                    </div>

                </div>
            <?php $no++;
            } ?>


        </div>
    </div>



    <!-- </div> -->

    <?php

    $query2 = mysqli_query($connect, "SELECT * FROM place WHERE id_category=$id");
    $total = mysqli_num_rows($query2);
    $totalPages = ceil($total / $maxContent);
    ?>

    <nav aria-label="Page navigation example mb-5">
        <ul class="pagination justify-content-center mt-5">

            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i != $pages) {
                    echo "<li class='page-item'><a class='page-link' href='category.php?id=$id&page=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
            }
            ?>

        </ul>
    </nav>

    </div>

    </div>

    <!-- End Content -->

    <!-- Scroll Button -->

    <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn"><i class="fas fa-chevron-up"></i></button>


    <!-- End Scroll Button -->

    <!-- Footer -->

    <div class="container-fluid p-5 shadow-sm" style="background-color: #F4EFF4;">
        <p class="text-center">Made with <i class="far fa-kiss-wink-heart bg-warning text-danger fa-lg" style="border-radius: 50%;"></i> by dulur Suroboyo.</p>
    </div>

    <!-- End Footer -->
</body>

<script src="../assets/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<script>
    function getStates(value) {
        $.post("../livesearch.php", {
            search: value
        }, function(data) {
            $("#tampil").html(data);
        });
    }
</script>

</html>