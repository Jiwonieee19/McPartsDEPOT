<?php
include "db_connect/db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>DRAFT</title>
    <link rel="stylesheet" href="admin/overrider/style4.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
        }

        section.vh-100 {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .h-custom {
            height: 100%;
        }

        .container-fluid {
            max-width: 1200px;
            padding: 0 15px;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .col-md-9 img {
            width: 100%;
            max-width: 100%;
            object-fit: cover;
        }

        .form-outline {
            margin-bottom: 20px;
        }

        .form-outline input,
        .form-outline label {
            width: 100%;
            padding: 12px;
            font-size: 16px;
        }

        .form-outline input {
            background-color: #f4f6f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
        }

        .form-outline label {
            font-size: 14px;
            color: #555;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 12px 30px;
            border-radius: 5px;
            width: 100%;
            border: none;
            font-size: 18px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .divider {
            margin: 20px 0;
            display: flex;
            align-items: center;
        }

        .divider p {
            margin: 0;
        }

        .divider:before,
        .divider:after {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .divider p {
            padding: 0 10px;
        }

        .text-center {
            text-align: center;
        }

        .text-body {
            color: #007bff;
            text-decoration: none;
        }

        .text-body:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .col-md-9,
            .col-md-8 {
                width: 100%;
                padding: 15px;
            }
        }

        .footer {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .footer .social-icons a {
            color: white;
            margin: 0 15px;
            font-size: 18px;
        }

        .footer .social-icons a:hover {
            color: #ccc;
        }

    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" alt="Login Image"> -->
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="operations/auth_process.php" method="POST">
                        <!-- Sign-in with social media -->
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-4">
                            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" required>
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" required>
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <!-- Remember me checkbox and Forgot password link -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3">
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>

                        <!-- Login button -->
                        <div class="text-center text-lg-start">
                            <button type="submit" name="signin" class="btn btn-primary btn-lg">Login</button>
                        </div>

                        <!-- Register Link -->
                        <p class="small fw-bold mt-2 pt-1 mb-0 text-center">Don't have an account? <a href="#!" class="link-danger">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <div class="footer">
        <p>Copyright © 2020. All rights reserved.</p>
        <div class="social-icons">
            <a href="#!" class="text-white"><i class="fab fa-facebook-f"></i></a>
            <a href="#!" class="text-white"><i class="fab fa-twitter"></i></a>
            <a href="#!" class="text-white"><i class="fab fa-google"></i></a>
            <a href="#!" class="text-white"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>

</body>

</html>
