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
    <title>Add Teacher</title>

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

<?php
$teacherid = $_POST['teacherid'];
if (isset($teacherid)) {

    include_once "partialpage/connection.php ";

    $select_sql = "SELECT * FROM `teacher` WHERE teacherid = '$teacherid'";
    $execute = mysqli_query($conn, $select_sql);
    $res1 = mysqli_fetch_array($execute);
} else {
   echo "<script>window.location.href = 'teacherview.php ';</script>";
}
?>
<div class="container-fluid">
    <form action="teacheraction.php" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center text-warning">
            <h1 class="text-center text-warning mb-4 mt-4"><strong>Edit Teacher Details</strong></h1>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleInputnamme" class="form-label">Full Name</label>
                    <input type="text" class="form-control bg-transparent text-warning" name="name" value="<?php echo $res1[0]; ?>"
                           id="exampleInputnamme">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control bg-transparent text-warning" name="password" value="<?php echo $res1[6]; ?>"
                           id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputmobile" class="form-label">Mobile No.</label>
                    <input type="text" class="form-control bg-transparent text-warning" name="mobile" value="<?php echo $res1[1]; ?>"
                           id="exampleInputmobile">
                </div>
                <div class="mb-3">
                    <label for="examplestate" class="form-label">State</label>
                    <input type="text" class="form-control bg-transparent text-warning" name="state" value="<?php echo $res1[10]; ?>"
                           id="examplestate">
                </div>
                <div class="mb-3">
                    <label for="floatingTextarea2">Address : </label>
                    <textarea class="form-control bg-transparent text-warning" placeholder="" id="floatingTextarea2" name="address"
                              style="height: 70px"><?php echo $res1[2]; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Photo</label>
                    <input class="form-control bg-transparent text-warning" name="photo" value="<?php echo $res1[3]; ?>" type="file" id="formFile">
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleInputqual" class="form-label">Qualification</label>
                    <input type="text" class="form-control bg-transparent text-warning" name="qualification" value="<?php echo $res1[4]; ?>"
                           id="exampleInputqual">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control bg-transparent text-warning" name="email" value="<?php echo $res1[5]; ?>"
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text text-warning">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="selectcountry" class="form-label">Select Country</label>
                    <select name="country" class="form-select bg-transparent text-warning" aria-label="Default select example" id="selectcountry">
                        <option class="text-warning bg-dark" value="<?php echo $res1[11]; ?>"><?php echo $res1[11]; ?></option>
                        <option class="text-warning bg-dark" value="India">India</option>
                        <option class="text-warning bg-dark" value="Canada">Canada</option>
                        <option class="text-warning bg-dark" value="America">America</option>
                        <option class="text-warning bg-dark" value="Europe">Europe</option>
                        <option class="text-warning bg-dark" value="Australia">Australia</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="courseselect" class="form-label">Select Subject</label>
                    <select name="coursename" class="form-select bg-transparent text-warning" onchange="getsubject(this.value)"
                            aria-label="Default select example" id="courseselect">
                        <option class="bg-dark text-warning" value="<?php echo $res1[12];?>"><?php echo $res1[12];?></option>
                        <?php
                        include_once "partialpage/connection.php";
                        $sel_course = "SELECT coursename FROM courses";
                        $execute1 = mysqli_query($conn, $sel_course);
                        while ($res = mysqli_fetch_array($execute1)) {
                            echo "<option class='text-warning bg-dark' value='$res[0]'> $res[0]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3" id="subject" style="font-size: 20px;">
                    <section>
                        <?php
                        include_once "partialpage/connection.php";
                        $course = $res1[0];
                        $count = 0;
                        $sql = "SELECT teachersubject FROM teacher WHERE teacherid = '$teacherid'";
                        $exc = mysqli_query($conn, $sql);
                        $res = mysqli_fetch_array($exc);
                        $str1=$res[0];
                        $str1=explode(',',$str1);
                            foreach ($str1 as  $value ){
                                $count++;
                                ?>
                                <label class="form-check-label text-warning" style="margin-left: 5px"
                                       for="checkbox<?php echo $count; ?>"><?php echo "$value"; ?>
                                </label>
                                <input class="form-check-input text-warning" name="subject[]" checked type="checkbox" value="<?php echo "$value"; ?>"
                                       id="checkbox<?php echo $count; ?>">

                                <?php
                            }
                        ?>
                    </section>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="teacherid" value="<?php echo $res1[8]; ?>">
                    <button onclick="return confirm('Are you sure you want to update ?')" style="text-align: center;padding: 10px 20px;border-radius: 20px" type="submit"
                            class="btn btn-warning text-warning bg-transparent" name="action" value="updateteacher"><h5> Update <i
                                    class="fas fa-edit"></i></h5></button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function getsubject(subject) {
        let httpRequest = new XMLHttpRequest();
        httpRequest.open('GET', 'cascadedata.php?coursename=' + subject+'&option=checkbox', true);
        httpRequest.send();
        httpRequest.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('subject').innerHTML = this.response;
            }
        }
    }
</script>
<?php
include_once "partialpage/footer.php";
include_once "partialpage/files.php";
?>
</body>
</html>
