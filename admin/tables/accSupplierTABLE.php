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
                            <th>SUP ID</th>
                            <th>FULLNAME</th>
                            <th>EMAIL</th>
                            <th>ACCOUNT CREATION</th>
                            <!-- <th>Age</th>
                            <th>Purok</th> -->
                            <!-- <th>Status</th> -->
                            <th class="text-center">ACTION</th>

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
                                data-target="#addUserModal<?= $row['userid'] ?>"><i class="fas fa-pen"></i></button>

                                <button class="btn btn-dlt" data-toggle="modal"
                                data-target="#deleteUserModal<?= $row['userid'] ?>"><i class="fas fa-trash"></i></button>
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
                            <div class="modal fade myel1-modal" id="addUserModal<?= $row['userid'] ?>" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
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
                                            <form action="../components/update_user.php" method="POST">
                                                
                                                <h5 class="text5">Account Information</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="username" id="userid" value="<?= $row['username'] ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="password" value="<?= $row['password'] ?>" style="height: 25px; width: 180px; font-size: 12px;" readonly>
                                                    </div>
                                                    <!-- NEED ATENSYON LATUR  -->
                                                    <!-- <div class="col-md-3">
                                                        <label>Verify Password</label>
                                                        <input type="password" class="form-control" name="confirm_password" value="" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div> -->
                                                </div>
                                                
                                                <h5 class="text5">Personal Information</h5>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="firstname" value="<?= $row['firstname'] ?>" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Middle Name (Optional)</label>
                                                        <input type="text" class="form-control" name="middlename" value="<?= $row['middlename'] ?>" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="lastname" value="<?= $row['lastname'] ?>" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Suffix</label>
                                                        <select class="form-control" name="suffix" style="height: 25px; width: 150px; font-size: 10px;">
                                                            <option value="<?= $row['suffix'] ?>" style="font-size: 2px;"><?= $row['suffix'] ?></option>
                                                            <option value="none" style="font-size: 12px;">none</option>
                                                            <option value="Jr." style="font-size: 12px;">Jr.</option>
                                                            <option value="Sr." style="font-size: 12px;">Sr.</option>
                                                            <option value="III" style="font-size: 12px;">III</option>


                                                        </select>
                                                    </div>
                                                    <div style="font-size: 10px; color: #2626262;">pangbulag but this is not visible</div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender" style="height: 25px; width: 180px; font-size: 10px;">
                                                            <option value="<?= $row['gender'] ?>"><?= $row['gender'] ?></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>


                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label>Civil Status</label>
                                                        <select class="form-control" name="civil_status" style="height: 25px; width: 180px; font-size: 10px;">
                                                            <option value="<?= $row['civil_status'] ?>"><?= $row['civil_status'] ?></option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label>Birthdate</label>
                                                        <input type="date" class="form-control" name="birthdate" value="<?= $row['birthdate'] ?>" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                          
                                                    <div class="col-md-3">
                                                        <label>Age</label>
                                                        <input type="number" class="form-control" name="age" value="<?= $row['age'] ?>" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
 
                                                </div>                                          
                                                
                                                <h5 class="text5">Contact Information</h5>
                                                <div class="form-group row no-gutters">
                                                    <div class="col-md-4 style">
                                                        <label>Mobile Number</label>
                                                        <input type="number" class="form-control" name="mobile_number" value="<?= $row['mobile_number'] ?>" style="height: 25px; width: 180px; font-size: 12px;" oninput="limitLength(this, 11)">
                                                    </div>
                                                    <div class="col-md-4" style="margin-left:-60px">
                                                        <label>Email Address</label>
                                                        <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" style="height: 25px; width: 180px; font-size: 12px;">
                                                    </div>
                                                </div>


                                                <input type="hidden" name="userid" value="<?= $row['userid'] ?>">
                                                <button type="submit" class="button">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- DELETE MODAL  -->
                            <div class="modal fade" id="deleteUserModal<?= $row['userid'] ?>" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="font-family: 'Oxanium';">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title"> DELETE CUSTOMER</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../components/delete_users.php" method="POST">
                                                    <p> Are you sure you want to DELETE <?= htmlspecialchars($row['firstname']) ?> <?= htmlspecialchars($row['lastname']) ?> as your CUSTOMER ?</p>
                                                    <input type="hidden" name="userid" value="<?= htmlspecialchars($row['userid']) ?>">
                                                    <button type="submit" class="btn btn-danger">Yes</button>
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
  