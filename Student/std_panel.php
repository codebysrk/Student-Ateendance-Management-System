<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="std_panel.css">
    <link rel="stylesheet" href="bootstrap.css">

    <title>student_panel</title>
</head>
<body>
<?php
require 'connection.php';
session_start();

$action= $_SESSION['action'];

    if($action=="done")
    {
        require 'std_profile_navbar.php';
       
    }
    else{
        require 'std_login_navbar.php';
       
    }
?>



</body>
</html>
<!-- <img src="http://moodle.mitsgwalior.in/pluginfile.php/1/core_admin/logo/0x150/1675750638/mits.jpg" alt="" class="img-fluid"> -->