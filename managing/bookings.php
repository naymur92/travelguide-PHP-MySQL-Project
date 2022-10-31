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

  <title>Bookings - TravelGuideBD</title>


  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/cf33cba7d1.js" crossorigin="anonymous"></script>
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
            <div class="col-sm-3">
              <h1 class="m-0 text-dark">All Bookings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <div class="filter">
              <a href="bookings.php" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-book text-primary"></i>All Bookings</a>
              <a href="bookings.php?booking_status=Pending" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-spinner text-warning"></i>Pending Bookings</a>
              <a href="bookings.php?booking_status=Checked" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-list-check text-primary"></i>Checked Bookings</a>
              <a href="bookings.php?booking_status=Confirmed" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-check text-success"></i>Confirmed Bookings</a>
              <a href="bookings.php?booking_status=Cancelled" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-xmark text-danger"></i>Cancelled Bookings</a>
              </div>
            </div><!-- /.col -->
            <div class="col-sm-3">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="packages.php">Bookings</a></li>
                <li class="breadcrumb-item active">All Bookings</li>
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
                      <col width="20%">
                      <col width="15%">
                      <col width="10%">
                      <col width="10%">
                      <col width="15%">
                      <col width="15%">
                      <col width="10%">
                    </colgroup>
                    <thead>
                      <tr>
                        <th>Booking ID</th>
                        <th>Package Name</th>
                        <th>Booking Time</th>
                        <th>Journey Date</th>
                        <th>Package Cost</th>
                        <th>Booking Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_GET['booking_status'])) {
                        if ($_GET['booking_status'] == 'Pending')
                          $sql = "SELECT * FROM view_bookings WHERE `Booking Status`='Pending'";
                        if ($_GET['booking_status'] == 'Confirmed')
                          $sql = "SELECT * FROM view_bookings WHERE `Booking Status`='Confirmed'";
                        if ($_GET['booking_status'] == 'Completed')
                          $sql = "SELECT * FROM view_bookings WHERE `Booking Status`='Completed'";
                        if ($_GET['booking_status'] == 'Cancelled')
                          $sql = "SELECT * FROM view_bookings WHERE `Booking Status`='Cancelled'";
                        if ($_GET['booking_status'] == 'Checked')
                          $sql = "SELECT * FROM view_bookings WHERE `Booking Status`='Checked'";
                      } else {
                        $sql = "SELECT * FROM view_bookings";
                      }
                      $result = $dbcon->query($sql);
                      while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $row['Booking ID'] ?></td>
                          <td><?php echo $row['Package Name']; ?></td>
                          <td><?php echo $row['Booking Time'] ?></td>
                          <td><?php echo $row['Journey Date']; ?></td>
                          <td><?php echo $row['Total Amount']; ?></td>
                          <td><?php echo $row['Booking Status'] ?></td>
                          <td><?php echo $row['Payment Status'] ?></td>
                          <td align="center">
                            <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              Action
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="view_booking.php?b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-regular fa-eye"></i> View</a>
                              
                              <?php if ($row['Booking Status'] == "Checked") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="edit_booking.php?b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <?php if ($row['Payment Status'] == "Invalid") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="change_b_status.php?cancel_b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-regular fa-rectangle-xmark text-danger"></i> Cancel</a>
                                <?php } if ($row['Payment Status'] == "Confirmed") { ?>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="change_b_status.php?confirm_b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-solid fa-check"></i> Confirm Booking</a>
                                <?php }
                              }
                              if ($row['Booking Status'] == "Confirmed") { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="change_b_status.php?complete_b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-solid fa-check-double"></i> Mark Completed</a>
                              <?php } ?>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Booking ID</th>
                        <th>Package Name</th>
                        <th>Booking Time</th>
                        <th>Journey Date</th>
                        <th>Package Cost</th>
                        <th>Booking Status</th>
                        <th>Payment Status</th>
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