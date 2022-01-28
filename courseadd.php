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
    <title>Course Add</title>
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
        <h1 class="text-center mb-1 mt-5 text-warning" ><strong>Add Courses</strong></h1>
        <div class="col-md-5  text-warning">
            <form action="courseaction.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputcourse" class="form-label mt-3">Course Name</label>
                    <input type="text" class="form-control bg-transparent"  required placeholder="Coursename" name="coursename" id="exampleInputcourse">
                </div>
                <div class="mb-3">
                    <label for="exampleselect" class="form-label">Select Duration</label>
                    <select name="duration" required class="form-select text-warning bg-transparent"  aria-label="Default select example" id="exampleselect">
                        <option class="bg-dark" value="">Select Duration</option>
                        <option class="bg-dark" value="1">1 year</option>
                        <option class="bg-dark" value="2">2 year</option>
                        <option class="bg-dark" value="3">3 year</option>
                        <option class="bg-dark" value="4">4 year</option>
                        <option class="bg-dark" value="5">5 year</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="floatingTextarea" class="mb-1">Description</label>
                    <textarea class="form-control bg-transparent" required placeholder="Add Description" name="description" id="floatingTextarea"></textarea>
                </div>
                <div class="text-center mb-3">
                <button type="submit" class="btn btn-warning bg-transparent text-warning" style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action" value="addcourse"><h5> ADD <i class="fas fa-plus"></i></h5></button>
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
