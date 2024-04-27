<?php
include("connection/conn.php");
include("include/header.php");

$edit=$_GET['edit'];
$sql2=mysqli_query($conn,"SELECT * FROM branch WHERE bid='$edit'");
while ($row=mysqli_fetch_array($sql2)){
    $bname=$row['bname'];
}
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="fa-solid fa-pencil"></i> Update Branch</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        </div>
      </div>
    </div>
    <div aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="course.php">Branch</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Branch</li>
      </ol>
    </div>
    <hr>

    <div class="form-group">
      <form method="POST" style="margin: 0% 30% 0% 30%; padding:1rem 2rem 1rem; border: 1px solid #E0E0E0; border-radius: 10px; border-radius: 10px; background-color: #E0E0E0;">
        <div class="form-group">
          <label for="cid">Branch</label>
          <input type="text" class="form-control" id="cid" name="branchname" placeholder="Enter course" value="<?php echo $bname; ?>" required>
        </div>
        <div style="margin-top: 20px; text-align: center;">
          <input class="btn btn-success" type="submit" name="update" value="Update">
          <!-- <input class="btn btn-warning" type="reset" value="Reset"> -->
        </div>

      </form>
    </div>
    </body>

    </html>

    <?php

    if (isset($_POST['update'])) {
      $bname = $_POST['branchname'];

      if ($bname != "") {
        $sql = mysqli_query($conn, "UPDATE branch SET bname='$bname' WHERE bid='$edit'");

        if ($sql) {
          echo "<script>alert('Record has been updated...')</script>";
    ?>
          <meta http-equiv="refresh" content="0; url = course.php" />
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