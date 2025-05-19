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
                            <th>PRICE</th>
                            <th>CATEGORY</th>
                            <th>STOCK</th>
                            <!-- <th>Age</th>
                            <th>Purok</th> -->
                            <!-- <th>Status</th> -->
                            <th class="text-center">ACTION</th>

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
                                    alt="<?= $row['product_name']; ?>" 
                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                            </td>
                            <td>
                                <?= $row['product_name']; ?>
                            </td>
                            <td>
                                <?= $row['product_price']; ?>
                            </td>
                            <td>
                                <?= $row['product_category']; ?>
                            </td>
                            <td>
                                <?= $row['stock_quantity']; ?>
                            </td>

                            <td class="text-center">
                                <!-- <button class="btn btn-sm" style="background-color: #00441B; color: white;" data-toggle="modal"
                                data-target="#residentDetailsModal<?= $row['userid'] ?>"> View</button> -->


                                <!-- <button class="btn btn-act" data-toggle="modal"
                                data-target="#historyModal<?= $row['userid'] ?>"><i class="fas fa-history"></i></button> -->
                                
                                <button class="btn btn-act" data-toggle="modal" data-target="#updateModal<?= $row['product_id']; ?>"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-dlt" data-toggle="modal" data-target="#deleteModal<?= $row['product_id']; ?>"><i class="fas fa-trash"></i></button>

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


<!-- UPDATE PRODUCT MODAL -->
        <div class="modal fade myel-modal" style="text-align: left;" id="updateModal<?= $row['product_id']; ?>" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="container myel-modal">
                            <!-- Header -->
                    <div class="modal-header">
                            <h4 class="modal-title"><b>UPDATE PRODUCT</b></h4>
                        </div>

                        <form action="../components/update_products.php" method="POST" enctype="multipart/form-data">
                            <!-- Profile Picture -->
                            <div class="text-center" style="margin: 0 6.5rem;">
                                <img src="assets/images/<?= $row['product_category']; ?>/<?= $row['product_image']; ?>"
                                alt="Profile Picture" class="product-img mb-3">
                                <input type="file" class="form-control mt-2" name="product_image" value="<?= $row['product_image']; ?>">
                            </div>

                            <!-- User ID (Read-Only) -->
                            <!-- <div class="form-group" style="margin: 0.8rem 6.5rem 0 6.5rem;">
                                <label><strong>PRODUCT ID</strong></label>
                                <input type="number" class="form-control" name="userid" value="<?= $_SESSION['userid']; ?>" style="background-color: #383838;" readonly>
                            </div> -->

                
                            <div class="row" style="margin: 0.8rem 6rem 0 6rem;">
                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" name="product_id" value="<?= $row['product_id']; ?>">
                                    <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($row['product_image']); ?>">
                                    <label><strong>PRODUCT NAME</strong></label>
                                    <input type="text" class="form-control" name="product_name" value="<?= $row['product_name']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="category"><strong>CATEGORY</strong></label>
                                    <select id="category" name="product_category" class="form-control" style="height: 30px; width: 180px; font-size: 12px;">
                                        <option value="Others" <?= ($row['product_category'] == 'Others') ? 'selected' : '' ?>>Other</option>
                                        <option value="Engine Components" <?= ($row['product_category'] == 'Engine Components') ? 'selected' : '' ?>>Engine Component</option>
                                        <option value="Ignition System" <?= ($row['product_category'] == 'Ignition System') ? 'selected' : '' ?>>Ignition System</option>
                                        <option value="Fuel System" <?= ($row['product_category'] == 'Fuel System') ? 'selected' : '' ?>>Fuel System</option>
                                        <option value="Brake System" <?= ($row['product_category'] == 'Brake System') ? 'selected' : '' ?>>Brake System</option>
                                        <option value="Exhaust and Filter" <?= ($row['product_category'] == 'Exhaust and Filter') ? 'selected' : '' ?>>Exhaust & Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row" style="margin: 0.8rem 6rem 0 6rem;">
                                <div class="col-md-6">
                                    <label><strong>PRICE</strong></label>
                                    <input type="text" class="form-control" name="product_price" value="<?= $row['product_price']; ?>">
                                </div>
                                <div class="col-md-6" style="padding-right: 5.6rem !important;">
                                    <label><strong>QUANTITY</strong></label>
                                    <input type="text" class="form-control" name="stock_quantity" value="<?= $row['stock_quantity']; ?>" readonly>
                                </div>
                  </div>
                  
                  <div class="form-group" style="margin: 0.8rem 6.5rem 0 6.5rem;">
                      <label><strong>DESCRIPTION</strong></label>
                      <input type="text" class="form-control" name="product_description" value="<?= $row['product_description']; ?>">
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
                      <button type="submit" class="btn btn-success" style="margin-top: 1.8rem;">Update Now</button>
                  </div>
              </form>
          </div>

      </div>

      

    </div>
</div>  

                            <!-- DELETE MODAL  -->
                            <div class="modal fade" id="deleteModal<?= $row['product_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="font-family: 'Oxanium';">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title"> DELETE PRODUCT</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../components/delete_products.php" method="POST">
                                                    <p> Are you sure you want to DELETE <?= htmlspecialchars($row['product_name']) ?> as your PRODUCT ?</p>
                                                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($row['product_id']) ?>">
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
                        "info": "Showing _END_ / _TOTAL_ total products", // Change "Showing X to Y of Z entries"
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
  