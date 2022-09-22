<?php include "../includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status']) && isset($_GET['id'])) {
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

  <title>Edit Package - TravelGuideBD</title>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>

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
  <style>
    div.gallery{
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
  </style>
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
                <li class="breadcrumb-item active">Edit Package</li>
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
                  <h2>Edit Package</h2>
                </div>
                <div class="card-body">
                  <?php
                  $id = $_GET['id'];
                  $result = $dbcon->query("SELECT * FROM packages WHERE p_id=$id");
                  $row = $result->fetch_assoc();
                  // print_r($row);

                  $errors = array();
                  if (isset($_POST['submit'])) {
                    extract($_POST);
                    
                    if (strlen($_FILES['p_thumb']['name'][0]) != 0) {
                      $total = count($_FILES['p_thumb']['name']); // Count all selected files
                      for($i = 0 ; $i < $total ; $i ++){
                        $filename[$i] = $_FILES['p_thumb']['name'][$i];
                        // Check file type
                        $ext[$i] = explode(".", "$filename[$i]");
                        $ext[$i] = strtolower(end($ext[$i]));
                        $types = array("jpg", "jpeg", "png", "gif");
                        if (!in_array($ext[$i], $types)) {
                          $errors['type'][] = "<p class='text-danger'>\"{$filename[$i]}\" is not an image file!</p>";
                        }
                        // Check file size
                        $filesize[$i] = $_FILES['p_thumb']['size'][$i];
                        if ($filesize[$i] > 500 * 1024) {
                          $errors['size'][] = "<p class='text-danger'>\"{$filename[$i]}\" filesize is up to 500KB!</p>";
                        }
  
                        $tmpname[$i] = $_FILES['p_thumb']['tmp_name'][$i];
                      }
                    }

                    
                  }
                  ?>
                  <form action="" method="post" enctype="multipart/form-data">
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Primary Information</legend>
                      <div class="row mb-3">
                        <div class="col-12 mb-3">
                          <label>Package Name</label>
                          <input type="text" name="p_name" class="form-control" placeholder="Package Name" value="<?php if (count($errors) > 0) echo $p_name; else echo $row['p_name'] ?>">
                        </div>
                        <div class="col-6 mb-3">
                          <label>Package Title</label>
                          <input type="text" name="p_title" class="form-control" placeholder="Package Title" value="<?php if (count($errors) > 0) echo $p_title; else echo $row['p_title'] ?>">
                        </div>
                        <div class="col-6 mb-3">
                          <label>Package Category</label>
                          <select name="p_category" class="form-control">
                            <?php
                            $result1 = $dbcon->query("SELECT * FROM package_category");
                            while ($row1 = $result1->fetch_assoc()) {
                            ?>
                              <option value="<?= $row1['category_id'] ?>" <?= $row1['category_id'] == $row['p_category']? "selected" : "" ?>><?= $row1['category_id'] . " - " . $row1['category_name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-12 mb-3">
                          <label>Package Short Description</label>
                          <textarea name="p_short_des" id="p_short_des" class="form-control textarea" rows="10"><?= $row['p_short_des'] ?></textarea>
                        </div>
                        <div class="col-12 mb-3">
                          <label>Package Description</label>
                          <textarea name="p_description" id="p_description" class="form-control textarea" rows="10"><?= $row['p_description'] ?></textarea>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Package Thumbnail</legend>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="p_thumb[]" class="custom-file-input" id="gallery-photo-add" accept="image/jpeg, image/png, image/jpg, image/gif" multiple>
                            <label class="custom-file-label" for="gallery-photo-add">Select Picture</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                      <?php if(isset($errors['size']) && count($errors['size'])>0) {foreach($errors['size'] as $err) echo $err;} else echo ""; ?><br>
                      <?php if(isset($errors['type']) && count($errors['type'])>0) {foreach($errors['type'] as $err) echo $err;} else echo ""; ?>

                      <!-- Selected photo will show here -->
                      <div class="gallery">
                        <?php
                          if (strlen($row['p_thumb']) > 0) {
                            $images = explode("|", $row['p_thumb']);
                            foreach ($images as $image) {
                              echo "<img src='" . base_url . "img/packages/$image' width='200px' class='prev-photo'>";
                            }
                          } else echo "No Image!!";
                        ?>
                      </div>
                    </fieldset>
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Package Duration</legend>
                      <div class="row mb-3">
                        <div class="col-6">
                          <label>Package Duration (Days)</label>
                          <input type="text" name="p_dur_days" class="form-control mb-3" placeholder="Package Duration (Days)" value="<?php if (count($errors) > 0) echo $p_dur_days; else echo $row['p_dur_days'] ?>">
                        </div>
                        <div class="col-6">
                          <label>Package Duration (Nights)</label>
                          <input type="text" name="p_dur_nights" class="form-control mb-3" placeholder="Package Duration (Days)" value="<?php if (count($errors) > 0) echo $p_dur_nights; else echo $row['p_dur_nights'] ?>">
                        </div>
                      </div>
                    </fieldset>
                    <fieldset class="rounded mb-3" style="border: 1px solid #007bff; padding: 10px">
                      <legend style="width: fit-content;">Other Info</legend>
                      <div class="row mb-3">
                        <div class="col-6">
                          <label for="">Package Price (Starts From)</label>
                          <input type="text" name="p_price" class="form-control" placeholder="Package Price" value="<?php if (count($errors) > 0) echo $p_price; else echo $row['p_price'] ?>">
                        </div>
                        <div class="col-6">
                          <label>Package Status</label>
                          <!-- <div class="clearfix"></div> -->
                          <div class="row rounded px-3" style="border: 1px solid #ddd; padding: 6px;">
                            <div class="col-6">
                              <label for="p_status_av" class="mb-0">Available</label>
                              <input type="radio" name="p_status" value="Available" id="p_status_av" style="font-size: 1.15rem; margin-left: 10px;" <?= $row['p_status'] == "Available" ? "checked" : "" ?>>
                            </div>
                            <div class="col-6">
                              <label for="p_status_cl" class="mb-0">Closed</label>
                              <input type="radio" name="p_status" value="Closed" id="p_status_cl" style="font-size: 1.15rem; margin-left: 10px;" <?= $row['p_status'] == "Closed" ? "checked" : "" ?>>
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <div class="row justify-content-end">
                      <button type="submit" name="submit" class="btn btn-primary py-2 px-4">Update Package</button><br>
                    </div>
                  </form>
                  <button class="btn btn-outline-warning px-4 py-2" onclick="location.href='packages.php'">Show All Packages</button>
                  <!-- <a href="users.php"><button class="btn btn-outline-warning px-4 py-2">Back</button></a> -->
                </div>
                <!-- /.form-box -->
                <?php
                if (isset($_POST['submit']) && count($errors) == 0) {
                  $p_name = htmlentities($p_name, ENT_QUOTES);
                  $p_title = htmlentities($p_title, ENT_QUOTES);
                  $p_short_des = htmlentities($p_short_des, ENT_QUOTES);
                  $p_description = htmlentities($p_description, ENT_QUOTES);

                  // File uploading process
                  $dest = "../img/packages/";                  
                  $fileNames = array();
                  $upload = 0;
                  if (strlen($_FILES['p_thumb']['name'][0]) != 0) {
                    for($i = 0 ; $i < $total ; $i ++) {
                      $fileNames[$i] = $id . "($i)." . $ext[$i];
                      if (is_uploaded_file($tmpname[$i])) {
                        if (move_uploaded_file($tmpname[$i], $dest . $fileNames[$i])) $upload ++;
                      }
                    }
                    $newfilename = implode("|", $fileNames);  // merging file names as string
                  } else $newfilename = $row['p_thumb'];
                  
                  $sql = "UPDATE packages SET p_name='$p_name', p_title='$p_title', p_category='$p_category', p_short_des='$p_short_des', p_description='$p_description', p_thumb='$newfilename', p_dur_days='$p_dur_days', p_dur_nights='$p_dur_nights', p_price='$p_price', p_status='$p_status' WHERE p_id=$id";
                  // echo "<div>$sql</div>";
                  $dbcon->query($sql);
                  
                  if($dbcon->affected_rows == 1){
                    // checking old and new images and remove unnecessary image
                    if(count($images) > count($fileNames)){
                      foreach($images as $image){
                        if(in_array($image, $fileNames)) continue;
                        unlink("$dest$image");
                      }
                    }
                    echo '<script>alert("Successfully Updated."); location.href="packages.php";</script>';
                  } else{
                    echo '<script>alert("Data unchanged."); location.href="packages.php";</script>';
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
 <script>
    $(document).ready(function(){
      $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
  
          if (input.files) {
            var filesAmount = input.files.length;
  
            for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();
  
              reader.onload = function(event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).attr('width', '200px').appendTo(placeToInsertImagePreview);
              }
  
              reader.readAsDataURL(input.files[i]);
            }
          }
  
        };
  
        $('#gallery-photo-add').on('change', function() {
          $("img.prev-photo").hide();
          imagesPreview(this, 'div.gallery');
        });
      });
    });
  </script>

  <!-- REQUIRED SCRIPTS -->
  
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
      $('#p_description').summernote({
        tabsize: 2,
        height: 400
      });
      $('#p_short_des').summernote({
        tabsize: 2,
        height: 200
      });
    })
  </script>

</body>

</html>