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
    <title>Teacher Home</title>

    <?php
    include_once "partialpage/favicon.php";
    include_once "partialpage/headerfiles.php";
    ?>
    <style>
        #navbarSupportedContent ul li a:hover{
            padding-bottom:3px ;
            border-bottom: 2px solid deepskyblue;
        }
        #button #pro:hover{
            background-color:gray ;
        }
        #button #log:hover{
            background-color:yellow ;
            color: #1a1e21;
        }
    </style>

</head>
<body id="tbody">
<?php
include_once "partialpage/teachernavbar.php";
?>

<div class="container">
    <div class="row ">

        <div class="col-md-6 text-center">
            <?php
            include_once "partialpage/connection.php";
            $id=$_SESSION['teacherid'];
            $q="SELECT teacherphoto FROM teacher WHERE teacherid= '$id'";
            $e=mysqli_query($conn,$q);
            $r=mysqli_fetch_array($e);
            ?>
            <img src="<?php echo $r[0] ?>" class="mt-5" style="border-radius: 50%;height: 300px;width: 300px" >
            <div class="mt-5" id="button">
                <button type="button" id="pro" class="btn btn-warning " onclick="vprofile()" style="margin-right: 30px;padding: 12px 19px;border-radius: 12px">Profile</button>
                <button type="button" id="log" class="btn btn-secondary" onclick="tlog()" style="padding: 10px 15px;border-radius: 12px">Log Out</button>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <h1 id="ah1" class="" style="position: absolute;top:35%">
                <span style="font-size: 70px">Welcome</span>  <span style="color: #6610f2"><strong><?php echo $_SESSION['teachername'];?></strong></span> to <br> Teacher Panel
            </h1>
        </div>
    </div>

<?php
include_once "partialpage/files.php";
?>
<script>
    function vprofile(){
        window.location.href='teacherprofile.php';
    }
    function tlog(){
        window.location.href='teacherlogout.php';
    }
</script>
</body>
</html>

