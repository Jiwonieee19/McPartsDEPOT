<?php
    session_start();
    // Redirect to login if no session found
// if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
//     header("Location: ../landing.php");
//     exit();
//   }
  
  include('includes/footer.php');
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/top-navbar.php');
  include('includes/notification.php');
  include('../components/fetch_users.php');

?>

<style>
        #userTable tbody tr:hover td:nth-child(-n+8),
        #userTable tbody tr:hover td:nth-child(-n+8) * {
        color: #00A9C7 !important;
        }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 header-custom">STAFF MANAGEMENT</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Navbar Section -->
        <div class="row mb-3 custom-div">
            <div class="col-md-8 right-div">
                <!-- <nav class="nav custom-status">
                    <a class="nav-link active" style="border-top-left-radius: 0.7rem !important; border-bottom-left-radius: 0.7rem !important; margin-left: 0.5rem !important;" href="#">Pending</a>
                    <a class="nav-link" style="pointer-events: none !important;">|</a>
                    <a class="nav-link" href="#">Verified</a>
                    <a class="nav-link" style="pointer-events: none !important;">|</a>
                    <a class="nav-link" href="#">Approved</a>
                    <a class="nav-link" style="pointer-events: none !important;">|</a>
                    <a class="nav-link" style="border-top-right-radius: 0.7rem !important; border-bottom-right-radius: 0.7rem !important;" href="#">Declined</a>
                </nav> -->
            </div>
            <div class="col-md-4 text-right" style="margin-top: 0.5rem !important;">
                <div class="d-flex justify-content-end align-items-center custom-controls">
                <!-- <select class="form-control w-auto mr-2" id="purokFilter">
                    <option value="all" selected>All Months</option>
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                </select> -->


                <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModalNew"> + Hire Staff</button>


                <!-- Add Customer -->
                <div class="modal fade myel1-modal" style="text-align: left;" id="addUserModalNew" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="text" id="addUserModalLabel"><b>HIRE NEW STAFF</b></h4>
                                            <!-- <label for="text" class="text2">Write/Choose None if Unsure</label> -->

                                        </div>
                                        <div class="modal-body">
                                            <form action="../components/add_staffs.php" method="POST">
                                                
                                                <h5 class="text5">Account Information</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="staff_username" required style="height: 25px; width: 180px; font-size: 12px;" maxlength="8">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="staff_firstname" required style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="staff_lastname" required style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Birth Date</label>
                                                        <input type="date" class="form-control" name="staff_birthdate" required style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                </div>

                                                <div style="font-size: 10px; color: #262626;">pangbulag but this is not visible</div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="staff_password" required style="height: 25px; width: 180px; font-size: 12px;" minlength="8" placeholder="not less than 8 character">
                                                    </div>
                                                    <!-- NEED ATENSYON LATUR  -->
                                                    <div class="col-md-3">
                                                        <label>Verify Password</label>
                                                        <input type="password" class="form-control" name="confirm_password" required style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                </div>
                                                
                                                <div style="font-size: 10px; color: #262626;">pangbulag but this is not visible</div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Email Address</label>
                                                        <input type="email" class="form-control" name="staff_email" required style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Contact Number</label>
                                                        <input type="text" class="form-control" name="staff_contact" required style="height: 25px; width: 180px; font-size: 12px;" oninput="limitLength(this, 11)">
                                                    </div>
                                                </div>

                                                <button type="submit" class="button">Save Details</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <?php 
        include('tables/staffsTABLE.php');
    ?>

  <!-- Main content -->
  <section class="content">
        <div class="container-fluid">
    </section>
</div>


<script>
    // purok filtering 
    document.getElementById('purokFilter').addEventListener('change', function() {
    var selectedPurok = this.value.trim();  // Get the selected value and trim any spaces
    console.log("Selected Purok: ", selectedPurok); // Log the selected value

    var rows = document.querySelectorAll('#userTable tbody tr'); // Get all table rows

    rows.forEach(function(row) {
        var purok = row.getAttribute('data-purok') ? row.getAttribute('data-purok').trim() : ''; // Get and trim the 'data-purok' value from the row
        console.log("Row Purok: ", purok); // Log the 'purok' value for each row

        // Check if the value matches, considering the "All" option
        if (selectedPurok === 'all' || selectedPurok === purok) {
            row.style.display = '';  // Show the row
        } else {
            row.style.display = 'none';  // Hide the row
        }
    });
});

    // maxlength sa type=number ky sa text ug pass ra mogana ang maxmin
    function limitLength(input, maxLength) {
        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }
    


</script>