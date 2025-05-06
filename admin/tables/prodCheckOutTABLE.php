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
                        <tr class="user-row" data-purok="<?= $row['purok']; ?>">
                            <th>CUS ID</th>
                            <th>FULLNAME</th>
                            <th>EMAIL</th>
                            <th>ACCOUNT CREATION</th>
                            <!-- <th>Age</th>
                            <th>Purok</th> -->
                            <!-- <th>Status</th> -->
                            <th class="text-center">PROCEED TO PAYMENT</th>

                        </tr>

                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                            <tr data-purok="<?= $row['purok']; ?>">
                            <td>
                                <?= $row['userid']; ?>
                            </td>
                            <td>
                                <?= $row['username']; ?>
                            </td>
                            <td>
                                <?= $row['firstname']; ?>
                            </td>
                            <td>
                                <?= $row['lastname']; ?>
                            </td>
                            <!-- <td>
                                <?= $row['age']; ?>
                            </td>
                            <td>
                                <?= $row['purok']; ?>
                            </td> -->
                            <td class="text-center">
                                <!-- <button class="btn btn-sm" style="background-color: #00441B; color: white;" data-toggle="modal"
                                data-target="#residentDetailsModal<?= $row['userid'] ?>"> View</button> -->


                                <!-- <button class="btn btn-act" data-toggle="modal"
                                data-target="#historyModal<?= $row['userid'] ?>"><i class="fas fa-history"></i></button> -->
                                
                                <button class="btn btn-act" style="margin: 0 10px;" data-toggle="modal"
                                data-target="#addUserModal<?= $row['userid'] ?>"><i class="fas fa-credit-card"></i></button>

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

                            <!-- PAYMENT MODAL -->
                            <div class="modal fade myel1-modal" id="addUserModal<?= $row['userid'] ?>" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="text" id="addUserModalLabel"><b>PROCESS PAYMENT</b></h4>
                                            <!-- <label for="text" class="text2">Write/Choose None if Unsure</label> -->

                                        </div>
                                        <div class="modal-body">
                                            <form action="../components/update_user.php" method="POST">
                                                
                                                <h5 class="text5">Customer's Information</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="firstname" value="<?= $row['firstname'] ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="middlename" value="<?= $row['lastname'] ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Account</label>
                                                        <input type="text" class="form-control" name="lastname" value="Customer" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="username" id="userid" value="<?= $row['username'] ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                    <div style="font-size: 10px; color: #2626262;">pangbulag but this is not visible</div>
                                                </div>                                       
                                                
                                                <h5 class="text5">Contact Information</h5>
                                                <div class="form-group row no-gutters">
                                                    <div class="col-md-4 style">
                                                        <label>Mobile Number</label>
                                                        <input type="number" class="form-control" name="mobile_number" value="<?= $row['mobile_number'] ?>" style="height: 25px; width: 180px; font-size: 12px;" oninput="limitLength(this, 11)" readonly>
                                                    </div>
                                                    <div class="col-md-4" style="margin-left:-60px">
                                                        <label>Email Address</label>
                                                        <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                </div>

                                                <h5 class="text5">Payment Details</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>TOTAL AMOUNT</label>
                                                        <input type="number" class="form-control" name="username" id="userid" value="<?= $row['username'] ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>PAID AMOUNT</label>
                                                        <input type="number" class="form-control" name="username" value="<?= $row['username'] ?>" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>CHANGE AMOUNT</label>
                                                        <input type="number" class="form-control" name="username" value="<?= $row['username'] ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                </div>


                                                <input type="hidden" name="userid" value="<?= $row['userid'] ?>">
                                                <button type="submit" class="button" style="max-width: 200px !important;">Complete Transaction</button>
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
  