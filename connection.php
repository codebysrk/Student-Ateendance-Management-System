<?php
session_start();
error_reporting(0);
$conn = mysqli_connect("localhost","root","","student_attendance_system");
if($conn)
{
    echo"";
}
else{
    echo"connection failed....try again!!!!";
}
?>