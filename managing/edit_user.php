<?php include "../includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status']) && isset($_GET['id'])) {
  $res = $dbcon->query("SELECT status FROM users WHERE id={$_GET['id']}");
  $output = $res->fetch_array();
  if($output[0] == "Disabled") header("Location:users.php");  // Deny edit disabled users

  if ($_SESSION['user_type'] == 3) header("Location:../user_dashboard.php");
} else if (!isset($_GET['id'])) header("Location:users.php");
else {
  header("Location:../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $_SESSION['user_type'] == 1 ? "Admin" : "Manager" ?> Panel - TravelGuideBD</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include("includes/topbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("includes/left_sidebar.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!-- <h1 class="m-0 text-dark">User Edit</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                <li class="breadcrumb-item active">User Edit</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-6">
              <!-- /.card -->
              <div class="card card-maroon">
                <div class="card-header text-center"><h2>User Edit</h2></div>
                <div class="card-body">
                  <?php                  
                  $id = $_GET['id'];  // ID for edit user
                  $sql = "SELECT * FROM view_user_edit WHERE id=$id";
                  $data = $dbcon->query($sql);
                  $row = $data->fetch_assoc();
                  
                  $errors = array();
                  if (isset($_POST['submit'])) {
                    extract($_POST);
                    // Check duplicate email
                    $result = $dbcon->query("SELECT email FROM user_info WHERE email='$email' AND user_id!=$id");
                    if ($result->num_rows == 1) {
                      $errors['dupemail'] = "<p class='text-danger'>Email already used!</p>";
                    }
                    // Check duplicate phone
                    $result = $dbcon->query("SELECT phone FROM user_info WHERE phone='$phone' AND user_id!=$id");
                    if ($result->num_rows == 1) {
                      $errors['dupphone'] = "<p class='text-danger'>Phone number already used!</p>";
                    }
                    // Check duplicate username
                    $result = $dbcon->query("SELECT username FROM users WHERE username='$username' AND id!=$id");
                    if ($result->num_rows == 1) {
                      $errors['dupusername'] = "<p class='text-danger'>Username already used!</p>";
                    }

                    if (strlen($_FILES['pthumb']['name']) == 0) $filename = $row['profile_picture'];
                    else $filename = $_FILES['pthumb']['name'];

                    // Check file type
                    $ext = explode(".", "$filename");
                    $ext = strtolower(end($ext));
                    $types = array("jpg", "jpeg", "png", "gif");
                    if (!in_array($ext, $types)) {
                      $errors['type'] = "<p class='text-danger'>File must be an image file!</p>";
                    }
                    // Check file size
                    $filesize = $_FILES['pthumb']['size'];
                    if ($filesize > 500 * 1024) {
                      $errors['size'] = "<p class='text-danger'>File size must be below 500KB!</p>";
                    }

                    $tmpname = $_FILES['pthumb']['tmp_name'];
                  }
                  ?>
                  <form action="" method="post" enctype="multipart/form-data">
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Name</legend>
                      <div class="row mb-3">
                        <div class="col-6">
                          <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php if (count($errors) > 0) echo $firstname; else echo $row['first_name']; ?>" required>
                        </div>
                        <div class="col-6">
                          <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php if (count($errors) > 0) echo $lastname; else echo $row['last_name']; ?>">
                        </div>
                      </div>
                    </fieldset>
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Contact Information</legend>
                      <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (count($errors) > 0) echo $email;  else echo $row['email']; ?>" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fa fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <?= isset($errors['dupemail']) ? $errors['dupemail'] : "" ?>
                      <div class="row">
                        <div class="col-6">
                          <div class="input-group mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php if (count($errors) > 0) echo $phone; else echo $row['phone']; ?>">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fa fas fa-phone"></span>
                              </div>
                            </div>
                          </div>
                          <?= isset($errors['dupphone']) ? $errors['dupphone'] : "" ?>
                        </div>
                        <div class="col-6">
                          <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control" placeholder="User Name" value="<?php if (count($errors) > 0) echo $username; else echo $row['username']; ?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fa fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <?= isset($errors['dupusername']) ? $errors['dupusername'] : "" ?>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Address</legend>
                      <div class="row mb-3">
                        <div class="col-6">
                          <input type="text" name="country" class="form-control mb-3" placeholder="Country" value="<?php if (count($errors) > 0) echo $country; else echo $row['country']; ?>">
                          <input type="text" name="postcode" class="form-control mb-3" placeholder="Postal Code" value="<?php if (count($errors) > 0) echo $postcode; else echo $row['post_code']; ?>">
                        </div>
                        <div class="col-6">
                          <textarea name="address" class="form-control" placeholder="Enter Address" rows="5"><?php if (count($errors) > 0) echo $address; else echo $row['address']; ?></textarea>
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
                      <?= isset($errors['size']) ? $errors['size'] : "" ?><br>
                      <?= isset($errors['type']) ? $errors['type'] : "" ?>

                      <!-- Selected photo will show here -->
                      <img src="<?= base_url."img/profile_pictures/".$row['profile_picture'] ?>" alt="selected image will show here" height="200px" id="showSelectedPhoto">
                    </fieldset>
                    <div class="row justify-content-end">
                      <button type="submit" name="submit" class="btn btn-primary py-2 px-4">Update</button><br>
                    </div>
                  </form>
                  <button class="btn btn-outline-warning px-4 py-2" onclick="location.href='users.php'">Back</button>
                  <!-- <a href="users.php"><button class="btn btn-outline-warning px-4 py-2">Back</button></a> -->
                </div>
                <!-- /.form-box -->
                <?php
                if (isset($_POST['submit']) && count($errors) == 0) {
                  $fullname = trim($firstname) . " " . trim($lastname);

                  // File uploading process
                  $dest = "../img/profile_pictures/";
                  $newfilename = $username . "." . $ext;
                  if (strlen($_FILES['pthumb']['name']) != 0){
                    if (is_uploaded_file($tmpname)) {
                      if (move_uploaded_file($tmpname, $dest . $newfilename)) $upload = "ok";
                    }
                  }
                  try {

                    $dbcon->autocommit(false);  // Set autocommit off
                    $dbcon->begin_transaction();

                    // First transaction
                    $sql = "UPDATE users SET username='$username' WHERE id=$id";
                    $dbcon->query($sql);

                    // Second transactions
                    $sql = "UPDATE user_info SET first_name='$firstname', last_name='$lastname', email='$email', phone='$phone', country='$country', post_code='$postcode', address='$address', profile_picture='$newfilename' WHERE user_id=$id";
                    $dbcon->query($sql);

                    // Commit the changes
                    $dbcon->commit();
                    if(isset($upload) && $username != $row['username']) unlink("$dest{$row['profile_picture']}");
                    if(!isset($upload) && $username != $row['username']) rename("$dest{$row['profile_picture']}", "$dest$newfilename");
                    echo '<script>alert("Successfully Updated."); location.href="users.php";</script>';
                  } catch (Throwable $e) {
                    $dbcon->rollback();

                    // delete the uploaded file after rollbacks
                    if (isset($upload)) unlink("$dest$newfilename");
                    // echo $e->getMessage();
                    echo '<script>alert("Problem in Update.")</script>';
                    // throw $e;
                  }
                }
                ?>
              </div><!-- /.card -->
              <!-- /.card -->
            </div>
          </div>
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include("includes/footer.php") ?>
  </div>
  <!-- ./wrapper -->
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

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="dist/js/demo.js"></script>

  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="dist/js/pages/dashboard2.js"></script>

</body>

</html>