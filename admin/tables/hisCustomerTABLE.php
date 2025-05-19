      <!-- /.row -->
      <!-- Main row -->
      <div class="row" style="margin: 0rem 1.5rem !important;">
            <!-- Left col -->
            <section class="col-lg-12">
                <!-- Custom tabs (Charts with tabs)-->
                <!-- <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Users Data
                    </h3> -->
                    </div><!-- /.card-header -->

                    <div class="card-body">

                    <table id="userTable" class="display">

                        <thead>
                        <tr class="user-row">
                            <th>ORDER ID</th>
                            <th>CUSTOMER NAME</th>
                            <th>STAFF NAME</th>
                            <th>PAYMENT TOTAL</th>
                            <th>PAYMENT PAID</th>
                            <th>PAYMENT CHANGE</th>
                            <th>TRANSACTION DATE</th>
                            <th>DETAILS</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($customerTransactionsResult)) { ?>

                            <tr>
                            <td>
                                <?= $row['order_id']; ?>
                            </td>
                            <td>
                                <?= $row['customer_fullname']; ?>
                            </td>
                            <td>
                                <?= $row['staff_firstname']; ?> <?= $row['staff_lastname']; ?>
                            </td>
                            <td>
                                <?= $row['payment_total']; ?>
                            </td>
                            <td>
                                <?= $row['payment_paid']; ?>
                            </td>
                            <td>
                                <?= $row['payment_change']; ?>
                            </td>
                            <td>
                                <?= $row['order_date']; ?>
                            </td>
                            <td class="text-center">
                                <form method="POST" action="transCUSTOMERS.php" style="display:inline;">
                                    <input type="hidden" name="order_id" value="<?= $row['order_id'] ?>">
                                    <button type="submit" class="btn btn-act" style="margin: 0 10px;">
                                        <i class="fas fa-credit-card"></i>
                                    </button>
                                </form>

                            </td>

                            </tr>

                            <!-- HISTORY MODAL -->
                            <!-- <div class="modal fade myel1-modal" id="historyModal<?= $row['userid'] ?>" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="background-color: #262626;">
                                        include()
                                    </div>
                                </div>
                            </div> -->

                            <!-- EDIT MODAL -->
                            <div class="modal fade myel1-modal" id="addUserModal<?= $row['customer_id'] ?>" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                            <h4 class="text" id="addUserModalLabel"><b>EDIT CUSTOMER'S DETAILS</b></h4>
                                            <!-- <label for="text" class="text2">Write/Choose None if Unsure</label> -->

                                        </div>
                                        <div class="modal-body">
                                            <form action="../components/update_customers.php" method="POST">
                                                
                                                <h5 class="text5">Account Information</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" name="customer_fullname" value="<?= $row['customer_fullname'] ?>" style="height: 25px; width: 180px; font-size: 12px;" required>
                                                    </div>

                                                </div>                                       
                                                <div style="font-size: 10px; color: #262626;">pangbulag but this is not visible</div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Email Address</label>
                                                        <input type="text" class="form-control" name="customer_email" value="<?= $row['customer_email'] ?>" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Contact Number</label>
                                                        <input type="text" class="form-control" name="customer_contact" value="<?= $row['customer_contact'] ?>" style="height: 25px; width: 180px; font-size: 12px;" maxlength="11" required>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="customer_id" value="<?= $row['customer_id'] ?>">
                                                <button type="submit" class="button">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- DELETE MODAL  -->
                            <div class="modal fade" id="deleteUserModal<?= $row['customer_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="font-family: 'Oxanium';">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title"> DELETE CUSTOMER</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../components/delete_customers.php" method="POST">
                                                    <p> Are you sure you want to DELETE <?= htmlspecialchars($row['customer_fullname']) ?> as your CUSTOMER ?</p>
                                                    <input type="hidden" name="customer_id" value="<?= htmlspecialchars($row['customer_id']) ?>">
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                    <button type="button" class="btn btn-success" style="background-color: #262626 !important; border-color: #262626 !important;" data-dismiss="modal" aria-label="close">No</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php } ?>

                        </tbody>

                    </table>

                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>


        </div>


 <script>


                        // para dli na mo gawas ang error message nga duha ka search bar iya makita sa isa ka page 
                        $.fn.dataTable.ext.errMode = function(settings, helpPage, message) { 
                            console.log(" "); 
                        };



                        // $(document).ready(function () {
                        //     // Destroy DataTable if it already exists to avoid reinitialization error
                        //     if ($.fn.DataTable.isDataTable('#userTable')) {
                        //         $('#userTable').DataTable().destroy();
                        //     }

                        //     // Reinitialize DataTable
                        //     var table = $('#userTable').DataTable({
                        //         "paging": true,
                        //         "searching": false,  // Disable default DataTables search bar
                        //         "ordering": true,
                        //         "info": true
                        //     });

                        //     // Hide default DataTable search bar
                        //     $('.dataTables_filter').hide();
                        // });


                        $(document).ready(function () {
                // Destroy DataTable if it already exists to avoid reinitialization error
                if ($.fn.DataTable.isDataTable('#userTable')) {
                    $('#userTable').DataTable().destroy();
                }

                // Reinitialize DataTable with language customization
                var table = $('#userTable').DataTable({
                    pageLength: 5,  // Default rows per page
                    lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],  // Custom options: [Values to show], [Displayed text]
                    "paging": true,  // Enable pagination
                    "ordering": true, // Enable sorting
                    "info": true, // Enable "Showing X to Y of Z entries"
                    "searching": false, // Disable the default search bar
                    "language": {
                        "lengthMenu": "Display _MENU_ ", // Change "Show X entries"
                        "info": "Showing _END_ / _TOTAL_ total customers", // Change "Showing X to Y of Z entries"
                        "infoEmpty": "No customer/s available", // Message when no records
                        "infoFiltered": "(filtered from _MAX_ total customers)", // Change "filtered from Z total entries"
                        "paginate": {
                            "next": "Next >", // Change "Next"
                            "previous": "< Prev" // Change "Previous"
                        }
                    }
                });

                // Hide default DataTable search bar
                $('.dataTables_filter').hide();
            });

        // Suppress duplicate search bar error messages
        $.fn.dataTable.ext.errMode = function (settings, helpPage, message) {
            console.log(" ");
        };

    // maxlength sa type=number ky sa text ug pass ra mogana ang maxmin
    function limitLength(input, maxLength) {
        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }



 </script>
  