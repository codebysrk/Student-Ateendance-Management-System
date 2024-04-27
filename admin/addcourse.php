<?php
include("connection/conn.php");
include("include/header.php");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h1 class="h2"><i class="fa-solid fa-plus"></i> Add Branch</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
  </div>
</div>
<div aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="course.php">Branch</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Branch</li>
  </ol>
</div>
<hr>

<div class="form-group">
  <form method="POST" style="margin: 0% 30% 0% 30%; padding:1rem 2rem 1rem; border: 1px solid #E0E0E0; border-radius: 10px; background-color: #E0E0E0;">
    <div class="form-group">
      <label for="cid">Branch</label>
      <input type="text" class="form-control" id="cid" name="branchname" placeholder="Enter Branch " pattern="[A-Za-z ]+" title="Use alphabets only!" required>
    </div>
    <div style="margin-top: 20px; text-align: center;">
      <input class="btn btn-success" type="submit" name="submit" value="Save">
      <!-- <input class="btn btn-warning" type="reset" value="Reset"> -->
    </div>

  </form>
</div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
  $bname = $_POST['branchname'];

  if ($bname != "") {
    $sql = mysqli_query($conn, "INSERT INTO branch (bname) values ('$bname')");

    if ($sql) {
      echo "<script>alert('Record has been successfully inserted...')</script>";
?>
      <meta http-equiv="refresh" content="0; url =course.php" />
<?php
    } else {
      echo "Something went wrong!";
    }
  } else {
    echo "<script>alert('Fill fields first...')</script>";
    error_reporting(0);
  }
}
?>