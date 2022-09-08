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
							<li><a href="index.php">Home</a></li>
							<!-- Dropdown -->
						    <li class="dropdown">
						      <a class="dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">Our Packages</a>
						      <div class="dropdown-menu">
						        <a class="dropdown-item" href="package.php">Umrah Package</a>
						        <a class="dropdown-item" href="package.php#special_tour">Special Tour Package</a>
						        <a class="dropdown-item" href="package.php#national_tour">National Tour</a>
						        <a class="dropdown-item" href="package.php#international_tour">International Tour</a>
						      </div>
						    </li>
							<li><a href="gallery.php">Gallery</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown"><i class="fa fa-user"></i></a>
								<div class="dropdown-menu">
								  <a class="dropdown-item" href="login.php">Login</a>
								  <a class="dropdown-item" href="register.php">Register</a>
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