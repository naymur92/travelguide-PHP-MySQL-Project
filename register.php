<?php

include_once "includes/dbcon.php";

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status'])) {
  switch ($_SESSION['user_type']) {
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
  <title>Register - TravelGuideBD</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .register-box {
      margin-top: 120px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="register-box">
          <div class="register-logo">
            <h2 class="text-center"><b>TravelGuideBD</b> Register</h2>
          </div>

          <div class="card">
            <div class="card-body register-card-body">
              <p class="login-box-msg text-primary mb-5">Register a new membership</p>
              <?php
                $errors = array();
                if(isset($_POST['submit'])){
                  extract($_POST);
                  // Check duplicate email
                  $result = $dbcon->query("SELECT email FROM users WHERE email='$email'");
                  if($result->num_rows==1){
                    $errors['dupemail'] = "<p class='text-danger'>Email already used!</p>";
                  }
                  // Check duplicate phone
                  $result = $dbcon->query("SELECT phone FROM user_info WHERE phone='$phone'");
                  if($result->num_rows==1){
                    $errors['dupphone'] = "<p class='text-danger'>Phone number already used!</p>";
                  }
                  // Check duplicate username
                  $result = $dbcon->query("SELECT username FROM users WHERE username='$username'");
                  if($result->num_rows==1){
                    $errors['dupusername'] = "<p class='text-danger'>Username already used!</p>";
                  }

                  // Check password matching
                  if($password != $confirm_password){
                    $errors['password'] = "<p class='text-danger'>Password didn't match!</p>";
                  } else if(!preg_match_all("/[0-9A-Za-z!@#$%*]{6,12}/", $password)){
                    $errors['password'] = "<p class='text-danger'>Password length must be 6-12!</p>";
                  }

                  $filename = $_FILES['pthumb']['name'];
                  if(strlen($filename) != 0){
                    // Check file type
                    $ext = explode(".", "$filename");
                    $ext = strtolower(end($ext));
                    $types = array("jpg", "jpeg", "png", "gif");
                    if(!in_array($ext, $types)){
                      $errors['type'] = "<p class='text-danger'>File must be an image file!</p>";
                    }
                    // Check file size
                    $filesize = $_FILES['pthumb']['size'];
                    if($filesize>500*1024){
                      $errors['size'] = "<p class='text-danger'>File size must be below 500KB!</p>";
                    }
                  }

                  $tmpname = $_FILES['pthumb']['tmp_name'];
                  // $filename = $_FILES['pthumb']['name'];
                }
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                  <legend style="width: fit-content;">Name</legend>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php if(count($errors)>0) echo $firstname ?>" required>
                    </div>
                    <div class="col-6">
                      <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php if(count($errors)>0) echo $lastname ?>">
                    </div>
                  </div>
                </fieldset>
                <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                  <legend style="width: fit-content;">Contact Information</legend>
                  <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if(count($errors)>0) echo $email ?>" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <?= isset($errors['dupemail'])? $errors['dupemail']: "" ?>
                  <div class="row">
                    <div class="col-6">
                      <div class="input-group mb-3">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php if(count($errors)>0) echo $phone ?>">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fa fas fa-phone"></span>
                          </div>
                        </div>
                      </div>
                      <?= isset($errors['dupphone'])? $errors['dupphone']: "" ?>
                    </div>
                    <div class="col-6">
                      <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="User Name" value="<?php if(count($errors)>0) echo $username ?>" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fa fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <?= isset($errors['dupusername'])? $errors['dupusername']: "" ?>
                    </div>
                  </div>
                </fieldset>
                <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                  <legend style="width: fit-content;">Address</legend>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" name="country" class="form-control mb-3" placeholder="Country" value="<?php if(count($errors)>0) echo $country ?>">
                      <input type="text" name="postcode" class="form-control mb-3" placeholder="Postal Code" value="<?php if(count($errors)>0) echo $postcode ?>">
                    </div>
                    <div class="col-6">
                      <textarea name="address" class="form-control" placeholder="Enter Address" rows="5"><?php if(count($errors)>0) echo $address ?></textarea>
                    </div>
                  </div>
                </fieldset>
                <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                  <legend style="width: fit-content;">Profile Picture</legend>
                  <div class="form-group">
                    <label for="inputThumb"></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="pthumb" class="custom-file-input" id="inputThumb" onchange="readURL(this);">
                        <label class="custom-file-label" for="exampleInputFile">Select Picture</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <?= isset($errors['size'])? $errors['size']: "" ?><br>
                  <?= isset($errors['type'])? $errors['type']: "" ?>

                  <!-- Selected photo will show here -->
                  <img src="" alt="selected image will show here" height="200px" id="showSelectedPhoto">
                </fieldset>
                <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                  <legend style="width: fit-content;">Password</legend>
                  <div class="row mb-3">
                    <div class="col-6">
                      <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php if(count($errors)>0) echo $password ?>" onkeyup="check()" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fa fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group mb-3">
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Retype password" onkeyup="check()" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fa fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <span id='message'></span>
                  <?= isset($errors['password'])? $errors['password']: "" ?>
                </fieldset>
                <div class="row">
                  <div class="col-8">
                    <!-- <div class="icheck-primary">
                      <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                      <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                      </label>
                    </div> -->
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-block mb-1">Register</button><br>
                    <!-- <input type="reset" name="reset" value="Reset" class="btn btn-danger btn-block"> -->
                  </div>
                  <!-- /.col -->
                </div>
              </form>

              <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                  <i class="fa fab fa-facebook mr-2"></i>
                  Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                  <i class="fa fab fa-google-plus mr-2"></i>
                  Sign up using Google+
                </a>
              </div>

              <a href="login.php" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
            <div class="row justify-content-center p-4">
              <a href="index.php"><button class="btn btn-warning px-4 py-2 text-white">Back</button></a>
            </div>
            <?php
              if(isset($_POST['submit']) && count($errors)==0){
                $fullname = trim($firstname)." ".trim($lastname);
                $hashedPass = md5($password);                
                
                // File uploading process
                if(strlen($filename) == 0){
                  $newfilename = null;
                } else{
                  $newfilename = $username.".".$ext;
                  $dest = "img/profile_pictures/";
                  if(is_uploaded_file($tmpname)){
                    if(move_uploaded_file($tmpname, $dest.$newfilename)) $upload = "ok";
                  }
                }
                try {

                  $dbcon->autocommit(false);  // Set autocommit off
                  $dbcon->begin_transaction();
  
                  // First transaction
                  $sql = "INSERT INTO users VALUES(NULL, '$fullname', '$email', '$username', '$hashedPass', DEFAULT, DEFAULT, DEFAULT)";
                  $dbcon->query($sql);

                  // Second transactions
                  $sql = "INSERT INTO user_info VALUES(NULL, '$firstname', '$lastname', '$email', '$phone', '$country', '$postcode', '$address', '$newfilename', LAST_INSERT_ID())";
                  $dbcon->query($sql);

                  // Commit the changes
                  $dbcon->commit();
                  echo '<script>alert("Successfully Registered."); location.href="login.php";</script>';

                } catch (Throwable $e){
                  $dbcon->rollback();

                  // delete the uploaded file after rollbacks
                  if(isset($upload)) unlink("$dest$newfilename");
                  // echo $e->getMessage();
                  echo '<script>alert("Problem in registering.")</script>';
                  // throw $e;
                }                
              }
            ?>
          </div><!-- /.card -->
        </div>
        <!-- /.register-box -->
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->

  <script>
    var check = function() {
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Matched';
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Not matching';
      }
    }
  </script>

  <!-- script for show selected photo -->
  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#showSelectedPhoto').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>