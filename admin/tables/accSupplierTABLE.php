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
                            <th>SUP ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL</th>
                            <th>CONTACT</th>
                            <th>CREATED AT</th>
                            <!-- <th>Age</th>
                            <th>Purok</th> -->
                            <!-- <th>Status</th> -->
                            <th class="text-center">ACTION</th>

                        </tr>

                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($suppliersResult)) { ?>

                            <tr>
                            <td>
                                <?= $row['supplier_id']; ?>
                            </td>
                            <td>
                                <?= $row['supplier_fullname']; ?>
                            </td>
                            <td>
                                <?= $row['supplier_email']; ?>
                            </td>
                            <td>
                                <?= $row['supplier_contact']; ?>
                            </td>
                            <td>
                                <?= $row['created_at']; ?>
                            </td>

                            <td class="text-center">                               
                                <button class="btn btn-act" style="margin: 0 10px;" data-toggle="modal"
                                data-target="#addUserModal<?= $row['supplier_id'] ?>"><i class="fas fa-pen"></i></button>

                                <button class="btn btn-dlt" data-toggle="modal"
                                data-target="#deleteUserModal<?= $row['supplier_id'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                            </tr>


                            <!-- EDIT MODAL -->
                            <div class="modal fade myel1-modal" id="addUserModal<?= $row['supplier_id'] ?>" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="text" id="addUserModalLabel"><b>EDIT SUPPLIER'S DETAILS</b></h4>
                                            <!-- <label for="text" class="text2">Write/Choose None if Unsure</label> -->

                                        </div>
                                        <div class="modal-body">
                                            <form action="../components/update_suppliers.php" method="POST">
                                                
                                                <h5 class="text5">Account Information</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" name="supplier_fullname" value="<?= $row['supplier_fullname'] ?>" style="height: 25px; width: 180px; font-size: 12px;" required>
                                                    </div>

                                                </div>                                       
                                                <div style="font-size: 10px; color: #262626;">pangbulag but this is not visible</div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Email Address</label>
                                                        <input type="text" class="form-control" name="supplier_email" value="<?= $row['supplier_email'] ?>" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Contact Number</label>
                                                        <input type="text" class="form-control" name="supplier_contact" value="<?= $row['supplier_contact'] ?>" style="height: 25px; width: 180px; font-size: 12px;" maxlength="11" required>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="supplier_id" value="<?= $row['supplier_id'] ?>">
                                                <button type="submit" class="button">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- DELETE MODAL  -->
                            <div class="modal fade" id="deleteUserModal<?= $row['supplier_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="font-family: 'Oxanium';">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title"> DELETE SUPPLIER</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../components/delete_suppliers.php" method="POST">
                                                    <p> Are you sure you want to DELETE <?= htmlspecialchars($row['supplier_fullname']) ?> as your SUPPLIER ?</p>
                                                    <input type="hidden" name="supplier_id" value="<?= htmlspecialchars($row['supplier_id']) ?>">
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
                        "info": "Showing _END_ / _TOTAL_ total suppliers", // Change "Showing X to Y of Z entries"
                        "infoEmpty": "No supplier/s available", // Message when no records
                        "infoFiltered": "(filtered from _MAX_ total suppliers)", // Change "filtered from Z total entries"
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
  