<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location:adminlogin.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses View</title>

    <?php
    include_once "partialpage/favicon.php";
    include_once "partialpage/headerfiles.php";
    ?>

    <style>
        #navbarSupportedContent ul li a:hover{
            padding-bottom: 3px;
            border-bottom: 2px solid yellow;
        }
    </style>
</head>
<body style="background-image: url('images/snap_icon.png');background-color:rgba(0,0,0,0.67);background-position: center center;background-repeat: no-repeat;background-size: cover">

<div style="background-image:linear-gradient(rgba(239, 10, 10, 0.5),rgba(24,23,23,0.5)), url('images/s1.jpg');height:50vh;background-repeat: no-repeat;background-position: center center;background-size: cover">
    <?php
    include_once "partialpage/adminnavbar.php";
    ?>
</div>
<div class="container">
    <h1 class="text-center mt-4 mb-4 text-warning"><strong>View Course Details</strong></h1>
    <div class="table-responsive">
        <table class="table table-hover table-dark table-bordered table-primary table-striped "
               style="  border: 1px solid yellow;">
            <thead
            ">
            <tr>
                <th>S No.</th>
                <th>Course Name</th>
                <th>Course Duration</th>
                <th>Course Description</th>
                <th colspan="2" class="text-center">Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            include_once "partialpage/connection.php";
            $view_sql = "SELECT * FROM courses ";
            $execute = mysqli_query($conn, $view_sql);
            $row=mysqli_num_rows($execute);
            if($row!=0){
            while ($res = mysqli_fetch_array($execute)) {
                $count++;
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $res[0]; ?></td>
                    <td><?php echo $res[1]; ?> year</td>
                    <td><?php echo $res[2]; ?></td>
                    <td class="text-center">
                        <form onsubmit=" return confirm('Are you sure you want to delete ?')" action="courseaction.php"
                              method="post">
                            <input type="hidden" name="coursename" value="<?php echo $res[0]; ?>">
                            <button type="submit" class="btn btn-light text-light bg-transparent" name="action" value="deletecourse"  style="text-align: center;padding: 10px 20px;border-radius: 20px"><i
                                        class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="courseupdate.php" method="post">
                            <input type="hidden" name="coursename" value="<?php echo $res[0]; ?>">
                            <button type="submit" class="btn btn-info text-info bg-transparent"  style="text-align: center;padding: 10px 20px;border-radius: 20px"><i class="fas fa-edit"></i> Update</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            }else{
                    echo "<script>window.location.href='adminhome.php';</script>";

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
