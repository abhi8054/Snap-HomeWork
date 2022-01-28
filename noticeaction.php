<?php

session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location:adminlogin.php");
}


$task = $_POST['action'];
switch ($task) {
    case 'addnotice':

        $ntitle = $_POST['noticetitle'];
        $ndate = date("y-m-d");
        $ndesc = $_POST['noticedescription'];
        $flag=$_POST['flag'];

        include_once "partialpage/connection.php";

        $add_subject = "INSERT INTO `notice`(`noticetitle`, `noticedesc`, `noticedate`,`noticeflag`) VALUES ('$ntitle','$ndesc','$ndate','$flag')";
        $execute1 = mysqli_query($conn, $add_subject);
        if ($execute1) {
            echo "<script>alert('Notice Added Successfully');
                   window.location.href='noticeadd.php';
                   </script>";
        } else {
            echo "<script>alert('Notice Added Failed');
                   window.location.href='noticeadd.php';
                   </script>";
        }
        break;

    case 'deletenotice':

        $nid = $_POST['noticeid'];
//        print_r($nid);
        if (isset($nid)) {

            include_once "partialpage/connection.php";

            $del_sql = "DELETE FROM notice where noticeid = '$nid'";
            $execute2 = mysqli_query($conn, $del_sql);
            if ($execute2) {
                echo "<script>alert('Notice Deleted Successfully');
                   window.location.href='noticeview.php';
                   </script>";
            } else {
                echo "<script>alert('Notice Deletion Failed');
                   window.location.href='noticeview.php';
                   </script>";
            }
        }
        break;

    case 'updatenotice':
        $ntid= $_POST['noticeid'];
        $ntn = $_POST['noticetitle'];
        $ntd = $_POST['noticedescription'];
        $nd = date("y-m-d");

        include_once "partialpage/connection.php";

        $up_sql = "UPDATE `notice` SET `noticetitle`='$ntn',`noticedesc`='$ntd',`noticedate`='$nd' WHERE noticeid = '$ntid'";
        $execute3 = mysqli_query($conn, $up_sql);
        if ($execute3) {
            echo "<script>alert('Notice Updated Successfully');
                   window.location.href='noticeview.php';
                   </script>";
        } else {
            echo "<script>alert('Notice Update Failed');
                   window.location.href='noticeview.php';
                   </script>";
        }
        break;
}