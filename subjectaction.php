<?php


session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location:adminlogin.php");
}


$task = $_POST['action'];
switch ($task) {
    case 'addsubject':
        $course = $_POST['coursename'];
        $subname = $_POST['subjectname'];
        $subdesc = $_POST['description'];
        $subsem= $_POST['semester'];
        include_once "partialpage/connection.php";

        $add_subject = "INSERT INTO `subject`(`coursename`, `subname`, `subdesc`,`subsem`) VALUES('$course', '$subname', '$subdesc')";
        $execute1 = mysqli_query($conn, $add_subject);
        if ($execute1) {
            echo "<script>alert('Subject Added Successfully');
                   window.location.href='subjectadd.php';
                   </script>";
        } else {
            echo "<script>alert('Subject Added Failed');
                   window.location.href='subjectadd.php';
                   </script>";
        }
        break;


    case 'deletesubject':

        $subid = $_POST['subid'];
        if (isset($subid)) {

            include_once "partialpage/connection.php";

            $del_sql = "DELETE FROM subject where subid = '$subid'";
            $execute2 = mysqli_query($conn, $del_sql);
            if ($execute2) {
                echo "<script>alert('Subject Deleted Successfully');
                   window.location.href='subjectview.php';
                   </script>";
            } else {
                echo "<script>alert('Subject Deletion Failed');
                   window.location.href='subjectview.php';
                   </script>";
            }
        }
        break;

    case 'updatesubject':

        $subid1 = $_POST['subid'];
        $course_name = $_POST['coursename'];
        $subject_name = $_POST['subjectname'];
        $subject_desc = $_POST['description'];
        $subsem= $_POST['semester'];

        include_once "partialpage/connection.php";

        $up_sql = "UPDATE `subject` SET `subname`='$subject_name',`subdesc`='$subject_desc',`coursename` = '$course_name',`subsem`='$subsem' WHERE subid = '$subid1'";
        $execute3 = mysqli_query($conn, $up_sql);
        if ($execute3) {
            echo "<script>alert('Subject Updated Successfully');
                   window.location.href='subjectview.php';
                   </script>";
        } else {
            echo "<script>alert('Subject Update Failed');
                   window.location.href='subjectview.php';
                   </script>";
        }
        break;
}
?>