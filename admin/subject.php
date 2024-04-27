<?php
include("connection/conn.php");
include("include/header.php");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h1 class="h2"><i class="fa-solid fa-layer-group"></i> Subject</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
    <a class="btn btn-primary" href="addsubject.php">Add Subject</a>
  </div>
</div>
<div aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Subject</li>
  </ol>
</div>
<hr>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Subject</th>
      <th scope="col">Branch</th>
      <th scope="col">Faculty</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM subject LEFT JOIN branch ON subject.bid=branch.bid LEFT JOIN faculty ON subject.fid=faculty.fid ORDER BY subname");
    $total = mysqli_num_rows($sql);
    if ($total > 0)
      while ($row = mysqli_fetch_assoc($sql)) {
    ?>
      <tr>
        <th scope="row"><?php echo $row['subname']; ?></td>
        <td><?php echo $row['bname']; ?></td>
        <td><?php echo $row['fname']; ?></td>
        <td>
          <div class="row">
            <div class="">
              <a href="editsubject.php?edit=<?php echo $row['subid'];?>" class="btn btn-success"><span class="fa fa-pencil"></span></a>
              <a href="deletesubject.php?delete=<?php echo $row['subid'];?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
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