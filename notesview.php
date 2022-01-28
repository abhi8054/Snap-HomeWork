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
    <title>Teacher View</title>

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
<div class="container">
    <h1 class="text-center text-info mb-4 mt-4"><strong>View Notes Details</strong></h1>
    <div class="table-responsive">
        <table class="table table-hover table-dark table-bordered table-primary table-striped"
               style="  border: 1px solid yellow;">
            <thead class="thead-dark">
            <tr>
                <th>S No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>File</th>
                <th>Course</th>
                <th>Subject</th>
                <td>Semester</td>
                <th>Date</th>
                <th colspan="2" class="text-center">Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            $tid = $_SESSION['teacherid'];
            include_once "partialpage/connection.php";
            $view_sql = "SELECT notes.* ,subject.subname FROM notes INNER JOIN subject ON notes.subid = subject.subid WHERE teacherid = '$tid' ORDER BY subject.subname ASC ";
            $execute = mysqli_query($conn, $view_sql);
            $row = mysqli_num_rows($execute);
            if ($row != 0) {
                while ($res = mysqli_fetch_array($execute)) {
                    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $res[4]; ?></td>
                        <td><?php echo $res[5]; ?></td>
                        <td>
                            <embed src="<?php echo $res[3]; ?>" type="application/pdf" style="width: 70px;height: 80px;" alt="">
                        </td>
                        <td><?php echo $res[1]; ?></td>
                        <td><?php echo $res[9]; ?></td>
                        <td><?php echo $res[7]; ?></td>
                        <td><?php echo $res[6]; ?></td>
                        <td class="text-center">
                            <form onsubmit=" return confirm('Are you sure you want to delete ?')"
                                  action="notesaction.php"
                                  method="post">
                                <input type="hidden" name="noteid" value="<?php echo $res[0]; ?>">
                                <button type="submit" class="btn btn-light bg-transparent text-light" name="action" value="deletenote"  style="text-align: center;padding: 10px 20px;border-radius: 20px"><i
                                            class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="notesupdate.php" method="post">
                                <input type="hidden" name="noteid" value="<?php echo $res[0]; ?>">
                                <button type="submit" class="btn btn-info text-info bg-transparent"  style="text-align: center;padding: 10px 20px;border-radius: 20px"><i class="fas fa-edit"></i> Update</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            } else {
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

