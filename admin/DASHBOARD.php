<?php
session_start();
// Redirect to login if no session found
if (!isset($_SESSION['staff_username']) && !isset($_SESSION['staff_password'])) {
  header("Location: ../landing.php");
  exit();
}

include('includes/footer.php');
include('includes/header.php');
include('includes/sidebar.php');
include('includes/top-navbar.php');
include('../components/fetch_users.php');
// include('../components/Ufetch_appointTABLE.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 header-custom">DASHBOARD OVERVIEW</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content10">
    <div class="container-fluid">
      
    <?php 
    include('includes/notification.php');
    ?>

      <div class="row">
        <div class="col-lg-3 col-12">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
            <h3><?= $totalApproved; ?><sup style="font-size: 20px"></sup></h3>

              <p>Transactions</p>
            </div>
            <div class="icon">             
              <i class="ion ion-cash"></i>
            <a href="#" class="small-box-footer"><i class=""></i></a>
            </div>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-12">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3><?= $totalUsers; ?><sup style="font-size: 20px"></sup></h3>

              <p>Accounts</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer"><i class=""></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-12">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>18</h3>

              <p>Staffs</p>
            </div>
            <div class="icon">
              <i class="ion ion-wrench"></i>
            </div>
            <a href="#" class="small-box-footer"><i class=""></i></a>
          </div>
        </div>

        <!-- ./col TIME VER2 -->
        <div class="col-lg-3 col-12">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
            <h3 class="liveClock" class="display-4"></h3>

            <p>Current Time</p>
            </div>
            <!-- <div class="icon">
              <i class="fas fa-clock"></i>
            </div> -->
            <a href="#" class="small-box-footer"><i class=""></i></a>
          </div>
        </div>



        <!-- APPOINTMENT DATA -->
        <div class="col-lg-6 col-12">
            <!-- Small Box -->
            <div class="small-box row2 medication-box">
                
                <!-- Header Section -->
                <div class="medication-header">
                    <div class="medication-icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <div class="medication-inner">
                        <p class="header-p">LATEST TRANSACTIONS DATA</p>
                    </div>
                </div>

                <div class="card-body medication-card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg">185</span>
                            <span>Transactions Over the Week</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-danger">
                                <i class="fas fa-arrow-down"></i> 12.1%
                            </span>
                            <span class="text-muted" style="color: #262626 !important;">Since Yesterday</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                        <canvas id="medication-sales-chart" height="300" width="528" 
                                style="display: block; height: 200px; width: 352px;" 
                                class="chartjs-render-monitor">
                        </canvas>
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                            <i style="color: #262626;"></i> Visit HISTORY for more
                        </span>
                        <!-- <span>
                            <i class="fas fa-square" style="color: #8D4373;"></i> SELLER
                        </span> -->
                    </div>
                </div>
            </div>
        </div>




      <!-- PIECHART -->
      <div class="col-lg-6 col-12">
        <!-- small box -->
        <div class="small-box row2">
    
         <!-- Top: Gender and Icon -->
          <div class="header-section">
            <div class="inner">
              <p class="header-p">STATS for the DAY</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>              
            </div>
          </div>

          <!-- Bottom: Chart -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="chart-responsive">
                  <canvas id="pieChart" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <div class="col-md-4" style="margin-top: 5.5rem !important;">
                <ul id="chartData" class="chart-legend clearfix" style="font-size: 1rem;">
                  <!-- <li data-label="MALE 60 UP" data-value="<?= $maleSenior?>" data-color="#01485D">
                    <i class="bi bi-square-fill" style="color:#01485D;"></i style="color:#00441B;"> 
                    <span style="color: #00441B;">MALE SENIOR</span>
                  </li> -->
                  <li data-label="CUSTOMER" data-value="<?= $maleAdult?>" data-color="#3C788A">
                    <!-- <i class="bi bi-square-fill" style="color:#3C788A;"></i>  -->
                    <span style="color: #262626; text-align: justify; display: block; font-weight: 400;">Today’s transaction activity, showcasing real-time data on both customer and supplier to keep you updated at a glance.</span>

                  </li>
                  <!-- <li data-label="MALE 1 - 17" data-value="<?= $maleKid?>" data-color="#A7BAC0">
                    <i class="bi bi-square-fill" style="color:#A7BAC0;"></i>
                    <span style="color: #00441B;">MALE KID</span>
                  </li>
                  <li data-label="FEMALE 60 UP" data-value="<?= $femaleSenior?>" data-color="#5A013B">
                    <i class="bi bi-square-fill" style="color:#5A013B;"></i>
                    <span style="color: #00441B;">FEMALE SENIOR</span>
                  </li> -->
                  <li data-label="SUPPLIER" data-value="<?= $femaleAdult?>" data-color="#8D4373">
                    <!-- <i class="bi bi-square-fill" style="color:#8D4373;"></i>  -->
                    <!-- <span style="color: #262626;"></span> -->
                  </li>
                  <!-- <li data-label="FEMALE 1 - 17" data-value="<?= $femaleKid?>" data-color="#BFA5B6">
                    <i class="bi bi-square-fill" style="color:#BFA5B6;"></i> 
                    <span style="color: #00441B;">FEMALE KID</span>
                  </li> -->
                </ul>
              </div>
            </div>
          </div>


          </div>
                    <!-- calendar-container -->
                    <div class="card" style="background-color: #7B7B7B; color: #262626;">
                    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title" style="margin-top: 7px !important; font-weight: 700 !important; color: #262626 !important;">
                            <i class="far fa-calendar-alt" style="margin-right: 7px;"></i>CALENDAR
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm dropdown-toggle" style="background-color: #7B7B7B; color: #262626;" data-toggle="dropdown" data-offset="-52">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a href="#" class="dropdown-item">Add new event</a>
                                    <a href="#" class="dropdown-item">Clear events</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">View calendar</a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm" style="background-color: #7B7B7B; color: #262626;" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-sm" style="background-color: white; color: #00441B;" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button> -->
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="">
                    <!-- calendar-container -->
                        <!-- The calendar -->
                      <div id="calendar"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">March 2025</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="02/23/2025" class="day old weekend">23</td><td data-action="selectDay" data-day="02/24/2025" class="day old">24</td><td data-action="selectDay" data-day="02/25/2025" class="day old">25</td><td data-action="selectDay" data-day="02/26/2025" class="day old">26</td><td data-action="selectDay" data-day="02/27/2025" class="day old">27</td><td data-action="selectDay" data-day="02/28/2025" class="day old">28</td><td data-action="selectDay" data-day="03/01/2025" class="day weekend">1</td></tr><tr><td data-action="selectDay" data-day="03/02/2025" class="day weekend">2</td><td data-action="selectDay" data-day="03/03/2025" class="day">3</td><td data-action="selectDay" data-day="03/04/2025" class="day">4</td><td data-action="selectDay" data-day="03/05/2025" class="day">5</td><td data-action="selectDay" data-day="03/06/2025" class="day active today">6</td><td data-action="selectDay" data-day="03/07/2025" class="day">7</td><td data-action="selectDay" data-day="03/08/2025" class="day weekend">8</td></tr><tr><td data-action="selectDay" data-day="03/09/2025" class="day weekend">9</td><td data-action="selectDay" data-day="03/10/2025" class="day">10</td><td data-action="selectDay" data-day="03/11/2025" class="day">11</td><td data-action="selectDay" data-day="03/12/2025" class="day">12</td><td data-action="selectDay" data-day="03/13/2025" class="day">13</td><td data-action="selectDay" data-day="03/14/2025" class="day">14</td><td data-action="selectDay" data-day="03/15/2025" class="day weekend">15</td></tr><tr><td data-action="selectDay" data-day="03/16/2025" class="day weekend">16</td><td data-action="selectDay" data-day="03/17/2025" class="day">17</td><td data-action="selectDay" data-day="03/18/2025" class="day">18</td><td data-action="selectDay" data-day="03/19/2025" class="day">19</td><td data-action="selectDay" data-day="03/20/2025" class="day">20</td><td data-action="selectDay" data-day="03/21/2025" class="day">21</td><td data-action="selectDay" data-day="03/22/2025" class="day weekend">22</td></tr><tr><td data-action="selectDay" data-day="03/23/2025" class="day weekend">23</td><td data-action="selectDay" data-day="03/24/2025" class="day">24</td><td data-action="selectDay" data-day="03/25/2025" class="day">25</td><td data-action="selectDay" data-day="03/26/2025" class="day">26</td><td data-action="selectDay" data-day="03/27/2025" class="day">27</td><td data-action="selectDay" data-day="03/28/2025" class="day">28</td><td data-action="selectDay" data-day="03/29/2025" class="day weekend">29</td></tr><tr><td data-action="selectDay" data-day="03/30/2025" class="day weekend">30</td><td data-action="selectDay" data-day="03/31/2025" class="day">31</td><td data-action="selectDay" data-day="04/01/2025" class="day new">1</td><td data-action="selectDay" data-day="04/02/2025" class="day new">2</td><td data-action="selectDay" data-day="04/03/2025" class="day new">3</td><td data-action="selectDay" data-day="04/04/2025" class="day new">4</td><td data-action="selectDay" data-day="04/05/2025" class="day new weekend">5</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2025</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month active">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year active">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>

                    </div>
                    <!-- /.card-body -->
                </div>


        </div>
      </div>



    </div>
  </section>
</div>


<!-- SCRIPT FOR PIE GRAPH GENDER -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Get all list items inside the <ul>
    const listItems = document.querySelectorAll("#chartData li");

    // Extract labels, values, and background colors
    const labels = [];
    const values = [];
    const backgroundColors = [];
    const borderColors = [];  // Add this for border colors

    listItems.forEach(item => {
      labels.push(item.getAttribute("data-label")); // Get label
      values.push(parseInt(item.getAttribute("data-value"))); // Get value
      backgroundColors.push(item.getAttribute("data-color")); // Get color
      borderColors.push("#262626"); // Set border color for each segment (white in this example)
    });

    // Get the canvas element
    var ctx = document.getElementById("pieChart").getContext("2d");

    // Create the Pie Chart with dynamic data
    var pieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels, // Dynamic labels
        datasets: [{
          data: values, // Dynamic values
          backgroundColor: backgroundColors, // Dynamic colors
          borderColor: borderColors, // Set border color here
          borderWidth: 2 // Optional: Customize border width
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
          legend: {
            labels: {
              color: '#262626', // Set the color of the labels here
              font: {
                size: 14, // Optional: Customize font size
                family: 'Arial', // Optional: Customize font family
                weight: '400' // Optional: Customize font weight
              }
            }
          }
        }
      }
    });
  });
</script>

<!-- BAR GRAPH MONTHLY STATISTICS JS -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("medication-sales-chart").getContext("2d");

    var salesChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: ['WED', 'THUR', 'FRI', 'SAT', 'SUN', 'MON', 'TUE'],
            datasets: [
                {
                    label: 'CUSTOMER',
                    backgroundColor: '#3C788A', 
                    borderColor: '#262626',
                    borderWidth: 1,
                    data: [19, 12, 7, 24, 0, 15, 18]
                },
                {
                    label: 'SUPPLIER',
                    backgroundColor: '#8D4373', 
                    borderColor: '#262626',
                    borderWidth: 1,
                    data: [8, 22, 15, 16, 0, 13, 16]
                }
            ]
        },

        
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000,
                easing: 'easeInOutQuart',
                onComplete: function () {
                    console.log("Chart animation completed!");
                }
            },
            scales: {
              x: {
                    ticks: {
                        color: '#262626', // <-- This will color WED, THUR, FRI...
                        font: {
                            size: 13,
                            weight: 'bold'
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    min: 0, // Ensure the Y-axis starts at 0
                    max: 25, // 👈 Set this based on your highest value
                      ticks: {
                        color: '#262626', // <-- This will color WED, THUR, FRI...
                          stepSize: 5,
                          callback: function (value) {
                              return value / 1; 
                          }
                      }
                }
              },
                  plugins: {
                      legend: {
                          labels: {
                              color: '#262626', // ⬅ Legend label color
                              font: {
                                  size: 14
                              }
                          }
                      }
                  }


        }
    });
});

function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12 || 12; // Convert to 12-hour format

    // Add leading zeros
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    var timeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

    // Select all elements with class "liveClock" and update them
    document.querySelectorAll('.liveClock').forEach(function(el) {
        el.innerText = timeString;
    });
}

// Update every second
setInterval(updateClock, 1000);
updateClock(); // Run immediately on load

// CALENDAR MINIMIZE AND MAXIMIZE 
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.querySelector('[data-card-widget="collapse"]');
    const cardBody = toggleButton.closest(".card").querySelector(".card-body, .card > div:not(.card-header)");

    // Minimize on load
    cardBody.style.display = "none"; 
    toggleButton.innerHTML = '<i class="fas fa-plus"></i>'; // Set icon to plus initially

    toggleButton.addEventListener("click", function () {
        if (cardBody.style.display === "none") {
            cardBody.style.display = "block"; // Maximize
            toggleButton.innerHTML = '<i class="fas fa-minus"></i>'; // Change icon
        } else {
            cardBody.style.display = "none"; // Minimize
            toggleButton.innerHTML = '<i class="fas fa-plus"></i>'; // Change icon
        }
    });
});



</script>

