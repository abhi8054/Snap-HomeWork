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
    <title>Subject Update</title>

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

<?php

$subid = $_POST['subid'];
if (isset($subid)) {

    include_once "partialpage/connection.php ";

    $select_sql = "SELECT * FROM `subject` WHERE subid = '$subid'";
    $execute = mysqli_query($conn, $select_sql);
    $res1 = mysqli_fetch_array($execute);
} else {
    header('location:subjectview.php');
}
?>

<div class="container-fluid">
    <div class="row justify-content-center text-warning">
        <h2 class="text-center mb-5 mt-5 text-warning"><strong>Edit Subject Details</strong></h2>
        <div class="col-md-5">
            <form action="subjectaction.php" method="post">
                <div class="mb-3">
                    <label for="exampleselect" class="form-label mt-3">Select Course</label>
                    <select name="coursename" required class="form-select bg-transparent text-warning" aria-label="Default select example"
                            id="exampleselect">
                        <option class="text-warning bg-dark" value="<?php echo "$res1[3]"; ?>"><?php echo "$res1[3]"; ?></option>
                        <?php
                        include_once "partialpage/connection.php";
                        $sel_course = "SELECT coursename FROM courses";
                        $execute = mysqli_query($conn, $sel_course);
                        while ($res = mysqli_fetch_array($execute)) {
                            echo "<option class='bg-dark text-warning' value='$res[0]'> $res[0]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Subject Name</label>
                    <input type="text" class="form-control bg-transparent text-warning" required name="subjectname"
                           value="<?php echo "$res1[1]"; ?>" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="selectcountry" class="form-label">Select Semester</label>
                    <select name="semester" class="form-select bg-transparent text-warning" aria-label="Default select example" id="selectcountry">
                        <option class="text-warning bg-dark" value="<?php echo "$res1[4]"; ?>"><?php echo "$res1[4]"; ?> Sem</option>
                        <option class="text-warning bg-dark" value="1">1 Sem</option>
                        <option class="text-warning bg-dark" value="2">2 Sem</option>
                        <option class="text-warning bg-dark" value="3">3 Sem</option>
                        <option class="text-warning bg-dark" value="4">4 Sem</option>
                        <option class="text-warning bg-dark" value="5">5 Sem</option>
                        <option class="text-warning bg-dark" value="6">6 Sem</option>
                        <option class="text-warning bg-dark" value="7">7 Sem</option>
                        <option class="text-warning bg-dark" value="8">8 Sem</option>
                        <option class="text-warning bg-dark" value="9">9 Sem</option>
                        <option class="text-warning bg-dark" value="10">10 Sem</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="floatingTextarea" class="mb-2">Description</label>
                    <textarea class="form-control bg-transparent text-warning" required placeholder="Add Description" name="description"
                              id="floatingTextarea"><?php echo "$res1[2]"; ?></textarea>
                </div>
                <div class="text-center mb-3">
                    <input type="hidden" name="subid" value="<?php echo $res1[0]; ?>">
                    <button onclick="return confirm('Are you sure you want to update ?')" style="text-align: center;padding: 10px 20px;border-radius: 20px" type="submit"
                            class="btn btn-warning bg-transparent text-warning" name="action" value="updatesubject"><h5> Update <i
                                    class="fas fa-edit"></i></h5></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once "partialpage/footer.php";
include_once "partialpage/files.php";
?>
</body>
</html>
