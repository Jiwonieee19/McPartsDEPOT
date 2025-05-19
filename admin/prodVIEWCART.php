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
  include('../components/fetch_cart_items.php');

  $rawAmount = 0;
  while ($row = mysqli_fetch_assoc($calculateAmountResult)) { 
    $rawAmount = $rawAmount + $row['subtotal'];
  }
  $tax = $rawAmount * 0.03;
  $_SESSION['payment_total'] = $rawAmount + $tax;
?>
<style>
        #userTable tbody tr:hover td:nth-child(-n+4),
        #userTable tbody tr:hover td:nth-child(-n+4) * {
        color: #00A9C7 !important;
        }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 header-custom">PENDING CART</h1>
            </div>
            <!-- <div>
          <img src="assets/PICTURE/ACCOUNTSTOP.png" style="margin: 1rem 0 !important;">
        </div> -->
        </div><!-- /.row -->

        <!-- Navbar Section -->
        <div class="row mb-3 custom-div">
            <div class="col-md-8 right-div">
                <nav class="nav custom-status">
                <a class="nav-link active" style="border-radius: 0.7rem !important; margin-left: 0.5rem !important;" href="PRODUCTS1.php"><i class="nav-icon fas fa-long-arrow-alt-left"></i></a>
                    <!-- <a class="nav-link" style="pointer-events: none !important;">|</a>
                    <a class="nav-link" href="#">Verified</a>
                    <a class="nav-link" style="pointer-events: none !important;">|</a>
                    <a class="nav-link" href="#">Approved</a> -->
                    <!-- <a class="nav-link" style="pointer-events: none !important;">|</a> -->
                    <!-- <a class="nav-link" style="border-top-right-radius: 0.7rem !important; border-bottom-right-radius: 0.7rem !important;" href="#">Supplier</a>
                </nav> -->
            </div>
            <div class="col-md-4 text-right" style="margin-top: 0.5rem !important;">
                <div class="d-flex justify-content-end align-items-center custom-controls">

                <button class="btn btn-primary" data-toggle="modal" data-target="#viewModal<?php echo $_SESSION['customer_id']; ?>" 
                style="margin-right: 1rem !important;">GRAND TOTAL: ₱<?php echo number_format($_SESSION['payment_total'], 2); ?></button>

                <button class="btn btn-act" style="margin: 0 10px;" data-toggle="modal"
                data-target="#paymentModal<?php echo $_SESSION['customer_id']; ?>"><i class="fas fa-credit-card"></i></button>


                <!-- View Amount -->
                            <div class="modal fade myel1-modal" style="text-align: left;" id="viewModal<?php echo $_SESSION['customer_id']; ?>" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="text" id="addUserModalLabel"><b>PARTIAL AMOUNT BASE ON CART</b></h4>
                                            <!-- <label for="text" class="text2">Write/Choose None if Unsure</label> -->

                                        </div>

                                        <div class="modal-body">
                                            <form action="../components/add_customers.php" method="POST">
                                                
                                                
                                                <h5 class="text5">Amount Information</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Raw Amount</label>
                                                        <input type="text" value="<?php echo number_format($rawAmount, 2); ?>" class="form-control" name="customer_fullname" required style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>

                                                </div>
                                                <div style="font-size: 10px; color: #262626;">pangbulag but this is not visible</div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Tax(3%)</label>
                                                        <input type="email" value="<?php echo number_format($tax, 2); ?>" class="form-control" name="customer_email" required style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                </div>
                                                <div style="font-size: 10px; color: #262626;">pangbulag but this is not visible</div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Total Amount</label>
                                                        <input type="text" value="<?php echo number_format($_SESSION['payment_total'], 2); ?>" class="form-control" name="customer_contact" required style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- PAYMENT MODAL -->
                            <div class="modal fade myel1-modal" id="paymentModal<?php echo $_SESSION['customer_id']; ?>" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content content" style="text-align: left;"> 
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="text" id="addUserModalLabel"><b>CONFIRM DETAILS</b></h4>
                                            <!-- <label for="text" class="text2">Write/Choose None if Unsure</label> -->

                                        </div>
                                        <div class="modal-body">
                                            <form action="../components/complete_payment.php" method="POST">
                                                
                                                <h5 class="text5">Customer Information</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" name="customer_fullname" value="<?php echo $_SESSION['customer_fullname']; ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>

                                                </div>                                       
                                                <div style="font-size: 10px; color: #262626;">pangbulag but this is not visible</div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Email Address</label>
                                                        <input type="text" class="form-control" name="customer_email" value="<?php echo $_SESSION['customer_email']; ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Contact Number</label>
                                                        <input type="text" class="form-control" name="customer_contact" value="<?php echo $_SESSION['customer_contact']; ?>" style="height: 25px; width: 180px; font-size: 12px;" maxlength="11" readonly>
                                                    </div>
                                                </div>

                                                <h5 class="text5">Payment Details</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>TOTAL AMOUNT</label>
                                                        <input type="text" class="form-control" name="payment_total" id="userid" value="<?php echo number_format($_SESSION['payment_total'], 2); ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                </div>
                                                <div style="font-size: 10px; color: #262626;">pangbulag but this is not visible</div>

                                                    <div class="form-group row">

                                                <div class="col-md-3">
                                                    <label>Paid Amount</label>
                                                    <input type="number" id="paidAmount" class="form-control" name="payment_paid" style="height: 25px; width: 180px; font-size: 12px;">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Change Amount</label>
                                                    <input type="text" id="changeAmount" class="form-control" name="payment_change" readonly style="height: 25px; width: 180px; font-size: 12px;">
                                                </div>
                                            </div>

                                            <button type="button" class="button" style="max-width: 200px !important;" onclick="calculateChange()">Calculate Change</button>
                                                                                            

                                                <input type="hidden" name="customer_id" value="<?= $row['customer_id'] ?>">
                                                <button type="submit" class="button" id="submitBtn" style="max-width: 200px !important;" disabled>
                                                    Complete Transaction
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



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
                </div>
            </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <?php 
        include('tables/prodCartTABLE.php');
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

<script>
function calculateChange() {
    const totalAmountRaw = document.querySelector('input[name="payment_total"]').value.replace(/,/g, '');
    const totalAmount = parseFloat(totalAmountRaw) || 0;

    const paidAmount = parseFloat(document.getElementById("paidAmount").value) || 0;
    const submitBtn = document.getElementById("submitBtn");

    if (paidAmount < totalAmount) {
        alert("Paid amount is less than the total amount. Please enter a sufficient amount.");
        document.getElementById("changeAmount").value = "";
        submitBtn.disabled = true;
        return;
    }

    const change = paidAmount - totalAmount;
    document.getElementById("changeAmount").value = change.toFixed(2);
    submitBtn.disabled = false; // Enable submit only when valid
}
</script>