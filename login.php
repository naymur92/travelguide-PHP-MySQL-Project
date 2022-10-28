<?php include_once("includes/dbcon.php") ?>
<?php

  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  if(isset($_SESSION['user_type'])){
    switch($_SESSION['user_type']){
      case 1:
        header("Location:managing/");
        break;
      case 2:
        header("Location:managing/");
        break;
      case 3:
        header("Location:user_dashboard.php");
        break;
    }
  }

?>
<!doctype html>
<html lang="en">

<head>
  <title>Login - TravelGuideBD</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .login-box {
      margin-top: 120px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="login-box">
          <div class="login-logo">
            <h2 class="text-center"><b>TravelGuideBD</b> Login</h2>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <form action="" method="post">
                <div class="input-group mb-3">
                  <input type="text" name="user" class="form-control" placeholder="Email or Username" autofocus>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fa fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fa fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember">
                      <label for="remember">
                        Remember Me
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>

              <?php
              if ($_POST) {
                extract($_POST);
                $passHashed = md5("$password");

                $result = $dbcon->query("SELECT * FROM users WHERE (email='$user' OR username='$user') AND password='$passHashed'");
                $row = $result->fetch_assoc();
                if ($result->num_rows != 1) {
                  echo "<h4 class='bg-warning text-center p-4 my-5 rounded'><i class='fa fa-exclamation-triangle text-danger'></i>
                  Login Failed!</h4>";
                } else {
                  $_SESSION['login_status'] = "logged_in";
                  $_SESSION['user_email'] = $row['email'];
                  $_SESSION['name'] = $row['name'];
                  $_SESSION['user_type'] = $row['user_type'];
                  $_SESSION['user_id'] = $row['id'];
                  sleep(1);
                  switch($_SESSION['user_type']){
                    case 1:
                      header("Location:./managing/");
                      break;
                    case 2:
                      header("Location:./managing/");
                      break;
                    case 3:
                      header("Location:user_dashboard.php");
                      break;
                  }
                }
              }
              ?>

              <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                  <i class="fa fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                  <i class="fa fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
              </div>
              <!-- /.social-auth-links -->

              <p class="mb-1">
                <a href="forgot-password.php">I forgot my password</a>
              </p>
              <p class="mb-0">
                <a href="register.php" class="text-center">Register a new membership</a>
              </p>
            </div>
            <!-- /.login-card-body -->
            <div class="row justify-content-center p-4">
              <a href="index.php"><button class="btn btn-warning px-4 py-2 text-white">Back</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>