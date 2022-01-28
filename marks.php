<?php
session_start();
$tid=$_SESSION['teacherid'];
$sid=$_GET['subject'];
$aid=$_GET['assign'];
$stuid=$_GET['stuid'];
$grade=$_GET['grade'];
$cor=$_GET['coursename'];
$sem=$_GET['semester'];
$mstatus=1;
include_once "partialpage/connection.php";
$sql="INSERT INTO `marks`(`studentid`, `teacherid`, `subid`, `assignmentid`, `sem`, `coursename`, `grade`, `mstatus`)
        VALUES ('$stuid','$tid','$sid','$aid','$sem','$cor','$grade','$mstatus')";
$exe=mysqli_query($conn,$sql);
echo $exe." ";
//$res=mysqli_num_rows($exe);
if( $exe!=0){
    $up="UPDATE `upassign` SET `assignstatus`= '0' WHERE studentid = '$stuid' AND assignmentid ='$aid'";
    print_r($up);
    $e=mysqli_query($conn,$up);
}else{
    echo "Something went wrong";
}