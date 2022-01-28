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
    <title>Edit Notes</title>
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
$noteid = $_POST['noteid'];
if (isset($noteid)) {

    include_once "partialpage/connection.php ";

    $select_sql = "SELECT * FROM `notes` WHERE notesid = '$noteid'";
    $execute = mysqli_query($conn, $select_sql);
    $res1 = mysqli_fetch_array($execute);
//    print_r($res1);
} else {
    echo "<script>window.location.href = 'notesview.php';</script>";
}
?>

<div class="container">
    <form action="notesaction.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <h1 class="text-center mb-4 mt-4 text-info"><strong>Edit Notes Details</strong></h1>
            <div class="col-md-5">

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label text-info">Title </label>
                    <input type="text" class="form-control text-info bg-transparent" placeholder="Title" name="title" value="<?php echo $res1[4]; ?>"
                           id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="floatingTextarea" class="mb-2 text-info">Note Description</label>
                    <textarea class="form-control text-info bg-transparent" required placeholder="Title Description" name="desc"
                              id="floatingTextarea"><?php echo $res1[5]; ?></textarea>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="selectcountry" class="form-label text-info">Select Semester</label>
                    <select name="sem" class="form-select text-info bg-transparent" aria-label="Default select example" id="selectcountry">
                        <option class="bg-dark text-warning" value="<?php echo $res1[7]; ?>"><?php echo $res1[7]; ?></option>
                        <option class="bg-dark text-warning" value="1">1 Sem</option>
                        <option class="bg-dark text-warning" value="2">2 Sem</option>
                        <option class="bg-dark text-warning" value="3">3 Sem</option>
                        <option class="text-warning bg-dark" value="4">4 Sem</option>
                        <option class="text-warning bg-dark" value="5">5 Sem</option>
                        <option class="text-warning bg-dark" value="6">6 Sem</option>
                        <option class="text-warning bg-dark" value="7">7 Sem</option>
                        <option class="text-warning bg-dark" value="8">8 Sem</option>
                        <option class="text-warning bg-dark" value="9">9 Sem</option>
                        <option class="text-warning bg-dark" value="10">9 Sem</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label text-info">Upload File</label>
                    <input class="form-control text-info bg-transparent" name="pdf" placeholder="Upload Image" value="<?php echo $res1[3]; ?>" type="file" id="formFile">
                </div>

                <div class="mb-3">
                    <input type="hidden" name="noteid" value="<?php echo $res1[0]; ?>">
                    <button onclick="return confirm('Are you sure you want to update ?')" type="submit"
                            class="btn btn-info text-info bg-transparent" style="text-align: center;padding: 10px 20px;border-radius: 20px" name="action" value="notesupdate"><h5> Update <i
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

