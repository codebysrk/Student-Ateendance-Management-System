<?php
require 'connection.php';
$id = $_SESSION['id'];
$count = 1;
$rows = mysqli_query($conn, "SELECT * FROM faculty where fid=$id");
$row = mysqli_fetch_assoc($rows);

$tabs = mysqli_query($conn, "SELECT * FROM subject where fid=$id");
$tab = mysqli_fetch_assoc($tabs);

if (isset($_GET["delete"])) {
  $delete = $_GET["delete"];
  $del = "DELETE FROM lecture WHERE lid=$delete";
  mysqli_query($conn, $del);
  echo "<script> alert('Deleted Succesfuly');document.location.href = 'schedule.php'; </script>";
}

if (isset($_POST['submit'])) {
  $sub = $_POST['subject'];
  $stime = $_POST['stime'];
  $etime = $_POST['etime'];

  $cols = mysqli_query($conn, "SELECT * FROM subject where subname='$sub'");
  $col = mysqli_fetch_assoc($cols);
  $q = $col['subid'];

  $query = "INSERT INTO `lecture` VALUES('','$stime', '$etime', '$id','$q')";
  mysqli_query($conn, $query);
  echo "<script>alert('Successfully Added');
  document.location.href = 'schedule.php';</script>";
}

$mats = mysqli_query($conn, "SELECT * FROM lecture where  fid=$id order by fid desc");
$mat = mysqli_fetch_assoc($mats);

$matrics = mysqli_query($conn, "SELECT * FROM lecture join subject join faculty where  faculty.fid=$id and faculty.fid=subject.fid and lecture.subid= subject.subid");
$matric = mysqli_fetch_assoc($matrics);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schedule</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="schedule.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">


        <a class="navbar-brand" href="home.html">MITS</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.html">Home</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="student.php">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="schedule.php">Lectures</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report.php">Attendance Report</a>
          </li>
        </ul>
        <a href="logout.php"><button class="btn btn-outline-danger" type="submit">Log Out</button></a>
      </div>
    </div>
  </nav>


  <main>
    <!-- Schedule Form -->
    <div class="contain">
      <h3>Add Schedule</h3>
      <form class="row g-3 needs-validation" action="schedule.php" method="post" enctype="multipart/form-data">
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">Faculty Name</label>
          <input type="text" class="form-control" id="validationCustom01" name="faculty"
            value="<?php echo $row['fname']; ?>" readonly>
        </div>

        <div class="col-md-3">
          <label for="validationCustom04" class="form-label">Subject</label>
          <select class="form-select" id="validationCustom04" required name="subject">
            <option selected disabled value="">Choose...</option>
            <?php foreach ($tabs as $tab): ?>
              <option>
                <?php echo $tab['subname']; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Start Date and Time</label>
          <input type="datetime-local" class="form-control" name="stime" id="validationCustom02" value="" required>
        </div>

        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">End Date and Time</label>
          <input type="datetime-local" class="form-control" name="etime" id="validationCustom02" value="" required>
        </div>

        <div class="col-12">
          <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
        </div>
      </form>
    </div>
    <!--End of Schedule Form -->



    <div class="accordion" id="accordionPanelsStayOpenExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
            aria-controls="panelsStayOpen-collapseOne">
            View All The Scheduled Lecture
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse hide">
          <div class="accordion-body">
            <!-- <div class="contain">           -->
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Faculty Name</th>
                  <th scope="col">Subject Name</th>
                  <th scope="col">Start Time</th>
                  <th scope="col">End Time</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <?php foreach ($matrics as $matric): ?>
                <tbody>
                  <tr>
                    <th scope="row">
                      <?php echo "$count"; ?>
                    </th>
                    <td>
                      <?php echo $matric['fname']; ?>
                    </td>
                    <td>
                      <?php echo $matric['subname']; ?>
                    </td>
                    <td>
                      <?php echo $matric['stime']; ?>
                    </td>
                    <td>
                      <?php echo $matric['etime']; ?>
                    </td>

                    <td>
                      <div class="but">
                        <a href="update.php?update=<?php echo $mat['lid'] ?>#"><button
                            class="btn btn-warning">Update</button></a>
                        <a href="?delete=<?php echo $mat['lid'] ?>#"><button type="button"
                            class="btn btn-danger">Delete</button></a>
                      </div>
                    </td>
                  </tr>
                </tbody>
                <?php $count++; endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>



  <footer>

  </footer>

</body>

</html>