<?php
session_start();
$user = $_SESSION['srk'];
if ($user == true) {
} else {
    header("location:adminlogin.php");
}

include('connection/conn.php');

$del=$_GET['delete'];

$sql=mysqli_query($conn,"delete from faculty where fid='$del'");

if ($sql){
    echo "<script>alert('Record has been successfully deleted !!!!!')</script>";
    ?>
    <meta http-equiv="refresh" content="0; url=faculty.php"/>
    <?php
}
else {
    echo "<script>alert('Something went wrong!')</script>";
}
?>