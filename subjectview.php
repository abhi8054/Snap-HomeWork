<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location:adminlogin.php");
}
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subject View</title>

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
    <h1 class="text-center mt-4 text-warning mb-4"><strong> View Subject Details</strong></h1>
    <div class="mb-3">
        <form action="specificsub.php" method="post">
            <div class="row text-warning">
                <label for="exampleselect" class="form-label"><strong>Choose Specific Course to See their
                        Subjects</strong></label>
                <div class="col-md-3">
                    <label for="exampleselect" class="form-label">Select Course</label>
                    <select name="coursename" class="form-select bg-transparent text-warning" aria-label="Default select example"
                            id="exampleselect">
                        <option class="bg-dark" value="">All Courses</option>
                        <?php
                        include_once "partialpage/connection.php";
                        $sel_course = "SELECT coursename FROM courses";
                        $execute = mysqli_query($conn, $sel_course);
                        while ($res = mysqli_fetch_array($execute)) {
                            echo "<option class='bg-dark' value='$res[0]'> $res[0]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="selectcountry" class="form-label">Select Semester</label>
                        <select name="semester" class="form-select bg-transparent text-warning"
                                aria-label="Default select example" id="selectcountry">
                            <option class="bg-dark" value="">Select Semester</option>
                            <?php
                            for($i=1;$i<=10;$i++){
                                ?>
                                <option class="bg-dark" value="<?php echo $i; ?>"><?php echo $i; ?> Sem</option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-warning" style="margin-top: 32px;"><i
                                class="fas fa-hand-point-right"></i> Go
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-dark table-bordered table-primary table-striped "
               style="  border: 1px solid yellow;">
            <thead>
            <tr>
                <th>S No.</th>
                <th>Course</th>
                <th>Subject Name</th>
                <th>Semester</th>
                <th>Subject Description</th>
                <th colspan="2" class="text-center">Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            include_once "partialpage/connection.php";
            $view_sql = "SELECT * FROM subject ORDER BY `subject`.`coursename` ASC";
            $execute = mysqli_query($conn, $view_sql);
            $row=mysqli_num_rows($execute);
            if($row!=0){
            while ($res = mysqli_fetch_array($execute)) {
                $count++;
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $res[3]; ?></td>
                    <td><?php echo $res[1]; ?></td>
                    <td><?php echo $res[4]; ?> SEM </td>
                    <td><?php echo $res[2]; ?> </td>
                    <td class="text-center">
                        <form onsubmit=" return confirm('Are you sure you want to delete ?')" action="subjectaction.php"
                              method="post">
                            <input type="hidden" name="subid" value="<?php echo $res[0]; ?>">
                            <button type="submit" class="btn btn-light bg-transparent text-light" style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action" value="deletesubject"><i
                                        class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="subjectupdate.php" method="post">
                            <input type="hidden" name="subid" value="<?php echo $res[0]; ?>">
                            <button type="submit" style="text-align: center;padding: 10px 20px;border-radius: 20px" class="btn btn-info text-info bg-transparent"><i class="fas fa-edit"></i> Update</button>
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

