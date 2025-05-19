
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
                            <th>CUS ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL</th>
                            <th>CONTACT</th>
                            <th>CREATED AT</th>
                            <!-- <th>Age</th>
                            <th>Purok</th> -->
                            <!-- <th>Status</th> -->
                            <th class="text-center">PROCEED</th>

                        </tr>

                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($customersResult)) { ?>

                            <tr>
                            <td>
                                <?= $row['customer_id']; ?>
                            </td>
                            <td>
                                <?= $row['customer_fullname']; ?>
                            </td>
                            <td>
                                <?= $row['customer_email']; ?>
                            </td>
                            <td>
                                <?= $row['customer_contact']; ?>
                            </td>
                            <td>
                                <?= $row['created_at']; ?>
                            </td>

                            <td class="text-center">
                                <!-- <button class="btn btn-sm" style="background-color: #00441B; color: white;" data-toggle="modal"
                                data-target="#residentDetailsModal<?= $row['userid'] ?>"> View</button> -->

                                <!-- <button class="btn btn-act" data-toggle="modal"
                                data-target="#historyModal<?= $row['userid'] ?>"><i class="fas fa-history"></i></button> -->
                                <form method="POST" action="PRODUCTS1.php" style="display:inline;">
                                    <input type="hidden" name="customer_id" value="<?= $row['customer_id'] ?>">
                                    <input type="hidden" name="customer_fullname" value="<?= htmlspecialchars($row['customer_fullname']) ?>">
                                    <input type="hidden" name="customer_email" value="<?= htmlspecialchars($row['customer_email']) ?>">
                                    <input type="hidden" name="customer_contact" value="<?= htmlspecialchars($row['customer_contact']) ?>">
                                    <button type="submit" class="btn btn-act" style="margin: 0 10px;">
                                        <i class="fas fa-credit-card"></i>
                                    </button>
                                </form>

                            </td>
                            </tr>


                        <?php } ?>

                        <!-- <?php while ($row = mysqli_fetch_assoc($cartResult)) {
                            $_SESSION['cart_id'] = $row['cart_id'];
                        }?> -->
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
  