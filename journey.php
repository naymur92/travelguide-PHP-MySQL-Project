<?php include_once("includes/dbcon.php") ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['login_status'])) {
  header("Location:login.php");
} else if ($_SESSION['user_type'] != 3) {
  header("Location:managing/");
}

?>
<!DOCTYPE html>
<html lang="en-us">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="colorlib">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Journey History - TravelGuideBD</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/linearicons.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/styles.css">

  <style>
    .navbar {
      background-color: rgba(0, 0, 0, 0.8);
    }
  </style>


</head>

<body>
  <button onclick="topFunction()" id="myBtn"><i class="fa fa-solid fa-arrow-up"></i></button>
  <!-- start banner Area -->
  <section class="banner-area">
    <!-- Start Header Area -->
    <header class="default-header">
      <?php include("includes/navbar.php") ?>
    </header>
    <!-- End Header Area -->
  </section>



  <!-- Start About Us Area -->
  <section class="section-gap">
    <div class="container">
      <h1 class="text-center text-success mb-40" style="padding-bottom: 10px;">Journey History</h1>
      <div class="row">
        <div class="col-lg-3 col-sm-12">
          <?php include "includes/user_navbar.php" ?>
        </div>
        <div class="col-lg-9 col-sm-12">
          <!-- Dashboard content area -->
          <div class="card">
            <div class="card-header">
              <h3>My Journey History</h3>
            </div>
            <div class="card-body journey-history">
              <table class="table table-responsive table-striped">
                <tr>
                  <th>Sl. No.</th>
                  <th>Package Name</th>
                  <th>Journey Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM view_bookings WHERE `User ID`=$user_id";
                $result = $dbcon->query($sql);
                $sl_no = 1;
                while ($row = $result->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $sl_no++; ?></td>
                    <td><?php echo $row['Package Name'] ?></td>
                    <td><?php echo $row['Journey Date']; ?></td>
                    <td><?php echo $row['Booking Status']; ?></td>
                    <td class="align-center">
                      <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        Action
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item view_user" href="javascript:void()" onclick="window.location.href='view_booking.php?booking_id=<?php echo $row['Booking ID'] ?>'"><span class="fa fa-eye text-primary"></span> View</a>
                        <?php if ($row['Booking Status'] == "Pending") { ?>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item active_user" href="javascript:void()" onclick="window.location.href='cancel_booking.php?booking_id=<?php echo $row['Booking ID'] ?>'"><span class="fa fa-times text-danger"></span> Cancel Booking</a>
                        <?php } ?>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About Us Area -->


  <!-- start footer Area -->
  <?php include("includes/footer.php") ?>
  <!-- End footer Area -->

  <?php include("includes/footer_scripts.php") ?>
</body>

</html>