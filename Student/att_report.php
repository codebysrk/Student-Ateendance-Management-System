<!-- header("Location: std_panel.php"); -->
<?php
require 'connection.php';
session_start();
$sid= $_SESSION["id"];
$ctime= $_SESSION['ctime'];

$subid= " ";

if(isset($_GET["id"]))
{
    $subid= $_GET["id"];
}

if(isset($_POST["present"]))
{
    
    $query= mysqli_query($conn, "SELECT * FROM lecture WHERE subid='$subid'");
    if(mysqli_num_rows($query)>0)
    {
        while($fetch= mysqli_fetch_assoc($query))
        {
            $stime= $fetch["stime"];
            $etime= $fetch["etime"];
            $lid= $fetch["lid"];
            $status= "present";
            
            if($ctime>=$stime and $ctime<=$etime )
            {
                $f=0;
                $select= mysqli_query($conn, "SELECT * FROM attendance");
                if(mysqli_num_rows($select)>0)
                {
                while($a= mysqli_fetch_assoc($select))
                {
                    $x= $a['sid'];
                    $y= $a['lid'];
                    
                    if($sid==$x and $lid==$y)
                    {
                        $f=1;
                        echo "<script> alert('Your attendance has already marked!'); document.location.href='std_profile_navbar.php'</script>";
                        break;
                    }
                }
                if($f==0)
                {
                    mysqli_query($conn, "INSERT INTO attendance VALUES ('', '$status', current_timestamp(), '$sid', '$lid')");
                    echo "<script> alert('Attendance marked !'); document.location.href='std_profile_navbar.php'</script>";

                }
                }
                else{
                    mysqli_query($conn, "INSERT INTO attendance VALUES ('', '$status', current_timestamp(), '$sid', '$lid')");
                        echo "<script> alert('Attendance marked !'); document.location.href='std_profile_navbar.php'</script>";

                }

        }
    }
}
}

?>