<?php
include("connection/conn.php");
include("include/header.php");

$edit=$_GET['edit'];
$sql1=mysqli_query($conn,"select * from faculty where fid='$edit'");
while ($row=mysqli_fetch_array($sql1)){
    $fname=$row['fname'];
    $fgender=$row['fgender'];
    $fdob=$row['fdob'];
    $fmobile=$row['fmobile'];
    $femail=$row['femail'];
    $fpwd=$row['fpassword'];
    $faddress=$row['faddress'];
    $ftype=$row['type'];
}
?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="fa-solid fa-pencil"></i> Update Faculty</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        </div>
      </div>
    </div>
    <div aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="faculty.php">Faculty</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Faculty</li>
      </ol>
    </div>
    <hr>

    <div class="form-group">
      <form action="" method="POST" style="margin: 0% 30% 0% 30%; padding:1rem 2rem 1rem; border: 1px solid #E0E0E0; border-radius: 10px; border-radius: 10px; background-color: #E0E0E0;">
        <div class="form-group">
          <label for="fnmae">Faculty Name</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter fullname" value="<?php echo $fname; ?>" pattern="[A-Za-z .]+" title="Use alphabets only!" required>
        </div>

        <div class="form-group">
          <label for="fgender">Gender</label>
          <select class="form-control" id="fgender" name="fgender" required>
            <option value="<?php echo $fgender; ?>">Select</option>
            <option value="Female">Female</option>
            <option value="Male">Male</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div class="form-group">
          <label for="fbob">Date of Birth</label>
          <input type="date" class="form-control" id="fbob" name="fdob" placeholder="" value="<?php echo $fdob; ?>" required>
        </div>

        <div class="form-group">
          <label for="femail">Email</label>
          <input type="email" class="form-control" id="femail" aria-describedby="emailHelp" name="femail" placeholder="Email address" value="<?php echo $femail; ?>" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
      <label for="fpwd">Password</label>
      <input type="password" class="form-control" id="fpwd" name="fpwd" maxlength="10" placeholder="Enter password" value="<?php echo $fpwd; ?>" required >
    </div>

    <div class="form-group">
      <label for="fmobile">Mobile</label>
      <input type="number" class="form-control" id="fmobile" name="fmobile" maxlength="10" placeholder="Enter mobile number" value="<?php echo $fmobile; ?>" required>
    </div>

    <div class="form-group">
      <label for="faddress">Address</label>
      <textarea class="form-control" id="faddress" name="faddress" rows="" cols="" placeholder="Enter address here....." required><?php echo $faddress; ?></textarea>
    </div>

    <div class="form-group">
      <label for="ftype">Role</label>
      <select class="form-control" id="ftype" name="ftype" required>
        <option value="<?php echo $ftype; ?>">Select</option>
        <option value="Admin">Admin</option>
        <option value="Faculty">Faculty</option>
      </select>
    </div>

    <div style="margin-top: 20px; text-align: center;">
      <input class="btn btn-success" type="submit" value="Update" name="update">
      <input class="btn btn-warning" type="reset" value="Reset">
    </div>
    </form>
  </div>
  </body>

  </html>

  <?php

  if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $fgender = $_POST['fgender'];
    $fdob = $_POST['fdob'];
    $fmobile = $_POST['fmobile'];
    $femail = $_POST['femail'];
    $fpwd = $_POST['fpwd'];
    $faddress = $_POST['faddress'];
    $ftype = $_POST['ftype'];

    if ($fname != "" && $fgender != "" && $fdob != "" && $fmobile != "" && $femail != "" && $fpwd!="" && $faddress != "" && $ftype != "") {

      $sql = mysqli_query($conn, "UPDATE faculty SET fname='$fname',fgender='$fgender',fdob='$fdob',fmobile='$fmobile',femail='$femail',fpassword='$fpwd',faddress='$faddress',type='$ftype' WHERE fid='$edit'");

      if ($sql) {
        echo "<script>alert('Record has been updated...')</script>";
  ?>
        <meta http-equiv="refresh" content="0; url =faculty.php" />
  <?php
      } else {
        echo "Something went wrong!";
      }
    } else {
      echo "<script>alert('Fill fields first...')</script>";
    }
  }
  ?>