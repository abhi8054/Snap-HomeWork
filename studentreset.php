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
    <title>Student Reset Password</title>

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
<div class="container-fluid">
    <h1 class="mt-4 mb-4 text-center text-white" id="h1" ><strong>Reset Password Form</strong> &nbsp;<i class="fas fa-key"></i></h1>
    <div class="row text-center justify-content-center">
        <div class="col-md-4 bg-transparent" id="forgot">
            <h3 class="pt-3 pb-4 text-light">Change Password</h3>
            <form action="teacherenter.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputoldPassword1" class="form-label text-light" style="font-size:20px">Old Password</label>
                    <input type="password" class="form-control" required placeholder="Old Password" name="oldpass" id="exampleInputoldPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputnewPassword1" class="form-label text-light" style="font-size:20px">New Password</label>
                    <input type="password" class="form-control" required placeholder="New Password" name="newpass" id="exampleInputnewPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputconPassword1" class="form-label text-light" style="font-size:20px">Confirm Password</label>
                    <input type="password" class="form-control" required placeholder="Confirm Password" name="confpass" id="exampleInputconPassword1">
                </div>
                <button type="submit" class="btn btn-danger mb-4" style="padding: 10px 20px;border-radius: 20px" name="action" value="reset">Update</button>
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