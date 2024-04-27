<?php 
error_reporting(0);
require 'connection.php';
if (isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $rows = mysqli_query($conn, "SELECT * FROM faculty where femail='$email' and fpassword='$password' ");
  $row = mysqli_fetch_assoc($rows);
  $cols = mysqli_query($conn, "SELECT * FROM student where semail='$email' and spassword='$password' ");
  $col = mysqli_fetch_assoc($cols);
  if($row>0)
  {
    if($row['type']=='Admin')
    { 
      session_start();        
      // $_SESSION["id"] = $row["fid"];
      $_SESSION['srk'] = $row["femail"];
      echo"<script>alert('Admin Log In Successfully');
      document.location.href = 'admin/index.php';</script>";
    }
    elseif($row['type']=='Faculty')
    {
      session_start();        
      $_SESSION["id"] = $row["fid"];
      echo"<script>alert('Faculty Log In Successfully');
      document.location.href = 'home.html';</script>";
    }
  }
  elseif($col>0)
  {
    session_start();        
    $_SESSION["action"]= "done";
    $_SESSION["id"] = $col["sid"];    
    date_default_timezone_set('Asia/Kolkata');
    $ctime= date('o-m-d H:i:s');
    $_SESSION['ctime']= $ctime;
    echo"<script>alert('Student Log In Successfully');
    document.location.href = 'Student/std_panel.php';</script>";
  }
  else{
    echo"<script>alert('Please enter valid email and password');
    document.location.href = 'index.php';</script>";

  }
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div id="bg"></div>
  <form method="post" action="index.php" method="post">
    <div class="form-field">
      <input type="email" name="email" placeholder="Email" required />
    </div>
    <div class="form-field">
      <input type="password" name="password" placeholder="Password" required />
    </div>
    <div class="form-field">
      <button class="btn" name="submit" type="submit">Log in</button>
    </div>
  </form>
</body>
</html>