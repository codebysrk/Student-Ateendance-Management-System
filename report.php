<?php
require 'connection.php';
$id = $_SESSION['id'];

$joins = mysqli_query($conn, "SELECT * FROM student  join branch   join subject where subject.fid=$id and student.bid=branch.bid and branch.bid=subject.bid order by bname,sname asc");
$join = mysqli_fetch_assoc($joins);

$tests = mysqli_query($conn, "SELECT * FROM student  join branch   join subject where subject.fid=$id and student.bid=branch.bid and branch.bid=subject.bid group by bname");
$test = mysqli_fetch_assoc($tests);


$count = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="schedule.css">
    <style>
    
        .contain{
            width: 100%;            
            padding: 3%;                      
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
                    <li class="nav-item">
                        <a class="nav-link active" href="student.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="schedule.php">Lectures</a>
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
        <div class="contain">
            <h3>Generate Attendance Report</h3>
            <?php foreach ($tests as $test): $count = 1; ?>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseOne">
                                <?php echo $test['bname']; ?>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse hide">
                            <div class="accordion-body">
                                <!-- <div class="contain">           -->
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date of Birth</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Branch</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($joins as $join):
                                        if ($join['bname'] == $test['bname']) { ?>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <?php echo $count; ?>
                                                    </th>
                                                    <td>
                                                        <?php echo $join['sname']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $join['smobile']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $join['semail']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $join['sdob']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $join['sgender']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $join['bname']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $join['subname']; ?>
                                                    </td>
                                                    <td>
                                                    <a href="attreport.php?report=<?php echo $join['sid'] ?> & branch=<?php echo $join['bname']?> & subject=<?php echo $join['subname']?>#"><button
                                                    class="btn btn-warning">Generate Report</button></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php $count++;
                                        }
                                    endforeach; ?>
                                </table>

                                <!-- End of content -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>