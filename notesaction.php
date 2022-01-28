<?php
session_start();
$task = $_POST['action'];
switch ($task) {
    case'addnotes':
        $subid = $_POST['subject'];
        $course = $_POST['course'];
        $tid = $_SESSION['teacherid'];
        $title = $_POST['title'];
        $sem = $_POST['sem'];
        $desc = $_POST['desc'];
        $date = date("Y-m-d");

        $path_tmp = $_FILES['pdf']['tmp_name'];
        $path_org = $_FILES['pdf']['name'];
        $extension = strtolower(pathinfo($path_org, PATHINFO_EXTENSION));

        if ($extension != 'pdf' && $extension != 'doc') {
            echo "<script>alert('Suppoted only pdf or doc file');
                  window.location.href='addnotes.php';
                   </script>";
        } else {
            move_uploaded_file($path_tmp, "photouploads/$path_org");

            include_once "partialpage/connection.php";

            $add_notes="INSERT INTO `notes`(`coursename`, `subid`, `notesfile`, `notestitle`, `notesdesc`, `notesdate`, `notessem`, `teacherid`) 
                        VALUES ('$course','$subid','photouploads/$path_org','$title','$desc','$date','$sem','$tid')";
            $execute1 = mysqli_query($conn, $add_notes);
            if ($execute1) {
                echo "<script>alert('Notes Added Successfully');
                  window.location.href='addnotes.php';
                   </script>";
            } else {
                echo "<script>alert('Notes Added Failed');
                  window.location.href='addnotes.php';
                   </script>";
            }
        }
        break;
    case 'notesupdate':

        $noteid = $_POST['noteid'];
        $ntitle=$_POST['title'];
        $ndate=date("Y-m-d");
        $ndesc=$_POST['desc'];

        $path_temp = $_FILES['pdf']['tmp_name'];
        $path_org = $_FILES['pdf']['name'];

        if($path_org == "" && $path_temp == ""){
            include_once "partialpage/connection.php";

            $tsql= "SELECT notesfile FROM notes WHERE notesid = '$noteid'";
            $done=mysqli_query($conn,$tsql);
            $pres=mysqli_fetch_array($done);
            $path_org=substr($pres[0],13);
        }else{
            move_uploaded_file($path_temp, "photouploads/$path_org");
        }
        include_once "partialpage/connection.php";

        $up_sql = "UPDATE `notes` SET `notesfile`='photouploads/$path_org',`notestitle`='$ntitle',`notesdesc`='$ndesc',`notesdate`='$ndate' WHERE notesid='$noteid'";
        $execute3 = mysqli_query($conn, $up_sql);
        if ($execute3) {
            echo "<script>alert('Notes Updated Successfully');
                   window.location.href='notesview.php';
                   </script>";
        } else {
            echo "<script>alert('Notes Update Failed');
                   window.location.href='notesview.php';
                   </script>";
        }

        break;
}

?>
