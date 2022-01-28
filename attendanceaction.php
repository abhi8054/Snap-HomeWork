<?php
session_start();
$tid = $_SESSION['teacherid'];
$adate = date("Y-m-d");
$sid = $_POST['roll'];
include_once "partialpage/connection.php";
$flag=0;
foreach ($sid as $value) {
    $sql = "SELECT status FROM attendance WHERE attendancedate = '$adate' AND studentid = '$value' AND teacherid='$tid'";
    $exe = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($exe);
    if ($row == 0) {
        $sql1 = "INSERT INTO `attendance`( `attendancedate`, `status`, `studentid`, `teacherid`) VALUE('$adate','P','$value','$tid')";
        $exe = mysqli_query($conn, $sql1);
        $flag++;
    } else {
        continue;
    }
}
if($flag > 0) {
    echo "<script>alert('Data save successfully');
        window.location.href='attendancesheet.php';
        </script>";
}else{
    echo "<script>alert('Data save failed');
        window.location.href='attendancesheet.php';
        </script>" ;
}
?>

