<!doctype html>
<html lang="en">
  <head>
    <title>TravelGuideBD-Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .login-box{
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
                          <input type="email" name="email" class="form-control" placeholder="Email">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fa fas fa-envelope"></span>
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
                        if($_POST){
                          extract($_POST);
                          $passHashed = md5("$password");
                
                          $result = $dbcon->query("SELECT * FROM users WHERE email='$email' AND password='$passHashed'");
                          $row = $result->fetch_assoc();
                          if($result->num_rows != 1){
                            echo "<h4 class='text-danger'>Login Failed!</h4>";
                          } else{
                            $_SESSION['user_email'] = $row['email'];
                            $_SESSION['user_name'] = $row['name'];
                            header("Location:dashboard.php");
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