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

  <div class="container-fluid mb-4">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <img class="mw-25 mh-25 mt-3" src="assets/img/logo.svg" style="height: 50px; width: 50px;" alt="" srcset="">
        <a class="navbar-brand ms-3 fw-bold mt-3" href="<?= $base_url ?>index.php" style="font-family: 'Montserrat', sans-serif;">Dolen Suroboyo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item mt-2">
              <a class="nav-link text-black mt-3 me-3" href="#category">Category</a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link text-black mt-3 me-3" href="#">About Us</a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link text-black mt-3 me-3" href="login.php">Login</a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link text-black mt-3 me-3" href="logout.php">Logout</a>
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

  <!-- Header -->

  <div class="container mt-3 rounded-slide">
    <div id="carouselExampleCaptions" class="carousel slide position-relative" data-bs-ride="carousel">
      <div class="carousel-inner rounded-slide ">
        <div class="carousel-item rounded-slide active">
          <img src="assets/img/slide_1.jpg" class="d-block w-100 rounded-slide" alt="...">
          <div class="carousel-caption d-none d-md-block top-0 start-50 translate-middle-x">
            <!-- <h5 class="fs-1">Jembatan Suramadu</h5>
              <p>Some representative placeholder content for the first slide.</p> -->
          </div>
        </div>
        <div class="carousel-item rounded-slide">
          <img src="assets/img/slide_2.jpg" class="d-block w-100 rounded-slide" alt="...">
          <div class="carousel-caption d-none d-md-block top-0 start-50 translate-middle-x">
            <!-- <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p> -->
          </div>
        </div>
        <div class="carousel-item rounded-slide">
          <img src="assets/img/slide_3.jpg" class="d-block w-100 rounded-slide" alt="...">
          <div class="carousel-caption d-none d-md-block top-0 start-50 translate-middle-x">
            <!-- <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container d-none d-lg-block">
    <div class="rounded-slide-search d-flex translate-middle position-relative w-50 start-50 top-100 p-2 pe-4 shadow-sm bg-body">
      <form class="d-flex position-relative w-100 m-2">
        <input class="ps-3 pe-3 rounded-slide-search w-100 d-inline-flex search-no-focus" style="border: none;" type="search" placeholder="Search Places" aria-label="Search">
        <button class="btn p-3 d-sm-inline-flex start-50" type="submit" style="background-color: #7F67BE;">
          <i class="fas fa-search-location text-light fa-lg"></i>
        </button>
      </form>
    </div>
  </div>

  <!-- Mobile Search -->

  <div class="container d-lg-none mt-4">
    <form class="d-flex position-relative w-100 m-2">
      <input class="ps-3 pe-3 p-3 rounded-slide-search w-100 d-inline-flex search-no-focus" style="border: none; background-color: #F4EFF4;" type="search" placeholder="Search Places" aria-label="Search">
      <button class="btn ms-2 me-2 d-sm-inline-flex p-3" type="submit" style="background-color: #7F67BE;">
        <i class="fas fa-search-location text-light fa-lg"></i>
      </button>
    </form>
  </div>

  <!-- End Mobile Search -->

  <!-- End Header -->

  <!-- Menu Categeory -->

  <div class="container-fluid pt-4 mt-5 d-none d-lg-block" style="background-color: #F4EFF4;" id="category">
    <div class="container mb-5 pb-5">
      <p class="text-center fs-2 fw-bold pt-3">Categories</p>
      <p class="text-center mb-5 ">All destinations but don't worried, it's already grouped by category</p>
      <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-6 g-3">

        <?php

        include 'koneksi.php';
        $no = 0;
        $query = mysqli_query($connect, "SELECT * FROM place_category ORDER BY id DESC");
        while ($result = mysqli_fetch_array($query)) {
          $no++;
        ?>

          <div class="col">
            <a href="category.php?id=<?= $result['id'] ?>" class="text-decoration-none">
              <div class="card" style="background-color: #F4EFF4; border: none;">
                <img src="assets/img/food-junction.jpg" alt="">
                <p class="card-text fs-4 fw-bold text-center text-black mt-5 font-category"><?= $result['name_category'] ?></p>
                </i>
              </div>
            </a>
          </div>

        <?php } ?>

      </div>
    </div>
  </div>

  <!-- Mobile Category -->

  <div class="container-fluid pt-4 mt-5 d-lg-none" style="background-color: #F4EFF4;" id="category">
    <div class="container mb-5 pb-5">
      <p class="text-center fs-2 fw-bold pt-3">Categories</p>
      <p class="text-center mb-5 ">All destinations but don't worried, it's already grouped by category</p>

      <div class="container horizontal-scrollable">
        <div class="row flex-nowrap flex-sm-wrap justify-content-start">
          <div class="col-xs-4">
            <div class="card min-vw-25" style="background-color: #F4EFF4; border: none;">
              <i class="fas fa-tree fa-5x text-center hover-category" style="color: green;">
                <p class="card-text fs-4 fw-bold text-center text-black mt-3 font-category">Park</p>
              </i>
            </div>
          </div>

          <div class="col-xs-4">
            <div class="card" style="background-color: #F4EFF4; border: none;">
              <i class="fas fa-landmark fa-5x text-center hover-category" style="color:cadetblue;">
                <p class="card-text fs-4 fw-bold text-center text-black mt-3 font-category">Landmark</p>
              </i>
            </div>
          </div>

          <div class="col-xs-4">
            <div class="card" style="background-color: #F4EFF4; border: none;">
              <i class="fas fa-shopping-cart fa-5x text-center hover-category" style="color: green;">
                <p class="card-text fs-4 fw-bold text-center text-black mt-3 font-category">Shopping</p>
              </i>
            </div>
          </div>

          <div class="col-xs-4">
            <div class="card" style="background-color: #F4EFF4; border: none;">
              <i class="fas fa-utensils fa-5x text-center hover-category" style="color:deepskyblue;">
                <p class="card-text fs-4 fw-bold text-center text-black mt-3 font-category">Culinary</p>
              </i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- End Mobile Category -->


  <!-- End Menu Category -->

  <!-- Content -->

  <div class="container mb-5">
    <p class="text-center fs-2 fw-bold pt-3">Popular Destinations</p>
    <p class="text-center mb-5 ">Not sure where's to go, Here popular destinations for you!</p>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

      <div class="col">
        <div class="card shadow-sm">
          <img src="assets/img/tugu-pahlawan.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Tugu Pahlawan</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="#" class="btn text-light" style="background-color: #7F67BE;">Details</a>
          </div>
        </div>

      </div>

      <div class="col">

        <div class="card shadow-sm">
          <img src="assets/img/tp.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Tunjungan Plaza</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="#" class="btn btn-primary" style="background-color: #7F67BE;">Details</a>
          </div>
        </div>

      </div>

      <div class="col">

        <div class="card shadow-sm">
          <img src="assets/img/hotel-majapahit.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Hotel Majapahit</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="#" class="btn btn-primary" style="background-color: #7F67BE;">Details</a>
          </div>
        </div>

      </div>

      <div class="col">

        <div class="card shadow-sm">
          <img src="assets/img/kbs.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title ">Kebun Binatang Surabaya</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="#" class="btn btn-primary" style="background-color: #7F67BE;">Details</a>
          </div>
        </div>

      </div>

    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mt-1">

      <div class="col">

        <div class="card shadow-sm">
          <img src="assets/img/museum-10-nov.JPG" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Museum 10 November</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="#" class="btn btn-primary" style="background-color: #7F67BE;">Details</a>
          </div>
        </div>

      </div>

      <div class="col">

        <div class="card shadow-sm">
          <img src="assets/img/taman-bungkul.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Taman Bungkul</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="#" class="btn btn-primary" style="background-color: #7F67BE;">Details</a>
          </div>
        </div>

      </div>

      <div class="col">

        <div class="card shadow-sm">
          <img src="assets/img/food-junction.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Food Junction</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="#" class="btn btn-primary" style="background-color: #7F67BE;">Details</a>
          </div>
        </div>

      </div>

      <div class="col">

        <div class="card shadow-sm">
          <img src="assets/img/house-of-sampoerna.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">House of Sampoerna</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="#" class="btn btn-primary" style="background-color: #7F67BE;">Details</a>
          </div>
        </div>

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