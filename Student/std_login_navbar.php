<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Document</title>
    <style>
        .profile_icon img{
            margin-left: 1240px;
        }

        main{
          margin-top: 100px;
        }

        .container
        {
          margin-top: 35px;
        }

        .d1
        {
          margin-left: 40px;
        }
        
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<div class="navbar">

  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">mits MOODLE</a>
  
      
        <!-- profile icon -->
      <div class="profile_icon">
          <img src="img/profile.png" alt="profile" data-bs-toggle="modal" data-bs-target="#staticBackdrop" width="50px">
      </div>
  
  
  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">mits MOODLE</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="std_panel.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- <form class="d-flex mt-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
  </div>
  </nav>
  
  <!-- Login -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="login.php" method="POST">
            <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label">Email</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" name="semail" required autofocus>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label">Password</label>
              <input type="password" class="form-control" id="formGroupExampleInput2" name="spassword" required autofocus>
            </div>
           
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
    
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<main>
  <div class="d1">
    <img src="http://moodle.mitsgwalior.in/pluginfile.php/1/core_admin/logo/0x150/1675750638/mits.jpg" alt="" class="img-fluid">
  </div>

<div class="container">
  <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/mits1.webp" class="d-block w-100" alt="..." height="500px">
      </div>
      <div class="carousel-item">
        <img src="img/mits7.jpg" class="d-block w-100" alt="..." height="500px">
      </div>
      <div class="carousel-item">
        <img src="img/mits8.jpg" class="d-block w-100" alt="..." height="500px">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>


</main>

 
</body>
</html>
