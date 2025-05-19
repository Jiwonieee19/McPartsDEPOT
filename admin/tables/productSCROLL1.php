<!-- /.row -->
<!-- Main row -->
 <div class="row" style="margin: 10px 0 0 0 !important;">
            <div class="col-md-8 right-div" style="margin-bottom: 2rem !important;">
    <nav class="nav custom-status">
  </nav>
</div>

    <!-- Left col -->
    <section class="col-lg-12">
        <!-- ENGINE COMPONENTS -->
        <div class="container mt-3">
             <h4 class="product-categ">ENGINE COMPONENTS</h4>

            <div class="row g-3">
                <?php while ($row = mysqli_fetch_assoc($pEngineResult)) { ?> 
                <div class="col-md-3">
                    <div class="card custom-card">
                        <img src="assets/images/ENGINE/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" class="product-image">
                        <div class="card-body product-card">
                            <div class="d-flex flex-row ms-2">
                                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                            </div>
                            <div class="d-flex flex-row ms-2">
                                <p class="product-price"><?php echo "₱" . $row['product_price'] ?></p>
                            </div>
                            <div class="d-flex flex-row ms-2">
                                <p class="product-price"><?php echo "Stock: " . $row['stock_quantity']; ?></p>
                            </div>

                           <div class="d-flex flex-row align-items-center ms-2 gap-2">
                                <form method="POST" action="../components/add_carts.php" class="d-flex flex-row align-items-center gap-2">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                    <input type="hidden" name="stock_quantity" value="<?php echo $row['stock_quantity']; ?>">
                                    <!-- Quantity Input -->
                                    <input type="number" name="quantity" id="quantityInput" value="1" min="1"
                                        class="btn btn-addcart" style="width: 55px; height: 1.8rem; font-size: 14px; padding: 0;">

                                    <!-- Add to Cart Button -->
                                    <button type="submit" class="btn btn-view" id="add-to-cart" style="font-size: 14px;">
                                        <i class="fas fa-shopping-cart">+</i>
                                    </button>

                                    <!-- View Button -->
                                    <button type="button" class="btn btn-view" data-bs-toggle="modal" data-bs-target="#productModal<?php echo $row['product_id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Modal -->
                    <div class="modal fade myel1-modal" id="productModal<?php echo $row['product_id']; ?>" tabindex="-1" aria-labelledby="productModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    <h4 class="text" id="productModalLabel1"><b><?php echo $row['product_name']; ?></b></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 d-flex justify-content-center align-items-center text-center">
                                            <img src="assets/images/<?php echo $row['product_category']; ?>/<?php echo $row['product_image']; ?>" alt="Product Name" class="view-product-image">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="text5">Price</h5>
                                            <p class="product-p"><?php echo "₱" . $row['product_price']; ?></p>
                                            <h5 class="text5">Category</h5>
                                            <p class="product-p"><?php echo $row['product_category']; ?></p>
                                            <h5 class="text5">Stock Available</h5>
                                            <p class="product-p"><?php echo $row['stock_quantity']; ?></p>
                                            <h5 class="text5">Description</h5>
                                            <p class="product-p"><?php echo $row['product_description']; ?></p>

                                            <!-- <form method="POST" action="">
                                                <input type="hidden" name="product_id" value="1">
                                                <button type="submit" class="btn btn-addcart" name="cart">
                                                <i class="fas fa-shopping-cart"> + Cart</i></button>
                                            </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- End Modal -->
                </div>
            </div>
        </div>

        <!-- IGNITION SYSTEM -->
        <div class="container mt-3">
             <h4 class="product-categ">IGNITION SYSTEM</h4>

            <div class="row g-3">
                <?php while ($row = mysqli_fetch_assoc($pIgnitionResult)) { ?> 
                <div class="col-md-3">
                    <div class="card custom-card">
                        <img src="assets/images/IGNITION/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" class="product-image">
                        <div class="card-body product-card">
                            <div class="d-flex flex-row ms-2">
                                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                            </div>
                            <div class="d-flex flex-row ms-2">
                                <p class="product-price"><?php echo "₱" . $row['product_price'] ?></p>
                            </div>
                            <div class="d-flex flex-row ms-2">
                                <p class="product-price"><?php echo "Stock: " . $row['stock_quantity']; ?></p>
                            </div>

                           <div class="d-flex flex-row align-items-center ms-2 gap-2">
                                <form method="POST" action="../components/add_carts.php" class="d-flex flex-row align-items-center gap-2">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                    <input type="hidden" name="stock_quantity" value="<?php echo $row['stock_quantity']; ?>">
                                    <!-- Quantity Input -->
                                    <input type="number" name="quantity" id="quantityInput" value="1" min="1"
                                        class="btn btn-addcart" style="width: 55px; height: 1.8rem; font-size: 14px; padding: 0;">

                                    <!-- Add to Cart Button -->
                                    <button type="submit" class="btn btn-view" id="add-to-cart" style="font-size: 14px;">
                                        <i class="fas fa-shopping-cart">+</i>
                                    </button>

                                    <!-- View Button -->
                                    <button type="button" class="btn btn-view" data-bs-toggle="modal" data-bs-target="#productModal<?php echo $row['product_id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Modal -->
                    <div class="modal fade myel1-modal" id="productModal<?php echo $row['product_id']; ?>" tabindex="-1" aria-labelledby="productModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    <h4 class="text" id="productModalLabel1"><b><?php echo $row['product_name']; ?></b></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 d-flex justify-content-center align-items-center text-center">
                                            <img src="assets/images/<?php echo $row['product_category']; ?>/<?php echo $row['product_image']; ?>" alt="Product Name" class="view-product-image">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="text5">Price</h5>
                                            <p class="product-p"><?php echo "₱" . $row['product_price']; ?></p>
                                            <h5 class="text5">Category</h5>
                                            <p class="product-p"><?php echo $row['product_category']; ?></p>
                                            <h5 class="text5">Stock Available</h5>
                                            <p class="product-p"><?php echo $row['stock_quantity']; ?></p>
                                            <h5 class="text5">Description</h5>
                                            <p class="product-p"><?php echo $row['product_description']; ?></p>

                                            <!-- <form method="POST" action="">
                                                <input type="hidden" name="product_id" value="1">
                                                <button type="submit" class="btn btn-addcart" name="cart">
                                                <i class="fas fa-shopping-cart"> + Cart</i></button>
                                            </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- End Modal -->
                </div>
            </div>
        </div>

        <!-- FUEL SYSTEM -->
        <div class="container mt-3">
             <h4 class="product-categ">FUEL SYSTEM</h4>

            <div class="row g-3">
                <?php while ($row = mysqli_fetch_assoc($pFuelResult)) { ?> 
                <div class="col-md-3">
                    <div class="card custom-card">
                        <img src="assets/images/FUEL/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" class="product-image">
                        <div class="card-body product-card">
                            <div class="d-flex flex-row ms-2">
                                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                            </div>
                            <div class="d-flex flex-row ms-2">
                                <p class="product-price"><?php echo "₱" . $row['product_price'] ?></p>
                            </div>
                            <div class="d-flex flex-row ms-2">
                                <p class="product-price"><?php echo "Stock: " . $row['stock_quantity']; ?></p>
                            </div>

                           <div class="d-flex flex-row align-items-center ms-2 gap-2">
                                <form method="POST" action="../components/add_carts.php" class="d-flex flex-row align-items-center gap-2">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                    <input type="hidden" name="stock_quantity" value="<?php echo $row['stock_quantity']; ?>">
                                    <!-- Quantity Input -->
                                    <input type="number" name="quantity" id="quantityInput" value="1" min="1"
                                        class="btn btn-addcart" style="width: 55px; height: 1.8rem; font-size: 14px; padding: 0;">

                                    <!-- Add to Cart Button -->
                                    <button type="submit" class="btn btn-view" id="add-to-cart" style="font-size: 14px;">
                                        <i class="fas fa-shopping-cart">+</i>
                                    </button>

                                    <!-- View Button -->
                                    <button type="button" class="btn btn-view" data-bs-toggle="modal" data-bs-target="#productModal<?php echo $row['product_id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Modal -->
                    <div class="modal fade myel1-modal" id="productModal<?php echo $row['product_id']; ?>" tabindex="-1" aria-labelledby="productModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    <h4 class="text" id="productModalLabel1"><b><?php echo $row['product_name']; ?></b></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 d-flex justify-content-center align-items-center text-center">
                                            <img src="assets/images/<?php echo $row['product_category']; ?>/<?php echo $row['product_image']; ?>" alt="Product Name" class="view-product-image">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="text5">Price</h5>
                                            <p class="product-p"><?php echo "₱" . $row['product_price']; ?></p>
                                            <h5 class="text5">Category</h5>
                                            <p class="product-p"><?php echo $row['product_category']; ?></p>
                                            <h5 class="text5">Stock Available</h5>
                                            <p class="product-p"><?php echo $row['stock_quantity']; ?></p>
                                            <h5 class="text5">Description</h5>
                                            <p class="product-p"><?php echo $row['product_description']; ?></p>

                                            <!-- <form method="POST" action="">
                                                <input type="hidden" name="product_id" value="1">
                                                <button type="submit" class="btn btn-addcart" name="cart">
                                                <i class="fas fa-shopping-cart"> + Cart</i></button>
                                            </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- End Modal -->
                </div>
            </div>
        </div>

    </section>
    
    
</div>

<!-- Bootstrap JS (Make sure it's loaded for modals to work) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                        "info": "Showing _END_ / _TOTAL_ total accounts", // Change "Showing X to Y of Z entries"
                        "infoEmpty": "No accounts available", // Message when no records
                        "infoFiltered": "(filtered from _MAX_ total accounts)", // Change "filtered from Z total entries"
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
  