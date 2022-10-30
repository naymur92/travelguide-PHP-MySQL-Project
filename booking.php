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
if (!isset($_GET['p_id'])) {
  header("Location:package.php");
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
  <title>Booking - TravelGuideBD</title>

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
      <h1 class="text-center text-success mb-40" style="padding-bottom: 10px;">Book a Tour Package</h1>
      <div class="row">
        <div class="col-lg-3 col-sm-12">
          <?php include "includes/user_navbar.php" ?>
        </div>
        <div class="col-lg-9 col-sm-12">
          <!-- Dashboard content area -->
          <div class="card">
            <div class="card-header">
              <h2>Booking Form</h2>
            </div>
            <div class="card-body booking">
              <?php
              $p_result = $dbcon->query("SELECT * FROM packages WHERE p_id='{$_GET['p_id']}'");
              $p_row = $p_result->fetch_assoc();
              ?>
              <form method="POST">
                <fieldset class="rounded">
                  <legend>Package Name</legend>
                  <input type="text" class="form-control" value="<?php echo $p_row['p_name']; ?>" disabled>
                </fieldset>
                <div class="row">
                  <div class="col-6">
                    <fieldset class="rounded">
                      <legend>Package Price</legend>
                      <input type="text" class="form-control" value="Starting from: <?php echo $p_row['p_price']; ?>" disabled>
                    </fieldset>
                  </div>
                  <div class="col-6">
                    <fieldset class="rounded">
                      <legend>Package Duration</legend>
                      <input type="text" class="form-control" value="<?php echo $p_row['p_dur_days'] . ' Days &amp; ' . $p_row['p_dur_nights'] . ' Nights'; ?>" disabled>
                    </fieldset>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <fieldset class="rounded">
                      <legend>Select Date</legend>
                      <input type="date" class="form-control" name="journey_date" required>
                    </fieldset>
                  </div>
                  <div class="col-6">
                    <fieldset class="rounded">
                      <legend>Total Person</legend>
                      <input type="text" class="form-control" name="num_person" placeholder="Enter how many total person">
                    </fieldset>
                  </div>
                </div>
                <fieldset class="rounded">
                  <legend>Special Note</legend>
                  <input type="text" class="form-control" name="special_note" placeholder="Enter special note about trip. Ex. room quality, special food item etc.">
                </fieldset>
                <fieldset class="rounded">
                  <legend>Payment</legend>
                  <div class="row">
                    <div class="col-3">
                      <select name="payment_gatway" class="form-control" required>
                        <option value="" disabled selected>Select One</option>
                        <option value="bkash">Bkash</option>
                        <option value="rocket">Rocket</option>
                        <option value="nagad">Nagad</option>
                        <option value="bank" disabled>Bank</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <input type="text" name="payment_amount" class="form-control" placeholder="Amount" required>
                    </div>
                    <div class="col-3">
                      <input type="text" name="payment_from" class="form-control" placeholder="Send from?" required>
                    </div>
                    <div class="col-3">
                      <input type="text" name="transaction_id" class="form-control" placeholder="Transaction ID" required>
                    </div>
                  </div>
                </fieldset>
                <input type="submit" name="submit" value="Confirm Booking" class="btn btn-success pull-right" required>
              </form>
              <?php
              // Get values
              $user_id = $_SESSION['user_id'];
              $pac_id = $_GET['p_id'];
              if(isset($_POST['submit'])){
                $journey_date = $_POST['journey_date'];
                $total_person = $_POST['num_person'];
                $special_note = $_POST['special_note'];
                $payment_gatway = $_POST['payment_gatway'];
                $payment_amount = $_POST['payment_amount'];
                $payment_from = $_POST['payment_from'];
                $transaction_id = $_POST['transaction_id'];

                try {

                  $dbcon->autocommit(false);  // Set autocommit off
                  $dbcon->begin_transaction();
  
                  // First transaction
                  $sql = "INSERT INTO bookings VALUES(NULL, '$user_id', '$pac_id', DEFAULT, '$journey_date', DEFAULT, '$special_note', '$total_person')";
                  $dbcon->query($sql);

                  // Second transactions
                  $sql = "INSERT INTO payments VALUES(NULL, LAST_INSERT_ID(), '$user_id', '$payment_gatway', '$payment_amount', '$transaction_id', '$payment_from', DEFAULT, DEFAULT)";
                  $dbcon->query($sql);

                  // Commit the changes
                  $dbcon->commit();
                  echo '<script>alert("Booking Placed. Wait for confirmation"); location.href="journey.php";</script>';

                } catch (Throwable $e){
                  $dbcon->rollback();
                  // echo $e->getMessage();
                  echo '<script>alert("Problem in Booking.")</script>';
                  // throw $e;
                }
              }
              ?>
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