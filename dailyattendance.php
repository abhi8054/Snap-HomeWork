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
        <title>Daily Attendance</title>
        <?php
            include_once "partialpage/favicon.php";
            include_once "partialpage/headerfiles.php";
        ?>
        <style>
            #navbarSupportedContent ul li a:hover{
                padding-bottom:3px ;
                border-bottom: 2px solid deepskyblue;
            }
        </style>
    </head>
    <body style="background-image: url('images/snap_icon.png');background-color:rgba(0,0,0,0.67);background-position: center center;background-repeat: no-repeat;background-size: cover">
    <div style="background-image:linear-gradient(rgba(24,23,23,0.5),rgba(24,23,23,0.5)), url('images/ban11.jpg');height:50vh;background-repeat: no-repeat;background-position: center center;background-size: cover">
        <?php
        include_once "partialpage/teachernavbar.php";
        ?>
    </div>

    <div class="container-fluid">
        <h1 class="text-center mb-4 mt-4 text-info"><strong> Daily Attendance </strong></h1>

        <?php
        include_once "partialpage/connection.php";
        date_default_timezone_set('Asia/kolkata');
        $date=date("Y-m-d");
        //            print_r($date);
        $tid = $_SESSION['teacherid'];
        $count=0;
        $sql="SELECT student.*,attendance.status FROM student INNER JOIN attendance ON student.studentid = attendance.studentid
                            WHERE attendance.attendancedate='$date' AND teacherid ='$tid' ";
        $execute=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($execute);
        if($row !=0){
            ?>

                <table class="table table-hover table-dark table-bordered table-primary table-striped"
                       style="  border: 1px solid yellow;">
                <thead class="thead-dark">
                <tr>
                    <th>S No.</th>
                    <td>Status</td>
                    <th>Roll No.</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Photo</th>
                    <th>Gender</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while($res=mysqli_fetch_array($execute)){
                        $count++;
                        ?>
                        <tr>
                            <td><?php echo $count; ?> </td>
                            <td><?php echo $res[15]; ?></td>
                            <td><?php echo $res[1]; ?> </td>
                            <td><?php echo $res[2]; ?> </td>
                            <td><?php echo $res[3]; ?> </td>
                            <td>
                                <img src="<?php echo $res[10]; ?>" style="width: 50px;height: 50px;" alt="">
                            </td>
                            <td><?php echo $res[4]; ?> </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    </table>
                    <?php
                }else{

                    echo"<h1 class='text-info text-center mb-5 mt-5'>No Record Found.......</h1>";
                }
                ?>
    </div>
    <?php
    include_once "partialpage/footer.php";
    include_once "partialpage/files.php";
    ?>
    </body>
    </html>