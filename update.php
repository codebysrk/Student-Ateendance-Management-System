<?php
require 'connection.php';
$id = $_SESSION['id'];
$rows = mysqli_query($conn, "SELECT * FROM faculty where fid=$id");
$row = mysqli_fetch_assoc($rows);

$tabs = mysqli_query($conn, "SELECT * FROM subject where fid=$id");
$tab = mysqli_fetch_assoc($tabs);

if (isset($_GET["update"]))
{
  $_SESSION['upd']=$_GET["update"];
}
$lid=$_SESSION['upd'];

if (isset($_POST["submit"]))
{
  $sub = $_POST['subject'];
  $stime = $_POST['stime'];
  $etime = $_POST['etime'];
  $cols = mysqli_query($conn, "SELECT * FROM subject where subname='$sub'");
  $col = mysqli_fetch_assoc($cols);
  $q = $col['subid'];
  $sql = "UPDATE lecture SET stime='{$stime}',etime='{$etime}',subid='{$q}'  WHERE lid=$lid";
  mysqli_query($conn, $sql);
  echo "<script> alert('Update Successful');document.location.href = 'schedule.php'; </script>";
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    
  <link rel="stylesheet" href="schedule.css">

  <style>
    .bt{
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      
    }
  </style>
</head>
<body>
  <main>
  <div class="contain">
    <h3>Update Schedule</h3>
    <form class="row g-3 needs-validation" action="update.php" method="post" enctype="multipart/form-data">
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
        <input type="datetime-local" class="form-control" name="stime" id="validationCustom02" value="<?php echo $mat['stime']; ?>" required>
      </div>

      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">End Date and Time</label>
        <input type="datetime-local" class="form-control" name="etime" id="validationCustom02" value="<?php echo $mat['etime']; ?>" required>
      </div>

      <div class="col-12 bt">
        <button class="btn btn-primary" name="submit" type="submit">Update</button>       
      </div>
      
    </form>
  </div>
  <a href="schedule.php"><button class="btn btn-secondary">Back</button></a>
</main>
</body>
</html>