<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/adminloginstyle.css">
  </head>
  <body>
    <div class="center">
      <h1>ADMIN LOGIN</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="mail" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="hidden" name="type" value="Admin" required>
        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" name="submit" value="Login">
        <div class="signup_link">
          <!-- Not a member? <a href="#">Signup</a> -->
        </div>
      </form>
    </div>
  </body>
</html>

<?php
include("connection/conn.php");

if(isset($_POST["submit"])){
    $mail = $_POST["mail"];
    $pwd = $_POST["password"];
    $ty = $_POST["type"];

    $query="SELECT * FROM faculty WHERE type='$ty' && femail='$mail' && fpassword='$pwd'";
    $result = mysqli_query($conn, $query);
    $total=mysqli_num_rows($result);
    
    if($total> 0){
        $_SESSION['srk'] = $mail;
        header("location:index.php");
         
}
    else{
        echo "<script> alert('Please enter valid email and password....')</script>";
    }
}
?>