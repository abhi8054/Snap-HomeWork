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
    <title>Upload</title>
    <?php
    include_once "partialpage/headerfiles.php";
    include_once "partialpage/favicon.php";
    ?>
    <style>
        #navbarSupportedContent ul li a:hover{
            padding-bottom:3px ;
            border-bottom: 2px solid white;
        }
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: white !important;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: white !important;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: white !important;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: white !important;
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
    <form action="uploadaction.php" method="post" enctype="multipart/form-data">
        <?php
        $sid = $_SESSION['studentid'];
        include_once "partialpage/connection.php";
        $s = "SELECT coursename,studentsem FROM student WHERE studentid = '$sid'";
        $r = mysqli_query($conn, $s);
        $row = mysqli_fetch_array($r);
        ?>
        <h1 class="text-center mt-4 text-white mb-4"><strong> Course : <?php echo $row[0]; ?> || Semester : <?php echo $row[1].'th'; ?></strong></h1>
        <h1 class="text-center mt-4 text-white mb-4"><strong> Upload Assignment</strong></h1>
        <div class="row justify-content-center text-light">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="courseselect" class="form-label">Select Subject</label>
                    <select name="subject" class="form-select text-light bg-transparent" onchange="getSub1(this.value)"
                            aria-label="Default select example" id="courseselect">
                        <option class="bg-dark" value="">Select Subject</option>
                        <?php
                        include_once "partialpage/connection.php";
                        $sel_course = "SELECT subname,subid FROM subject WHERE coursename = '$row[0]'";
                        $execute1 = mysqli_query($conn, $sel_course);
//                        print_r(mysqli_fetch_array($execute1));
                        while ($res = mysqli_fetch_array($execute1)) {
                            echo "<option class='bg-dark' value='$res[1]'> $res[0]</option>";
//                            print_r($res[1]);
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputrol" class="form-label">Roll No.</label>
                    <input type="text" placeholder="Roll No." class="form-control bg-transparent"  name="rollno" id="exampleInputrol">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Teacher Email address</label>
                    <input type="email" class="form-control bg-transparent" placeholder="Email Address" name="email"
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

            </div>
            <div class="col-md-5">
                <div class="mb-3" id="assign">
                    <label for="selectsubject" class="form-label">Select Assignment</label>
                    <select id="selectsubject" name="subject" class="form-select text-white bg-transparent"
                            aria-label="Default select example">
                        <option class="bg-dark" value=""> Select Assignment</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputnamme" class="form-label">Name</label>
                    <input type="text" class="form-control bg-transparent text-light" placeholder="Full Name" name="name" id="exampleInputnamme">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload File </label>
                    <input class="form-control bg-transparent text-light" name="doc" placeholder="Upload Image" type="file" id="formFile">
                    <div>file format only pdf or doc</div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-light text-light bg-transparent" style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action" value="upload"><h5> Upload <i class="fas fa-upload"></i>
                        </h5>
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>

<script>
    let cor ="<?php echo $row[0]; ?> ";
    let sem =" <?php echo $row[1]; ?> ";
    let sub = "";

    function getSub1(sub_ject) {
        sub = sub_ject;
        // alert(sub);
        getassign(sub);
    }

    function getassign(assign) {
            let httpRequest = new XMLHttpRequest();
            httpRequest.open('GET', 'cascadeassign.php?coursename=' + cor + '&semester=' + sem + '&assignment=' + assign + '&option=assign', true);
            httpRequest.send();
            httpRequest.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('assign').innerHTML = this.response;
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
