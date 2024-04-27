<?php
session_start();
$user = $_SESSION['srk'];
if ($user == true) {
} else {
    header("location:adminlogin.php");
}

include('connection/conn.php');

$del=$_GET['delete'];

$sql=mysqli_query($conn,"delete from branch where bid='$del'");

if ($sql){
    echo "<script>alert('Record has been successfully deleted !!!!!')</script>";
    ?>
    <meta http-equiv="refresh" content="0; url=course.php"/>
    <?php
}
else {
    echo "<script>alert('Something went wrong!')</script>";
}
?>