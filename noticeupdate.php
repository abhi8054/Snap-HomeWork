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
<?php

$nid = $_POST['noticeid'];

if (isset($nid)) {
    include_once "partialpage/connection.php ";

    $select_sql = "SELECT * FROM `notice` WHERE noticeid = '$nid'";
    $execute = mysqli_query($conn, $select_sql);
    $res = mysqli_fetch_array($execute);
} else {
    header('location:courseview.php');
}
?>

<div class="container">
    <form action="noticeaction.php" method="post">
    <div class="row justify-content-center">
        <h2 class="text-center text-warning mb-1 mt-5"><strong>Edit Notice Details</strong></h2>
        <div class="col-md-6 text-warning">
            <form action="noticeaction.php" method="post">

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label mt-3">Title Name</label>
                    <input type="text" class="form-control bg-transparent text-warning" value="<?php echo $res[1]; ?>" name="noticetitle"
                           id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="floatingTextarea" class="mb-2 text-warning">Title Description</label>
                    <textarea class="form-control bg-transparent text-warning" required  name="noticedescription"
                              id="floatingTextarea"><?php echo $res[2]; ?></textarea>
                </div>

                <div class="mb-3 text-center">
                    <input type="hidden" name="noticeid" value="<?php echo $res[0]; ?>">
                    <button onclick="return confirm('Are you sure you want to update ?')"  style="text-align: center;padding: 10px 20px;border-radius: 20px" type="submit"
                            class="btn btn-warning text-warning bg-transparent" name="action" value="updatenotice"><h5> Update <i
                                    class="fas fa-edit"></i></h5></button>
                </div>
            </form>
        </div>
    </div>
    </form>
</div>
<?php
include_once "partialpage/footer.php";
include_once "partialpage/files.php";
?>
</div>
</body>
</html>

