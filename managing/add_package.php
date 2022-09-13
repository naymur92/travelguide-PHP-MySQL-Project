<?php include "../includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status'])) {
  if ($_SESSION['user_type'] == 3) header("Location:../user_dashboard.php");
} else {
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
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
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
                <li class="breadcrumb-item"><a href="packages.php">Packages</a></li>
                <li class="breadcrumb-item active">Add Package</li>
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
            <div class="col-10">
              <!-- /.card -->
              <div class="card card-maroon">
                <div class="card-header text-center">
                  <h2>Add Package</h2>
                </div>
                <div class="card-body">
                  <?php
                  $errors = array();
                  if (isset($_POST['submit'])) {
                    extract($_POST);

                    if (strlen($_FILES['p_thumb']['name']) == 0) $filename = $row['profile_picture'];
                    else $filename = $_FILES['p_thumb']['name'];

                    // Check file type
                    $ext = explode(".", "$filename");
                    $ext = strtolower(end($ext));
                    $types = array("jpg", "jpeg", "png", "gif");
                    if (!in_array($ext, $types)) {
                      $errors['type'] = "<p class='text-danger'>File must be an image file!</p>";
                    }
                    // Check file size
                    $filesize = $_FILES['p_thumb']['size'];
                    if ($filesize > 500 * 1024) {
                      $errors['size'] = "<p class='text-danger'>File size must be below 500KB!</p>";
                    }

                    $tmpname = $_FILES['p_thumb']['tmp_name'];
                  }
                  ?>
                  <form action="" method="post" enctype="multipart/form-data">
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Primary Information</legend>
                      <div class="row mb-3">
                        <div class="col-12 mb-3">
                          <label>Package Name</label>
                          <input type="text" name="p_name" class="form-control" placeholder="Package Name" value="<?php if (count($errors) > 0) echo $p_name; ?>">
                        </div>
                        <div class="col-6 mb-3">
                          <label>Package Title</label>
                          <input type="text" name="p_title" class="form-control" placeholder="Package Title" value="<?php if (count($errors) > 0) echo $p_title; ?>">
                        </div>
                        <div class="col-6 mb-3">
                          <label>Package Category</label>
                          <select name="p_category" class="form-control">
                            <option value="" selected hidden>Select One</option>
                            <?php
                            $result = $dbcon->query("SELECT * FROM package_category");
                            while ($row = $result->fetch_assoc()) {
                            ?>
                              <option value="<?= $row['category_id'] ?>"><?= $row['category_id'] . " - " . $row['category_name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-12 mb-3">
                          <label>Package Description</label>
                          <textarea name="p_description" id="" class="form-control textarea" rows="10"></textarea>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Package Thumbnail</legend>
                      <div class="form-group">
                        <label for="inputThumb"></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="p_thumb" class="custom-file-input" id="inputThumb" onchange="readURL(this);">
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
                      <img src="<?= base_url . "img/packages/" . $row['p_thumb)'] ?>" alt="selected image will show here" height="200px" id="showSelectedPhoto">
                    </fieldset>
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Package Duration</legend>
                      <div class="row mb-3">
                        <div class="col-6">
                          <label>Package Duration (Days)</label>
                          <input type="text" name="p_dur_days" class="form-control mb-3" placeholder="Package Duration (Days)" value="<?php if (count($errors) > 0) echo $p_dur_days; ?>">
                        </div>
                        <div class="col-6">
                          <label>Package Duration (Nights)</label>
                          <input type="text" name="p_dur_nights" class="form-control mb-3" placeholder="Package Duration (Days)" value="<?php if (count($errors) > 0) echo $p_dur_nights; ?>">
                        </div>
                      </div>
                    </fieldset>
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Other Info</legend>
                      <div class="row mb-3">
                        <div class="col-6">
                          <label for="">Package Price (Starts From)</label>
                          <input type="text" name="p_price" class="form-control" placeholder="Package Price">
                        </div>
                        <div class="col-6 px-3">
                          <label>Package Status</label>
                          <!-- <div class="clearfix"></div> -->
                          <div class="row rounded" style="border: 1px solid #ddd; padding: 3px;">
                            <div class="col-6">
                              <label for="p_status_av">Available</label>
                              <input type="radio" name="p_status" value="Available" id="p_status_av">
                            </div>
                            <div class="col-6">
                              <label for="p_status_cl">Closed</label>
                              <input type="radio" name="p_status" value="Closed" id="p_status_cl">
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <div class="row justify-content-end">
                      <button type="submit" name="submit" class="btn btn-primary py-2 px-4">Add Package</button><br>
                    </div>
                  </form>
                  <button class="btn btn-outline-warning px-4 py-2" onclick="location.href='packages.php'">Show All Packages</button>
                  <!-- <a href="users.php"><button class="btn btn-outline-warning px-4 py-2">Back</button></a> -->
                </div>
                <!-- /.form-box -->
                <?php
                if (isset($_POST['submit']) && count($errors) == 0) {
                  $fullname = trim($firstname) . " " . trim($lastname);

                  // File uploading process
                  $dest = "../img/packages/";
                  $newfilename = $username . "." . $ext;
                  if (strlen($_FILES['p_thumb']['name']) != 0) {
                    if (is_uploaded_file($tmpname)) {
                      if (move_uploaded_file($tmpname, $dest . $newfilename)) $upload = "ok";
                    }
                  }
                  try {

                    $dbcon->autocommit(false);  // Set autocommit off
                    $dbcon->begin_transaction();

                    $sql = "INSERT INTO packages VALUES()";
                    $dbcon->query($sql);

                    // Commit the changes
                    $dbcon->commit();
                    // if (isset($upload) && $username != $row['username']) unlink("$dest{$row['profile_picture']}");
                    // if (!isset($upload) && $username != $row['username']) rename("$dest{$row['p_thumb']}", "$dest$newfilename");
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
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <script>
    $(function() {
      // Summernote
      $('.textarea').summernote()
    })
  </script>

</body>

</html>