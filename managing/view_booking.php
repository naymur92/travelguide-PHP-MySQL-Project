<?php include "../includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status']) && isset($_GET['b_id'])) {
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
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    /* View Booking page buttons */
    .action {
      display: flex;
      justify-content: space-between;
    }
    .price-update{
      display: none;
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
            <?php
            $booking_id = $_GET['b_id'];
            $sql = "SELECT * FROM view_bookings WHERE `Booking ID`=$booking_id";
            $result = $dbcon->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Single Bookings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="bookings.php">Bookings</a></li>
                <li class="breadcrumb-item active"><?php echo $row['Package Name']; ?></li>
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
                <div class="card-header">
                  <h3><?php echo $row['Package Name']; ?></h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <!-- Booking Details -->
                    <div class="col-md-6 col-sm-12">
                      <table class="table table-hover">
                        <?php foreach ($row as $header => $content) { ?>
                          <tr>
                            <th><?php echo $header; ?></th>
                            <?php if ($header == 'Extra Info' || $header == 'Total Person') { ?>
                              <td class="text-primary"><strong><?php echo $content; ?></strong></td>
                            <?php } else if($header == 'Payment Amount' && ($row['Total Amount'] != $row['Payment Amount'])){ ?>
                              <td class="text-danger"><strong><?php echo $content; ?></strong></td>
                              <?php } else { ?>
                              <td><?php echo $content; ?></td>
                          </tr>
                        <?php } } ?>
                      </table>
                      <div class="action">
                        <?php if ($row['Booking Status'] == "Pending") { ?>
                          <a class="btn btn-sm btn-outline-primary" href="change_b_status.php?check_b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-solid fa-list-check text-primary"></i> Mark Checked</a>
                        <?php }
                        if ($row['Booking Status'] == "Checked") { ?>
                          <a class="btn btn-sm btn-outline-secondary" href="edit_booking.php?b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                          <?php if ($row['Payment Status'] == "Invalid") { ?>
                            <a class="btn btn-sm btn-outline-danger" href="change_b_status.php?cancel_b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-regular fa-rectangle-xmark text-danger"></i> Cancel</a>
                          <?php }
                          if ($row['Payment Status'] == "Confirmed") { ?>
                            <a class="btn btn-sm btn-outline-primary" href="change_b_status.php?confirm_b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-solid fa-check"></i> Confirm Booking</a>
                          <?php }
                        }
                        if ($row['Booking Status'] == "Confirmed") { ?>
                          <a class="btn btn-sm btn-outline-success" href="change_b_status.php?complete_b_id=<?php echo $row['Booking ID'] ?>"><i class="fa-solid fa-check-double"></i> Mark Completed</a>
                        <?php }
                        if ($row['Payment Status'] == "Partial" || $row['Booking Status'] == "Pending") { ?>
                          <button class="btn btn-sm btn-outline-info price-update-btn"> Update Price</button>
                        <?php } ?>
                      </div>
                      <div class="price-update">
                        <div class="row justify-content-end">
                          <div class="col-4">
                            <form>
                              <fieldset class="rounded">
                                <legend>Updated Price</legend>
                                <input type="text" class="form-control new-price" name="updated_price" placeholder="New Price">
                              </fieldset>
                              <input type="button" class="btn btn-outline-success pull-right" id="update_price" value="UPDATE PRICE" b_id="<?php echo $row['Booking ID']; ?>">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Package Details -->
                    <div class="col-md-6 col-sm-12">
                      <?php
                      $package_id = $row['Package ID'];
                      $result1 = $dbcon->query("SELECT p_description FROM packages WHERE p_id=$package_id");
                      $row1 = $result1->fetch_assoc();
                      echo "<div>";
                      echo html_entity_decode($row1['p_description']);
                      echo "</div>";
                      ?>
                    </div>
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
      // Price Updater
      $(".price-update-btn").click(function(){
        $(".price-update").toggle();
      });

      $("#update_price").click(function(){
        var booking_id = $(this).attr('b_id');
        var new_price = $(".new-price").val();
        new_price = new_price.trim();
        if(new_price != ''){
          $.post(
          'update_price.php',
          {new_price: new_price, booking_id: booking_id},
          function(data){
						alert(data);
						window.location.reload();
          }
				);
        }
      });


      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
</body>

</html>