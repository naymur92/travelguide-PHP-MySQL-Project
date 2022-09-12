<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="<?= base_url ?>img/logo.png" alt="TravelGuideBD Logo" class="brand-image img-rounded elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminPanel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">TravelGuideBD</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>           
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Packages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="packages.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Packages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_packages.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Packages</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Bookings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="bookings.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bookings.php?status=pending" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Booking</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($_SESSION['user_type']==1){ ?>
              <li class="nav-item">
                <a href="users.php?type=manager" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Managers List</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="users.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users.php?status=active" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users.php?status=pending" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users.php?status=muted" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Muted Users</p>
                </a>
              </li>
              </li>
              <?php if($_SESSION['user_type']==1){ ?>
              <li class="nav-item">
                <a href="users.php?status=disabled" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disabled Users</p>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>