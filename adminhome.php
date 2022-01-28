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
    <title>Admin Home</title>

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
<body id="abody">

<?php
include_once "partialpage/adminnavbar.php";
?>
<div class="container">
    <div class="row ">
        <div class="col-12 text-center">
            <h1 id="ah1" class="" style="position: absolute;top:35%">
                <span style="font-size: 70px">Welcome</span>  <span style="color: #6610f2"><strong><?php echo $_SESSION['adminuser'];?></strong></span> to <br> Admin Panel
            </h1>
        </div>

</div>
</div>
<?php
include_once "partialpage/files.php";
?>
</body>
</html>
