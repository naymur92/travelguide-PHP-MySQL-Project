<?php include "../includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status']) && isset($_GET['id'])) {
  $res = $dbcon->query("SELECT status FROM users WHERE id={$_GET['id']}");
  $output = $res->fetch_array();
  if($output[0] == "Disabled") header("Location:users.php");  // Deny view disabled users

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
              <h1 class="m-0 text-dark">User Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                <li class="breadcrumb-item active">User Details</li>
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
            <div class="col-8">
              <!-- /.card -->
              <div class="card">
                <?php
                $id = $_GET['id'];
                $result = $dbcon->query("SELECT * FROM users_view WHERE id=$id");
                $row = $result->fetch_assoc();
                ?>
                <div class="row justify-content-between p-4">
                  <h2><?php echo $row['Name']; ?></h2>
                  <a href="users.php" class="btn py-2 px-4 btn-outline-info text-bold">Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                    <?php
                    foreach ($row as $header => $value) {
                    ?>
                      <tr>
                        <th style="width: 30%;"><?php echo $header ?></th>
                        <td style="width: 70%;">
                          <?php
                          if ($header == "Picture") {
                            if (strlen($value) > 0)
                              echo "<img src='" . base_url . "/img/profile_pictures/$value' height='200px'>";
                            else echo "No Image!!";
                          } else echo $value;
                          ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                  <div class="float-right my-2">
                    <?php if ($row['Status'] != "Disabled") { ?>
                      <a class="btn py-2 px-4 btn-outline-info text-bold m-1" href="edit_user.php?id=<?= $id ?>"><span class="fa fa-edit"></span> Edit</a>
                    <?php } if ($row['Status'] == "Active" && $_SESSION['user_type'] == 1 && $row['Type'] == "User") { ?>
                      <a class="btn py-2 btn-outline-success text-bold" href="promote_user.php?id=<?= $id ?>"><span class="fa fa-arrow-up"></span> Promote to Manager</a>
                    <?php }
                    if ($row['Status'] == "Pending" || $row['Status'] == "Muted") { ?>
                      <a class="btn py-2 btn-outline-primary text-bold m-1" href="active_user.php?id=<?= $id ?>"><span class="fa fa-check"></span> Active User</a>
                    <?php }
                    if ($row['Status'] != "Disabled" && $row['Status'] != "Muted") { ?>
                      <a class="btn py-2 btn-outline-warning text-bold m-1" href="mute_user.php?id=<?= $id ?>"><span class="fa fa-ban"></span> Mute User</a>
                    <?php }
                    if ($_SESSION['user_type'] == 1 && $row['Status'] != "Disabled") { ?>
                      <a class="btn py-2 btn-outline-danger text-bold m-1" href="disable_user.php?id=<?= $id ?>"><span class="fa fa-user-times"></span> Disable User</a>
                    <?php } ?>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
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