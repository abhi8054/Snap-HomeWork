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
    <title>ADD Assignment</title>
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
            color: #00BFFF !important;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: #00BFFF !important;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: #00BFFF !important;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: #00BFFF !important;
        }

    </style>
</head>
<body style="background-image: url('images/snap_icon.png');background-color:rgba(0,0,0,0.67);background-position: center center;background-repeat: no-repeat;background-size: cover">
<div style="background-image:linear-gradient(rgba(24,23,23,0.5),rgba(24,23,23,0.5)), url('images/ban11.jpg');height:50vh;background-repeat: no-repeat;background-position: center center;background-size: cover">
    <?php
    include_once "partialpage/teachernavbar.php";
    ?>
</div>

<?php
$assignmentid = $_POST['assignmentid'];
if (isset($assignmentid)) {

    include_once "partialpage/connection.php ";

    $select_sql = "SELECT * FROM `assignment` WHERE assignmentid = '$assignmentid'";
    $execute = mysqli_query($conn, $select_sql);
    $res1 = mysqli_fetch_array($execute);
} else {
    echo "<script>window.location.href = 'viewassignment.php';</script>";
}
?>

<div class="container">
    <form action="assignmentaction.php" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <h1 class="text-center mb-4 mt-4 text-info"><strong>Edit Assignment Details</strong></h1>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleInputtopic" class="form-label text-info">Assignment Topic</label>
                    <input type="text" class="form-control  bg-transparent text-info" placeholder="Topic" name="topic" value="<?php echo $res1[1]; ?>"
                           id="exampleInputtopic">
                </div>

                <div class="mb-3">
                    <label for="floatingTextarea" class="mb-2 text-info">Assignment Description</label>
                    <textarea class="form-control bg-transparent text-info" required placeholder="Title Description" name="assdesc"
                              id="floatingTextarea"><?php echo $res1[2]; ?></textarea>
                </div>


            </div>

            <div class="col-md-5">
                <div class="mb-3">
                    <label for="dateid" class="mb-2 text-info">Last Date</label>
                    <input class="form-control bg-transparent text-info" name="date" type="date" id="dateid" value="<?php echo $res1[7]; ?>">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label text-info">Upload Photo</label>
                    <input class="form-control bg-transparent text-info" name="pdf" placeholder="Upload Image" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <input type="hidden" name="assignmentid" value="<?php echo $res1[0]; ?>">
                    <button onclick="return confirm('Are you sure you want to update ?')" type="submit"
                            class="btn btn-info text-info bg-transparent" style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action" value="updateteacher"><h5> Update <i
                                class="fas fa-edit"></i></h5></button>
                </div>
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

