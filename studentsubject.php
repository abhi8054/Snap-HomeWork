<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Subject</title>
    <?php
    include_once "partialpage/favicon.php";
    include_once "partialpage/headerfiles.php";
    ?>
    <style>
        #navbarSupportedContent ul li a:hover{
            padding-bottom:3px ;
            border-bottom: 2px solid white;
        }
    </style>

</head>
<body style="background-image: url('images/snap_icon.png');background-color:rgba(0,0,0,0.67);background-position: center center;background-repeat: no-repeat;background-size: cover">
<div style="background-image:linear-gradient(rgba(24,23,23,0.5),rgba(24,23,23,0.5)), url('images/cimg2.jpeg');height:50vh;background-repeat: no-repeat;background-position: center center;background-size: cover">
    <?php
    include_once "partialpage/studentnav.php";
    ?>
</div>

<div class="container">
    <?php
    $sid = $_SESSION['studentid'];
    include_once "partialpage/connection.php";
    $s="SELECT coursename,studentsem FROM student WHERE studentid = '$sid'";
    $r=mysqli_query($conn,$s);
    $row=mysqli_fetch_array($r);
    ?>
    <h2 class="text-center mt-4 text-light mb-4"><strong> Course : <?php echo $row[0];?> || Semester : <?php echo $row[1].'th'; ?></strong></h2>
    <h2 class="text-center mt-4 text-light mb-4"><strong> My Subject Details</strong></h2>
    <div class="table-responsive">
        <table class="table table-hover table-dark table-bordered table-primary table-striped "
               style="  border: 1px solid yellow;">
            <thead>
            <tr>
                <th>S No.</th>
                <th>Subject Name</th>
                <th>Subject Description</th>
                <th>Course</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $sid = $_SESSION['studentid'];
            include_once "partialpage/connection.php";
            $sql = "SELECT coursename FROM student WHERE studentid = '$sid'";
            $exe = mysqli_query($conn, $sql);
            $res1 = mysqli_fetch_array($exe);
            $course = $res1[0];
            $count = 0;
                $sql1 = "SELECT * FROM subject WHERE coursename ='$course'";
                $exe1 = mysqli_query($conn, $sql1);
                while($res2 = mysqli_fetch_array($exe1)){
                    $count++;
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $res2[1]; ?></td>
                    <td><?php echo $res2[2]; ?></td>
                    <td><?php echo $course; ?> </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include_once "partialpage/footer.php";
include_once "partialpage/files.php";
?>
</body>
</html>
