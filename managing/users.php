<?php include "../includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status'])) {
  if (($_SESSION['user_type'] == 3))
    header("Location:../user_dashboard.php");
  // Restrict manager to view manager list
  if (isset($_GET['type']) && $_GET['type'] == "manager" && $_SESSION['user_type'] == 2)
    header("Location:users.php");
  // Restrict manager to view disabled users
  if (isset($_GET['status']) && $_GET['status'] == "disabled" && $_SESSION['user_type'] == 2)
    header("Location:users.php");
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

  <title>Users - TravelGuideBD</title>

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
              <h1 class="m-0 text-dark">
                <?php
                if (isset($_GET['type']) && $_GET['type'] == "manager") echo "Managers List";
                else if (isset($_GET['status'])) {
                  if ($_GET['status'] == "pending") echo "Pending Users";
                  if ($_GET['status'] == "muted") echo "Muted Users";
                  if ($_GET['status'] == "disabled") echo "Disabled Users";
                  if ($_GET['status'] == "active") echo "Active Users";
                } else echo "All Users";
                ?>
              </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                <li class="breadcrumb-item active">
                  <?php
                  if (isset($_GET['type']) && $_GET['type'] == "manager") echo "Managers";
                  else if (isset($_GET['status'])) {
                    if ($_GET['status'] == "pending") echo "Pending Users";
                    if ($_GET['status'] == "muted") echo "Muted Users";
                    if ($_GET['status'] == "disabled") echo "Disabled Users";
                    if ($_GET['status'] == "active") echo "Active Users";
                  } else echo "All Users";
                  ?>
                </li>
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
                      <col width="18%">
                      <col width="17%">
                      <col width="10%">
                      <col width="15%">
                      <col width="8%">
                      <col width="17%">
                      <col width="10%">
                    </colgroup>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM users, user_type WHERE user_type!=1 AND user_type=user_type_code";
                      $result = $dbcon->query($sql);
                      while ($row = $result->fetch_assoc()) {
                        if($_SESSION['user_type'] == 2 && $row['user_type_name'] == "Manager") continue;  // Restrict manager to show manager
                        if($_SESSION['user_type'] == 2 && $row['status'] == "Disabled") continue;  // Restrict manager to disabled user
                        if(isset($_GET['type'])) if ($_GET['type'] == "manager" && $row['user_type_name'] != "Manager") continue;  // Show only manager list
                        if(isset($_GET['status'])){
                          if ($_GET['status'] == "active" && $row['status'] != "Active") continue;  // Show only active users
                          if ($_GET['status'] == "pending" && $row['status'] != "Pending") continue;  // Show only pending users
                          if ($_GET['status'] == "muted" && $row['status'] != "Muted") continue;  // Show only muted users
                          if ($_GET['status'] == "disabled" && $row['status'] != "Disabled") continue;  // Show only disabled users to admin
                        }

                      ?>
                        <tr>
                          <td><?php echo $row['id'] ?></td>
                          <td><?php echo $row['name'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['username'] ?></td>
                          <td><?php echo $row['user_type_name'] ?></td>
                          <td><?php echo $row['status'] ?></td>
                          <td><?php echo $row['joined'] ?></td>
                          <td align="center">
                            <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              Action
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item view_user" href="view_user.php?id=<?php echo $row['id'] ?>"><span class="fa fa-eye text-primary"></span> View</a>
                              <?php if ($row['status'] != "Disabled") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item edit_user" href="edit_user.php?id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                              <?php } if ($row['status'] == "Active" && $_SESSION['user_type'] == 1 && $row['user_type_name'] == "Manager") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item active_user" href="demote_user.php?id=<?php echo $row['id'] ?>"><span class="fa fa-arrow-down text-danger"></span> Demote to User</a>
                              <?php } if ($row['status'] == "Active" && $_SESSION['user_type'] == 1 && $row['user_type_name'] == "User") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item active_user" href="promote_user.php?id=<?php echo $row['id'] ?>"><span class="fa fa-arrow-up text-primary"></span> Promote to Manager</a>
                              <?php } if ($row['status'] == "Pending" || $row['status'] == "Muted") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item active_user" href="active_user.php?id=<?php echo $row['id'] ?>"><span class="fa fa-check text-primary"></span> Active User</a>
                              <?php } if ($row['status'] != "Disabled" && $row['status'] != "Muted" && $row['user_type_name'] != "Manager") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item mute_user" href="mute_user.php?id=<?php echo $row['id'] ?>"><span class="fa fa-ban text-warning"></span> Mute User</a>
                              <?php } if ($_SESSION['user_type'] == 1 && $row['status'] != "Disabled" && $row['user_type_name'] != "Manager") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item disable_user" href="disable_user.php?id=<?php echo $row['id'] ?>"><span class="fa fa-user-times text-danger"></span> Disable User</a>
                              <?php } ?>
                            </div>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th>Joined</th>
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