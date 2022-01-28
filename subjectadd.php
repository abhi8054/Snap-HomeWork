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
    <title>Subject Add</title>

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
    <div class="row justify-content-center">
        <h1 class="text-center text-warning mb-1 mt-5"><strong>ADD Subject Details</strong></h1>
        <div class="col-md-5 text-warning">
            <form action="subjectaction.php" method="post">
                <div class="mb-3">
                    <label for="exampleselect" class="form-label mt-3">Select Course</label>
                    <select name="coursename" required class="form-select bg-transparent text-warning" aria-label="Default select example"
                            id="exampleselect">
                        <option class="bg-dark" value="">Select Course</option>
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
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Subject Name</label>
                    <input type="text" class="form-control bg-transparent text-warning" placeholder="Subject Name" name="subjectname"
                           id="exampleInputPassword1">
                </div>
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
                <div class="mb-3">
                    <label for="floatingTextarea" class="mb-2">Description</label>
                    <textarea class="form-control bg-transparent text-warning" required placeholder="Add Description" name="description"
                              id="floatingTextarea"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning text-warning mb-3 bg-transparent"  style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action"
                            value="addsubject"><h5> ADD <i class="fas fa-plus"></i></h5></button>
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