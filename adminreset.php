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
    <title>Admin Reset Password</title>

    <?php
    include_once "partialpage/favicon.php";
    include_once "partialpage/headerfiles.php";
    ?>
    <style>
        #navbarSupportedContent ul li a:hover{
            padding-bottom: 3px;
            border-bottom: 2px solid yellow;
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
        <h1 class="mt-5 mb-5 text-warning text-center" id="h1" >Reset Password Form &nbsp;<i class="fas fa-key"></i></h1>
        <div class="row text-center justify-content-center">
            <div class="col-md-4 bg-light" id="forgot">
                <h3 class="pt-3 pb-4">Change Password</h3>
                <form action="adminaction.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputoldPassword1" class="form-label" style="font-size:20px">Old Password</label>
                        <input type="password" class="form-control" required placeholder="Old Password" name="oldpass" id="exampleInputoldPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputnewPassword1" class="form-label" style="font-size:20px">New Password</label>
                        <input type="password" class="form-control" required placeholder="New Password" name="newpass" id="exampleInputnewPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputconPassword1" class="form-label" style="font-size:20px">Confirm Password</label>
                        <input type="password" class="form-control" required placeholder="Confirm Password" name="confpass" id="exampleInputconPassword1">
                    </div>
                    <button type="submit" class="btn btn-danger mb-4" style="padding: 10px 20px;border-radius: 20px" name="action" value="forgot">Update</button>
                </form>
            </div>
        </div>
    </div>
    <?php
        include_once "partialpage/files.php";
    ?>
</body>
</html>