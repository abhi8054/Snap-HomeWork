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
    <title>Course Update </title>
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

$coursename = $_POST['coursename'];

if (isset($coursename)) {
    include_once "partialpage/connection.php ";
    $select_sql = "SELECT * FROM `courses` WHERE coursename = '$coursename'";
    $execute = mysqli_query($conn, $select_sql);
    $res = mysqli_fetch_array($execute);
} else {
    header('location:courseview.php');
}
?>

<div class="container-fluid">
    <div class="row justify-content-center text-warning">
        <h2 class="text-center mb-5 mt-5 text-warning "><strong>Edit Courses Details</strong></h2>
        <div class="col-md-5 bg-transparent">
            <form action="courseaction.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputcourse" class="form-label mt-3">Course Name</label>
                    <input type="text" class="form-control bg-transparent text-warning" readonly name="coursename"
                           value="<?php echo $coursename; ?>" id="exampleInputcourse">
                </div>
                <div class="mb-3">
                    <label for="exampleselect" class="form-label">Select Duration</label>
                    <select name="duration" class="form-select bg-transparent text-warning" aria-label="Default select example" id="exampleselect">
                        <option class="bg-dark text-warning" value="<?php echo $res[1]; ?>"><?php echo $res[1]; ?> year</option>
                        <option class="bg-dark text-warning" value="1">1 year</option>
                        <option class="bg-dark text-warning" value="2">2 year</option>
                        <option class="bg-dark text-warning" value="3">3 year</option>
                        <option class="bg-dark text-warning" value="4">4 year</option>
                        <option class="bg-dark text-warning" value="5">5 year</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="floatingTextarea" class="mb-2">Description</label>
                    <textarea class="form-control bg-transparent text-warning" name="description"
                              id="floatingTextarea"><?php echo $res[2]; ?></textarea>
                </div>
                <div class="mb-3 text-center">
                    <button onclick="return confirm('Are you sure you want to update ?')" style="text-align: center;padding: 10px 20px;border-radius: 20px" type="submit"
                            class="btn btn-warning text-warning bg-transparent"
                            name="action" value="updatecourse"><h5> Update <i class="fas fa-edit"></i></h5></button>
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

