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

  <title>Payments - TravelGuideBD</title>


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
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">All Payments</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="payments.php">Payments</a></li>
                <li class="breadcrumb-item active">All Payments</li>
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
                      <col width="10%">
                      <col width="10%">
                      <col width="10%">
                      <col width="10%">
                      <col width="15%">
                      <col width="20%">
                      <col width="10%">
                      <col width="10%">
                    </colgroup>
                    <thead>
                      <tr>
                        <th>Payment ID</th>
                        <th>Initial Amount</th>
                        <th>Total Amount</th>
                        <th>Payment Received</th>
                        <th>Gatway</th>
                        <th>Sender</th>
                        <th>Transaction ID</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_GET['payment_status'])) {
                        if ($_GET['payment_status'] == 'Pending')
                          $sql = "SELECT * FROM view_bookings WHERE `Booking Status`!='Pending' AND `Payment Status`='Pending'";
                        if ($_GET['payment_status'] == 'Confirmed')
                          $sql = "SELECT * FROM view_bookings WHERE `Booking Status`!='Pending' AND `Payment Status`='Confirmed'";
                        if ($_GET['payment_status'] == 'Partial')
                          $sql = "SELECT * FROM view_bookings WHERE `Booking Status`!='Pending' AND `Payment Status`='Partial'";
                        if ($_GET['payment_status'] == 'Invalid')
                          $sql = "SELECT * FROM view_bookings WHERE `Booking Status`!='Pending' AND `Payment Status`='Invalid'";
                      } else {
                        $sql = "SELECT * FROM view_bookings WHERE `Booking Status`!='Pending'";
                      }
                      $result = $dbcon->query($sql);
                      while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $row['Payment ID'] ?></td>
                          <td><?php echo $row['Package Cost']; ?></td>
                          <td><?php echo $row['Package Cost']; ?></td>
                          <td><?php echo $row['Payment Amount'] ?></td>
                          <td><?php echo $row['Payment Gatway']; ?></td>
                          <td><?php echo $row['Send From']; ?></td>
                          <td><?php echo $row['Transaction ID'] ?></td>
                          <td><?php echo $row['Payment Status'] ?></td>
                          <td align="center">
                            <?php if ($row['Payment Status'] == "Pending" || $row['Payment Status'] == "Partial") { ?>
                              <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Action
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="change_pmt_status.php?confirm_pmt_id=<?php echo $row['Payment ID'] ?>"><i class="fa-solid fa-check text-success"></i> Confirm</a>
                                <?php if ($row['Payment Status'] != "Partial") { ?>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="change_pmt_status.php?partial_pmt_id=<?php echo $row['Payment ID'] ?>"><i class="fa-solid fa-hourglass-half text-info"></i> Mark Parital</a>
                                <?php } ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="change_pmt_status.php?invalid_pmt_id=<?php echo $row['Payment ID'] ?>"><i class="fa-solid fa-triangle-exclamation text-danger"></i> Mark Invalid</a>
                              </div>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Payment ID</th>
                        <th>Initial Amount</th>
                        <th>Total Amount</th>
                        <th>Payment Received</th>
                        <th>Gatway</th>
                        <th>Sender</th>
                        <th>Transaction ID</th>
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