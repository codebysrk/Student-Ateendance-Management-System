<?php
require 'connection.php';
$id = $_SESSION['id'];
$sid = $_GET['report'];
$branch = $_GET['branch'];
$subject = $_GET['subject'];

$stds = mysqli_query($conn, "SELECT * FROM student where sid=$sid");
$std = mysqli_fetch_assoc($stds);

$joins = mysqli_query($conn, "SELECT * FROM lecture join attendance  where lecture.fid=$id and lecture.lid=attendance.lid and attendance.sid=$sid");
$a = mysqli_num_rows($joins);

$tabs = mysqli_query($conn, "SELECT * FROM lecture join subject where lecture.subid=subject.subid and subject.subname='$subject' ");
$b = mysqli_num_rows($tabs);

$count = ($a / $b) * 100;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Attendance Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        h3 {
            text-align: center;
        }

        .container {
            /* height:70vh;  */
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            border: 1px solid black;
            margin-bottom: 1%;
        }

        .container .box1 {
            margin-bottom: 2%;
        }

        .bor {
            border-bottom: 1px solid black;
            padding: 1%;            
        }
        .print{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-self: center
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="home.html">MITS</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.html">Home</a>
              </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="student.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="schedule.php">Lectures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="report.php">Attendance Report</a>
                    </li>
                </ul>
                
                <a href="logout.php"><button class="btn btn-outline-danger" type="submit">Log Out</button></a>
            </div>
        </div>
    </nav>
    <main>
        <h3>Attendance Report</h3>
        <div class="container">
            <div class="box1 bor">
                <h4>Student</h4>
                <div class="row g-3 needs-validation">
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="validationTooltip01"
                            value="<?php echo $std['sname']; ?>" readonly>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="validationTooltip01"
                            value="<?php echo $std['smobile']; ?>" readonly>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="validationTooltip01"
                            value="<?php echo $std['semail']; ?>" readonly>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Date Of Birth</label>
                        <input type="text" class="form-control" id="validationTooltip01"
                            value="<?php echo $std['sdob']; ?>" readonly>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Gender</label>
                        <input type="text" class="form-control" id="validationTooltip01"
                            value="<?php echo $std['sgender']; ?>" readonly>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Address</label>
                        <input type="text" class="form-control" id="validationTooltip01"
                            value="<?php echo $std['saddress']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="box1 bor">
                <h4>Course</h4>
                <div class="row g-3 needs-validation">
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Branch</label>
                        <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $branch; ?>"
                            readonly>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $subject; ?>"
                            readonly>
                    </div>
                </div>
            </div>

            <div class="box2 bor">
                <h4>Attendance</h4>
                <?php if ($count >= 0 and $count <= 25) { ?>
                    <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: <?php echo $count; ?>%">
                            <?php echo $count; ?>%
                        </div>
                    </div>
                <?php } ?>
                <?php if ($count > 25 and $count <= 50) { ?>
                    <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100">
                        <div class="progress-bar bg-warning text-dark" style="width: <?php echo $count; ?>%">
                            <?php echo $count; ?>%
                        </div>
                    </div>
                <?php } ?>
                <?php if ($count > 50 and $count <= 75) { ?>
                    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-info text-dark" style="width: <?php echo $count; ?>%">
                            <?php echo $count; ?>%
                        </div>
                    </div>
                <?php } ?>
                <?php if ($count > 75 and $count <= 100) { ?>
                    <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-success" style="width: <?php echo $count; ?>%">
                            <?php echo $count; ?>%
                        </div>
                    </div>
                <?php } ?>
                <table class="table table-hover">
                    <thead>
                        <tr>                           
                            <th scope="col">Marked Attendance</th>
                            <th scope="col">Total Attendance</th>
                            <th scope="col">Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                           
                            <td>
                                <?php echo $a; ?>
                            </td>
                            <td>
                                <?php echo $b; ?>
                            </td>
                            <td>
                                <?php echo $count; ?>%
                            </td>
                        </tr>
                    </tbody>                    
                </table>
            </div>
        </div>
    </main>
    <div class="print">
    <button onclick="window.print()" class="btn btn-warning">Print</button>
    </div>
</body>

</html>