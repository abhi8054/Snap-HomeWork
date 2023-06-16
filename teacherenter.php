<?php

$task = $_POST['action'];
switch ($task){
    case'login':
        $useremail=$_POST['useremail'];
        $userpass = $_POST['userpass'];

        include_once "partialpage/connection.php";
        $sql= "SELECT * FROM teacher WHERE teacheremail = '$useremail' AND teacherpass = '$userpass'";
        $execute=mysqli_query($conn,$sql);
        $res=mysqli_num_rows($execute);
        $row=mysqli_fetch_array($execute);
        if($res == 1){
            session_start();
            $_SESSION['teacherid']=$row[8];
            $_SESSION['teachername']=$row[0];
            $_SESSION['teachermail']=$row[5];
            echo "<script>alert('Login Successful');
                    window.location.href='teacherhome.php';
                    </script>";
        }else{
            echo "<script>alert('Login Failed');
                    window.location.href='teacherlogin.php';
                    </script>";
        }
        break;
    case 'reset':
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confpass = $_POST['confpass'];

        if ($newpass == $confpass) {

            include_once "partialpage/connection.php";

            $forgot_sql = "select * from teacher where teacherpass = '$oldpass'";
            $execute2 = mysqli_query($conn, $forgot_sql);
            $res2 = mysqli_num_rows($execute2);

            if ($res2 == 1) {
                $update = "Update teacher set teacherpass = '$newpass' where teacherpass = '$oldpass'";
                mysqli_query($conn, $update);
                echo "<script>alert('Password Change Successfully');
                    window.location.href='teacherlogin.php';
                    </script>";
            } else {
                echo "<script>alert('Old Password Does Not Match');
                    window.location.href='teacherreset.php';
                    </script>";
            }
        } else {
            echo "<script>alert('New and Confirm Password Not Match');
                    window.location.href='teacherreset.php';
                    </script>";
        }
        break;
}
?>