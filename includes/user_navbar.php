<p>Welcome, <?= $_SESSION['name'] ?></p>
<ul class="nav nav-pills flex-column">
  <li class="nav-item">
    <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'user_dashboard.php') !== false) {echo "active";} ?>" href="user_dashboard.php"><i class="fa fa-tachometer mr-2"></i>Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'user_profile.php') !== false) {echo "active";} ?>" href="user_profile.php"><i class="fa fa-user mr-2"></i>Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'journey.php') !== false) {echo "active";} ?>" href="journey.php"><i class="fa fa-history mr-2"></i>Journey History</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'messages.php') !== false) {echo "active";} ?>" href="messages.php"><i class="fa fa-commenting mr-2"></i>Messages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'wishlist.php') !== false) {echo "active";} ?>" href="wishlist.php"><i class="fa fa-heart mr-2"></i>Wishlist</a>
  </li>
</ul>