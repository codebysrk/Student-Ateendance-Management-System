<?php
include("connection/conn.php");
include("include/header.php");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h1 class="h2"><i class="fa-solid fa-plus"></i> Add Faculty</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
  </div>
</div>
<div aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="faculty.php">Faculty</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Faculty</li>
  </ol>
</div>
<hr>

<div class="form-group">
  <form action="" method="POST" style="margin: 0% 30% 0% 30%; padding:1rem 2rem 1rem; border: 1px solid #E0E0E0; border-radius: 10px; background-color: #E0E0E0;">
    <div class="form-group">
      <label for="fnmae">Faculty Name</label>
      <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter fullname" pattern="[A-Za-z ]+" title="Use alphabets only!" required>
    </div>

    <div class="form-group">
      <label for="fgender">Gender</label>
      <select class="form-control" id="fgender" name="fgender" required>
        <option value="" disabled selected>Choose</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>
    </div>

    <div class="form-group">
      <label for="fbob">Date of Birth</label>
      <input type="date" class="form-control" id="fbob" name="fdob" placeholder="" required>
    </div>

    <div class="form-group">
      <label for="femail">Email</label>
      <input type="email" class="form-control" id="femail" aria-describedby="emailHelp" name="femail" placeholder="Email address" title="Please fill email address" required>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" id="pwd" name="fpwd" placeholder="Enter password" required>
    </div>

    <div class="form-group">
      <label for="fmobile">Mobile</label>
      <input type="number" class="form-control" id="fmobile" name="fmobile" maxlength="10" placeholder="Enter mobile number" pattern="[0-9]+" title="Please fill mobile number" required>
    </div>

    <div class="form-group">
      <label for="faddress">Address</label>
      <textarea class="form-control" id="faddress" name="faddress" rows="" cols="" placeholder="Enter address here....." required></textarea>
    </div>

    <div class="form-group">
      <label for="ftype">Role</label>
      <select class="form-control" id="ftype" name="ftype" required>
        <option value="" disabled selected>Role</option>
        <option value="Admin">Admin</option>
        <option value="Faculty">Faculty</option>
      </select>
    </div>

    <div style="margin-top: 20px; text-align: center;">
      <input class="btn btn-success" type="submit" value="Save" name="submit">
      <input class="btn btn-warning" type="reset" value="Reset">
    </div>
  </form>
</div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $fgender = $_POST['fgender'];
  $fdob = $_POST['fdob'];
  $fmobile = $_POST['fmobile'];
  $femail = $_POST['femail'];
  $fpwd = $_POST['fpwd'];
  $faddress = $_POST['faddress'];
  $ftype = $_POST['ftype'];

  if ($fname != "" && $fgender != "" && $fdob != "" && $fmobile != "" && $femail != "" && $fpwd != "" && $faddress != "" && $ftype != "") {

    $sql = mysqli_query($conn, "INSERT INTO faculty (fname,fgender,fdob,fmobile,femail,fpassword,faddress,type) values ('$fname','$fgender','$fdob','$fmobile','$femail','$fpwd','$faddress','$ftype')");

    if ($sql) {
      echo "<script>alert('Record has been successfully inserted...')</script>";
?>
      <meta http-equiv="refresh" content="0; url = faculty.php" />
<?php
    } else {
      echo "Something went wrong!";
    }
  } else {
    echo "<script>alert('Fill fields first...')</script>";
  }
}
?>