<?php
include("connection/conn.php");
include("include/header.php");
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                          <h1 class="h2"><i class="fa-solid fa-plus"></i> Add Subject</h1>
                            <div class="btn-toolbar mb-2 mb-md-0">
                              <div class="btn-group mr-2">
                            </div>
                    </div>
                </div>
                <div aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="subject.php">Subject</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Subject</li>
  </ol>
</div>
<hr>

<div class="form-group">
<form method="POST" style="margin: 0% 30% 0% 30%; padding:1rem 2rem 1rem; border: 1px solid #E0E0E0; border-radius: 10px; border-radius: 10px; background-color: #E0E0E0;">
  <div class="form-group">
          <label for="bid">Branch</label>
          <select class="form-control" id="bid" name="bid" required>
          <option value="" disabled selected>Select an option</option>
          <?php
          $query = mysqli_query($conn, "SELECT * FROM branch");
          if (mysqli_num_rows($query) > 0) {
            while ($row1 = mysqli_fetch_assoc($query)) {
          ?>
              <option value="<?php echo $row1['bid'];?>"><?php echo $row1['bname'];?></option>
          <?php
            }
          }
          ?>
        
          </select>
        </div>
        <div class="form-group">
          <label for="subid">Subject</label>
          <input type="text" class="form-control" id="subid" name="subname" placeholder="Enter subject" pattern="[A-Za-z 0-9]+" required>
        </div>
        <div class="form-group">
                <label for="bid">Faculty</label>
                <select class="form-control" id="fid" name="fid" required>
                <option value="" disabled selected>Select an option</option>
          <?php
          $sql2 = mysqli_query($conn, "SELECT * FROM faculty");
          if (mysqli_num_rows($sql2) > 0) {
            while ($row2 = mysqli_fetch_assoc($sql2)) {
          ?>
              <option value="<?php echo $row2['fid'];?>"><?php echo $row2['fname'];?></option>
          <?php
            }
          }
          ?>
        
                </select>
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
      $subname = $_POST['subname'];
      $bname = $_POST['bid'];
      $fname = $_POST['fid'];

      if ($subname != "" && $bname!="" && $fname!="") {
        $insert_subject = mysqli_query($conn, "INSERT INTO subject (subname,bid,fid) values ('$subname','$bname','$fname')");

        if ($insert_subject) {
          echo "<script>alert('Record has been successfully inserted...')</script>";
    ?>
          <meta http-equiv="refresh" content="0; url = subject.php" />
    <?php
        } else {
          echo "Something went wrong!";
        }
      } else {
        echo "<script>alert('Fill fields first...')</script>";
        // error_reporting(0); 
      }
    }
    ?>