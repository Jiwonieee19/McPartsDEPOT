


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- <div class="rightside"> -->
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" style="margin-top: 0.5rem !important;">
          <img src="assets/images/icons/logo.png" class="img-circle elevation-2" alt="User Image" style="width:65px; height:65px;">
        </div>
        <div class="info">
        <a href="#" class="d-block barangay-title">Toril Davao City</a>
          <a href="#" class="d-block barangay-name" style="color: #00A9C7 !important;">MCPARTS DEPOT</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <div>
          <img src="assets/PICTURE/TOP.png" style="margin: 3rem 0 1.9rem 0.26rem !important;">
        </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            
              <li class="nav-header">GENERAL</li>

            <div>
              <img src="assets/PICTURE/UPDL.png" style="margin-bottom: 3.1px !important;">
            </div>

            <li class="nav-item">
              <a href="DASHBOARD.php" class="nav-link active">
                <i class="nav-icon fas fa-desktop"></i>
                <p>
                DASHBOARD
                </p>
              </a>
            </li>
            
            <div>
              <img src="assets/PICTURE/DDASHBOARD.png" style="margin-bottom: 3.1px !important;">
            </div>

            <li class="nav-item">
              <a href="prodCHECKOUT.php" class="nav-link active">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                TRANSACTIONS
                </p>
              </a>
            </li>
            
            <div>
              <img src="assets/PICTURE/DPRODUCTS.png" style="margin-bottom: 3.1px !important;">
            </div>

            <li class="nav-item">
              <a href="realPRODUCTS.php" class="nav-link active">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                PRODUCTS
                </p>
              </a>
            </li>
            
            <div>
              <img src="assets/PICTURE/DPRODUCTS.png" style="margin-bottom: 3.1px !important;">
            </div>

            <li class="nav-item">
              <a href="accCUSTOMERS.php" class="nav-link active">
                <i class="nav-icon fas fa-users"></i>
                <p>
                ACCOUNTS
                </p>
              </a>
            </li>
            
            <div>
              <img src="assets/PICTURE/DPRODUCTS.png" style="margin-bottom: 3.1px !important;">
            </div>

            <!-- <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                CARTS
                </p>
              </a>
            </li>

            <div>
              <img src="assets/PICTURE/DCARTS.png" style="margin-bottom: 3.1px !important;">
            </div> -->

            <li class="nav-item">
              <a href="hisCUSTOMERS.php" class="nav-link active">
                <i class="nav-icon fas fa-history"></i>
                <p>
                HISTORY
                </p>
              </a>
            </li>

            <div>
              <img src="assets/PICTURE/DHISTORY.png" style="margin-bottom: 3.1px !important;">
            </div>

         <?php if ($_SESSION['staff_username'] === 'SuperA' || $_SESSION['staff_password'] === 'admin123'): ?> 
        <li class="nav-item">
          <a href="STAFFS.php" class="nav-link active">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>STAFFS</p>
          </a>
        </li>

        <div>
          <img src="assets/PICTURE/DSTAFFS.png" style="margin-bottom: 3.1px !important;">
        </div>
      <?php endif; ?>

            <!-- <li class="nav-item">
              <a href="uAPPOINTMENTS.php" class="nav-link">
                <i class="nav-icon far fa-calendar-check"></i>
                <p>
                My Appointments
                  <span class="badge badge-info right">18</span>
                </p>
              </a>
              </li>
            <li class="nav-item">
              <a href="uRESIDENCY.php" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  My Residency
                  <span class="badge badge-info right">9</span>
                </p>
              </a>
            </li> -->
<!-- 
            <li class="nav-item">
              <a href="GEN_ID.php" class="nav-link">
                <i class="nav-icon far fa-calendar-check"></i>
                <p>
                Generate ID
                </p>
              </a>
              </li> -->

            <li class="nav-header" style="margin-top: 1rem !important;">LEGAL INFO</li>
           
            <!-- <li class="nav-item">
              <a href="uABOUTUS.php" class="nav-link">
                <i class="nav-icon far fa-address-card"></i>
                <p>
                  About Us
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="uPRIVACY.php" class="nav-link">
                <i class="nav-icon fas fa-headset"></i>
                <p>
                  Privacy Policy
                </p>
              </a>
            </li> -->

            <div>
              <img src="assets/PICTURE/UPDL.png" style="margin-bottom: 3.1px !important;">
            </div>

            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-shield-alt"></i>
                <p>
                PRIVACY POLICY
                </p>
              </a>
            </li>

            <div>
              <img src="assets/PICTURE/DPRIVACY.png" style="margin-bottom: 3.1px !important;">
            </div>

            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                TERMS & CONDITIONS
                </p>
              </a>
            </li>

            <div>
              <img src="assets/PICTURE/DTERMS.png" style="margin-bottom: 3.1px !important;">
            </div>

          </ul>

          
          
      </nav>
      <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>


  <script>
    document.addEventListener("DOMContentLoaded", function () {
    let currentLocation = window.location.pathname.split("/").pop(); // Get current file name
    let menuItems = document.querySelectorAll(".nav-link");

    menuItems.forEach(item => {
        let itemHref = item.getAttribute("href");
        if (currentLocation === itemHref) {
            item.classList.add("active");
        } else {
            item.classList.remove("active");
        }
    });
});

  </script>