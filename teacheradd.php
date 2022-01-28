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
<div class="container-fluid">
    <form action="teacheraction.php" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <h1 class="text-center mb-4 mt-4 text-warning"><strong>Add Teacher Details</strong></h1>
            <div class="col-md-5 text-warning">
                <div class="mb-3">
                    <label for="exampleInputnamme" class="form-label">Full Name</label>
                    <input type="text" class="form-control text-warning bg-transparent" placeholder="Full Name" name="name" id="exampleInputnamme">
                </div>
                <div class="mb-3 ">
                    <?php
                    $character = "qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM@#$%^&*!+";
                    $password="";
                    for($l=1;$l<=10;$l++){
                        $password=$password.$character[rand(0,strlen($character)-1)];
                    }
                    ?>
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control text-warning bg-transparent" readonly value="<?php echo $password;?>" name="password"
                           id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputmobile" class="form-label">Mobile No.</label>
                    <input type="text" class="form-control text-warning bg-transparent" placeholder="Mobile No." name="mobile"
                           id="exampleInputmobile">
                </div>
                <div class="mb-3">
                    <label for="examplestate" class="form-label">State</label>
                    <input type="text" class="form-control text-warning bg-transparent" placeholder="State" name="state" id="examplestate">
                </div>
                <div class="mb-3">
                    <label for="floatingTextarea2">Address : </label>
                    <textarea class="form-control text-warning bg-transparent" placeholder="Address..." id="floatingTextarea2" name="address"
                              style="height: 70px"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Photo</label>
                    <input class="form-control text-warning bg-transparent" name="photo" placeholder="Upload Image" type="file" id="formFile">
                </div>
            </div>
            <div class="col-md-5 text-warning">
                <div class="mb-3">
                    <label for="exampleInputqual" class="form-label">Qualification</label>
                    <input type="text" class="form-control text-warning bg-transparent" placeholder="Qualificaton" name="qualification"
                           id="exampleInputqual">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control text-warning bg-transparent" placeholder="Email Address" name="email"
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text text-warning text-warning bg-transparent">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3" style="padding-top: 17px;font-size: 19px;">
                    <p class="d-inline ">Gender : </p>
                    <input class="form-check-input" type="radio" value="male" name="gender" id="RadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                    <input class="form-check-input" type="radio" value="female" name="gender" id="flexRadio">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Female
                    </label>
                    <input class="form-check-input" type="radio" value="others" name="gender" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Others
                    </label>
                </div>
                <div class="mb-3">
                    <label for="selectcountry" class="form-label">Select Duration</label>
                    <select name="country" class="form-select text-warning bg-transparent" aria-label="Default select example" id="selectcountry">
                        <option class="bg-dark" value="">Select Country</option>
                        <option class="bg-dark" value="India">India</option>
                        <option class="bg-dark" value="Canada">Canada</option>
                        <option class="bg-dark"  value="America">America</option>
                        <option class="bg-dark" value="Europe">Europe</option>
                        <option class="bg-dark" value="Australia">Australia</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="courseselect" class="form-label">Select Subject</label>
                    <select name="coursename" class="form-select text-warning bg-transparent" onchange="getsubject(this.value)"
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
                <div class="mb-3" id="subject" style="font-size: 20px;">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-warning text-warning bg-transparent" name="action" value="addteacher"
                            style="text-align: center;padding: 10px 20px;border-radius: 20px"><h5> ADD <i class="fas fa-plus"></i></h5>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function getsubject(subject) {
        let httpRequest = new XMLHttpRequest();
        httpRequest.open('GET', 'cascadedata.php?coursename='+subject+'&option=checkbox', true);
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
