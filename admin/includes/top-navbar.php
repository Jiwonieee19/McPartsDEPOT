<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light navbar sticky-top">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> -->
  </ul>


      <!-- Navbar Search -->
      <li class="nav-item" id="custom-search">
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search Here ..." aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto" style="justify-content: center !important; align-items: center !important;">





       <li class="breadcrumb-item refresh-custom">
          <a href="#" onclick="location.reload(); return false;">
            <i class="fas fa-sync-alt"></i>
          </a>
        </li>
        

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge navbar-badge" style="background-color: #D9D9D9 !important; font-size: 12px; font-weight: bolder;">18</span>

      </a>
      <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div> -->
    </li>


    <li class="nav-item dropdown mr-5">

      <a class="nav-link d-flex flex-column" data-toggle="dropdown">
        <span class="floot-right text-muted text-md"> <?= $_SESSION['staff_username'] ?></span>
        <p class="useradmin"><?= $_SESSION['ROLE'] ?></p>
      </a>

        <div class="user-image">
          <img src="assets/images/profiles/<?= $_SESSION['staff_profile'] ?>" class="img-circle elevation-2 user-img" alt="User Image" style="width:50px; height:50px;">
        </div>
        <!-- naay equal sa tunga<??>htmlspecialchars($_SESSION['usr_profile']) -->

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu=right">

         <?php if ($_SESSION['staff_username'] !== 'SuperA' && $_SESSION['staff_password'] !== 'admin123'): ?> 
        <div class="dropdown-divider"></div>
            <button class="dropdown-item" data-toggle="modal" data-target="#addUserModal<?= $_SESSION['staff_id'] ?>">
              <i class="fas fa-cog mr-2"></i> Settings
            </button>
         <?php endif; ?>



        <div class="dropdown-divider"></div>
        <a href="../db_connect/logout.php" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Log out
        </a>
      </div>

    </li>




  </ul>
</nav>


                                          <!-- EDIT MODAL -->
                                          <div class="modal fade myel-modal" id="addUserModal<?= $_SESSION['staff_id'] ?>" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">

                                                <div class="container myel-modal">
                                                            <!-- Header -->
                                                    <div class="modal-header">
                                                            <h4 class="modal-title"><b>EDIT PROFILE</b></h4>
                                                        </div>

                                                        <form action="../components/save_settings.php" method="POST" enctype="multipart/form-data">
                                                            <!-- Profile Picture -->
                                                            <div class="text-center" style="margin: 0 6.5rem;">
                                                                 <img src="assets/images/profiles/<?= $_SESSION['staff_profile'] . '?v=' . time(); ?>" alt="Profile Picture" class="profile-img mb-3">
                                                                <input type="file" class="form-control mt-2" name="staff_profile">
                                                            </div>

                                                            <!-- User ID (Read-Only) -->
                                                            <div class="form-group" style="margin: 0.8rem 6.5rem 0 6.5rem;">
                                                                <label><strong>Resident ID</strong></label>
                                                                <input type="number" class="form-control" name="staff_id" value="<?= $_SESSION['staff_id']; ?>" style="background-color: #383838;" readonly>
                                                            </div>

                                                            <!-- Username -->
                                                            <div class="form-group" style="margin: 0.8rem 6.5rem 0 6.5rem;">
                                                                <label><strong>Username</strong></label>
                                                                <input type="text" class="form-control" name="staff_username" value="<?= $_SESSION['staff_username']; ?>">
                                                            </div>

                                                            <!-- Password & Confirmation -->
                                                            <div class="row" style="margin: 0.8rem 6rem 0 6rem;">
                                                                <div class="col-md-6">
                                                                    <label><strong>Password</strong></label>
                                                                    <input type="password" class="form-control" name="staff_password" value="<?= $_SESSION['staff_password']; ?>">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label><strong>Confirm Password</strong></label>
                                                                    <input type="password" class="form-control" name="confirm_password" value="<?= $_SESSION['staff_password']; ?>">
                                                                </div>
                                                            </div>

                                                            <!-- Submit Button -->
                                                            <div class="text-center mt-3">
                                                                <button type="submit" class="btn btn-success" style="margin-top: 1.8rem;">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>


                                              </div>
                                        </div>




<script>
$(document).ready(function () {
    var table = $('#userTable').DataTable({
        "paging": true,
        "searching": false, // Disable default search bar
        "ordering": true,
        "info": true
    });

    // Bind the navbar search input to DataTables filtering
    $('#custom-search input').on('keyup', function () {
        table.search(this.value).draw();
    });
});

</script>