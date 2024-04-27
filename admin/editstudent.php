<?php
include("connection/conn.php");
include("include/header.php");

$edit=$_GET['edit'];
$sql2=mysqli_query($conn,"SELECT * FROM student WHERE sid='$edit'");
while ($row=mysqli_fetch_array($sql2)){
    $sname=$row['sname'];
    $sgender=$row['sgender'];
    $sdob=$row['sdob'];
    $smobile=$row['smobile'];
    $semail=$row['semail'];
    $spwd=$row['spassword'];
    $saddress=$row['saddress'];
    $sbid=$row['bid'];
}
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="fa-solid fa-pencil"></i> Update Student</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        </div>
      </div>
    </div>
    <div aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="student.php">Student</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Student</li>
      </ol>
    </div>
    <hr>

    <div class="form-group">
      <form action="" method="POST" style="margin: 0% 30% 0% 30%; padding:1rem 2rem 1rem; border: 1px solid #E0E0E0; border-radius: 10px; border-radius: 10px; background-color: #E0E0E0;">
        <div class="form-group">
          <label for="sname">Student Name</label>
          <input type="text" class="form-control" id="sname" name="sname" placeholder="Enter fullname" value="<?php echo $sname; ?>" pattern="[A-Za-z ]+" title="Use alphabets only!" required>
        </div>

        <div class="form-group">
          <label for="sgender">Gender</label>
          <select class="form-control" id="sgender" name="sgender" required>
            <option value="<?php echo $sgender; ?>"></option>
            <option value="Female">Female</option>
            <option value="Male">Male</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div class="form-group">
          <label for="sbob">Date of Birth</label>
          <input type="date" class="form-control" id="sdob" name="sdob" placeholder="" value="<?php echo $sdob; ?>" required>
        </div>

        <div class="form-group">
          <label for="bid">Branch</label>
          <select class="form-control" id="bid" name="bid" required>
            <option value="<?php echo $sbid; ?>">Select</option>
          <?php
        $sql1 = mysqli_query($conn, "SELECT * FROM branch");
        ?>
        <?php
        while ($row9 = mysqli_fetch_assoc($sql1)){
          ?>
            <option value="<?php echo $row9['bid'];?>"><?php echo $row9['bname'];?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="semail">Email</label>
          <input type="email" class="form-control" id="semail" aria-describedby="emailHelp" name="semail" placeholder="Email address" value="<?php echo $semail; ?>" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="spwd">Password</label>
          <input type="password" class="form-control" id="spwd" name="spwd" placeholder="Enter password" value="<?php echo $spwd; ?>" required>
        </div>

    <div class="form-group">
      <label for="smobile">Mobile</label>
      <input type="number" class="form-control" id="smobile" name="smobile" placeholder="Enter mobile number" value="<?php echo $smobile; ?>" required>
    </div>

    <div class="form-group">
      <label for="saddress">Address</label>
      <textarea class="form-control" id="saddress" name="saddress" rows="" cols="" placeholder="Enter address here....." required><?php echo $saddress; ?></textarea>
    </div>


    <div style="margin-top: 20px; text-align: center;">
      <input class="btn btn-success" type="submit" name="update" value="Update">
      <input class="btn btn-warning" type="reset" value="Reset">
    </div>

    </form>
  </div>
  </body>

  </html>

  <?php

  if (isset($_POST['update'])) {
    $sname = $_POST['sname'];
    $sgender = $_POST['sgender'];
    $sdob = $_POST['sdob'];
    $sbid = $_POST['bid'];
    $smobile = $_POST['smobile'];
    $semail = $_POST['semail'];
    $spwd = $_POST['spwd'];
    $saddress = $_POST['saddress'];

    if ($sname != "" && $sgender != "" && $sdob != "" && $sbid!="" && $smobile != "" && $semail != "" && $saddress != "") {

      $sql = mysqli_query($conn, "UPDATE student SET sname='$sname',sgender='$sgender',sdob='$sdob',bid='$sbid',smobile='$smobile',semail='$semail',spassword='$spwd',saddress='$saddress' WHERE sid='$edit'");

      if ($sql) {
        echo "<script>alert('Record has been updated...')</script>";
  ?>
        <meta http-equiv="refresh" content="0; url =student.php" />
  <?php
      } else {
        echo "<script>alert('Something went wrong!')</script>";
      }
    } else {
      echo "<script>alert('Fill fields first...')</script>";
    }
  }
  ?>