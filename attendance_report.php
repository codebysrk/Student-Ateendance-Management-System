<?php
require 'connection.php';
$sid= $_SESSION['id'];
$subid= '';
if(isset($_GET["id"]))
{
    $subid= $_GET["id"];
}


if(isset($_POST['attendance']))
{
    $query= mysqli_query($conn, "SELECT * FROM lecture WHERE subid='$subid'");
    $a= mysqli_fetch_assoc($query);
}

?>