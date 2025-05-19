<!-- Left col -->
    <section class="col-lg-12">
        <!-- PRODUCTS -->
        <div class="container mt-3">
             <h4 class="product-categ">PRODUCTS</h4>

            <div class="row g-3">
            <?php 
            $_SESSION['raw_amount'] = 0;
            while ($row = mysqli_fetch_assoc($cartItemsResult)) { ?> 
                <div class="col-md-3">
                    <div class="card custom-card">
                        <img src="assets/images/<?php echo $row['product_category']; ?>/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" class="product-image">
                        <div class="card-body product-card1">
                            <div class="d-flex flex-row ms-2">
                                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                            </div>
                            <div class="d-flex flex-row ms-2">
                                <p class="product-price">₱<?php echo $row['product_price']; ?></p>
                            </div>
                            <div class="d-flex flex-row ms-2">
                                <p class="product-price">Stock: <?php echo $row['stock_quantity']; ?></p>
                            </div>
                            <div class="d-flex flex-row ms-2">
                                <p class="product-price">Subtotal: <?php echo $row['subtotal']; ?></p>
                            </div>

                            <div class="d-flex flex-row align-items-center ms-2 gap-2">
                                <form method="POST" action="../components/add_cart_quantity.php" class="d-flex flex-row align-items-center gap-2">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                    <input type="hidden" name="stock_quantity" value="<?php echo $row['stock_quantity']; ?>">

                                    <!-- Quantity Input -->
                                    <input type="number" name="quantity" id="quantityInput" value="<?php echo $row['quantity']; ?>" min="1"
                                        class="btn btn-addcart" style="width: 55px; height: 1.8rem; font-size: 14px; padding: 0;">

                                    <!-- Add to Cart Button -->
                                    <button type="submit" class="btn btn-view" id="add-to-cart" style="font-size: 14px;">
                                        <i class="fas fa-check"></i>
                                    </button>

                                    <!-- View Button -->
                                    <button type="button" class="btn btn-view" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['product_id'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE MODAL  -->
                    <div class="modal fade" id="deleteModal<?= $row['product_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="font-family: 'Oxanium';">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title"> REMOVE PRODUCT</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../components/delete_cart_items.php" method="POST">
                                        <p> Are you sure you want to REMOVE <?= htmlspecialchars($row['product_name']) ?> as your PRODUCT ?</p>
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                        <button type="button" class="btn btn-success" style="background-color: #262626 !important; border-color: #262626 !important;" data-bs-dismiss="modal" aria-label="close">No</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $_SESSION['raw_amount'] = $_SESSION['raw_amount'] + $row['subtotal'];
                 } 
                 $_SESSION['tax'] = $_SESSION['raw_amount'] * 0.03;
                 $_SESSION['payment_total'] = $_SESSION['payment_total'] + $_SESSION['raw_amount'];
                 ?>
            </div>
        </div>

    </section>