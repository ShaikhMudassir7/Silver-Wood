<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <?php require('required/header.php') ?>
</head>

<body>
  <?php
  require("required/config.php");

  // If already logged in goto index.php
  if (isLoggedIn()) {
    header("location:index");
  }
  // Login Button Pressed
  if (isset($_POST['login'])) {
    $email = secure($_POST['email']);
    $password = secure($_POST['password']);
    $password = Encrypt($password);
    // Step 1: Email Verification
    $sql = "SELECT * FROM `admin` WHERE `email`='$email'";
    $result = $mysqli->query($sql);

    if ($row = $result->fetch_assoc()) {
      // Step 2: Password Verification
      if ($row['password'] == $password) {
        $_SESSION[$aid] = $row['email'];
        $_SESSION["name"] = $row['fname'] . " " . $row['lname'];
        if (isset($_POST['remember_me'])) {
          setcookie($aid, $row['email'], time() + 60 * 5);
        }
        $url = isFlashSet("url") ? getFlashDelete("url") : "index";
        header("Location:$url");
        exit();
      } else {
        setFlash("warning", "Incorrect Password");
        header("Location:login");
        exit();
      }
    } else {
      setFlash("warning", "\"$email\" not found.");
      header("Location:login");
      exit();
    }
  }
  ?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="assets/images/silverwood.jpeg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST">
                <?php require('required/alerts.php'); ?>
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary btn-block my-4" name="login">Sign in</button>

                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="forgetPassword" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>