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
                            <th>PROD ID</th>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>CATEGORY</th>
                            <th>STOCK</th>
                            <th>UPDATED AT</th>
                            <!-- <th>Age</th>
                            <th>Purok</th>
                            <th>Status</th> -->
                            <th class="text-center">ADD QUANTITY</th>

                        </tr>

                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($allProductsResult)) { ?>

                            <tr>
                            <td>
                                <?= $row['product_id']; ?>
                            </td>
                            <td>
                                <img src="assets/images/<?= $row['product_category']; ?>/<?= $row['product_image']; ?>" 
                                    alt="<?= $row['product_image']; ?>" 
                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                            </td>
                            <td>
                                <?= $row['product_name']; ?>
                            </td>
                            <td>
                                <?= $row['product_category']; ?>
                            </td>
                            <td>
                                <?= $row['stock_quantity']; ?>
                            </td>
                            <td>
                                <?= $row['updated_at']; ?>
                            </td>

                            <td class="text-center">
                                <!-- <button class="btn btn-sm" style="background-color: #00441B; color: white;" data-toggle="modal"
                                data-target="#residentDetailsModal<?= $row['userid'] ?>"> View</button> -->


                                <!-- <button class="btn btn-act" data-toggle="modal"
                                data-target="#historyModal<?= $row['userid'] ?>"><i class="fas fa-history"></i></button> -->
                                
                                <!-- <button class="btn btn-act" style="margin: 0 10px;" data-toggle="modal"
                                data-target="#addUserModal<?= $row['supplier_id'] ?>"><i class="fas fa-credit-card"></i></button> -->

                                <form method="POST" action="../components/add_stock.php">
                                    <input type="hidden" name="product_id" value="<?= $row['product_id']; ?>">
                                    <input type="hidden" name="inventory_id" value="<?= $row['inventory_id']; ?>">

                                    <!-- Quantity Input -->
                                    <input type="number" name="added_quantity" id="quantityInput" value="0" min="0"
                                        class="btn btn-act" style="width: 55px; height: 1.8rem; font-size: 14px; padding: 0;">

                                    <!-- Add to Cart Button -->
                                    <button type="submit" class="btn btn-act" id="add-to-cart" style="font-size: 14px;">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>

                            </td>
                            </tr>

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
                    pageLength: 50,  // Default rows per page
                    lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],  // Custom options: [Values to show], [Displayed text]
                    "paging": true,  // Enable pagination
                    "ordering": true, // Enable sorting
                    "info": true, // Enable "Showing X to Y of Z entries"
                    "searching": false, // Disable the default search bar
                    "language": {
                        "lengthMenu": "Display _MENU_ ", // Change "Show X entries"
                        "info": "Showing _END_ / _TOTAL_ total products", // Change "Showing X to Y of Z entries"
                        "infoEmpty": "No supplier/s available", // Message when no records
                        "infoFiltered": "(filtered from _MAX_ total products)", // Change "filtered from Z total entries"
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
  