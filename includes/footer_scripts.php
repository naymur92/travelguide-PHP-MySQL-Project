<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/slick.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/main.js"></script>


<script>
	/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
	function showSearchBox() {
		document.getElementById("myDropdown").classList.toggle("show");
	}

	function closeSearch() {
		document.getElementById("myDropdown").classList.remove("show");
	}
</script>
<script>
	//Go to top button
	//Get the button
	var mybutton = document.getElementById("myBtn");
	// When the user scrolls down 20px from the top of the document, show the button

	// window.onscroll = function(){scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		window.scrollTo({
			top: 0,
			behavior: 'smooth'
		});
		// document.documentElement.scrollTo({top: 0, behavior: 'smooth'});
	}

	window.onscroll = function() {
		scrollFunction();
	}
</script>
<script>
	$(document).ready(function(){
		$("#navbardrop").click(function(){
			window.location.href = "package.php";
			// alert("hi");
			
		});
	});
</script>