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
    <title>Edit Student Details</title>

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
$studentid = $_POST['studentid'];
if (isset($studentid)) {

    include_once "partialpage/connection.php ";

    $select_sql = "SELECT * FROM `student` WHERE studentid = '$studentid'";
    $execute = mysqli_query($conn, $select_sql);
    $res1 = mysqli_fetch_array($execute);
} else {
    echo "<script>window.location.href = 'studentview.php';</script>";
}
?>

<div class="container">
    <form action="studentaction.php" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center text-warning">
            <h1 class="text-center mb-4 mt-4 text-warning"><strong>Edit Student Details</strong></h1>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleInputnamme" class="form-label">Full Name</label>
                    <input type="text" class="form-control bg-transparent text-warning" value="<?php echo $res1[2] ;?>" name="name" id="exampleInputnamme">
                </div>

                <div class="mb-3">
                    <label for="selectcountry" class="form-label">Select Semester</label>
                    <select name="semester" class="form-select bg-transparent text-warning" aria-label="Default select example" id="selectcountry">
                        <option class="bg-dark text-warning" value="<?php echo $res1[13] ;?>"><?php  echo $res1[13]; ?> Sem</option>
                        <option class="bg-dark text-warning" value="1">1 Sem</option>
                        <option class="bg-dark text-warning" value="2">2 Sem</option>
                        <option class="bg-dark text-warning" value="3">3 Sem</option>
                        <option class="bg-dark text-warning" value="4">4 Sem</option>
                        <option class="bg-dark text-warning" value="5">5 Sem</option>
                        <option class="bg-dark text-warning" value="6">6 Sem</option>
                        <option class="bg-dark text-warning" value="7">7 Sem</option>
                        <option class="bg-dark text-warning" value="8">8 Sem</option>
                        <option class="bg-dark text-warning" value="9">9 Sem</option>
                        <option class="bg-dark text-warning" value="10">10 Sem</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputmobile" class="form-label">Mobile No.</label>
                    <input type="text" class="form-control bg-transparent text-warning" value="<?php echo $res1[5] ;?>"name="mobile"
                           id="exampleInputmobile">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control bg-transparent text-warning" value="<?php echo $res1[8] ;?>" name="email"
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="floatingTextarea2" >Address : </label>
                    <textarea class="form-control bg-transparent text-warning" placeholder="Address..." id="floatingTextarea2" name="address"
                              style="height: 70px"><?php echo $res1[7] ;?></textarea>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="studentid" value="<?php echo $res1[0]; ?>">
                    <button onclick="return confirm('Are you sure you want to update ?')" style="text-align: center;padding: 10px 20px;border-radius: 20px" type="submit"
                            class="btn btn-warning text-warning bg-transparent" name="action" value="updatestudent"><h5> Update <i
                                    class="fas fa-edit"></i></h5></button>
                </div>
            </div>
            <div class="col-md-5">

                <div class="mb-3">
                    <label for="exampleInputnamme" class="form-label">Father Name</label>
                    <input type="text" class="form-control bg-transparent text-warning" value="<?php echo $res1[3] ;?>" name="fathername" id="exampleInputnamme">
                </div>

                <div class="mb-3">
                    <label for="courseselect" class="form-label">Select Course</label>
                    <select name="coursename" class="form-select bg-transparent text-warning" onchange="getsubject(this.value)"
                            aria-label="Default select example" id="courseselect">
                        <option value="<?php echo $res1[11] ;?>"><?php echo $res1[11] ;?></option>
                        <?php
                        include_once "partialpage/connection.php";
                        $sel_course = "SELECT coursename FROM courses";
                        $execute1 = mysqli_query($conn, $sel_course);
                        while ($res = mysqli_fetch_array($execute1)) {
                            echo "<option class='bg-dark text-warning' value='$res[0]'> $res[0]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputmobile" class="form-label">Guidance Mobile No.</label>
                    <input type="text" class="form-control bg-transparent text-warning" value="<?php echo $res1[6] ;?>" name="guidancemobile"
                           id="exampleInputmobile">
                </div>
                <div class="mb-3">
                    <label for="selectcountry" class="form-label">Select Country</label>
                    <select name="country" class="form-select bg-transparent text-warning " aria-label="Default select example" id="selectcountry">
                        <option class="text-warning bg-dark" value="<?php echo $res1[4] ;?>"><?php echo $res1[14] ;?></option>
                        <option class="text-warning bg-dark" value="India">India</option>
                        <option class="text-warning bg-dark" value="Canada">Canada</option>
                        <option class="text-warning bg-dark" value="America">America</option>
                        <option class="text-warning bg-dark" value="Europe">Europe</option>
                        <option class="text-warning bg-dark" value="Australia">Australia</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Photo</label>
                    <input class="form-control bg-transparent text-warning" name="photo" value="<?php echo $res1[10] ;?>" type="file" id="formFile">
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include_once "partialpage/footer.php";
include_once "partialpage/files.php";
?>
</body>
</html>