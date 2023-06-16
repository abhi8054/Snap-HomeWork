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
    <title>Student Assignment</title>
    <?php
    include_once "partialpage/favicon.php";
    include_once "partialpage/headerfiles.php";
    ?>
    <style>
        #navbarSupportedContent ul li a:hover{
            padding-bottom:3px ;
            border-bottom: 2px solid white;
        }
    </style>

</head>
<body style="background-image: url('images/snap_icon.png');background-color:rgba(0,0,0,0.67);background-position: center center;background-repeat: no-repeat;background-size: cover">
<div style="background-image:linear-gradient(rgba(24,23,23,0.5),rgba(24,23,23,0.5)), url('images/cimg2.jpeg');height:50vh;background-repeat: no-repeat;background-position: center center;background-size: cover">
    <?php
    include_once "partialpage/studentnav.php";
    ?>
</div>
<div class="container">
    <?php
    $sid=$_SESSION['studentid'];
    include_once "partialpage/connection.php";
    $s="SELECT coursename,studentsem FROM student WHERE studentid = '$sid'";
    $r=mysqli_query($conn,$s);
    $row=mysqli_fetch_array($r);
    ?>
    <h2 class="text-center mt-4 text-light mb-4"><strong> Course : <?php echo $row[0];?> || Semester : <?php echo $row[1].'th'; ?></strong></h2>
    <h2 class="text-center mt-4 text-light mb-4"><strong> My Assignment Details</strong></h2>
    <div class="row justify-content-center text-light" >
        <div class="col-md-5">
            <div class="mb-3">

                <label for="courseselect" class="form-label">Select Subject</label>
                <select name="subject" class="form-select text-light bg-transparent" onchange="getnotes(this.value)"
                        aria-label="Default select example" id="courseselect">
                    <option class="bg-dark" value="">Select Subject</option>
                    <?php
                    include_once "partialpage/connection.php";
                    $sel_course = "SELECT subname FROM subject WHERE coursename = '$row[0]'";
                    $execute1 = mysqli_query($conn, $sel_course);
                    while ($res = mysqli_fetch_array($execute1)) {
                        echo "<option class='bg-dark' value='$res[0]'> $res[0]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="position: relative">
        <div class="col-12 table-responsive" id="stusub">

        </div>
    </div>
</div>
<script>
    function getnotes(subject){
        // alert(subject);
        let httprequest = new XMLHttpRequest();
        httprequest.open('GET','studentcascade.php?subject='+subject+'&option=assign',true)
        httprequest.send()
        httprequest.onreadystatechange = function () {
            if (httprequest.readyState === 4 && httprequest.status === 200) {
                // alert(httprequest.response);
                document.getElementById('stusub').innerHTML = httprequest.response;
            }
        }
    }
</script>
<?php
include_once "partialpage/footer.php";
include_once "partialpage/files.php";
?>
</body>
</html>

