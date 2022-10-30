<?php include_once("includes/dbcon.php") ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['login_status'])) {
  header("Location:login.php");
}
if (!isset($_GET['booking_id']))
  header("Location:journey.php");

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
  <title>My Journey - TravelGuideBD</title>

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
      <h1 class="text-center text-success mb-40" style="padding-bottom: 10px;">My Journey</h1>
      <div class="row">
        <div class="col-lg-3 col-sm-12">
          <?php include "includes/user_navbar.php" ?>
        </div>
        <div class="col-lg-9 col-sm-12">
          <!-- Dashboard content area -->
          <div class="card">
            <?php
            $booking_id = $_GET['booking_id'];
            $sql = "SELECT * FROM view_bookings WHERE `Booking ID` = $booking_id";
            // echo $sql;
            $result = $dbcon->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <div class="card-header">
              <h2><?php echo $row['Package Name']; ?> <span onclick="window.location.href='journey.php'" class="btn py-2 px-4 btn-outline-info text-bold pull-right" style="cursor: pointer;">Back</span></h2>
              <!-- <a href="javascript:void()" ></a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <?php
                // print_r($row);
                // 
                foreach ($row as $header => $value) {
                  if ($header == 'Booking ID' ||  $header == 'User ID' ||  $header == 'Package Name') continue;
                ?>
                  <tr>
                    <th style="width: 30%;"><?php echo $header ?></th>
                    <td style="width: 70%;"> <?php echo $value; ?></td>
                  </tr>
                <?php } ?>
              </table>
              <?php if ($row['Booking Status'] == "Pending") { ?>
                <a class="btn btn-outline-danger pull-right" href="javascript:void()" onclick="window.location.href='cancel_booking.php?booking_id=<?php echo $row['Booking ID'] ?>'"><span class="fa fa-times text-danger"></span> Cancel Booking</a>
              <?php } ?>
            </div>
            <!-- /.card-body -->
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