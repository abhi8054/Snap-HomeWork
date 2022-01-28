<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
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
<body style="background-image:  linear-gradient(rgba(239, 10, 10, 0.5),rgba(24,23,23,0.5)),url('images/s1.jpg');background-color:skyblue;background-position: center;height: 100vh; background-repeat: no-repeat;background-size: cover">
<div style="background-image:linear-gradient(rgba(255,255,255,0.22),rgba(255,255,255,0.22));height:15vh;background-repeat: no-repeat;background-position: center center;background-size: cover">
    <?php
    include_once "partialpage/publicnavbar.php";
    ?>
</div>
<div class="container">
    <div class="row justify-content-evenly">
        <div class="col-md-4 text-center" id="form">
            <h2 class="text-center" id="h2">Admin Login <i class="fas fa-sign-in-alt"></i></h2>

            <img src="images/logo1.png " class="img-fluid mt-2 pt-2" style="width: 100px; height: 100px">
            <form action="adminaction.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputtext" class="form-label mt-3" style="color: greenyellow; font-size:20px"><i
                                class="fas fa-user"></i> Username</label>
                    <input type="text" class="form-control" required placeholder="Username" id="exampleInputtext"
                           name="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" style="color: greenyellow; font-size:20px"><i
                                class="fas fa-unlock"></i> Password</label>
                    <input type="password" class="form-control" required placeholder="Password"
                           id="exampleInputPassword1" name="password">
                </div>
                <div class="mb-5">
                    <button type="submit" class="btn btn-danger" style="padding: 10px 20px;border-radius: 20px" name="action" value="submit"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once "partialpage/files.php";
?>
</body>
</html>
