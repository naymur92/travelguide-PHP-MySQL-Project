<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="<?= base_url ?>img/logo.png" alt="TravelGuideBD Logo" class="brand-image img-rounded elevation-3" style="opacity: .8">
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
          <a href="index.php" class="nav-link active">
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
                <i class="fa-solid fa-box text-primary"></i>
                <p>All Packages</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add_package.php" class="nav-link">
                <i class="fa-solid fa-plus text-info"></i>
                <p>Add Package</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-credit-card"></i>
            <p>
              Payments
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="payments.php" class="nav-link">
                <i class="fa-solid fa-file-invoice-dollar text-primary"></i>
                <p>All Payments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="payments.php?payment_status=Pending" class="nav-link">
                <i class="fa-solid fa-spinner text-warning"></i>
                <p>Pending Payments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="payments.php?payment_status=Confirmed" class="nav-link">
                <i class="fa-solid fa-check text-success"></i>
                <p>Confirmed Payments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="payments.php?payment_status=Partial" class="nav-link">
                <i class="fa-solid fa-hourglass-half text-info"></i>
                <p>Partial Payments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="payments.php?payment_status=Invalid" class="nav-link">
                <i class="fa-solid fa-triangle-exclamation text-danger"></i>
                <p>Invalid Payments</p>
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
              <i class="fa-solid fa-book text-primary"></i>
                <p>All Bookings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bookings.php?booking_status=Pending" class="nav-link">
                <i class="fa-solid fa-spinner text-warning"></i>
                <p>Pending Bookings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bookings.php?booking_status=Checked" class="nav-link">
                <i class="fa-solid fa-list-check text-primary"></i>
                <p>Checked Bookings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bookings.php?booking_status=Confirmed" class="nav-link">
                <i class="fa-solid fa-check text-success"></i>
                <p>Confirmed Bookings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bookings.php?booking_status=Cancelled" class="nav-link">
                <i class="fa-solid fa-xmark text-danger"></i>
                <p>Cancelled Bookings</p>
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
            <li class="nav-item">
              <a href="users.php" class="nav-link">
                <i class="fa-solid fa-users text-primary"></i>
                <p>All Users</p>
              </a>
            </li>
            <?php if ($_SESSION['user_type'] == 1) { ?>
              <li class="nav-item">
                <a href="users.php?type=manager" class="nav-link">
                  <i class="fa-solid fa-users-gear text-info"></i>
                  <p>Managers List</p>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a href="users.php?status=active" class="nav-link">
                <i class="fa-solid fa-user-check text-success"></i>
                <p>Active Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="users.php?status=pending" class="nav-link">
                <i class="fa-solid fa-spinner text-warning"></i>
                <p>Pending Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="users.php?status=muted" class="nav-link">
                <i class="fa-solid fa-user-slash text-muted"></i>
                <p>Muted Users</p>
              </a>
            </li>
            <?php if ($_SESSION['user_type'] == 1) { ?>
              <li class="nav-item">
                <a href="users.php?status=disabled" class="nav-link">
                  <i class="fa-solid fa-ban text-danger"></i>
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