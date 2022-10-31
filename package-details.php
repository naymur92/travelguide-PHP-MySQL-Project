<?php include "./includes/dbcon.php" ?>
<?php
if (!isset($_GET['p_id'])) {
  header('Location:package.php');
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
  <title>Package Detail - TravelGuideBD</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/linearicons.css">
  <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/styles.css">
  <!-- font awesome -->
	<script src="https://kit.fontawesome.com/cf33cba7d1.js" crossorigin="anonymous"></script>

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


  <?php
  $p_id = $_GET['p_id'];
  $sql = "SELECT * FROM packages, package_category WHERE p_category=category_id AND p_id='$p_id' AND p_status='Available'";
  $result = $dbcon->query($sql);
  $row = $result->fetch_assoc();
  ?>
  <!-- Start Package Area -->
  <section class="section-gap">
    <div class="container">
      <div class="package-container">
        <div class="jumbotron">
          <h1 class="mb-10 text-center"><?php echo $row['category_name']; ?></h1>
        </div>
        <!-- Card Start -->
        <div class="card mb-30">
          <div class="card-header">
            <h2 class="package-name"><?php echo $row['p_name']; ?> <a href="javascript:void(0)" onclick="location.href='package.php'"><span class="btn btn-outline-danger pull-right back-btn">Go Back</span></a></h2>
          </div>
          <div class="card-body">
            <!-- Card Body Start -->
            <div class="row">
              <!-- Package details -->
              <div class="col-sm-8 col-xs-12">
                <div class="package-description"><?php echo html_entity_decode($row['p_description']); ?></div>

                <!-- Booking button -->
                <?php if(!isset($_SESSION['user_type']) || $_SESSION['user_type'] == 3){ ?>
                <button class="btn btn-outline-primary wishlist-btn" val='p_id=<?php echo $row['p_id']; ?>'><i class="fa-solid fa-heart"></i>Add to Wishlist</button>
                <?php } ?>
                <a href="javascript:void(0)" onclick="location.href='booking.php?p_id=<?php echo $row['p_id']; ?>'"><button class="btn btn-outline-success pull-right"><i class="fa-solid fa-check"></i>Book Now</button></a>
              </div>

              <!-- Package image section -->
              <div class="col-sm-4 col-xs-12 package-img-container">
                <?php
                $images = explode('|', $row['p_thumb']);
                foreach ($images as $image) {
                  echo "<img src='img/packages/$image' class='package-details-img'>";
                }
                ?>
              </div>
            </div>
          </div>
          <!-- Card Body End -->
        </div>
        <!-- Card End -->
      </div>
    </div>
  </section>
  <!-- End Package Area -->


  <!-- start footer Area -->
  <?php include("includes/footer.php") ?>
  <!-- End footer Area -->

  <?php include("includes/footer_scripts.php") ?>
</body>

</html>