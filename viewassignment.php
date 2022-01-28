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
    <title>VIEW Assignment</title>
    <?php
        include_once "partialpage/headerfiles.php";
        include_once "partialpage/favicon.php";
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
    <h1 class="text-center text-info mb-4 mt-4"><strong>View Assignment Details</strong></h1>
    <div class="table-responsive">
        <table class="table table-hover table-dark table-bordered table-primary table-striped"
               style="  border: 1px solid yellow;">
            <thead class="thead-dark">
            <tr>
                <th>S No.</th>
                <th>File</th>
                <th>Topic</th>
                <th>Description</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Subject</th>
                <th>Upload Date</th>
                <th>Last Date</th>
                <th colspan="2" class="text-center">Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            include_once "partialpage/connection.php";
            $tid=$_SESSION['teacherid'];
            $view_sql = "SELECT assignment.*,subject.subname FROM assignment INNER JOIN subject ON assignment.subid=subject.subid WHERE teacherid='$tid' ORDER BY subject.subname ASC";
            $execute = mysqli_query($conn, $view_sql);
            $row=mysqli_num_rows($execute);
//            print_r($res = mysqli_fetch_array($execute));
            if($row!=0){
                while ($res = mysqli_fetch_array($execute)) {
                    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td>
                            <embed src="<?php echo $res[3]; ?>" type="application/pdf" style="width: 50px;height: 50px;" alt="">
                        </td>
                        <td><?php echo $res[1]; ?></td>
                        <td><?php echo $res[2]; ?></td>
                        <td><?php echo $res[8]; ?></td>
                        <td><?php echo $res[9]; ?> Sem </td>
                        <td><?php echo $res[10]; ?></td>
                        <td><?php echo $res[6]; ?></td>
                        <td><?php echo $res[7]; ?></td>
                        <td>
                            <form onsubmit=" return confirm('Are you sure you want to delete ?')" action="assignmentaction.php"
                                  method="post">
                                <input type="hidden" name="assignmentid" value="<?php echo $res[0]; ?>">
                                <button type="submit" class="btn btn-light bg-transparent text-light" name="action" value="deleteassignment"  style="text-align: center;padding: 10px 20px;border-radius: 20px"><i
                                        class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="updateassignment.php" method="post">
                                <input type="hidden" name="assignmentid" value="<?php echo $res[0]; ?>">
                                <button  type="submit" class="btn btn-info text-info bg-transparent"  style="text-align: center;padding: 10px 20px;border-radius: 20px"><i class="fas fa-edit"></i> Update</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }else{
                echo "<script>window.location.href='teacherhome.php';</script>";
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
