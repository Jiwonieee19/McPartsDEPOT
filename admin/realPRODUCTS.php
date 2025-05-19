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
  include('../components/fetch_products.php');

?>
<style>
        #userTable tbody tr:hover td:nth-child(-n+6),
        #userTable tbody tr:hover td:nth-child(-n+6) * {
        color: #00A9C7 !important;
        }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 header-custom">PRODUCT MANAGEMENT</h1> 
                <!-- WHO WILL SUPPLY? or CHOOSE SUPPLIER -->
            </div>
            <!-- <div>
          <img src="assets/PICTURE/ACCOUNTSTOP.png" style="margin: 1rem 0 !important;">
        </div> -->
        </div><!-- /.row -->

        <!-- Navbar Section -->
        <div class="row mb-3 custom-div">
            <div class="col-md-8 right-div">
            </div>
            <div class="col-md-4 text-right" style="margin-top: 0.5rem !important;">
                <div class="d-flex justify-content-end align-items-center custom-controls">

                <!-- <a href="prodPAYMENT.php">
                    <button class="btn btn-primary" style="margin-right: 1rem !important;">Proceed to Payment</button>
                </a> -->

                <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModalNew">+ New Product</button>

                                          <!-- NEW PRODUCT MODAL -->
                                    <div class="modal fade myel-modal" style="text-align: left;" id="addUserModalNew" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">

                                                <div class="container myel-modal">
                                                            <!-- Header -->
                                                    <div class="modal-header">
                                                            <h4 class="modal-title"><b>ADD NEW PRODUCT</b></h4>
                                                        </div>

                                                        <form action="../components/add_products.php" method="POST" enctype="multipart/form-data">
                                                            <!-- Profile Picture -->
                                                            <div class="text-center" style="margin: 0 6.5rem;">
                                                                <img src="assets/images/" alt="Profile Picture" class="product-img mb-3" style="color: #106979 !important; font-size: 30px !important;">
                                                                <input type="file" class="form-control mt-2" name="profile">
                                                            </div>

                                                            <!-- User ID (Read-Only) -->
                                                            <!-- <div class="form-group" style="margin: 0.8rem 6.5rem 0 6.5rem;">
                                                                <label><strong>PRODUCT ID</strong></label>
                                                                <input type="number" class="form-control" name="userid" value="<?= $_SESSION['userid']; ?>" style="background-color: #383838;" readonly>
                                                            </div> -->

                                                
                                                            <div class="row" style="margin: 0.8rem 6rem 0 6rem;">
                                                                <div class="col-md-6">
                                                                    <label><strong>PRODUCT NAME</strong></label>
                                                                    <input type="text" class="form-control" name="product_name">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="category"><strong>CATEGORY</strong></label>
                                                                    <select id="category" name="product_category" class="form-control" style="height: 30px; width: 180px; font-size: 12px;">
                                                                        <option value="Others">Other</option>
                                                                        <option value="Engine Components">Engine Component</option>
                                                                        <option value="Ignition System">Ignition System</option>
                                                                        <option value="Fuel System">Fuel System</option>
                                                                        <option value="Brake System">Brake System</option>
                                                                        <option value="Exhaust and Filter">Exhaust & Filter</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin: 0.8rem 6rem 0 6rem;">
                                                                <div class="col-md-6">
                                                                    <label><strong>PRICE</strong></label>
                                                                    <input type="text" class="form-control" name="product_price">
                                                                </div>
                                                                <div class="col-md-6" style="padding-right: 5.6rem !important;">
                                                                    <label><strong>QUANTITY</strong></label>
                                                                    <input type="text" class="form-control" name="stock_quantity" readonly>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group" style="margin: 0.8rem 6.5rem 0 6.5rem;">
                                                                <label><strong>DESCRIPTION</strong></label>
                                                                <input type="text" class="form-control" name="product_description">
                                                            </div>


                                                            <!-- Password & Confirmation -->
                                                            <!-- <div class="row" style="margin: 0.8rem 6rem 0 6rem;">
                                                                <div class="col-md-6">
                                                                    <label><strong>Password</strong></label>
                                                                    <input type="password" class="form-control" name="password" value="<?= $_SESSION['password']; ?>">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label><strong>Confirm Password</strong></label>
                                                                    <input type="password" class="form-control" name="confirm_password" value="<?= $_SESSION['password']; ?>">
                                                                </div>
                                                            </div> -->

                                                            <!-- Submit Button -->
                                                            <div class="text-center mt-3">
                                                                <button type="submit" class="btn btn-success" style="margin-top: 1.8rem;">Add Now</button>
                                                            </div>
                                                        </form>
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
        include('tables/realProductTABLE.php');
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