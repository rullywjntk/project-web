<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
  header("Location: index.php");
  exit;
}

require_once("koneksi.php");
$email = $password = "";
$emailError = $passwordError = $loginError = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty(trim($_POST['email']))) {
    $emailError = "Please enter your email.";
  } else {
    $email = trim($_POST['email']);
  }

  if (empty(trim($_POST['password']))) {
    $passwordError = "Please enter your password.";
  } else {
    $password = trim($_POST['password']);
  }

  if (empty($emailError) && empty($passwordError)) {
    $sql = "SELECT id, email, password FROM user WHERE email = ?";

    if ($stmt = mysqli_prepare($connect, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $param_email);
      $param_email = $email;

      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          mysqli_stmt_bind_result($stmt, $id, $email, $hashPassword);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashPassword)) {
              session_start();

              $_SESSION['login'] = true;
              $_SESSION['id'] = $id;
              $_SESSION['email'] = $email;

              header("Location: index.php");
            } else {
              $loginError = "Email atau password salah";
            }
          }
        } else {
          $loginError = "Email atau password salah";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later";
      }
      mysqli_stmt_close($stmt);
    }
  }
  mysqli_close($connect);
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Sign In</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">

    <?php if (!empty($loginError)) {
      echo '<div class="alert alert-danger">' . $loginError . '</div>';
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="login">
      <img class="mb-4 mw-25 mh-25 w-25 h-25" src="assets/img/logo.svg" alt="">
      <h1 class="h3 mb-3 fw-normal">Sign In</h1>


      <div class="form-floating">
        <input type="email" class="form-control  <?php echo (!empty($emailError)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        <span class="invalid-feedback"><?php echo $emailError; ?></span>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control <?php echo (!empty($passwordError)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
        <span class="invalid-feedback"><?php echo $passwordError; ?></span>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" value="login" type="submit">Sign in</button>
      <p class="mt-3">Don't Have Account? Register <a class="text-decoration-none" href="register.php">Here</a></p>

      <p class="mt-5 mb-3 text-muted">&copy; Dolan Suroboyo</p>
    </form>
  </main>



</body>

</html>