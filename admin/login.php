<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
{
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT ID FROM tbladmin WHERE UserName='$adminuser' AND Password='$password'");
    $ret = mysqli_fetch_array($query);
    
    if($ret > 0){
        $_SESSION['vpmsaid'] = $ret['ID'];
        header('location:dashboard.php');
    }
    else{
        echo "<script>alert('Invalid Details.');</script>";
    }
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Digital Parking Management System - Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login-style.css">
    <!-- Add other necessary stylesheets here -->
</head>

<body class="bg-dark">
    <!-- Video Background -->
    <video autoplay muted loop id="loginVideo">
        <source src="../car.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <h2 class="text-center text-white">Vehicle Parking Management System</h2>
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label for="username" class="text-white">User Name</label>
                            <input class="form-control" type="text" id="username" placeholder="Enter your username" required="true" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required="true">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-success btn-block">Sign in</button>
                        </div>
                        <!--<div class="form-group text-center">
                            <a href="forgot-password.php" class="text-white">Forgotten Password?</a>
                        </div>-->
                        <div class="form-group text-center">
                            <a href="../index.php" class="text-white">Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <style>
        #loginVideo {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .sufee-login {
            position: relative;
            z-index: 1;
        }
    </style>
</body>

</html>
