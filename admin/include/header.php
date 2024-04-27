<?php
session_start();
$user = $_SESSION['srk'];
if ($user == true) {
} else {
    header("location:adminlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!----===== Font Awesome CSS ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Admin Dashboard Panel</title>
</head>

<body>
    <nav>
        <a href="index.php" style="text-decoration: none;">
            <div class="logo-name">
                <div class="logo-image">
                    <img src="img/logo.png" alt="">
                </div>

                <span class="logo_name">SAMS</span>
            </div>
        </a>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href="faculty.php">
                        <i class="fa-solid fa-person-chalkboard"></i>
                        <span class="link-name">Faculty</a></span>
                    </a></li>
                <li><a href="student.php">
                        <i class="fa-solid fa-user-tie"></i>
                        <span class="link-name">Student</span>
                    </a></li>
                <li><a href="course.php">
                        <i class="fa-solid fa-book"></i>
                        <span class="link-name">Branch</span>
                    </a></li>
                <li><a href="subject.php">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="link-name">Subject</span>
                    </a></li>
                <!-- <li><a href="#">
                    <i class="fa-solid fa-share"></i>
                    <span class="link-name">Share</span>
                </a></li> -->
            </ul>

            <ul class="logout-mode">
                <li><a href="logout.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <!-- <i class="uil uil-moon"></i> -->
                        <!-- <span class="link-name">Dark Mode</span> -->
                    </a>

                    <div class="mode-toggle">
                        <!-- <span class="switch"></span> -->
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <!-- <div class="search-box" style="margin-top: 1%;">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->
            <div class="title"></div>

            <!-- <img src="images/profile.jpg" alt=""> -->


        </div>
        <div class="dash-content">
            <div class="overview">
                <div style="margin-top: 3%;"></div>
                <!-- <div class="title"></div> -->