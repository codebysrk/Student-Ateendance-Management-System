<?php
include("connection/conn.php");
include("include/header.php");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="uil uil-tachometer-fast-alt"></i></i> Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        </div>
    </div>
</div>
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</div>
<hr>

<div class="boxes">
    <div class="box box1">
        <i class="fa-solid fa-person-chalkboard"></i>
        <span class="text">Total Faculty</span>
        <span class="number">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM faculty");
            $total = mysqli_num_rows($sql);
            echo "$total"; ?></span>
    </div>
    <div class="box box2">
        <i class="fa-solid fa-user-tie"></i>
        <span class="text">Total Student</span>
        <span class="number"><?php
                                $sql = mysqli_query($conn, "SELECT * FROM student");
                                $total = mysqli_num_rows($sql);
                                echo "$total"; ?></span></span>
    </div>
    <div class="box box3">
        <i class="fa-solid fa-book"></i>
        <span class="text">Total Branch</span>
        <span class="number"><?php
                                $sql = mysqli_query($conn, "SELECT * FROM branch");
                                $total = mysqli_num_rows($sql);
                                echo "$total"; ?></span></span>
    </div>
</div>
</div>

<!-- <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div> -->
                
<script src="js/script.js"></script>
</body>

</html>