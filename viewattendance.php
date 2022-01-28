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
    <title> View Attendance</title>
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
    <div class="row justify-content-center text-info">
        <h1 class="text-center mb-4 mt-4 text-info"><strong>Student Attendance</strong></h1>
        <div class="col-md-5">
            <div class="mb-3">
                <label for="courseselect" class="form-label">Select Course</label>
                <select name="coursename" class="form-select bg-transparent text-info" onchange="getsubject(this.value)"
                        aria-label="Default select example" id="courseselect">
                    <option class="bg-dark" value="">Select Course</option>
                    <?php
                    include_once "partialpage/connection.php";
                    $sel_course = "SELECT coursename FROM courses";
                    $execute1 = mysqli_query($conn, $sel_course);
                    while ($res = mysqli_fetch_array($execute1)) {
                        echo "<option class='bg-dark' value='$res[0]'> $res[0]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="selectcountry" class="form-label">Select Semester</label>
                <select name="semester" class="form-select bg-transparent text-info" aria-label="Default select example"
                        onchange="getsemester(this.value)" id="selectcountry">
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
                <label for="dateid" class="mb-2"> Date </label>
                <input class="form-control bg-transparent text-info" name="date" type="date" id="dateid">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" onclick="getAttendance()" class="btn btn-info bg-transparent text-info"
                        style="text-align: center;padding: 10px 20px;border-radius: 20px"><h5> View Attendance <i
                                class="fas fa-check-circle"></i></i></h5>
                </button>
            </div>
        </div>
    </div>
    <div class="row" style="position: relative">
        <div class="col-12">
            <div class="table-responsive"  id="table">
            </div>
        </div>
    </div>
</div>

<script>
    let sub = "";
    let sem = "";
    let dat = "";

    function getsubject(subject) {
        sub = subject;
    }

    function getsemester(semester) {
        sem = semester;
    }

    function getAttendance() {
        dat = document.getElementById('dateid').value;
        // alert(dat);
        let httprequest = new XMLHttpRequest();
        httprequest.open('GET', 'cascadedata.php?coursename=' + sub + '&semester=' + sem + '&date=' + dat + '&option=table2', true);
        httprequest.send();
        httprequest.onreadystatechange = function () {
            if (httprequest.readyState === 4 && httprequest.status === 200) {
                // alert(this.response);
                document.getElementById('table').innerHTML = httprequest.response;
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
