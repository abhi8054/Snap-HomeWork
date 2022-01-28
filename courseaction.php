<?php

session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location:adminlogin.php");
}


$task = $_POST['action'];

switch ($task) {
    case 'addcourse':
        $course = $_POST['coursename'];
        $duration = $_POST['duration'];
        $desc = $_POST['description'];

        include_once "partialpage/connection.php";

        $add_course = "INSERT INTO `courses`(`coursename`, `courseduration`, `coursedesc`) VALUES('$course', '$duration', '$desc')";
        $execute1 = mysqli_query($conn, $add_course);
        if ($execute1) {
            echo "<script>alert('Course Added Successfully');
                   window.location.href='courseadd.php';
                   </script>";
        } else {
            echo "<script>alert('Course Added Failed');
                   window.location.href='courseadd.php';
                   </script>";
        }
        break;

    case 'deletecourse':

        $coursename = $_POST['coursename'];
        if (isset($coursename)) {

            include_once "partialpage/connection.php";

            $del_sql = "DELETE FROM courses where coursename = '$coursename'";
            $execute2 = mysqli_query($conn, $del_sql);
            if ($execute2) {
                echo "<script>alert('Course Deleted Successfully');
                   window.location.href='courseview.php';
                   </script>";
            } else {
                echo "<script>alert('Course Deletion Failed');
                   window.location.href='courseview.php';
                   </script>";
            }
        }
        break;

    case 'updatecourse':

        $course_name = $_POST['coursename'];
        $course_duration = $_POST['duration'];
        $course_desc = $_POST['description'];

        include_once "partialpage/connection.php";

        $up_sql = "UPDATE courses SET courseduration = '$course_duration' , coursedesc = '$course_desc' WHERE coursename = '$course_name '";
        $execute3 = mysqli_query($conn, $up_sql);
        if ($execute3) {
            echo "<script>alert('Course Updated Successfully');
                   window.location.href='courseview.php';
                   </script>";
        } else {
            echo "<script>alert('Course Update Failed');
                   window.location.href='courseview.php';
                   </script>";
        }
        break;
}