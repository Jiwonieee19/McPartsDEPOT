      <!-- /.row -->
      <!-- Main row -->
      <div class="row" style="margin: 4rem 1.5rem 0 1.5rem !important;">
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

                    <style>
                        .horizontal-scroll {
                            display: flex;
                            overflow-x: auto;
                            scroll-behavior: smooth;
                            gap: 1rem;
                            padding: 1rem;
                            white-space: nowrap;
                            }

                            .item {
                            min-width: 200px;
                            height: 150px;
                            background-color: #3498db;
                            color: white;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 1.5rem;
                            border-radius: 10px;
                            flex-shrink: 0;
                            }

                            .cat-header{                                
                            font-family: 'Oxanium';
                            color: #383838 !important;
                            margin-top: 1rem !important;
                            }

                    </style>

                    
                        <h4 class="cat-header">ENGINE COMPONENTS</h4>

                    <div class="horizontal-scroll">
                        <div class="item">Item 1</div>
                        <div class="item">Item 2</div>
                        <div class="item">Item 3</div>
                        <div class="item">Item 4</div>
                        <div class="item">Item 5</div>
                        <div class="item">Item 6</div>
                        <div class="item">Item 7</div>
                    </div>

                    <h4 class="cat-header">TRANSMISSION & DRIVETRAIN</h4>

                    <div class="horizontal-scroll">
                        <div class="item">Item 1</div>
                        <div class="item">Item 2</div>
                        <div class="item">Item 3</div>
                        <div class="item">Item 4</div>
                        <div class="item">Item 5</div>
                        <div class="item">Item 6</div>
                        <div class="item">Item 7</div>
                    </div>

                    <h4 class="cat-header">FUEL SYSTEM</h4>

                    <div class="horizontal-scroll">
                        <div class="item">Item 1</div>
                        <div class="item">Item 2</div>
                        <div class="item">Item 3</div>
                        <div class="item">Item 4</div>
                        <div class="item">Item 5</div>
                        <div class="item">Item 6</div>
                        <div class="item">Item 7</div>
                    </div>
                    
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
  