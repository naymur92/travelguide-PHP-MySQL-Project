<?php include "./includes/dbcon.php" ?>
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
	<title>Our Packages - TravelGuideBD</title>

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


	<!-- Start Package Area -->
	<section class="section-gap">
		<div class="container">
			<div class="packages-container">
				<div class="jumbotron">
					<h1 class="mb-10 text-center">Available Packages</h1>
				</div>
				<?php
				if (isset($_GET['catid'])) {
					$cat_id = $_GET['catid'];
					$sql = "SELECT * FROM package_category WHERE category_id=$cat_id";
				} else {
					$sql = "SELECT * FROM package_category";
				}

				$result = $dbcon->query($sql);	// query of category
				while ($row = $result->fetch_assoc()) {
					if (isset($_GET['catid'])) $cat_id = $_GET['catid'];	// Get from link
					else $cat_id = $row['category_id'];		// Get from query

					$sql1 = "SELECT * FROM packages WHERE p_category='$cat_id' AND p_status='Available'";
					$result1 = $dbcon->query($sql1);	// Query for get packages

					// If no package in category then ignore
					if ($result1->num_rows == 0) continue;
				?>
					<!-- Card Start -->
					<div class="card mb-30">
						<div class="card-header">
							<h2 class="category-name"><a href="javascript:void(0)" onclick="location.href='package.php?catid=<?php echo $row['category_id']; ?>'"><?php echo $row['category_name']; ?></a></h2>
						</div>
						<div class="card-body package-list-container">
							<?php while ($row1 = $result1->fetch_assoc()) { ?>
								<!-- Card Body Start -->
								<div class="row mb-10 p-1 package-list">

									<!-- Package short details -->
									<div class="col-sm-8 col-xs-12">
										<h4><i class="fa fa-star"></i> <?php echo $row1['p_name']; ?></h4>
										<div class="package-short-des mt-10"><?php echo html_entity_decode($row1['p_short_des']); ?></div>
										<span class="package-price bg-info"><i class="fa-solid fa-coins"></i> Price starts From: &#2547; <strong><?php echo $row1['p_price']; ?></strong></span>
										<div class="mb-10"></div>
										<div class="package-buttons">
											<a href="javascript:void(0)" onclick="location.href='package-details.php?p_id=<?php echo $row1['p_id']; ?>'"><button class="btn btn-outline-info">View Package</button></a>
											<a href="javascript:void(0)" onclick="location.href='booking.php?p_id=<?php echo $row1['p_id']; ?>'"><button class="btn btn-danger">Book Now</button></a>
										</div>
									</div>

									<!-- Package image section -->
									<div class="col-sm-4 col-xs-12 package-img-container">
										<img src="img/packages/<?php echo current(explode('|', $row1['p_thumb'])); ?>" alt="" class="package-list-img">
										<div class="package-info">
											<div class="row">
												<div class="col-9"><?php echo $row1['p_title']; ?></div>
												<div class="col-3"><span class="package-duration"><strong><?php echo $row1['p_dur_days']; ?></strong> Days</span></div>
											</div>
										</div>
									</div>
								</div>
								<!-- Card Body End -->
							<?php
							if($result1->num_rows != 1){
								echo "<hr class='package-seperator'>";
							}
							}
							?>
						</div>
					</div>
					<!-- Card End -->
				<?php
					// 2nd query loop ends for single category
					if (isset($_GET['catid'])) break;
				}
				?>
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