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
    <title>Students Assignment</title>
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
        <h1 class="text-center mb-4 mt-4 text-info"><strong>View Student's Uploaded Assignment</strong></h1>
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
            <div class="mb-3" id="subject">
                <label for="selectsubject" class="form-label">Select Subject</label>
                <select id="selectsubject" name="subject" class="form-select text-info bg-transparent"
                        aria-label="Default select example">
                    <option class="bg-dark" value=""> Select Subject</option>
                </select>
            </div>

        </div>
        <div class="col-md-5">
            <div class="mb-3">
                <label for="selectcountry" class="form-label">Select Semester</label>
                <select name="semester" class="form-select text-info bg-transparent" onchange="getsem(this.value)"
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
            <div class="mb-3" id="assign">
                <label for="selectsubject" class="form-label">Select Assignment</label>
                <select id="selectsubject" name="subject" class="form-select  text-info bg-transparent"
                        aria-label="Default select example">
                    <option class="bg-dark" value=""> Select Assignment</option>
                </select>
            </div>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" onclick="viewAssignment()" class="btn btn-info bg-transparent text-info"
                    style="text-align: center;padding: 10px 20px;border-radius: 20px"><h5> View Assignment <i
                            class="fas fa-check-circle"></i></i></h5>
            </button>
        </div>
    </div>
    <form action="attendanceaction.php" method="post">
        <div class="row" style="position: relative">
            <div class="col-12">
                <div class="table-responsive" id="table">
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    let sub = "";
    let cor = "";
    let sem1 = "";
    let aid = "";
    let sid="";
    let grade="";
    let count=0;


    function getsubject(subject) {
        cor = subject;
        let httpRequest = new XMLHttpRequest();
        httpRequest.open('GET', 'cascadeassign.php?coursename=' + subject + '&option=select', true);
        httpRequest.send();
        httpRequest.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('subject').innerHTML = this.response;
                // alert(this.response);
            }
        }
    }

    function getsub(sub_ject) {
        sub = sub_ject;
        getassign(sub);
    }

    function getsem(sem_mester) {
        sem1 = sem_mester;
    }

    function getaid(assignment) {
        aid = assignment;
    }


    function getassign(assign) {
        if (sem1 !== "") {
            let httpRequest = new XMLHttpRequest();
            httpRequest.open('GET', 'cascadedata2.php?coursename=' + cor + '&semester=' + sem1 + '&assignment=' + assign + '&option=assign', true);
            httpRequest.send();
            httpRequest.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('assign').innerHTML = this.response;
                    // alert(this.response);
                }
            }
        } else {
            alert('Select Semester first then again select subject');
        }
    }

    function viewAssignment() {
        let httprequest = new XMLHttpRequest();
        httprequest.open('GET', 'cascadeassign.php?coursename=' + cor + '&subject=' + sub + '&semester=' + sem1 + '&assign=' + aid + '&option=table', true);
        httprequest.send();
        httprequest.onreadystatechange = function () {
            if (httprequest.readyState === 4 && httprequest.status === 200) {
                document.getElementById('table').innerHTML = httprequest.response;
                // alert(this.response);
            }
        }
    }

    function marks(g,s){
        sid=s;
        let httprequest = new XMLHttpRequest();
        httprequest.open('GET', 'marks.php?coursename=' + cor + '&subject=' + sub + '&semester=' + sem1 + '&assign=' + aid + '&stuid=' + sid + '&grade=' + g + '&option=table', true);
        httprequest.send();
        httprequest.onreadystatechange = function () {
            if (httprequest.readyState === 4 && httprequest.status === 200) {
                // document.getElementById('marks').innerHTML = httprequest.response;
                // alert(this.response);
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
