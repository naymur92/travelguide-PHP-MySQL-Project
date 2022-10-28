<?php include_once("dbcon.php") ?>
<?php

  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

?>
<nav class="navbar navbar-expand-lg  navbar-light">
	<div class="container">
		<a class="navbar-brand" href="index.php">
			<img src="img/logo.png" alt="" height="70px">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="text-white lnr lnr-menu"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li><a href="javascript:void(0)" onclick="location.href='index.php'">Home</a></li>
				<!-- Dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" href="javascript:void(0)" id="navbardrop" data-toggle="dropdown">Our Packages</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='package.php?catid=1'">Umrah Package</a>
						<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='package.php?catid=2'">Special Tour Package</a>
						<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='package.php?catid=3'">National Tour</a>
						<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='package.php?catid=4'">International Tour</a>
					</div>
				</li>
				<li><a href="javascript:void(0)" onclick="location.href='gallery.php'">Gallery</a></li>
				<li><a href="javascript:void(0)" onclick="location.href='about.php'">About</a></li>
				<li><a href="javascript:void(0)" onclick="location.href='contact.php'">Contact</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" href="javascript:void(0)" id="usernavbardrop" data-toggle="dropdown"><?= isset($_SESSION['name'])? "<span style='text-transform: capitalize; color: lightblue;'>{$_SESSION['name']}</span>" : "" ?>  <i class="fa fa-user"></i></a>
					<div class="dropdown-menu">
						<?php if(!isset($_SESSION['login_status'])){ ?>
							<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='login.php'"><i class="fa fa-sign-in mr-2"></i>Login</a>
							<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='register.php'"><i class="fa fa-user-plus mr-2"></i>Register</a>
						<?php } else{ if($_SESSION['user_type'] == 3) { ?>
							<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='user_profile.php'"><i class="fa fa-user mr-2"></i>My Profile</a>
							<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='journey.php'"><i class="fa fa-history mr-2"></i>My Journey History</a>
							<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='messages.php'"><i class="fa fa-commenting mr-2"></i>My Messages</a>
							<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='wishlist.php'"><i class="fa fa-heart mr-2"></i>My Wishlist</a>							
							<?php } ?>
							<a class="dropdown-item" href="javascript:void(0)" onclick="location.href='<?= $_SESSION['user_type']==3 ? 'user_dashboard.php' : 'managing/' ?>'"><i class="fa fa-tachometer mr-2"></i>Dashboard</a>							
							<button class="btn btn-danger pull-right m-3" style="cursor: pointer;" onclick="location.href='managing/logout.php'"><i class="fa fa-sign-out mr-2"></i>Log Out</button>
						<?php } ?>
					</div>
				</li>
				<li class="searchBox">
					<a href="#" onclick="showSearchBox()" class="search_btn"><i class="fa fas fa-search"></i></a>
					<!-- <button onclick="showSearchBox()" class="nav-btn search_btn fa fas fa-search"></button> -->
					<div id="myDropdown" class="search_bar">
						<form action="http://www.google.com/search" method="get">
							<input type="text" name="q" class="form-control" placeholder="Where do you want to go?" onblur="closeSearch()">
						</form>
						<button class="close_btn fa fa-close" onclick="closeSearch()"></button>
					</div>
				</li>

			</ul>
		</div>
	</div>
</nav>