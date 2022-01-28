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
    <title>Message View</title>

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
    <h1 class="text-center mt-4 mb-4 text-white"><strong id="title">Messages From Teacher</strong></h1>
    <div class="table-responsive">
        <table class="table table-hover table-dark table-bordered table-primary table-striped "
               style="  border: 1px solid yellow;">
            <thead
            ">
            <tr>
                <th>S No.</th>
                <th>Message From</th>
                <th>Message</th>
                <th>Date</th>
<!--                <th>Status </th>-->
            </tr>
            </thead>
            <tbody>
            <?php
            include_once "partialpage/connection.php";
            $sid=$_SESSION['studentid'];
            $s="SELECT * FROM student WHERE studentid='$sid'";
            $e=mysqli_query($conn,$s);
            $r=mysqli_fetch_array($e);
            $semester=$r[13];
            $course=$r[11];
            $count = 0;
            $view_sql = "SELECT sendmessage.*,teacher.teachername FROM sendmessage INNER JOIN teacher ON sendmessage.teacherid = teacher.teacherid 
                            WHERE  sendmessage.messagesem='$semester' AND sendmessage.coursename='$course'";
            $execute = mysqli_query($conn, $view_sql);
            $row=mysqli_num_rows($execute);
            if($row!=0){
                while ($res = mysqli_fetch_array($execute)) {
                    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $res[7]; ?></td>
                        <td><?php echo $res[3]; ?> </td>
                        <td><?php echo $res[1]; ?></td>
                        <?php
//                        if((int)$res[2]==1){
//                            ?>
<!--                               <td>--><?php //echo "New"; ?><!--</td>-->
<!--                        --><?php
//                        }else{
//                    ?>
<!--                        <td>--><?php //echo "Old"; ?><!--</td>-->
<!--                        --><?php
//                        }
//                            ?>
                    </tr>
                    <?php
                }
            }else{
                echo "<h2 style='position: absolute;top:50vh;left: 37%'>No Record Found......</h2>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<!--<script>-->
<!--    function seen(){-->
<!--        let ms="--><?php //echo $_SESSION['studentid'];?>//";
<!--//        -->
<!--//    }-->
<!--//</script>-->

<?php
include_once "partialpage/files.php";
?>
</body>
</html>
