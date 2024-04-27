<?php
include("connection/conn.php");
include("include/header.php");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h1 class="h2"><i class="fa-solid fa-person-chalkboard"></i> Student</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
    <a class="btn btn-primary" href="addStudent.php">Add Student</a>
  </div>
</div>
<div aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Student</li>
  </ol>
</div>
<hr>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">DOB</th>
      <th scope="col">Branch</th>
      <th scope="col">Email</th>
      <!-- <th scope="col">Password</th> -->
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM student LEFT JOIN branch ON student.bid=branch.bid ORDER BY sname ASC");
    $total = mysqli_num_rows($sql);
    if ($total > 0)
      while ($row = mysqli_fetch_assoc($sql)) {
    ?>
      <tr>
        <th scope="row"><?php echo $row['sname']; ?></td>
        <td><?php echo $row['sgender']; ?></td>
        <td><?php echo $row['sdob']; ?></td>
        <td><?php echo $row['bname']; ?></td>
        <td><?php echo $row['semail']; ?></td>
        <!-- <td><?php echo $row['spassword']; ?></td> -->
        <td><?php echo $row['smobile']; ?></td>
        <td><?php echo $row['saddress']; ?></td>
        <td>
          <div class="row">
            <div class="" style="text-align: center;">
              <a href="editstudent.php?edit=<?php echo $row['sid'];?>" class="btn btn-success"><span class="fa fa-pencil"></span></a>
              <a href="deletestudent.php?delete=<?php echo $row['sid'];?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
            </div>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>



<script src="js/script.js"></script>
</body>

</html>