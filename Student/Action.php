<?php
    require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="navbar.css"> -->
    <link rel="stylesheet" href="bootstrap.css">
    <!-- <link rel="stylesheet" href="request_status.css"> -->
    <title>action</title>
    <style>
        .container
        {
            margin-top: 100px;
        }

        .profile_icon img{
            margin-left: 1240px;
        }

        h1
        {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php
require 'connection.php';
session_start();
$sid= $_SESSION['id'];
$check= mysqli_query($conn, "SELECT * FROM student WHERE sid='$sid'");
$a= mysqli_fetch_assoc($check);
?>


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

<!-- Profile -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Profile</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $a["sname"];?> ">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Mobile no.</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $a["smobile"] ?>">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Address</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $a["saddress"] ?>">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Email</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $a["semail"] ?>">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">DOB</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $a["sdob"] ?>">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Gender</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $a["sgender"] ?>">
        </div>
        </div>

        <div class="modal-footer">
            <!-- <a href="update_profile.php"><button type="button" class="btn btn-secondary" name="edit">Edit</button></a> -->
          <form action="logout.php">                    
            <button type="submit" class="btn btn-primary" >Log out</button>
          </form>
        </div>
      </div>
    </div>
  </div>

    <?php
        // require 'std_profile_navbar.php';
    
        if(isset($_POST['record']))
        {
        ?>
            <div class="container">
            <h1>Attendance Record</h1>
            <div class="table-responsive-sm">
                <table class="table table-white table-hover">
                    <thead class="table-secondary">
                        <th>S.No</th>
                        <th>Subject Name</th>
                        <th>Total Attendance</th>
                    </thead>
                    <?php
    
                         $query= mysqli_query($conn, "SELECT * FROM student WHERE sid='$sid'");
                         $a= mysqli_fetch_assoc($query);
                         $bid= $a['bid'];
                        $sno= 1;
                        $select= mysqli_query($conn, "SELECT * FROM subject WHERE bid='$bid'");

                        if(mysqli_num_rows($select)>0)
                        {
                          while($a= mysqli_fetch_assoc($select))
                          {
                            $count= 0;
                            $subid=$a['subid'];
                            $lecture= mysqli_query($conn, "SELECT * FROM lecture WHERE subid='$subid'");
                            $total= mysqli_num_rows($lecture);
                            

                              $record= mysqli_query($conn,"SELECT * FROM attendance WHERE sid='$sid'");
                              if(mysqli_num_rows($record)>0)
                              {
                                while($b= mysqli_fetch_assoc($record))
                                {
                                  $lid=$b['lid'];
                                  $com= mysqli_query($conn, "SELECT * FROM lecture WHERE lid='$lid'");
                                  if(mysqli_num_rows($com)>0)
                                  {
                                    $f= mysqli_fetch_assoc($com);
                                    $SUBID= $f['subid'];
                                    if($subid==$SUBID)
                                    {
                                        $count++;
                                    }
                                  }
                                }

                                ?>
                                <tbody>
                                <?php
                                if($total==0)
                                {
                                  ?>
                                      <td><?php echo $sno; ?></td>
                                      <td><?php echo $a['subname']; ?></td>
    
                                      <td><?php echo "Teacher did not schedule any attendance"; ?></td>
                                  
                                  <?php
                                
                                }

                              }
                              
                              if($total>0)
                              {
                                  $per= ($count/$total)*100;
                                  ?>
                              
                                  <td><?php echo $sno; ?></td>
                                  <td><?php echo $a['subname']; ?></td>

                                  <td><?php echo $per; ?>%</td>
                                  <?php
                                }
                                ?>
                                </tbody>
                                <?php
                                $sno++;
                          }
                                  
                        }
                        
                    ?>
                </table>
            </div>
          </div>
        <?php
        }
    else if(isset($_POST['attendance'])){
      ?>
        <div class="container">
          <h1>Attendance Section</h1>
          <div class="table-responsive-sm">
            <table class="table table-white table-hover">
              <thead class="table-secondary">
                <th>#</th>
                <th>Subject Name</th>
                <th>Action</th>
              </thead>

              <?php
              $bid= $a['bid'];
              $ctime=  $_SESSION['ctime'];
              $view= mysqli_query($conn, "SELECT * FROM subject WHERE bid='$bid'");
              if(mysqli_num_rows($view)>0)
              {
                while($x= mysqli_fetch_assoc($view))
                {
                  $subid= $x['subid'];
                  $subname= $x['subname'];

                  $fetch= mysqli_query($conn, "SELECT * FROM lecture WHERE subid='$subid'");
                  if(mysqli_num_rows($fetch)>0)
                  {
                    while($y= mysqli_fetch_assoc($fetch))
                    {
                      $stime= $y['stime'];
                      $etime= $y['etime'];
                      if($ctime>=$stime and $ctime<=$etime)
                      {
                        ?>
                        <tbody>
                          <td>
                            <li></li>
                          </td>
                          <td><?php echo $subname; ?></td>
                          <td>
                          <form action="att_report.php?id=<?php echo $y["subid"]; ?>" method="post">
                          <button tyle="submit" class="btn btn-primary" name="present">Present</button>
                        </form>
                          </td>
                        </tbody>
                        <?php
                      }
                    }
                  }
                }
              }

              ?>
      
            </table>
          </div>
        </div>
      <?php
      }
      ?>
  </body>
  </html>

                          
                              
