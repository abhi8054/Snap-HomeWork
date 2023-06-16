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
    <title>ADD Assignment</title>
    <?php
    include_once "partialpage/favicon.php";
    include_once "partialpage/headerfiles.php";
    ?>
    <style>
        #navbarSupportedContent ul li a:hover{
            padding-bottom:3px ;
            border-bottom: 2px solid #00bfff;
        }
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #00BFFF !important;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: #00BFFF !important;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: #00BFFF !important;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: #00BFFF !important;
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
<form action="assignmentaction.php" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center text-info">
    <h1 class="text-center mb-4 mt-4 text-info"><strong>Add Assignment Details</strong></h1>
        <div class="col-md-5">
            <div class="mb-3">
                <label for="courseselect" class="form-label">Select Course</label>
                <select name="coursename" class="form-select text-info bg-transparent" onchange="getSubject(this.value)"
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
                <label for="exampleInputtopic" class="form-label">Assignment Topic</label>
                <input type="text" class="form-control bg-transparent" placeholder="Topic" name="topic"
                       id="exampleInputtopic">
            </div>

            <div class="mb-3">
                <label for="floatingTextarea" class="mb-2">Assignment Description</label>
                <textarea class="form-control bg-transparent" required placeholder="Title Description" name="assdesc"
                          id="floatingTextarea"></textarea>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-info bg-transparent text-info" style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action" value="addassignment"><h5> ADD <i class="fas fa-plus"></i></h5></button>
            </div>

        </div>

        <div class="col-md-5">
            <div class="mb-3" id="subject">
                <label for="selectsubject" class="form-label">Select Subject</label>
                <select id="selectsubject" name="subject" class="form-select bg-transparent text-info" aria-label="Default select example">
                    <option value=""> Select Subject </option>
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
                <label for="dateid" class="mb-2">Last Date</label>
                <input class="form-control bg-transparent text-info" name="date" type="date" id="dateid">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload File</label>
                <input class="form-control bg-transparent text-info" name="pdf" placeholder="Upload Image" type="file" id="formFile">
            </div>
        </div>
    </div>
</form>
</div>

<script>
    function getSubject(subject) {
        let httpRequest = new XMLHttpRequest();
        httpRequest.open('GET', 'cascadedata2.php?coursename=' + subject + '&option=select12', true);
        httpRequest.send();
        httpRequest.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('subject').innerHTML = this.response;
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
