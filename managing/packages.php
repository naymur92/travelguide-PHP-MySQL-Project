<?php include "../includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status'])) {
  if (($_SESSION['user_type'] == 3)) header("Location:../user_dashboard.php");
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

  <title>All Packages - TravelGuideBD</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
              <h1 class="m-0 text-dark">All Packages</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="packages.php">Packages</a></li>
                <li class="breadcrumb-item active">All Packages</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <colgroup>
                      <col width="5%">
                      <col width="15%">
                      <col width="15%">
                      <col width="25%">
                      <col width="20%">
                      <col width="10%">
                      <col width="10%">
                    </colgroup>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Short Description</th>
                        <th>Thumbnail</th>
                        <th>Stauts</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM packages, package_category WHERE p_category=category_id";
                      $result = $dbcon->query($sql);
                      while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $row['p_id'] ?></td>
                          <td><?php echo html_entity_decode($row['p_name']) ?></td>
                          <td><?php echo $row['category_name'] ?></td>
                          <td><?php echo html_entity_decode($row['p_short_des']) ?></td>
                          <td>
                            <?php
                              $fileNames = explode("|", $row['p_thumb']);
                            ?>
                            <img src="<?= base_url."/img/packages/".$fileNames[0]; ?>" alt="Package Thumb" width="100%">  
                          </td>
                          <td><?php echo $row['p_status'] ?></td>
                          <td align="center">
                            <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              Action
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item view_user" href="view_package.php?id=<?php echo $row['p_id'] ?>"><span class="fa fa-eye text-primary"></span> View</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item edit_user" href="edit_package.php?id=<?php echo $row['p_id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                              <?php if($row['p_status'] == "Available") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item active_user" href="change_p_status.php?close_id=<?php echo $row['p_id'] ?>"><span class="fa fa-arrow-down text-danger"></span> Close Package</a>
                              <?php } if($row['p_status'] == "Closed") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item active_user" href="change_p_status.php?publish_id=<?php echo $row['p_id'] ?>"><span class="fa fa-arrow-up text-primary"></span> Publish Package</a>
                              <?php } ?>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Short Description</th>
                        <th>Thumbnail</th>
                        <th>Stauts</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
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

  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
</body>

</html>