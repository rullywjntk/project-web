<?php
require_once("../koneksi.php");
session_start();

$nameError = $emailError = $passwordError = $phoneError = '';
$name = $email = $password = $phoneNumber = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["name"]))) {
    $nameError = "Please enter your name";
  } elseif (!preg_match('/^[a-zA-Z]+$/', trim($_POST['name']))) {
    $nameError = "Name can only contain letters";
  } else {
    $name = trim($_POST['name']);
  }

  if (empty(trim($_POST['email']))) {
    $emailError = "Please enter your email";
  } else {
    $sql = "SELECT id FROM user WHERE email = ?";
    if ($stmt = mysqli_prepare($connect, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $params_email);

      $params_email = trim($_POST['email']);

      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          $emailError = "This email is already registered";
        } else {
          $email = trim($_POST['email']);
        }
      } else {
        echo "Something wrong please try again later";
      }

      mysqli_stmt_close($stmt);
    }
  }

  if (empty(trim($_POST['password']))) {
    $passwordError = "Please enter a password";
  } elseif (strlen(trim($_POST['password'])) < 6) {
    $passwordError = "Password must at least 6 characters";
  } else {
    $password = trim($_POST['password']);
  }

  if (empty(trim($_POST['phoneNumber']))) {
    $phoneError = "Please enter your phone number";
  } else {
    $phoneNumber = trim($_POST['phoneNumber']);
  }

  if (empty($nameError) && empty($emailError) && empty($passwordError) && empty($phoneError)) {
    $sql = "INSERT INTO user (name, email, password, phone_number) VALUES (?,?,?,?)";
    if ($stmt = mysqli_prepare($connect, $sql)) {
      mysqli_stmt_bind_param($stmt, "ssss", $params_name, $params_email, $params_password, $params_phone);

      $params_name = $name;
      $params_email = $email;
      $params_password = password_hash($password, PASSWORD_DEFAULT);
      $params_phone = $phoneNumber;

      if (mysqli_stmt_execute($stmt)) {
        header("location: login.php");
      } else {
        echo "Something went wrong. Please try again later";
      }

      mysqli_stmt_close($stmt);
    }
  }

  mysqli_close($connect);
}

?>

<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>

<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/all.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->


<body style="height: 100%;">

  <!-- Navbar -->


  <!-- End Navbar -->

  <!-- Content -->

  <section style="height: 100%;">
    <div class="img-wrapper"></div>

    <div class="container">
      <div class="row ms-5">
        <div class="offset-sm-6 col-sm-6">
          <nav class="navbar navbar-light">
            <img class="mw-25 mh-25 mt-3" src="../assets/img/logo.svg" style="height: 50px; width: 50px;" alt="" srcset="">
            <a class="navbar-brand me-auto fw-bold mt-3" href="index.php" style="font-family: 'Montserrat', sans-serif;">Dolen Suroboyo</a>
          </nav>

          <div class="mt-5">

            <p class="fs-3 fw-bold mt-5" style="font-family: 'Montserrat', sans-serif;">Sign Up</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="text-center mt-5" name="register">
              <div class="row mt-5">
                <div class="col">
                  <input type="text" name="name" class="form-control <?php echo (!empty($nameError)) ? 'is-invalid' : ''; ?>" placeholder="Nama Lengkap *" aria-label="First name" value="<?php echo $name; ?>">
                  <span class="invalid-feedback"><?php echo $nameError; ?></span>
                </div>
              </div>
              <div class="col mt-3">
                <input type="email" name="email" class="form-control <?php echo (!empty($emailError)) ? 'is-invalid' : ''; ?>" placeholder="Email *" aria-label="Email Address" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $emailError; ?></span>
              </div>
              <div class="col mt-3">
                <input type="password" name="password" class="form-control <?php echo (!empty($passwordError)) ? 'is-invalid' : ''; ?>" placeholder="Password*" aria-label="Password" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $passwordError; ?></span>
              </div>
              <div class="col mt-3">
                <input type="number" name="phoneNumber" class="form-control <?php echo (!empty($phoneError)) ? 'is-invalid' : ''; ?>" placeholder="No. Handphone *" aria-label="phoneNumber" value="<?php echo $phoneNumber; ?>">
                <span class="invalid-feedback"><?php echo $phoneError; ?></span>
              </div>

              <div class="col mt-5">
                <button class="btn btn-primary w-100" name="register" type="submit" value="register">Register</button>
              </div>

            </form>

          </div>

        </div>

      </div>

    </div>

  </section>

  <!-- <div class="container ms-5">
    <div class="row">
      <nav class="navbar position-absolute navbar-light">
        <img class="mw-25 mh-25 mt-3" src="assets/img/logo.svg" style="height: 50px; width: 50px;" alt="" srcset="">
        <a class="navbar-brand me-auto fw-bold mt-3" href="index.php" style="font-family: 'Montserrat', sans-serif;">Dolen Suroboyo</a>
      </nav>
      <div class="position-relative">
        <div class="container col-6 mt-5 position-absolute start-0 middle-100 translate-middle ">
          <p class="fs-3 fw-bold mt-5 " style="font-family: 'Montserrat', sans-serif;">Sign Up</p>

          <form action="" method="POST" class="text-center">
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="First name*" aria-label="First name">
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Last name*" aria-label="Last name">
              </div>
            </div>
            <div class="col mt-3">
              <input type="text" class="form-control" placeholder="Email Address*" aria-label="Email Address">
            </div>
            <div class="col mt-3">
              <input type="text" class="form-control" placeholder="Password*" aria-label="Password">
            </div>
            <div class="col mt-3">
              <input type="text" class="form-control" placeholder="Confirm Password*" aria-label="Confirm Password">
            </div>

            <div class="col mt-5">
              <button class="btn btn-primary w-100" type="submit" value="register">Register</button>
            </div>

          </form>
        </div>

        <div class="col-6 bg-light position-relative start-50">
          <img src="assets/img/register.png" alt="" style="width: 1300px; height:900px">
        </div>
      </div>

    </div>

  </div> -->

  <!-- <div class="" style="align-items: center; padding-top: 40px; padding-bottom: 40px; width: 100%; max-width: 450px; height: 100%; display: inline-block;">
    <div class="border p-3 rounded-slide-search">
      <p class="fs-3 fw-bold  mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">Sign Up</p>
      <hr>
      <form action="" method="post" style="width: 100%; ">

        <div class="form-floating">
          <input type="text" name="name" data-validate="Name is Required" id="name" class="form-control" style="max-width: 450px; width: 100%; padding: 15px; margin-bottom: -1px;border-bottom-left-radius: 0;border-bottom-right-radius: 0;" placeholder="Name">
          <label for="name">Name</label>
          <span class="focus-input100"></span>
        </div>
        <div class="form-floating">
          <input type="email" name="email" id="email" class="form-control" style="max-width: 450px; width: 100%; padding: 15px; margin-top: -1px; border-top-left-radius: 0; border-top-right-radius: 0;" placeholder="Email Address">
          <label for="email">Email Address</label>
          <span class="focus-input100"></span>
        </div>
        <div class="form-floating">
          <input type="password" name="password" id="password" class="form-control" style="max-width: 450px; width: 100%; padding: 15px; margin-top: -1px; border-top-left-radius: 0; border-top-right-radius: 0;" placeholder="Password">
          <label for="password">Password</label>
          <span class="focus-input100"></span>
        </div>
        <div class="form-floating">
          <input type="number" name="phoneNumber" id="no_hp" class="form-control" style="max-width: 450px; width: 100%; padding: 15px; margin-top: -1px; border-top-left-radius: 0; border-top-right-radius: 0;" placeholder="Phone Number">
          <label for="no_hp">Phone Number</label>
          <span class="focus-input100"></span>
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-5 mb-3" type="submit" name="register" onclick="validate()">Sign Up</button>

      </form>
    </div>
  </div> -->


  <!-- <div class="container-fluid pt-4 mt-5" style="background-color: #F4EFF4;" id="category">
        <div class="container mb-5 pb-5">
        
				<form class="login100-form validate-form" method="post" action="proses_daftar_user.php">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" id="username" placeholder="Masukan username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Masukan password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Nama</span>
						<input class="input100" type="text" name="nama" id="nama" placeholder="Masukan Nama">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Alamat</span>
						<input class="input100" type="text" name="alamat" id="alamat" placeholder="Masukan Alamat">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" id="email" placeholder="Masukan email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Nomor HP</span>
						<input class="input100" type="number" name="no_hp" id="no_hp" placeholder="Masukan Nomor HP">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button id="confirm" type="submit" name="submit">Hello</button>
					</div>
					
				</form>
				<button class="login100-form-btn" onclick="validate();" style="margin-left: 10px; margin-top: 10px">
					Register
				</button>
				<a href="home.php" style="margin-right: 110px; margin-top: 10px" class="txt1">
						<h2>Back to Home<h2>
						</a>
				</div>  
						
				</div>  

          </div>
      </div> -->

  <!-- End Content -->

  <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn"><i class="fas fa-chevron-up"></i></button>

  <!-- Footer -->


  <!-- End Footer -->
</body>

<script>
  document.getElementById("confirm").style.visibility = "hidden";

  function validate() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var nama = document.getElementById("nama").value;
    var alamat = document.getElementById("alamat").value;
    var email = document.getElementById("email").value;
    var no_hp = document.getElementById("no_hp").value;
    if (username == null || username == "") {
      alert("input username masih kosong");
      return false;
    } else if (password == null || password == "") {
      alert("input password masih kosong");
      return false;
    } else if (nama == null || nama == "") {
      alert("input nama masih kosong");
      return false;
    } else if (alamat == null || alamat == "") {
      alert("input alamat masih kosong");
      return false;
    } else if (email == null || email == "") {
      alert("input email masih kosong");
      return false;
    } else if (no_hp == null || no_hp == "") {
      alert("input nomor hp masih kosong");
      return false;
    } else {
      var klik = document.getElementById('confirm');
      klik.click();
    }

  }
</script>
<script src="assets/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>