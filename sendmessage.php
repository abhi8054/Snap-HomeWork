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
    <title>Send Message</title>
    <?php
    include_once "partialpage/favicon.php";
    include_once "partialpage/headerfiles.php";
    ?>

    <style>
        #navbarSupportedContent ul li a:hover{
            padding-bottom:3px ;
            border-bottom: 2px solid deepskyblue;
        }


        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: deepskyblue !important;
        }

        ::-moz-placeholder { /* Firefox 19+ */
            color: deepskyblue !important;
        }

        :-ms-input-placeholder { /* IE 10+ */
            color: deepskyblue !important;
        }

        :-moz-placeholder { /* Firefox 18- */
            color: deepskyblue !important;
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
    <form action="messageaction.php" method="post">
        <div class="row justify-content-center text-info">
            <h1 class="text-center mb-1 mt-5 text-info"><strong>Send Messages to Students</strong></h1>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="courseselect" class="form-label">Select Course</label>
                    <select name="coursename" class="form-select bg-transparent text-info "
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
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="selectcountry" class="form-label">Select Semester</label>
                    <select name="semester" class="form-select bg-transparent text-info"
                            aria-label="Default select example" id="selectcountry">
                        <option class="bg-dark" value="">Select Semester</option>
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            ?>
                            <option class="bg-dark" value="<?php echo $i; ?>"><?php echo $i; ?> Sem</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-info">
            <div class="col-md-10">
                <div class="mb-3">
                    <label for="floatingTextarea" class="mb-1"> Message </label>
                    <textarea class="form-control bg-transparent text-info" required placeholder="Type Message...."
                              name="message" id="floatingTextarea" style="height: 150px"></textarea>
                </div>
            </div>
            <div class="text-center mb-3">
                <button type="submit" class="btn btn-info bg-transparent text-info"
                        style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action"
                        value="sendmsg"><h5> Send <i class="far fa-paper-plane"></i></h5></button>
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
