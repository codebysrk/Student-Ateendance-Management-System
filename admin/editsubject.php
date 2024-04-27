<?php
include("connection/conn.php");
include("include/header.php");

$edit = $_GET['edit'];
$sql2 = mysqli_query($conn, "SELECT * FROM subject WHERE subid='$edit'");
while ($row = mysqli_fetch_array($sql2)) {
  $subname = $row['subname'];
  $bname = $row['bid'];
  $fname = $row['fid'];
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h1 class="h2"><i class="fa-solid fa-pencil"></i> Update Subject</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
  </div>
</div>
<div aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="subject.php">Subject</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update Subject</li>
  </ol>
</div>
<hr>

<div class="form-group">
  <form method="POST" style="margin: 0% 30% 0% 30%; padding:1rem 2rem 1rem; border: 1px solid #E0E0E0; border-radius: 10px; border-radius: 10px; background-color: #E0E0E0;">
    <div class="form-group">
      <label for="bid">Branch</label>
      <select class="form-control" id="bid" name="bid" required>
        <optgroup label="Select Branch">
          <?php
          $query = mysqli_query($conn, "SELECT * FROM branch");
          if (mysqli_num_rows($query) > 0) {
            while ($row1 = mysqli_fetch_assoc($query)) {
          ?>
              <option value="<?php echo $row1['bid']; ?>"><?php echo $row1['bname']; ?></option>
          <?php
            }
          }
          ?>
        </optgroup>
      </select>
    </div>
    <div class="form-group">
      <label for="subid">Subject</label>
      <input type="text" class="form-control" id="subid" name="subname" value="<?php echo $subname; ?>" placeholder="Enter subject" pattern="[A-Za-z 0-9]+" required>
    </div>
    <div class="form-group">
      <label for="bid">Faculty</label>
      <select class="form-control" id="fid" name="fid" required>
        <optgroup label="Select Faculty">
          <?php
          $sql2 = mysqli_query($conn, "SELECT * FROM faculty");
          if (mysqli_num_rows($sql2) > 0) {
            while ($row2 = mysqli_fetch_assoc($sql2)) {
          ?>
              <option value="<?php echo $row2['fid']; ?>"><?php echo $row2['fname']; ?></option>
          <?php
            }
          }
          ?>
        </optgroup>
      </select>
    </div>
    <div style="margin-top: 20px; text-align: center;">
      <input class="btn btn-success" type="submit" name="update" value="Save">
      <!-- <input class="btn btn-warning" type="reset" value="Reset"> -->
    </div>

  </form>
</div>
</body>

</html>

<?php

if (isset($_POST['update'])) {
  $subname = $_POST['subname'];
  $fname = $_POST['fid'];
  $bname = $_POST['bid'];

  if ($subname != "" && $fname != "" && $bname != "") {
    $sql = mysqli_query($conn, "UPDATE subject SET subname='$subname',bid='$bname',fid='$fname' WHERE subid='$edit'");

    if ($sql) {
      echo "<script>alert('Record has been updated...')</script>";
?>
      <meta http-equiv="refresh" content="0.5; url =subject.php" />
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