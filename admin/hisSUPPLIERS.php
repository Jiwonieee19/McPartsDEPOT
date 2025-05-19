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
  include('../components/fetch_transactions.php');

?>

<style>
        #userTable tbody tr:hover td:nth-child(-n+10),
        #userTable tbody tr:hover td:nth-child(-n+10) * {
        color: #00A9C7 !important;
        }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 header-custom">TRANSACTION HISTORY</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Navbar Section -->
        <div class="row mb-3 custom-div">
            <div class="col-md-8 right-div">
                <nav class="nav custom-status">
                    <a class="nav-link" style="border-top-left-radius: 0.7rem !important; border-bottom-left-radius: 0.7rem !important; margin-left: 0.5rem !important;" href="hisCUSTOMERS.php">Customer</a>
                    <!-- <a class="nav-link" style="pointer-events: none !important;">|</a>
                    <a class="nav-link" href="#">Verified</a>
                    <a class="nav-link" style="pointer-events: none !important;">|</a>
                    <a class="nav-link" href="#">Approved</a>
                    <a class="nav-link" style="pointer-events: none !important;">|</a> -->
                    <a class="nav-link" style="border-top-right-radius: 0.7rem !important; border-bottom-right-radius: 0.7rem !important;color: #00A9C7 !important; background-color: #383838 !important;"
                     href="hisSUPPLIERS">Supplier</a>
                </nav>
            </div>
            <div class="col-md-4 text-right" style="margin-top: 0.5rem !important;">
                <div class="d-flex justify-content-end align-items-center custom-controls">
                <select class="form-control w-auto mr-2" id="purokFilter" style="background-color: #106979 !important; color: white !important; border: 1px solid #007bff !important;">
                    <option value="01" selected>24hrs Ago</option>
                    <option value="02">2days Ago</option>
                    <option value="03">3days Ago</option>
                    <option value="04">4days Ago</option>
                    <option value="05">5days Ago</option>
                    <option value="06">6days Ago</option>
                    <option value="07">A Week Ago</option>
                    <option value="all">All Record</option>
                </select>


                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModalNew"> + Add Customer</button> -->


            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <?php 
        include('tables/hisSupplierTABLE.php');
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