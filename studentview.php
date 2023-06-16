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
    <title>Teacher View</title>

    <?php
    include_once "partialpage/favicon.php";
    include_once "partialpage/headerfiles.php";
    ?>

   <style>
        #navbarSupportedContent ul li a:hover{
            padding-bottom: 3px;
            border-bottom: 2px solid yellow;
        }
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #ffbf00 !important;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: #ffbf00 !important;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: #ffbf00 !important;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: #ffbf00 !important;
        }

    </style>
</head>
<body style="background-image: url('images/snap_icon.png');background-color:rgba(0,0,0,0.67);background-position: center center;background-repeat: no-repeat;background-size: cover">

<div style="background-image:linear-gradient(rgba(239, 10, 10, 0.5),rgba(24,23,23,0.5)), url('images/s1.jpg');height:50vh;background-repeat: no-repeat;background-position: center center;background-size: cover">
    <?php
    include_once "partialpage/adminnavbar.php";
    ?>
</div>
<div class="container-fluid">
    <h1 class="text-center text-warning mb-4 mt-4"><strong>View Student Details</strong></h1>
    <div class="table-responsive">
        <table class="table table-hover table-dark table-bordered table-primary table-striped" style="  border: 1px solid yellow;">
            <thead class="thead-dark">
            <tr>
                <th colspan="3" class="text-center">Controls</th>
                <th>S No.</th>
                <th>Photo</th>
                <th>Roll No.</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Mobile No.</th>
                <th>Guidance Mobile No.</th>
                <th>Gender</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Country</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            include_once "partialpage/connection.php";
            $view_sql = "SELECT * FROM student ";
            $execute = mysqli_query($conn, $view_sql);
            $row=mysqli_num_rows($execute);
            if($row !=0){
            while ($res = mysqli_fetch_array($execute)) {
                $count++;
                ?>
                <tr>
                    <td>
                        <form onsubmit=" return confirm('Are you sure you want to delete ?')" action="studentaction.php"
                              method="post">
                            <input type="hidden" name="studentid" value="<?php echo $res[0]; ?>">
                            <button type="submit" class="btn btn-light text-light bg-transparent" style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action" value="deletestudent"><i
                                        class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="studentupdate.php" method="post">
                            <input type="hidden" name="studentid" value="<?php echo $res[0]; ?>">
                            <button  type="submit" class="btn btn-info bg-transparent text-info" style="text-align: center;padding: 10px 20px;border-radius: 20px"><i class="fas fa-edit"></i> Update</button>
                        </form>
                    </td>
                    <td>
                        <form action="studentaction.php" method="post">
                            <?php
                            include_once "partialpage/connection.php";
                            $st=$res[0];
                            $sql="SELECT studentstatus FROM student WHERE studentid = '$st'";
                            $exe=mysqli_query($conn,$sql);
                            $row=mysqli_fetch_array($exe);
                            if((int)$row[0]===1){
                                ?>
                                <button  type='submit' name="action" value="block"  class='btn btn-danger bg-transparent text-danger' style='text-align: center;padding: 10px 20px;border-radius: 20px'><i class='fas fa-ban'></i> Block </button>
                                <input type="hidden" name="status" value="<?php echo $st; ?>">
                            <?php } else{ ?>
                                <button  type='submit' name="action" value="active" class='btn btn-success bg-transparent text-success' style='text-align: center;padding: 10px 20px;border-radius: 20px'><i class='fas fa-check-circle'></i> Active </button>
                                <input type="hidden" name="status" value="<?php echo $st; ?>">
                            <?php } ?>
                        </form>
                    </td>
                    <td><?php echo $count; ?></td>
                    <td>
                        <img src="<?php echo $res[10]; ?>" style="width: 50px;height: 50px;" alt="">
                    </td>
                    <td><?php echo $res[1]; ?></td>
                    <td><?php echo $res[2]; ?></td>
                    <td><?php echo $res[3]; ?></td>
                    <td><?php echo $res[5]; ?></td>
                    <td><?php echo $res[6]; ?></td>
                    <td><?php echo $res[4]; ?> </td>
                    <td><?php echo $res[11]; ?></td>
                    <td><?php echo $res[13]; ?> Sem</td>
                    <td><?php echo $res[14]; ?></td>
                    <td><?php echo $res[8]; ?></td>
                    <td><?php echo $res[7]; ?></td>
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
