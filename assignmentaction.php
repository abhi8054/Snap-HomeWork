<?php
session_start();
$task=$_POST['action'];
switch ($task){

    case'addassignment':
        $topic=$_POST['topic'];
        $assdesc=$_POST['assdesc'];
        $lastdate=$_POST['date'];
        $uploaddate=date("Y-m-d");
        $stuid=$_POST['subject'];
        $course=$_POST['coursename'];
        $teacherid=$_SESSION['teacherid'];
        $sem=$_POST['semester'];

        $path_tmp=$_FILES['pdf']['tmp_name'];
        $path_org=$_FILES['pdf']['name'];
        $extension = strtolower(pathinfo($path_org, PATHINFO_EXTENSION));
        if($extension != 'pdf' && $extension!='doc'){
            echo "<script>alert('Suppoted only pdf or doc file');
                  window.location.href='addassignment.php';
                   </script>";
        }else{
            move_uploaded_file($path_tmp, "photouploads/$path_org");

            include_once "partialpage/connection.php";

            $add_assignment = "INSERT INTO `assignment`(`assignmenttopic`, `assignmentdesc`, `assignmentfile`, `subid`, `teacherid`, `uploaddate`, `lastdate`,`coursename`,`assignmentsem`)
                    VALUES ('$topic','$assdesc','photouploads/$path_org','$stuid','$teacherid','$uploaddate','$lastdate','$course','$sem')";
//            echo $add_assignment;
            $execute1 = mysqli_query($conn, $add_assignment);
            if ($execute1) {
                echo "<script>alert('Assignment Added Successfully');
                  window.location.href='addassignment.php';
                   </script>";
            } else {
                echo "<script>alert('Assignment Added Failed');
                  window.location.href='addassignment.php';
                   </script>";
            }
        }
        break;

    case'deleteassignment':
        $assignid = $_POST['assignmentid'];
        if (isset($assignid)) {

            include_once "partialpage/connection.php";

            $del_sql = "DELETE FROM `assignment` where assignmentid = '$assignid'";
            $execute2 = mysqli_query($conn, $del_sql);
            if ($execute2) {
                echo "<script>alert('Assignment Deleted Successfully');
                   window.location.href='viewassignment.php';
                   </script>";
            } else {
                echo "<script>alert('Assignment Deletion Failed');
                   window.location.href='viewassignment.php';
                   </script>";
            }
        }
        break;

    case 'updateteacher':

        $assignid = $_POST['assignmentid'];
        $atopic=$_POST['topic'];
        $aldate=$_POST['date'];
        $adesc=$_POST['assdesc'];

        $path_temp = $_FILES['pdf']['tmp_name'];
        $path_org = $_FILES['pdf']['name'];

        if($path_org == "" && $path_temp == ""){
            include_once "partialpage/connection.php";

            $tsql= "SELECT assignmentfile FROM assignment WHERE assignmentid = '$assignid'";
            $done=mysqli_query($conn,$tsql);
            $pres=mysqli_fetch_array($done);
            $path_org=substr($pres[0],13);
        }else{
            move_uploaded_file($path_temp, "photouploads/$path_org");
        }
        include_once "partialpage/connection.php";

        $up_sql = "UPDATE `assignment` SET `assignmenttopic`='$atopic',`assignmentdesc`='$adesc',`assignmentfile`='photouploads/$path_org',`lastdate`='$aldate' 
                    WHERE assignmentid = '$assignid'";
        $execute3 = mysqli_query($conn, $up_sql);
        if ($execute3) {
            echo "<script>alert('Assignment Updated Successfully');
                   window.location.href='viewassignment.php';
                   </script>";
        } else {
            echo "<script>alert('Assignment Update Failed');
                   window.location.href='viewassignment.php';
                   </script>";
        }
        break;
}
?>
