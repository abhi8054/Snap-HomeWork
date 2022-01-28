<?php


session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location:adminlogin.php");
}


$val = $_POST['coursename'];
$sem=$_POST['semester'];
if ($val != ""){
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Specific Course Subject</title>

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
<div class="container">
    <h1 class="text-center text-warning mb-4 mt-4"><strong><?php echo $val ." || ". $sem; ?> Sem || Subject Details </strong></h1>
    <?php
            $count = 0;
            include_once "partialpage/connection.php";
            $view_sql = "SELECT * FROM subject WHERE coursename = '$val' AND subsem='$sem'";
            $execute = mysqli_query($conn, $view_sql);
            $row = mysqli_num_rows($execute);
            if ($row != 0){
                ?>
    <div class="table-responsive">
        <table class="table table-hover table-dark table-bordered table-primary table-striped"
               style="  border: 1px solid yellow;">
            <thead>
            <tr class="text-danger">
                <th>S No.</th>
                <th>Course Name</th>
                <th>Subject Name</th>
                <th>Subject Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($res = mysqli_fetch_array($execute)) {
                $count++;
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $res[3]; ?></td>
                    <td><?php echo $res[1]; ?></td>
                    <td><?php echo $res[2]; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

    <?php
    } else {
        echo "<h1>No Subject Found.......</h1>";
    }
    } else {
        header("location:subjectview.php");
    }
    ?>
</div>

<?php
include_once "partialpage/footer.php";
include_once "partialpage/files.php";
?>
</body>
</html>


