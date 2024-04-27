<?php
require 'connection.php';
session_start();


if(isset($_POST["login"]))
{
    $semail= $_POST['semail'];
    $spassword= $_POST['spassword'];
    
    $check= mysqli_query($conn, "SELECT * FROM student WHERE semail='$semail'");
    $a= mysqli_fetch_assoc($check);
    
    $_SESSION["sid"]= $a["sid"];

    if(mysqli_num_rows($check)==0)
    {
        echo"<script>alert('Invalid Email!'); document.location.href='std_panel.php'</script>";
    }
    else if($a["spassword"] != $spassword)
    {
        echo"<script>alert('Invalid Password!'); document.location.href='std_panel.php'</script>";
    }
    else{
        $_SESSION["action"]= "done";
        echo"<script>alert('Login Successfullly!'); document.location.href='std_panel.php'</script>";
    }
    // else 
    // {
    //     if($a["type"] =="admin")
    //     {

    //         echo"<script>alert('Login Successfully!'); document.location.href='admin.php'</script>";
    //     }
    //     else if($a["type"] =="customer")
    //     {
    //         echo"<script>alert('Login Successfully!'); document.location.href='customer.php'</script>";
    //     }
    //     else if($a["type"] =="ifood partner")
    //     {
    //         echo"<script>alert('Login Successfully!'); document.location.href='partner.php'</script>";
    //     }
    // }
}
?>