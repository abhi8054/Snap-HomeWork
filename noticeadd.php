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
    <title>ADD Notice</title>

    <?php
    include_once "partialpage/headerfiles.php";
    include_once "partialpage/favicon.php";
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
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center text-warning mb-1 mt-5"><strong>ADD Notice Details</strong></h1>
            <div class="col-md-5 text-warning">
                <form action="noticeaction.php" method="post">

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label mt-3">Title Name</label>
                        <input type="text" class="form-control bg-transparent text-warning" placeholder="Title" name="noticetitle"
                               id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="floatingTextarea" class="mb-2">Title Description</label>
                        <textarea class="form-control bg-transparent text-warning" required placeholder="Title Description" name="noticedescription"
                                  id="floatingTextarea"></textarea>
                    </div>
                    <div class="mb-3" style="padding-top: 10px;font-size: 19px;">
                        <label>Notice for -></label>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Choose :
                        </label>
                        <input class="form-check-input" type="radio" value="student" name="flag" id="RadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Student
                        </label>
                        <input class="form-check-input" type="radio" value="teacher" name="flag" id="flexRadio">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Teacher
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning text-warning mb-3 bg-transparent" style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action"
                                value="addnotice"><h5> ADD <i class="fas fa-plus"></i></h5></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include_once "partialpage/footer.php";
    include_once "partialpage/files.php";
    ?>
    </div>
</body>
</html>
