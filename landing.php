<?php
include "db_connect/db_connection.php";
// include('admin/includes/notification.php');
// include "operations/auth_process.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
        <!-- Bootstrap 4 CSS -->
        <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        />

        <title>McPARTS DEPOTS TORIL DAVAO CITY</title>
        <link rel="stylesheet" href="admin/overrider/LANDING.css">
    </head>
    <body>  
            <header>
                <div class="nav-container">

                    <nav>
                    <div class="links">
                    <div class="link"> <a href="#" id="nav-home">HOME</a></div>
                    <div class="link"> <a href="#" id="nav-explore">EXPLORE US</a></div>
                    <div class="link"> <a href="#" id="nav-about">ABOUT US</a></div>
                    <div class="link signin-btn"> <a href="#" id="nav-signin">LOG IN</a></div>
                    </div>
                    </nav>

                </div>
            </header>

            <section class="home" id="home">
                <!-- <div class="main-container">
                    <div class="content">
                        <img src="admin/assets/images/icons/logo.png" alt="logo"> <br> 
                        <i>Welcome to</i><br>
                        <b class="b1">Barangay Dimagiba</b> <br>
                        <b class="b2">Healthcare Center</b>
                        <div class="btn">
                            <button id="about-btn">About Us</button>
                        </div>
                    </div>       -->
                        <div class="signin-container" id="signin">
                                <div class="signin">
                                    <form action="operations/auth_process.php" method="POST">
                                        <!-- <h1>SIGN IN</h1> -->
                                        <h5 style="margin-left: 2vh; margion-top: 20px;">Enter Account Details</h5>
                                        <input type="text" name="staff_username" placeholder="Username">
                                        <input type="password" name="staff_password" placeholder="Password">
                                        <button type="submit" name="signin" >Log In</button>
                                    </form>
                                </div>
                        </div>
                </div>
            </section>
            <section class="what">
                <div>

                </div>
            </section>


            <section class="explore" id="explore">
                <div class="carousel1">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <!-- <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="admin/assets/images/CAROUSEL/PIC1.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="admin/assets/images/CAROUSEL/PIC2.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="admin/assets/images/CAROUSEL/PIC3.png" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="admin/assets/images/CAROUSEL/PIC4.png" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="admin/assets/images/CAROUSEL/PIC5.png" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="admin/assets/images/CAROUSEL/PIC6.png" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="admin/assets/images/CAROUSEL/PIC7.png" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="admin/assets/images/CAROUSEL/PIC8.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                </div>
                
                
            </section>

                <section class="about" id="about">
                <div></div>
                <!-- <div class="head-container">
                <h1 class="heading"> <span>About</span> Us</h1>

                <div class="row">
                    <div class="img-container">
                        <img src="admin/assets/images/icons/pic.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>How it was started?</h3>
                        <p>Barangay Dimagiba Health Care Center, located in Barangay Dimagiba, City of Yuem, 
                            is dedicated to providing accessible and quality healthcare to the community. Our health workers offers 
                            medical consultations, immunizations, maternal care, and health education to promote overall 
                            well-being. Committed to serving with compassion, we strive to ensure a healthier and safer 
                            Barangay Dimagiba.
                        </p>

                        <p>Together, let's build a stronger, healthier Barangay Dimagiba! </p>
                    </div>

                    </div>
                </div> -->
                
                
            </section>

            <!-- <section class="footer" id="contact">
                <div class="box-container">

                    <div class="box">
                        <h3>Quick links</h3>
                        <a href="#" id="footer-home"> Home</a>
                        <a href="#" id="footer-about"> About Us</a>
                        <a href="#" id="footer-contact"> Contact</a>
                        <a href="#" id="footer-signin"> Sign In</a>
                    </div>

                    <div class="box">
                        <h3>Location</h3>
                        <a href="#"> Barangay Dimagiba, City of Yuem <br> <br>Philippines, 8000</a>
                    </div>

                    <div class="box">
                        <h3>Contact Us</h3>
                        <a href="#"> 09123456789</a>
                        <a href="#">barangaydimagiba@gmail.com</a>
                    </div>
                </div>

                <div class="credit"> Created by: <span> Unsagane Group</span> | All Rights Reserved</div>
            </section> -->

            
            <script src="admin/js/script.js"></script>
           <!-- jQuery (required by Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js (for tooltips and popovers) -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            
    </body>




</html>